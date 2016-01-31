<?php 

namespace App\Models;

use Curl\Curl;
use App\Traits;

Class Transaction extends \Zewa\Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function queueTransaction($uniqueId, $rewards, $shipping)
    {
        $sql = 'INSERT INTO Transaction (unique_id, rewards, shipping) VALUES (?, ?, ?)';
        $arguments = [$uniqueId, json_encode($rewards), json_encode($shipping)];
        return $this->modify($sql, $arguments);
    }

//    public function fetchTransaction($uniqueId, $transactionId)
//    {
//        $transactions = json_decode($this->rewards->getUserTransaction($uniqueId, $transactionId));
//        return $transactions;
//    }
//
//    public function fetchPaginated($uniqueId, $page, $offset)
//    {
//        return json_decode($this->rewards->getUserTransactions($uniqueId, $page, $offset));
//    }
    
}