<?php

namespace App\Module\Redemption\Controllers;

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
        $this->permission = $this->request->session('user') ? 1 : 0;
        $this->data['isLoggedIn'] = $this->permission;
        $this->data['feedUrl'] = \Zewa\Load::getInstance()->config('api','api')->feed_url;
    }
    
    public function searchProducts()
    {
        if (!$this->permission) {
            die('Opps! Wrong page');    
        }
        
        $redemption = $this->request->session('redemption');
        $redemptionCode = $redemption['code'];
        
        if (empty($redemptionCode)) {
            die('Opps! Wrong page'); 
        }
        
        $page = $this->request->get('productPage', 0);
        $offset = $this->request->get('productOffset', 30);
        
        $redemptionModel = new Models\Redemption;
        $response = $redemptionModel->fetchProductsByPin($redemptionCode, $page, $offset);
        
        if ($response !== false) {
            $this->data['products'] = $response->products;
        } else {
            die('Opps! Wrong page'); 
        }
        
        $this->data['feedUrl'] = \Zewa\Load::getInstance()->config('api','api')->feed_url;
        
        $view = new View();
        $view->setView('partial/products');
        $view->setLayout('vanilla');
        $view->setProperty($this->data);
        
        return $view->render();
    }
    
    public function validateCode() 
    {
        if (!$this->permission) {
            die('Opps! Wrong page');    
        }
        
        if (empty($this->request->post('code'))) {
            return json_encode([
                'success' => false,
                'message' => 'Please enter a valid redemption code'
            ]);
        }
        
        $redemptionModel = new Models\Redemption;
        $response = $redemptionModel->fetchProductsByPin($this->request->post('code'));
        
        if ($response !== false) {
            
            $redemption = $this->request->session('redemption');
            $redemption['code'] = $this->request->post('code');
            $redemption['campaign_id'] = $response->campaign_id;
            $redemption = $this->request->setSession('redemption', $redemption);
            
            return json_encode([
                'redirect' => $this->router->baseUrl('redemption/product/result')
            ]);
            
        }
        
        return json_encode([
            'success' => false,
            'message' => 'Please enter a valid redemption code'
        ]);
    }
    
    public function createTransaction()
    {
        if (!$this->permission) {
            die('Opps! Wrong page');    
        }
        
        if (!$this->validateAddress($this->request->post('shipping_address'))) {
            return json_encode([
                'success' => false,
                'message' => $this->fetchValidationError()
            ]);
        }
        
        $user = $this->request->session('user');
        $redemption = $this->request->session('redemption');
        $productId = $redemption['redeemed_product_id'];
        
        $merchandiseModel = new Models\Merchandise;
        $transactionModel = new Models\Transaction;
        
        $create = 
            $transactionModel->create($user['unique_id'], [
                'shipping_address' => $this->request->post('shipping_address'),
                'rewards' => [$productId],
                'redemption' => 1,
                'campaign_pin' => $redemption['code'],
                'campaign_id' => $redemption['campaign_id']
            ]);
                
        if ($create !== true) {
            return json_encode([
                'success' => false,
                'message' => $create->message
            ]);
        }
        
        $this->request->setSession('redemption', []);
        
        return json_encode([
            'redirect' => $this->router->baseUrl('redemption/checkout/complete/'.$productId)
        ]);   
    }
    
    public function redeem($productId) 
    {
        if (!$this->permission) {
            die('Opps! Wrong page');
        }
        
        $redemption = $this->request->session('redemption');
        
        if (empty($redemption['code'])) {
            die('Opps! Wrong page');
        }
        
        $redemptionModel = new Models\Redemption;
        $response = $redemptionModel->fetchProductsByPin($redemption['code']);
        
        if ($response !== false) {
            
            $validId = false;
            foreach($response->products as $product) {
                if ($product->id == $productId) {
                    $validId = true;
                    break;
                }
            }
            
            if ($validId) {
                
                $redemption = $this->request->session('redemption');
                $redemption['redeemed_product_id'] = $productId;
                $this->request->setSession('redemption', $redemption);
                
                return json_encode([
                    'redirect' => $this->router->baseUrl('redemption/checkout/shipping')
                ]);  
                
            }
            
        }
        
        die('Opps! Wrong page');
        
    }
    
}