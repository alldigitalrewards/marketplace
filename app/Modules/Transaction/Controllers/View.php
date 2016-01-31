<?php

namespace App\Modules\Transaction\Controllers;

use App\Modules\Transaction\AbstractTransactionController;

Class View extends AbstractTransactionController
{
    public function __construct()
    {
        parent::__construct();
    }

    private function transactionSet()
    {
        $page = $this->request->get('transactionPage', 1);
        $offset = $this->request->get('transactionOffset', 10);

        $transactions = json_decode($this->rewards->getUserTransactions( $this->data['user']->unique_id, $page, $offset ));
        $this->data['transactions'] = $transactions->result;
        $this->data['count'] = (int) $transactions->count;
        $this->data['last'] = ($page * $offset) >= $this->data['count'];//($this->data['count'] - $offset);
        $this->data['first'] = ($page == 1);

        $view = new \Zewa\View();
        $view->setProperty($this->data);
        $view->setLayout(false);
        $view->setView('transactions');
        return $view;
    }

    private function transactionSingle($transactionId)
    {
        $this->data['transaction'] = json_decode($this->rewards->getUserTransaction( $this->data['user']->unique_id, $transactionId));

        $view = new \Zewa\View();
        $view->setProperty($this->data);
        $view->setLayout(false);
        $view->setView('transaction');

        return $view;
    }

    public function index($transactionId = false)
    {
        if($transactionId !== false) {
            $view = $this->transactionSingle($transactionId);
        } else {
            $view = $this->transactionSet();
        }
        $view->setLayout(false);
        return $view->render();

    }

}