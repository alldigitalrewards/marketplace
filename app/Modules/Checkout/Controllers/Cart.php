<?php

namespace App\Modules\Checkout\Controllers;

use App\Classes\AbstractController;
use App\Models;
use App\Modules\Checkout\AbstractCheckoutController;
use App\Modules\Transaction\Controllers\Create;
use App\Traits;

Class Cart extends AbstractCheckoutController
{

    use Traits\UserTrait;

    private $cart;
    private $user;
    private $error;
    private $paymentType; //point or card

    public function __construct()
    {
        parent::__construct();
        $this->cart = $this->request->session('cart');

    }

    private function processQuantities()
    {
        $quantityAdjustment = $this->request->post("quantity");
        foreach($this->cart as $key => $c) {
            foreach($quantityAdjustment as $reward => $quantity) {
                if($c->id == $reward) {
                    $this->cart[$key]->cart_quantity = $quantity;
                    continue;
                }
            }
        }

        $this->request->setSession('cart', $this->cart);

        if( $this->request->post("updateQauntities")) {
            $this->request->setFlashdata('notice', (object) ['type' => 'success', 'message' => _("Your reward quantities have been updated")]);
            $this->router->redirect($this->router->currentURL());
        }

    }

    private function processCheckoutPayment()
    {
        $total = $this->total();
        $token  = $this->request->post('stripeToken', false);

        if ($token !== false) {
            $this->paymentType = 'card';
            $customer = \Stripe\Customer::create(array(
                'email' => $this->user->email, //'customer@example.com',
                'card' => $token
            ));

            $charge = \Stripe\Charge::create(array(
                'customer' => $customer->id,
                'amount' => bcmul(($total / 1000), 100),
                'currency' => 'usd'
            ));

            if (!is_null($charge->failure_code)) {
                $this->error = _("There was an error processing your card. Please try again.");
            }
        } else {
            $this->paymentType = 'point';
            //deduct credits here
            if (bcsub($this->user->credits, $total, 2) < 0) {
                $this->error = _("You lack the credits to continue");
            } else {
                $remainingCredit = bcsub($this->user->credits, $total, 2);
                $this->user->credits = $remainingCredit;
                $this->request->setSession('user', $this->user);
            }
        }

    }

    private function processCheckoutTerms()
    {

        $this->user->approvedShipping = $this->request->post('shipping', false);
        $this->user->approvedTerms = $this->request->post('terms', false);

        if ($this->user->approvedShipping !== 'on') {
            $this->error = _("Please click the checkbox to confirm your shipping address");
        }

        if ($this->user->approvedTerms !== 'on') {
            $this->error = _("Please click the checkbox to confirm you agree to redeem");
        }
    }

    private function processShipping()
    {
        $this->user->shipping = (object) $this->request->post('shipping_address');
        $this->request->setSession('user', $this->user);
        if (!$this->validateAddress($this->request->post('shipping_address'))) {
            $this->error = _("Please provide a valid shipping address");
        }
    }

    private function processCart()
    {
        if($this->error === false) {

            unset($this->user->approvedTerms, $this->user->approvedShipping);

            $this->request->setSession('cart', false);
            $this->request->setSession('user', $this->user);

            $rewards = $this->getCartRewardIds();

            new \App\Modules\Transaction\Controllers\Create($this->user->unique_id, $rewards, $this->user->shipping);

            $mUser = new Models\User();
            $mUser->updateUser($this->user->unique_id, [
                'credits' => $this->user->credits,
                'shipping' => json_encode($this->user->shipping)
            ]);

            return true;

        }

    }

    private function processCartCheckout()
    {
        $this->error = false;

        //We process shipping before quantities, because when we update
        //quantities, it'll redirect them back to view their totals with updated quantities..
        $this->processShipping();
        $this->processQuantities();
        $this->processCheckoutTerms();
        $this->processCheckoutPayment();

        //if any of the other process methods, other then "updateQuantities" failed, they
        //will set error, which will reflect here.
        if($this->processCart()) {
            $this->router->redirect($this->router->baseURL('transaction/complete'));
        }

        $this->request->setFlashdata('notice', (object) ['type' => 'warning', 'message' => $this->error]);
        $this->router->redirect($this->router->currentURL());
    }

    public function review()
    {
        if(!$this->logged) {
            $this->request->setFlashdata('notice', (object) [
                'type' => 'warning',
                'message' => _("You must be logged in to checkout") . ' <a data-target="#loginModal" data-toggle="modal" href="javascript:void(0)">' . _("Click here to login") . '</a>'
            ]);
            $this->router->redirect($this->router->baseURL('?r=' . base64_encode(urlencode($this->router->uri))));
        }

        $this->user = $this->request->session('user');;

        $stripe = $this->configuration->stripe;
        \Stripe\Stripe::setApiKey($stripe->secret_key);

        if($this->request->post()) {

            $this->processCartCheckout();

        }

        $this->data['shipping'] = $this->user->shipping;

        $view = new \Zewa\View();
        $view->setProperty($this->data);
        $view->setLayout('marketplace');
        $view->setModule('checkout');
        $view->setView('review');
        return $view->render();
    }

    public function total()
    {
        $total = 0.00;
        if(!empty($this->cart)) {
            foreach($this->cart as $reward) {
                for($i = 0; $i < $reward->cart_quantity; $i++) {
                    $total = bcadd($total, $reward->credit_cost, 2);
                }
            }
        }

        return $total;
    }

    private function getCartRewardIds()
    {
        $rewardIdContainer = [];
        if(!empty($this->cart)) {
            foreach($this->cart as $c) {
                for($i = 0; $i < $c->cart_quantity; $i++) {
                    $rewardIdContainer[] = $c->id;
                }
            }
        }

        return $rewardIdContainer;
    }

    private function getCartRewardTitleById($rewardId)
    {
        $title = "";
        if(!empty($this->cart)){
            foreach($this->cart as $c) {
                if($c->id == $rewardId) {
                    $title = $c->title;
                }
            }
        }
        return $title;
    }

    public function add($rewardId)
    {
        $title = "";
        //If the prize is already in cart then increment quantity
        $existingCardRewardIds = $this->getCartRewardIds();

        $quantityCounts = array_count_values($existingCardRewardIds);
        $newQuantity = $this->request->get('quantity', 1);
        if(!empty($quantityCounts[$rewardId]) && !$this->request->get('quantity')) {
            $newQuantity = $quantityCounts[$rewardId] + 1;
        }

        $this->updateCart($existingCardRewardIds, $rewardId, $newQuantity);
        $title = $this->getCartRewardTitleById($rewardId);

        $this->request->setSession('cart', $this->cart);
        $this->request->setFlashdata('notice', (object) [
            'type' => 'success',
            'message' => $title . ' ' . _("has been added to your cart!") . ' <a href=" ' . $this->router->baseURL('checkout/cart/review') . ' ">' . _("Click here to checkout") . '</a>'
        ]);

        $this->redirect();
    }

    public function remove($rewardId)
    {
        $title = "";
        foreach($this->cart as $key => $reward) {
            if ($reward->id === $rewardId) {
                $title = $reward->title;
                unset($this->cart[$key]);
            }
        }
        $this->request->setSession('cart', $this->cart);
        $this->request->setFlashdata('notice', (object) ['type' => 'success', 'message' => $title . ' ' . _("has been removed from your cart")]);
        $this->redirect();
    }

    private function updateCart($existingCardRewardIds, $rewardId, $quantity = false)
    {
        $cartIds = $existingCardRewardIds;

        for($i = 0; $i < $quantity; $i++) {
            $cartIds[] = $rewardId;
        }

        $unique = array_unique($cartIds);

        $rewards = json_decode($this->rewards->getRewards(1, 100, ['rewardIds' => $unique]))->result;

        $this->cart = [];

        foreach($cartIds as $key => $value) {
            foreach($rewards as $reward) {
                if($reward->id == $value) {
                    $reward->cart_quantity = $quantity;
                    $this->cart[$reward->id] = $reward;
                    continue;
                }
            }
        }

        return $this->cart;
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