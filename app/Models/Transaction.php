<?php 

namespace App\Models;

use Curl\Curl;
use App\Traits;

Class Transaction extends \Zewa\Model
{
    use Traits\RemoteTrait;
    
    public function __construct()
    {
        parent::__construct();
        $this->remoteUri = 'user';
    }
    
    public function create($userUniqueId,$data) 
    {
        $response = $this->request($data,'post','transaction/'.$userUniqueId);
        if ($this->curlError) {
            return $response;
        } else {
            return true;
        }
    }

    public function fetchPaginated($uniqueId, $page = 0, $perPage = 30) 
    {
        $page++;
        $response = $this->request([
            'page' => $page, 
            'offset' => $perPage
        ],'get',$uniqueId.'/transaction');

        if ($this->curlError) {
            return false;
        } else {
            return $response;
        }
    }
    
}