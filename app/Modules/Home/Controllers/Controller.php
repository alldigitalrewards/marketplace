<?php

namespace App\Modules\Home\Controllers;

use App\Modules\Home\AbstractHomeController;
use App\Models;

Class Controller extends AbstractHomeController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
//        $this->data['hotpicks'] = json_decode($this->rewards->getRewards(1, 5, ['hotpick' => true]))->result;
        $this->data['featured'] = json_decode($this->rewards->getRewards(1, 5, ['featured' => true]))->result;


//        $this->data['hotPicks'] = $merchandise->fetchRewards(1, 5, ['hotpick' => true])->results;
//        $this->data['featuredProducts'] = $merchandise->fetchRewards(1, 5, ['featured' => true])->results;
        $view = new \Zewa\View();
        $view->setView('home');
        $view->setLayout('marketplace');
        $view->setProperty($this->data);
        return $view->render();
    }
}