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
        $response = $this->request([],'get', $uniqueId.'/cart/'.$cartId);
        $products = [];
        if (!empty($response->products) && is_array($response->products)) {
            foreach($response->products as &$product) {
                $product->cart_quantity = count( array_keys( (array)$response->ids, $product->id ));
                $products[] = $product;
            }
        }
        
        return ['ids' => (array)$response->ids, 'products' => $products];
    }

    public function deleteById($uniqueId, $cartId) 
    {
        $sql = "UPDATE User SET cart_id = NULL WHERE unique_id = ?";
        $this->modify($sql,[$uniqueId]);
        return $this->request([],'delete', $uniqueId.'/cart/'.$cartId);
    }
    
    public function updateById($uniqueId, $cartId, $productIds) 
    {
        return $this->request([
            'rewards' => array_values($productIds)
            ],'put', $uniqueId.'/cart/'.$cartId
        );
    }
    
}