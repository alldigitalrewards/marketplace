<?php 

namespace App\Models;

use Curl\Curl;
use App\Traits;

Class Transaction extends Base
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function create($uniqueId, $data)
    {
//        print_r($this->rewards->createUserTransaction($uniqueId, $data));
        return json_decode($this->rewards->createUserTransaction($uniqueId, $data));
    }

    public function fetchTransaction($uniqueId, $transactionId)
    {
        $transactions = json_decode($this->rewards->getUserTransaction($uniqueId, $transactionId));
//        print_r($this->rewards->getUserTransaction($uniqueId, $transactionId));die();
        return $transactions;
    }

    public function fetchPaginated($uniqueId, $page, $offset)
    {
//        print_r($this->rewards->getUserTransactions($uniqueId, $page, $offset));
        return json_decode($this->rewards->getUserTransactions($uniqueId, $page, $offset));
//        die();
    }
    
}