<?php

namespace App\Modules\Checkout\Controllers;

use App\Models;
use App\Traits;

Class Cart extends \Zewa\Controller {

    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = [];
        $this->merch = new Models\Merchandise();
        $this->cart = new Models\Cart();
        $this->permission = $this->request->session('user') ? 1 : 0;
        $this->data['feedUrl'] = $this->configuration->api->feed_url;
        $this->data['categories'] = $this->merch->fetchCategoriesAndProducts();
        $this->data['search'] = $this->request->get('q','');
        $this->data['isLoggedIn'] = $this->permission;
        if (!$this->permission) {
            $this->router->redirect($this->router->baseURL('account/home'));
        }
    }

    private function createUserCartIfNone()
    {
        $cartModel = new Models\Cart;
        $userModel = new Models\User;
        $user = $this->request->session('user');

        if (empty($user['cart_id'])) {

            $response = $cartModel->create($user['unique_id']);
            $cartId = $response->cartId;
            $user['cart_id'] = $cartId;
            $this->request->setSession('user', $user);
            $userModel->updateCartId($user['id'], $cartId);

        } else {

            $cartId = $user['cart_id'];

        }

        return $cartId;
    }

    public function add($rewardId)
    {
        if (!$this->permission) {
            $this->request->set_flashdata('notice', ['type' => 'warning', 'msg' => _("The reward has been added to your cart")]);
            $this->router->redirect($this->router->currentURL());
        }

//        Remove redemption data from session
        $this->request->setSession('redemption', []);

        $user = $this->request->session('user');
        $cartId = $this->createUserCartIfNone();

        $cart = $this->cart->fetchById($user['unique_id'], $cartId);

        $ids = $cart['ids'];
        //If the prize is already in cart then increment quantity
        if (array_search($rewardId, $ids)) {
            $counts = array_count_values($ids);
            $newQuantity = $counts[$rewardId] + 1;
            return $this->updateProductQuantity($rewardId, $newQuantity);
        }

        //Add reward to cart
        $ids[] = $rewardId;
        $this->cart->updateById($user['unique_id'], $cartId, $ids);
        $this->request->set_flashdata('notice', ['type' => 'success', 'msg' => _("The reward has been added to your cart")]);
        $this->router->redirect($this->router->currentURL());
    }

    public function removeFromCart($productId)
    {
        if (!$this->permission) {
            $this->router->redirect($this->router->baseURL('account/home'));
        }

        $user = $this->request->session('user');
        $cartId = $this->createUserCartIfNone();
        $cart = $this->cart->fetchById($user['unique_id'], $cartId);
        $ids = $cart['ids'];

        foreach($ids as $key => $value) {

            if ($value === $productId) {
                unset($ids[$key]);
            }

        }

        //If the cart is empty then delete it; otherwise update it.
        if (empty($ids)) {
            $this->cart->deleteById($user['unique_id'], $cartId);
            $user['cart_id'] = false;
            $this->request->setSession('user', $user);
        } else {
            $this->cart->updateById($user['unique_id'], $cartId, array_values($ids));
        }

        return json_encode([
            'success' => true,
            'message' => 'Item was removed from your cart',
            'cartPreview' => $this->fetchCartPreview(0),
            'cartReview' => $this->fetchCartReview(0)
        ]);
    }

    public function updateProductQuantity($productId, $quantity = false)
    {
        if (!$this->permission) {
            $this->router->redirect($this->router->baseURL('account/home'));
        }

        $quantity = $this->request->post('quantity', $quantity);

        if ($quantity === false) {
            return json_encode([
                'success' => false,
                'message' => 'Item quantity is required'
            ]);
        }

        $user = $this->request->session('user');
        $cartId = $this->createUserCartIfNone();
        $cart = $this->cart->fetchById($user['unique_id'], $cartId);
        $ids = $cart['ids'];

        //Remove all instances of this product's ID from the product IDs array
        foreach($ids as $key => $value) {
            if ($value === $productId) {
                unset($ids[$key]);
            }
        }

        //Add a fixed amount of this ID back into the IDs array
        for($i = 0; $i < $quantity; $i++) {
            $ids[] = $productId;
        }

        $this->cart->updateById($user['unique_id'],$cartId,array_values($ids));

        return json_encode([
            'success' => true,
            'message' => 'Item quantity was updated',
            'cartPreview' => $this->fetchCartPreview(0),
            'cartReview' => $this->fetchCartReview(0)
        ]);
    }
}