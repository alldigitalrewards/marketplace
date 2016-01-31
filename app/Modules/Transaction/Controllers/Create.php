<?php

namespace App\Modules\Transaction\Controllers;

use App\Models;
use App\Modules\Transaction\AbstractTransactionController;
use App\Traits;

Class Create extends AbstractTransactionController
{

    private $user;
    private $cart;

    public function __construct($uniqueId, array $rewards, $shipping)
    {
        parent::__construct();

        $this->user = $this->request->session('user');
        $this->cart = $this->request->session('cart');

        $transaction = ['rewards' => $rewards, 'shipping_address' => $shipping];
        $transaction = json_decode($this->rewards->createUserTransaction($uniqueId, $transaction));


        if ($transaction->success !== true) {
            $transactionModel = new Models\Transaction();
            $transactionModel->queueTransaction($uniqueId, $rewards, $shipping);
        }

        return true;

    }

}