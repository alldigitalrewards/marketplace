<?php 

namespace App\Models;

Class Redemption extends \Zewa\Model
{
    private $rewards;

    public function __construct()
    {
        parent::__construct();

        $endpoint = 'http://local.marketplace';
        $apiUser = 'alldigitalrewards';
        $apiKey = '6e68b012d3bc897df484300926b976';

        $this->rewards = new \ADR\Rewards($endpoint, $apiUser, $apiKey);
    }

    public function fetchProductsByPin($pin)
    {
        return json_decode($this->rewards->getRedemptionCampaign($pin));
    }
    
}