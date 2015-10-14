<?php 

namespace App\Models;

Class Redemption extends Base
{
    public function __construct()
    {
        parent::__construct();
    }

    public function fetchProductsByPin($pin)
    {
        return json_decode($this->rewards->getRedemptionCampaign($pin));
    }
    
}