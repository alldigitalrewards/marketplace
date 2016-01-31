<?php

namespace App\Modules\Content\Controllers;

use App\Modules\Content\AbstractContentController;

Class Contact extends AbstractContentController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($complete = false)
    {
        $view = new \Zewa\View();
        $view->setView('contact');
        $view->setLayout('marketplace');

        $this->data['complete'] = $complete;
        $view->setProperty($this->data);

        return $view->render();
    }
}