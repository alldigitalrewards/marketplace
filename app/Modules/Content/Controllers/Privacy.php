<?php

namespace App\Modules\Content\Controllers;

//use Zewa\View;
use App\Classes\AbstractController;
use App\Models;
use App\Modules\Content\AbstractContentController;

Class Privacy extends AbstractContentController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $view = new \Zewa\View();
        $view->setView('privacy');
        $view->setLayout('marketplace');
        $view->setProperty($this->data);

        return $view->render();
    }
}