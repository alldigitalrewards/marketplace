<?php 

namespace App\Models;

use Curl\Curl;
use App\Traits;

Class Redemption extends \Zewa\Model
{
    use Traits\RemoteTrait;
    
    public function __construct()
    {
        parent::__construct();
        $this->remoteUri = 'redemption';
    }
    
    public function fetchProductsByPin($pin, $page = 0, $offset = 30) 
    {
        $page++;
        $response = 
            $this->request([
                'page' => $page,
                'offset' => $offset
            ],'get','getPrizesByPin/'. $pin);
        
        if ($this->curlError) {
            return false;
        }
        
        return $response;
    }
    
}