<?php

namespace App\Traits;

use Curl\Curl;

trait RemoteTrait {
    
    public $remoteUri = '';
    public $curlError = false;
    
    private function request(array $data, $method, $uri = false) 
    {
        $api = \Zewa\Load::getInstance()->config('api','api');
        $host = $api->host . $this->remoteUri;
        $curl = new Curl();
        $curl->setBasicAuthentication(
            $api->alias,
            $api->key
        );
        $response = $curl->{$method}(
            $host . '/' . $uri ?: '',
            $data
        );
        $this->curlError = $curl->error;
        $curl->close();
        return $response;
    }
    
}