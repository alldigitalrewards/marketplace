<?php

namespace App\Modules\Transaction\Controllers;

use App\Classes\AbstractController;
use App\Models;
use App\Modules\Checkout\Controllers\Cart;
use App\Modules\Transaction\AbstractTransactionController;
use App\Traits;

Class Complete extends AbstractTransactionController
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