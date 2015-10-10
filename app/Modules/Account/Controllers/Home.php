<?php

namespace App\Modules\Account\Controllers;

use Zewa\View;
use App\Models;
use App\Traits;

Class Home extends \Zewa\Controller {
    
    use Traits\InputHelper;
    
    public $data;
    
    public function __construct()
    {
        parent::__construct();
        $this->data = [];
        $this->merch = new Models\Merchandise();
        $this->permission = $this->request->session('user') ? 1 : 0;
        $this->data['feedUrl'] = $this->configuration->api->feed_url;
        $this->data['categories'] = $this->merch->fetchCategoriesAndProducts();
        $this->data['search'] = $this->request->get('q','');
        $this->data['isLoggedIn'] = $this->permission;
    }

    public function index()
    {
        if (!$this->permission) {
            return $this->login();
        }
        
        $transactionModel = new Models\Transaction;
        $userModel = new Models\User;
        $userData = $this->request->session('user');
        $userData = $userModel->fetchUserByUniqueId($userData['unique_id']);
        $this->data['user'] = $userData;
        $this->data['stateOptions'] = $this->fetchStateOptions($userData->state);
        $this->data['noTransactions'] = empty($transactionModel->fetchPaginated($userData->unique_id));
        
        $view = new View();
        $view->setLayout('marketplace');
        $view->setView('overview');
        $view->setProperty($this->data);
        return $view->render();
    }
    
    public function login()
    {
        $view = new View();
        $view->setLayout('marketplace');
        $view->setView('login');
        $view->setProperty($this->data);
        return $view->render();
    }
    
    public function logout() 
    {
        if (!$this->permission) {
            die('Oops! Wrong page');
        }
        
        $this->request->destroySession();
        $this->router->redirect('account/home/login');
    }

}
