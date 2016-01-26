<?php

namespace App\Modules\Merchandise\Controllers;

use Zewa\View;
use App\Models;
use App\Traits;

Class Transaction extends \Zewa\Controller {
    
    use Traits\GenericTrait;
    use Traits\UserTrait;
    
    public function __construct() 
    {
        parent::__construct();
        $this->merch = new Models\Merchandise;
        $this->cart = new Models\Cart;
        $this->user = new Models\User;
        $this->permission = $this->request->session('user') ? 1 : 0;
        if (!$this->permission) {
            $this->router->redirect($this->router->baseURL('account/home'));
        }
    }
    
    public function create()
    {
        $redemption = $this->request->session('redemption');
        $userData = $this->request->session('user');
        $shippingRequired = false;

        if (empty($redemption)) {
            
            if (empty($userData['cart_id'])) {
                
                return json_encode([
                    'success' => false,
                    'message' => 'Please add items to your cart before checking out'
                ]);
                
            }
            
            //Check credits
            $remoteUser = $this->user->fetchUserByUniqueId($userData['unique_id']);
            $cart = $this->cart->fetchById($userData['unique_id'], $userData['cart_id']);
            $cartTotal = $this->fetchCartTotal($cart);

            if (bcsub($remoteUser->credit,$cartTotal,2) <= 0) {
                return json_encode([
                    'success' => false,
                    'message' => 'You do not have enough credit to checkout'
                ]);
            }
            
            //Determine if shipping address is required
            foreach($cart['rewards'] as $product) {
                if($product->type === 'physical') {
                    $shippingRequired = true;
                }
            }
            
            $transaction = [
                'rewards' => $cart['ids']
            ];
            
            $relatedProductId = $cart['ids'][0];
            
        } else {
            $relatedProductId = $redemption['redeemed_product_id'];

            $product = $this->merch->fetchReward($redemption['redeemed_product_id']);
            
            if($product->type === 'physical') {
                $shippingRequired = true;
            }
            
            $transaction = [
                'rewards' => [$redemption['redeemed_product_id']],
                'redemption' => 1,
                'campaign_pin' => $redemption['code'],
                'campaign_id' => $redemption['campaign_id']
            ];

            $this->request->setSession('redemption', []);
            
        }
            
        if ($shippingRequired === true) {
            
            if (!$this->validateAddress($this->request->post('shipping_address'))) {
                return json_encode([
                    'success' => false,
                    'message' => $this->fetchValidationError()
                ]);
            }
            
            $transaction['shipping_address'] = $this->request->post('shipping_address', false);
            
        }
        
        $transactionModel = new Models\Transaction();
        $create = $transactionModel->create($userData['unique_id'], $transaction);

        if ($create->success !== true) {
            
            return json_encode([
                'success' => false,
                'message' => $create->message
            ]);
            
        }
        
        if (empty($redemption)) {
            
            //Update user credit
            $this->user->updateUserByUniqueId($userData['unique_id'], [
                'credit' => bcsub($remoteUser->credit,$cartTotal,2)
            ]);
            
            //Delete the cart
            //@TODO: we don't need to delete the cart here, what we want to do is phase the cart to a completed status
            //for analytic tracking
            $user = $this->request->session('user');
            unset($user['cart_id']);
            $this->request->setSession('user', $user);
            $this->cart->deleteById($userData['unique_id'], $userData['cart_id']);
            
            $url = $this->router->baseUrl('merchandise/cart/complete/' . $relatedProductId);
            
        } else {
            
            $url = $this->router->baseUrl('redemption/checkout/complete/' . $relatedProductId);

        }
        
        return json_encode([
            'success' => true,
            'redirect' => $url,
        ]);
        
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
    
}