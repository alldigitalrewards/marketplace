<?php

namespace App\Modules\Redemption\Controllers;

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
        $this->data['feedUrl'] = $this->configuration->api->feed_url;
        if (!$this->permission) {
            $this->router->redirect($this->router->baseURL('account/home'));
        }
    }
    
    public function searchProducts()
    {
        $redemption = $this->request->session('redemption');
        $redemptionCode = $redemption['code'];
        
        if (empty($redemptionCode)) {
            die('Opps! Wrong page'); 
        }
        
        $page = $this->request->get('productPage', 0);
        $offset = $this->request->get('productOffset', 30);
        
        $redemptionModel = new Models\Redemption;
        $response = $redemptionModel->fetchProductsByPin($redemptionCode, $page, $offset);

        if (! empty ( $response ) ) {
            $this->data['products'] = $response->value;
        } else {
            die('Opps! Wrong page'); 
        }
        
        $this->data['feedUrl'] = $this->configuration->api->feed_url;
        
        $view = new View();
        $view->setView('partial/products');
        $view->setLayout('vanilla');
        $view->setProperty($this->data);
        
        return $view->render();
    }
    
    public function validateCode() 
    {
        if (empty($this->request->post('code'))) {
            return json_encode([
                'success' => false,
                'message' => 'Please enter a valid redemption code'
            ]);
        }
        
        $redemptionModel = new Models\Redemption;
        $response = $redemptionModel->fetchProductsByPin($this->request->post('code'));

        if ( ! empty ($response) && isset ( $response->success ) && $response->success === false) {
            
            return json_encode([
                'success' => false,
                'message' => 'Please enter a valid redemption code'
            ]);   
            
        } else {

            $redemption = $this->request->session('redemption');
            $redemption['code'] = $this->request->post('code');
            $redemption['campaign_id'] = $response->id;
            $redemption = $this->request->setSession('redemption', $redemption);
            
            return json_encode([
                'redirect' => $this->router->baseURL('redemption/product/result')
            ]);
            
        }
    }
    
    public function redeem($productId) 
    {
        $redemption = $this->request->session('redemption');
        
        if (empty($redemption['code'])) {
            die('Opps! Wrong page');
        }
        
        $redemptionModel = new Models\Redemption;
        $response = $redemptionModel->fetchProductsByPin($redemption['code']);

        if (!empty($response)) {

            $validId = false;
            foreach($response->value as $product) {
                if ($product->id == $productId) {
                    $validId = true;
                    $redeemedProduct = $product;
                    break;
                }
            }
            
            if ($validId) {
                
                $redemption = $this->request->session('redemption');
                $redemption['redeemed_product_id'] = $productId;
                $this->request->setSession('redemption', $redemption);
                
                if ($redeemedProduct->type === 'physical') {
                     return json_encode([
                        'redirect' => $this->router->baseUrl('redemption/checkout/shipping')
                    ]);
                } else {
                    return json_encode([
                        'ajax' => $this->router->baseUrl('merchandise/transaction/create')
                    ]);  
                }
                
            }
            
        }
        
        die('Opps! Wrong page');
    }
}