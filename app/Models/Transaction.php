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
        return json_decode($this->rewards->createUserTransaction($uniqueId, $data));
    }

    public function fetchPaginated($uniqueId)
    {
        $transactions = json_decode($this->rewards->getUserTransactions($uniqueId));

        if( isset ( $transactions->success ) && $transactions->success === false ) {
            return false;
        } else {
            return $transactions;
        }

    }
    
}