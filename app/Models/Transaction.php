<?php 

namespace App\Models;

use Curl\Curl;
use App\Traits;

Class Transaction extends \Zewa\Model
{
    private $rewards;

    public function __construct()
    {
        parent::__construct();

        $endpoint = 'http://google.alldigitalrewards.com';
        $apiUser = 'alldigitalrewards';
        $apiKey = '6e68b012d3bc897df484300926b976';

        $this->rewards = new \ADR\Rewards($endpoint, $apiUser, $apiKey);
    }
    
    public function create($uniqueId, $data)
    {
        return json_decode($this->rewards->createUserTransaction($uniqueId, $data));
    }

    public function fetchPaginated($uniqueId)
    {
        return json_decode($this->rewards->getUserTransactions($uniqueId));
    }
    
}