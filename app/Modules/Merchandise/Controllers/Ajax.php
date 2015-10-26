<?php

namespace App\Modules\Merchandise\Controllers;

use Zewa\View;
use App\Models;
use App\Traits;

Class Ajax extends \Zewa\Controller {

    use Traits\GenericTrait;
    use Traits\UserTrait;

    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = [];
        $this->cart = new Models\Cart();
        $this->user = new Models\User();
        $this->hasPermission = $this->request->session('user');
        $this->permission = $this->request->session('user') ? 1 : 0;
        $this->data['feedUrl'] = $this->configuration->api->feed_url;
    }

    public function fetchCartReview($json = true)
    {
        if (!$this->permission) {
            $this->router->redirect($this->router->baseURL('account/home'));
        }
        
        $user = $this->request->session('user');
        $cartId = $user['cart_id'];
        $cart = $this->cart->fetchById($user['unique_id'], $cartId);
        $this->data['cartItems'] = $cart['rewards'];

        $view = new View();
        $view->setProperty($this->data);
        $view->setLayout('vanilla');
        $view->setView('cart/partial/cart-review');

        if ($json) {
            return json_encode(['cartReview' => $view->render()]);
        } else {
            return $view->render();
        }
    }

    public function fetchCartPreview($json = true)
    {
        if (!$this->permission) {
            return json_encode([
                'success' => false
            ]);
        }
        
        $user = $this->request->session('user');
        $cartId = $user['cart_id'];
        $cart = $this->cart->fetchById($user['unique_id'], $cartId);
        $remoteUser = $this->user->fetchUserByUniqueId($user['unique_id']);
        $this->data['userCredits'] = $remoteUser->credit;
        $this->data['cartItems'] = $cart['rewards'];

        $view = new View();
        $view->setProperty($this->data);
        $view->setLayout('vanilla');
        $view->setView('cart/partial/cart-preview');

        if ($json) {
            return json_encode(['cartPreview' => $view->render()]);
        } else {
            return $view->render();
        }
    }

    public function addToCart($productId)
    {
        if (!$this->permission) {
            $this->router->redirect($this->router->baseURL('account/home'));
        }
        
        //Remove redemption data from session
        $this->request->setSession('redemption', []);

        $user = $this->request->session('user');
        $cartId = $this->createUserCartIfNone();

        $cart = $this->cart->fetchById($user['unique_id'], $cartId);

        $ids = $cart['ids'];
        //If the prize is already in cart then increment quantity
        if (array_search($productId,$ids)) {
            $counts = array_count_values($ids);
            $newQuantity = $counts[$productId] + 1;
            return $this->updateProductQuantity($productId, $newQuantity);
        }

        //Add prize to cart
        $ids[] = $productId;
        $this->cart->updateById($user['unique_id'], $cartId, $ids);
        $cart = $this->cart->fetchById($user['unique_id'], $cartId);

        return json_encode([
            'success' => true,
            'message' => 'Item was added to cart!',
            'products' => json_encode($cart['rewards']),
            'cartPreview' => $this->fetchCartPreview(0)
        ]);
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

    public function searchRewards()
    {
        $merch = new Models\Merchandise();
        $page = $this->request->get('rewardPage');
        $offset = $this->request->get('rewardOffset');

        $filters = [
            'title' => $this->request->get('rewardTitle'),
            'priceMin' => $this->request->get('priceMin'),
            'priceMax' => $this->request->get('priceMax')
        ];

        $categoryIds = $this->request->get('categoryIds');
        if ($categoryIds) {
            $filters['categoryIds'] = array_values((array)$categoryIds);
        }

        $this->data['rewards'] = $merch->fetchRewards($page, $offset, $filters);
        $this->data['feedURL'] = $this->configuration->api->feed_url;
        $view = new View();
        $view->setView('partial/rewards');
        $view->setLayout('vanilla');
        $view->setProperty($this->data);

        return $view->render();
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
    
    private function fetchCartTotal($cart = false)
    {
        $user = $this->request->session('user');
        if( $cart === false ) {
            $cartId = $user['cart_id'];
            $cartModel = new Models\Cart;
            $cart = $cartModel->fetchById($user['unique_id'], $cartId);
        }
        $total = 0.00;
        
        if(!empty($cart['products'])) {
            foreach($cart['products'] as $product) {
                for($i = 0; $i < $product->cart_quantity; $i++) {
                    $total = bcadd($total, $product->credit_cost, 2);
                }
            }
        }
        
        return $total;
    }

    // public function createTransaction()
    // {
    //     if (!$this->permission) {
    //         $this->router->redirect($this->router->baseURL('account/home'));
    //     }
        
    //     $user = $this->request->session('user');
    //     $emptyCartError = json_encode([
    //         'success' => false,
    //         'message' => 'Please add items to your cart before checking out'
    //     ]);


    //     if (empty($user['cart_id'])) {
    //         return $emptyCartError;
    //     } else {

    //         $remoteUser = $this->user->fetchUserByUniqueId($user['unique_id']);
    //         $cart = $this->cart->fetchById($user['unique_id'], $user['cart_id']);
    //         $cartTotal = $this->fetchCartTotal($cart);

    //         if (bcsub($remoteUser->credit,$cartTotal,2) <= 0) {
    //             return json_encode([
    //                 'success' => false,
    //                 'message' => 'You do not have enough credit to checkout'
    //             ]);
    //         }

    //         $shippingRequired = false;
    //         foreach($cart['rewards'] as $c) {
    //             if($c->type === 'physical') {
    //                 $shippingRequired = true;
    //             }
    //         }

    //         if (!$this->request->post('on_file_address') && $shippingRequired === true) {
    //             if (!$this->validateAddress($this->request->post('shipping_address'))) {
    //                 return json_encode([
    //                     'success' => false,
    //                     'message' => $this->fetchValidationError()
    //                 ]);
    //             }
    //         }

    //         if (empty($cart['ids'])) {
    //             return $emptyCartError;
    //         }
    //     }

    //     $ids = $cart['ids'];

    //     $transactionModel = new Models\Transaction();
    //     $create = $transactionModel->create($user['unique_id'], [
    //         'shipping_address' => $this->request->post('shipping_address', false),
    //         'rewards' => $ids
    //     ]);

    //     if ($create->success !== true) {
    //         return json_encode([
    //             'success' => false,
    //             'message' => $create->message
    //         ]);
    //     }

    //     //Update user credit
    //     $this->user->updateUserByUniqueId($user['unique_id'], [
    //         'credit' => bcsub($remoteUser->credit,$cartTotal,2)
    //     ]);

    //     //We will use this to generate the "You may also like" results on the "complete" page
    //     $productId = $ids[0];

    //     //Empty out the cart
    //     $this->cart->updateById($user['unique_id'], $user['cart_id'], []);

    //     return json_encode([
    //         'success' => true,
    //         'redirect' => $this->router->baseUrl('merchandise/cart/complete/'.$productId),
    //     ]);
    // }

}