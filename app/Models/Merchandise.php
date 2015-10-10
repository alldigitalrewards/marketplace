<?php 

namespace App\Models;

Class Merchandise extends \Zewa\Model
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
    
    public function fetchReward($rewardId) {
        return json_decode($this->rewards->getReward($rewardId));
    }

    public function fetchRewards($page = 1, $perPage = 30, $filters = [])
    {
        return json_decode($this->rewards->getRewards($page, $perPage, $filters));
    }

    public function fetchHotPicks()
    {
        return json_decode($this->rewards->getRewards(1, 100, ['hotpick' => true]));
    }
    
    public function fetchCategories()
    {
        return json_decode($this->rewards->getRewardCategories());
    }
//
//    public function fetchProductsByCategoryId($categoryId, $page = 1, $perPage = 50)
//    {
//        $page++;
//        return $this->request([
//            'page' => $page,
//            'offset' => $perPage,
//            'categoryId' => $categoryId
//        ],'get','index');
//    }
    
    public function fetchCategoriesAndProducts($page = 1, $perPage = 50)
    {
        $categories = $this->fetchCategories();

        if (!empty($categories)) {
            
            foreach($categories as $key => $category) {
                
                if ($category->active == 'no') {
                    unset($categories[$key]);
                    continue;
                }

                $categories[$key]->products = $this->fetchRewards($page, $perPage, ['categoryId' => $category->id]);
                
            }
            
        }
        
        return ! empty ( $categories ) ? $categories : false;
    }
    
    public function fetchFeaturedProducts() {
        return json_decode($this->rewards->getRewards(1, 100, ['featured' => true]));
    }
    
}