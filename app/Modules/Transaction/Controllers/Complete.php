<?php

namespace App\Modules\Transaction\Controllers;

use App\Classes\AbstractController;
use App\Models;
use App\Modules\Checkout\Controllers\Cart;
use App\Traits;

Class Complete extends AbstractController
{

    use Traits\GenericTrait;
    use Traits\UserTrait;

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $view = new \Zewa\View;
        $view->setProperty($this->data);
        $view->setLayout('marketplace');
        $view->setView('complete');
        return $view->render();
    }

}