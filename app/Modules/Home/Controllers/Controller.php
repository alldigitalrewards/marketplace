<?php

namespace App\Modules\Home\Controllers;

use App\Modules\Home\AbstractHomeController;

Class Controller extends AbstractHomeController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['featured'] = json_decode($this->rewards->getRewards(1, 5, ['featured' => true]))->result;

        $view = new \Zewa\View();
        $view->setView('home');
        $view->setLayout('marketplace');
        $view->setProperty($this->data);
        return $view->render();
    }
}