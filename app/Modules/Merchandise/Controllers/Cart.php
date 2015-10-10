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
        $this->permission = $this->request->session('user') ? 1 : 0;
        $this->data['feedUrl'] = \Zewa\Load::getInstance()->config('api','api')->feed_url;
        $this->data['categories'] = $this->merch->fetchCategoriesAndProducts();
        $this->data['search'] = $this->request->get('q','');
        $this->data['isLoggedIn'] = $this->permission;
    }

    public function review()
    {
        $userData = $this->request->session('user');
        
        if (empty($userData['cart_id'])) {
            $cartItemIds = [];
        } else {
            $cartModel = new Models\Cart();
            $cart = $cartModel->fetchById($userData['unique_id'], $userData['cart_id']);
            $cartItemIds = $cart['ids'];
        }
        
        $this->data['emptyCart'] = empty($cartItemIds);
        
        $view = new View();
        $view->setView('cart/review');
        $view->setLayout('marketplace');
        $view->setProperty($this->data);
        return $view->render();
    }
    
    public function shipping()
    {
        $userModel = new Models\User();
        $userData = $this->request->session('user');
        $userData = $userModel->fetchUserByUniqueId($userData['unique_id']);
        
        $this->data['user'] = $userData;
        $this->data['stateOptions'] = $this->fetchStateOptions($userData->shipping_address->state);
        
        $view = new View();
        $view->setView('cart/shipping');
        $view->setLayout('marketplace');
        $view->setProperty($this->data);
        return $view->render();
    }
    
    public function complete($productId = false)
    {
        if (empty($productId)) {
            die('Opps! Wrong page');
        }
        
        $userData = $this->request->session('user');
        $product = $this->merch->fetchProduct($userData['unique_id'], $productId);
        
        if (empty($product)) {
            die('Oop! Wrong URL');
        }
        
        $this->data['relatedProducts'] = 
            $this->merch->fetchProductsByCategoryId(
                $product->category_id
            );
        
        $view = new View();
        $view->setView('cart/complete');
        $view->setLayout('marketplace');
        $view->setProperty($this->data);
        return $view->render();
    }

}