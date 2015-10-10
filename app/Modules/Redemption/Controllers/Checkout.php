<?php

namespace App\Modules\Redemption\Controllers;

use Zewa\View;
use App\Models;
use App\Traits;

Class Checkout extends \Zewa\Controller {
    
    use Traits\InputHelper;
    public $data;

    public function __construct()
    {
        parent::__construct();
        $this->data = [];
        $this->data['feedUrl'] = \Zewa\Load::getInstance()->config('api','api')->feed_url;
        $this->permission = $this->request->session('user') ? 1 : 0;
        $this->data['isLoggedIn'] = $this->permission;
    }
    
    public function shipping()
    {
        if (!$this->permission) {
            die('Opps! Wrong page');    
        }
        
        $userModel = new Models\User();
        $userData = $this->request->session('user');
        $userData = $userModel->fetchUserByUniqueId($userData['unique_id']);
        
        $this->data['user'] = $userData;
        $this->data['stateOptions'] = $this->fetchStateOptions($userData->shipping_address->state);
        
        $view = new View();
        $view->setView('checkout/shipping');
        $view->setLayout('redemption');
        $view->setProperty($this->data);
        return $view->render();
    }
    
    public function complete($productId)
    {
        if (!$this->permission) {
            die('Opps! Wrong page');    
        }
        
        $merch = new Models\Merchandise();
        $this->data['product'] = $merch->fetchProduct($productId);
        
        if (empty($this->data['product'])) {
            die('Oop! Wrong URL');
        }
        
        $userModel = new Models\User();
        $userData = $this->request->session('user');
        $userData = $userModel->fetchUserByUniqueId($userData['unique_id']);
        
        $this->data['user'] = $userData;
        $this->data['stateOptions'] = $this->fetchStateOptions($userData->shipping_address->state);
        
        $view = new View();
        $view->setView('checkout/complete');
        $view->setLayout('redemption');
        $view->setProperty($this->data);
        return $view->render();
    }

}