<?php

namespace App\Modules\Merchandise\Controllers;

use Zewa\View;
use App\Models;
use App\Traits;

Class Transaction extends \Zewa\Controller {
    
    use Traits\CartTrait;
    
    public function __construct() 
    {
        parent::__construct();
        $this->merch = new Models\Merchandise;
        $this->cart = new Models\Cart;
        $this->user = new Models\User;
    }
    
    public function create($ajax = false) 
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
            $remoteUser = $this->user->fetchUserByUniqueId($user['unique_id']);
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
            $this->cart->deleteById($userData['unique_id'], $userData['cart_id'], []);
            
            $url = $this->router->baseUrl('merchandise/cart/complete/' . $relatedProductId);
            
        } else {
            
            $url = $this->router->baseUrl('redemption/checkout/complete/' . $relatedProductId);

        }
        
        if ($ajax) {
                
            return json_encode([
                'success' => true,
                'redirect' => $url,
            ]);
            
        } else {
            
            $this->router->redirect($url);  
               
        }
        
    }

}