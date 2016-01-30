<?php

namespace App\Modules\Checkout\Controllers;

use App\Classes\AbstractController;
use App\Models;
use App\Modules\Transaction\Controllers\Create;
use App\Traits;

Class Cart extends AbstractController
{

    use Traits\GenericTrait;
    use Traits\UserTrait;

    public function __construct()
    {
        parent::__construct();
        $this->cart = new Models\Cart();
    }

//    public function preview()
//    {
//        $this->data['cart'] = $this->request->session('cart');

//        $view = new \Zewa\View();
//        $view->setProperty($this->data);
//        $view->setLayout('vanilla');
//        $view->setModule('checkout');
//        $view->setView('preview');
//        return $view->render();
//    }

    public function review()
    {
        if(!$this->logged) {
            $this->request->setFlashdata('notice', (object) [
                'type' => 'warning',
                'message' => _("You must be logged in to checkout") . ' <a data-target="#loginModal" data-toggle="modal" href="javascript:void(0)">' . _("Click here to login") . '</a>'
            ]);
            $this->router->redirect($this->router->baseURL('?r=' . base64_encode(urlencode($this->router->uri))));
        }

        $cart = $this->request->session('cart');
        $user = $this->request->session('user');;
        $total = $this->total();

        $stripe = $this->configuration->stripe;

        \Stripe\Stripe::setApiKey($stripe->secret_key);
        $this->data['requiredCheckoutAmendments'] = [];

        if($this->request->post()) {
            $updatedQuantities = $this->request->post("quantity");
            foreach($cart as $key => $c) {
                foreach($updatedQuantities as $reward => $quantity) {
                    if($c->id == $reward) {
                        $cart[$key]->cart_quantity = $quantity;
                        continue;
                    }
                }
            }

            $user->terms = $this->request->post('terms', false);
            $user->shipping = (object) $this->request->post('shipping_address');

            $this->request->setSession('cart', $cart);
            $this->request->setSession('user', $user);

            if (!$this->validateAddress($this->request->post('shipping_address'))) {
                $this->request->setFlashdata('notice', (object) ['type' => 'warning', 'message' => _("Please provide a valid shipping address")]);
                $this->router->redirect($this->router->currentURL());
            }

            $ready = true;
            $msg = false;

            if (!$this->validateAddress((array)$user->shipping)) {

                $ready = false;
                $msg = _("You must provide a valid shipping address");
            }

            if (isset($user->terms) && $user->terms !== 'on') {

                $ready = false;
                $msg = _("Please click the checkbox to confirm your shipping address");
            }


            $token  = $this->request->post('stripeToken', false);

            if($ready === true) {
                $deductCredit = true;
                if($token !== false) {
                    $deductCredit = false;
                    $customer = \Stripe\Customer::create(array(
                        'email' => $user->email, //'customer@example.com',
                        'card'  => $token
                    ));

                    $charge = \Stripe\Charge::create(array(
                        'customer' => $customer->id,
                        'amount'   => bcmul(($total / 1000), 100),
                        'currency' => 'usd'
                    ));

                    if(!is_null($charge->failure_code)) {
                        $ready = false;
                        $msg = _("You lack the credits to continue");
                    }
                } else {

                    if (bcsub($user->credits, $total, 2) < 0) {
                        $ready = false;
                        $msg = _("You lack the credits to continue");
                    }

                }

            }

            if($ready === true) {

                if (isset($user->terms)) {
                    unset($user->terms);
                    $this->request->setSession('user', $user);
                }

                $createTransaction = new \App\Modules\Transaction\Controllers\Create($deductCredit);
                if($createTransaction) {
                    $this->router->redirect($this->router->baseURL('transaction/complete'));
                } else {
                    $this->request->setFlashdata('notice', (object)['type' => 'warning', 'message' => _("We were unable to process your transaction, please try again. If the problem persist, please contact csr@alldigitalrewards.com")]);
                    $this->router->redirect($this->router->baseURL('checkout/cart/review'));
                }
            } else {
                $this->request->setFlashdata('notice', (object) ['type' => 'warning', 'message' => $msg]);
                $this->router->redirect($this->router->currentURL());
            }

        }

        $this->data['shipping'] = $user->shipping;

        $view = new \Zewa\View();
        $view->setProperty($this->data);
        $view->setLayout('marketplace');
        $view->setModule('checkout');
        $view->setView('review');
        return $view->render();
    }

    public function total()
    {
        $cart = $this->request->session('cart');

        $total = 0.00;
        if(!empty($cart)) {
            foreach($cart as $reward) {
                for($i = 0; $i < $reward->cart_quantity; $i++) {
                    $total = bcadd($total, $reward->credit_cost, 2);
                }
            }
        }

        return $total;
    }

    public function add($rewardId)
    {
        $cart = $this->request->session('cart');
        $title = "";
        //If the prize is already in cart then increment quantity
        $existingCardRewardIds = [];
        if(!empty($cart)) {
            foreach($cart as $c) {
                for($i = 0; $i < $c->cart_quantity; $i++) {
                    $existingCardRewardIds[] = $c->id;
                }
            }
        }

        $counts = array_count_values($existingCardRewardIds);
        $newQuantity = $this->request->get('quantity', 1);
        if(!empty($counts[$rewardId]) && !$this->request->get('quantity')) {
            $newQuantity = $counts[$rewardId] + 1;
        }

        $cart = $this->updateCart($existingCardRewardIds, $rewardId, $newQuantity);

        if(!empty($cart)){
            foreach($cart as $c) {
                if($c->id == $rewardId) {
                    $title = $c->title;
                }
            }
        }

        $this->request->setSession('cart', $cart);
        $this->request->setFlashdata('notice', (object) [
            'type' => 'success',
            'message' => $title . ' ' . _("has been added to your cart!") . ' <a href=" ' . $this->router->baseURL('checkout/cart/review') . ' ">' . _("Click here to checkout") . '</a>'
        ]);

        $this->redirect();
    }

    public function remove($rewardId)
    {

        $cart = $this->request->session('cart');

        foreach($cart as $key => $reward) {
            if ($reward->id === $rewardId) {
                unset($cart[$key]);
            }
        }
        $this->request->setSession('cart', $cart);
        $this->request->setFlashdata('notice', (object) ['type' => 'success', 'message' => _("The reward has been removed from your cart")]);
        $this->redirect();
    }

    private function updateCart($existingCardRewardIds, $rewardId, $quantity = false)
    {

        $cartIds = $existingCardRewardIds;

        for($i = 0; $i < $quantity; $i++) {
            $cartIds[] = $rewardId;
        }

        $unique = array_unique($cartIds);

        $merchandise = new Models\Merchandise();
        $rewards = $merchandise->fetchRewards(1, 50, ['rewardIds' => $unique])->results;


        $cart = [];
        foreach($cartIds as $key => $value) {
            foreach($rewards as $reward) {
                if($reward->id == $value) {
                    $reward->cart_quantity = $quantity;
                    $cart[$reward->id] = $reward;
                    continue;
                }
            }
        }


        return $cart;
    }

    private function redirect()
    {
        $redirect = $this->request->get('r', false);

        if($redirect !== false) {
            $redirect = urldecode(base64_decode($redirect));
        } else {
            $redirect = $this->router->baseURL();
        }
        $this->router->redirect($redirect);
    }
}