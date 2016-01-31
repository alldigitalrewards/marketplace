<?php

namespace App\Modules\Account\Controllers;

use App\Modules\Account\AbstractAccountController;

Class Home extends AbstractAccountController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->handleAuthentication();

        $view = new \Zewa\View();
        $view->setLayout('marketplace');
        $view->setView('dashboard');
        $view->setProperty($this->data);
        return $view->render();
    }
    
    public function login()
    {
        $view = new \Zewa\View();
        $view->setLayout('marketplace');
        $view->setView('login');
        $view->setProperty($this->data);
        return $view->render();
    }
    
    public function logout() 
    {
        $this->request->destroySession();
        $this->router->redirect('account/home/login');
    }

}
