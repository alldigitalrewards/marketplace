<?php
namespace App\Traits;

use App\Models;

trait CartTrait
{
    public function createUserCartIfNone() 
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
    
    public function fetchCartTotal($cart = false)
    {
        $user = $this->request->session('user');
        if( $cart === false ) {
            $cartId = $user['cart_id'];
            $cart = $this->cart->fetchById($user['unique_id'], $cartId);
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