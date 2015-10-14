<?php 

namespace App\Models;

Class Cart extends Base
{
    public function __construct()
    {
        parent::__construct();
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
            foreach($response->products as $key => $product) {
                $response->products[$key]->cart_quantity = count( array_keys( (array)$response->ids, $product->id ));
                $rewards[] = $response->products[$key];
            }
        }

        return ['ids' => ( ! empty($response->ids) ? (array)$response->ids : [] ), 'rewards' => $rewards];
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