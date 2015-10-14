<?php

namespace App\Models;

Class Base extends \Zewa\Model
{
    protected $rewards;

    public function __construct()
    {
        parent::__construct();

        $endpoint = $this->configuration->api->host;
        $apiUser = $this->configuration->api->alias;
        $apiKey = $this->configuration->api->key;

        $this->rewards = new \ADR\Rewards($endpoint, $apiUser, $apiKey);
    }

}