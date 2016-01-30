<?php

namespace App\Modules\Home\Controllers;

use App\Classes\AbstractController;
use Zewa\View;
use App\Models;

Class Controller extends AbstractController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $merchandise = new Models\Merchandise();

        $this->data['hotPicks'] = $merchandise->fetchRewards(1, 5, ['hotpick' => true])->results;
        $this->data['featuredProducts'] = $merchandise->fetchRewards(1, 5, ['featured' => true])->results;
        $view = new View();
        $view->setView('home');
        $view->setLayout('marketplace');
        $view->setProperty($this->data);
        return $view->render();
    }
}