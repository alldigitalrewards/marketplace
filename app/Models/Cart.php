<?php 

namespace App\Models;

use App\Traits;

Class Cart extends \Zewa\Model
{
    use Traits\RemoteTrait;
    
    public function __construct()
    {
        parent::__construct();
        $this->remoteUri = 'user';
    }
    
    public function create($uniqueId) 
    {
        return $this->request([
            'rewards' => []
            ],'post', $uniqueId.'/cart'
        );
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