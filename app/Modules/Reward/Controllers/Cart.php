<?php

namespace App\Modules\Merchandise\Controllers;

use Zewa\View;
use App\Models;
use App\Traits;

Class Cart extends \Zewa\Controller {
    
    use Traits\InputHelper;
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

    public function review()
    {
        $userData = $this->request->session('user');
        $cart = $this->cart->fetchById($userData['unique_id'], $userData['cart_id']);

        //Determine if shipping address is required
        $shippingRequired = false;
        foreach($cart['rewards'] as $product) {
            if($product->type === 'physical') {
                $shippingRequired = true;
            }
        }
        
        $this->data['shippingRequired'] = $shippingRequired;
        
        if (empty($userData['cart_id'])) {
            $cartItemIds = [];
        } else {
            $cartModel = new Models\Cart();
            $cart = $cartModel->fetchById($userData['unique_id'], $userData['cart_id']);
            $cartItemIds = $cart['ids'];
        }
        
        $this->data['emptyCart'] = empty($cartItemIds);

        $this->data['shipping_required'] = false;
        foreach($cart['rewards'] as $c) {
            if($c->type === 'physical') {
                $this->data['shipping_required'] = true;
            }
        }
        $view = new View();
        $view->setView('cart/review');
        $view->setLayout('marketplace');
        $view->setProperty($this->data);
        return $view->render();
    }
    
    public function shipping()
    {
        $userData = $this->request->session('user');
        $userModel = new Models\User();
        $userData = $userModel->fetchUserByUniqueId($userData['unique_id']);
        $this->data['user'] = $userData;

        if(!empty($userData->shipping_address->state)) {
            $state = $userData->shipping_address->state;
        } else {
            $state = false;
        }

        $this->data['stateOptions'] = $this->fetchStateOptions($state);

        $view = new View();
        $view->setView('cart/shipping');
        $view->setLayout('marketplace');
        $view->setProperty($this->data);
        return $view->render();
    }
    
    public function complete($productId = false)
    {
        if (empty($productId)) {
            die('Oops! Wrong page');
        }
        
        $userData = $this->request->session('user');
        $product = $this->merch->fetchReward($productId);
        
        if (empty($product)) {
            die('Oops! Wrong URL');
        }
        
        $this->data['relatedProducts'] = $this->merch->fetchRewards(1, 5, ['categoryId' => $product->category_id]);
        
        $view = new View();
        $view->setView('cart/complete');
        $view->setLayout('marketplace');
        $view->setProperty($this->data);
        return $view->render();
    }
    
    public function next()
    {
        $userData = $this->request->session('user');
        $cart = $this->cart->fetchById($userData['unique_id'], $userData['cart_id']);

        $shippingRequired = false;

        //Determine if shipping address is required
        foreach($cart['rewards'] as $product) {
            if($product->type === 'physical') {
                $shippingRequired = true;
            }
        }
        
        if ($shippingRequired) {
            return json_encode([
                'redirect' => $this->router->baseURL('merchandise/cart/shipping')
            ]);
        } else {
            return json_encode([
                'ajax' => $this->router->baseURL('merchandise/transaction/create')
            ]);
        }
        
    }
}