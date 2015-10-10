<?php 

namespace App\Models;

Class Cart extends \Zewa\Model
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


    public function create($uniqueId) 
    {
        return json_decode($this->rewards->createUserCart($uniqueId, []));
    }

    public function fetchById($uniqueId, $cartId)
    {

        $response = json_decode($this->rewards->getUserCart($uniqueId, $cartId));

        $rewards = [];
        if (!empty($response->products) && is_array($response->products)) {
            foreach($response->products as &$product) {
                $product->cart_quantity = count( array_keys( (array)$response->ids, $product->id ));
                $products[] = $product;
            }
        }
        
        return ['ids' => (array)$response->ids, 'products' => $rewards];
    }

    public function deleteById($uniqueId, $cartId) 
    {
        $sql = "UPDATE User SET cart_id = NULL WHERE unique_id = ?";
        $this->modify($sql,[$uniqueId]);
        return json_decode($this->rewards->deleteUserCart($uniqueId, $cartId));
    }
    
    public function updateById($uniqueId, $cartId, $rewardIds)
    {
        return json_decode($this->rewards->updateUserCart($uniqueId, $cartId, $rewardIds));
    }
    
}