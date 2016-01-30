<?php

namespace App\Modules\Transaction\Controllers;

use App\Classes\AbstractController;
use App\Models;
use App\Traits;

Class View extends AbstractController
{

    use Traits\GenericTrait;
    use Traits\UserTrait;

    public function __construct()
    {
        parent::__construct();
    }

    private function transactionSet()
    {
        $page = $this->request->get('transactionPage', 1);
        $offset = $this->request->get('transactionOffset', 10);

        $transactionModel = new Models\Transaction;
        $transactions = $transactionModel->fetchPaginated( $this->data['user']->unique_id, $page, $offset );
        $this->data['transactions'] = $transactions->result;
        $this->data['count'] = (int) $transactions->count;
        $this->data['last'] = ($page * $offset) >= $this->data['count'];//($this->data['count'] - $offset);
        $this->data['first'] = ($page == 1);

        $view = new \Zewa\View();
        $view->setProperty($this->data);
        $view->setLayout('vanilla');
        $view->setView('transactions');
        return $view;
    }

    private function transactionSingle($transactionId)
    {

        $transactionModel = new Models\Transaction;
        $this->data['transaction'] = $transactionModel->fetchTransaction( $this->data['user']->unique_id, $transactionId);

        $view = new \Zewa\View();
        $view->setProperty($this->data);
        $view->setLayout('vanilla');
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
        $view->setLayout('vanilla');
        return $view->render();

    }

}