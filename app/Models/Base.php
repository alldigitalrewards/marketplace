<?php

namespace App\Models;

Class Base extends \Zewa\Model
{
    protected $rewards;

    public function __construct()
    {
        parent::__construct();

        $endpoint = 'http://local.marketplace';
        $apiUser = 'alldigitalrewards';
        $apiKey = '6e68b012d3bc897df484300926b976';

        $this->rewards = new \ADR\Rewards($endpoint, $apiUser, $apiKey);
    }

}