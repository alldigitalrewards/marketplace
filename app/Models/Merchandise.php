<?php 

namespace App\Models;

Class Merchandise extends  Base
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function fetchReward($rewardId) {
        return json_decode($this->rewards->getReward($rewardId));
    }

//    public function fetchRewards($page = 1, $perPage = 30, $filters = [])
//    {
//        print_r($this->rewards->getRewards($page, $perPage, $filters));
//    }
//
//    public function fetchHotPicks()
//    {
//        return json_decode($this->rewards->getRewards(1, 5, ['hotpick' => true]));
//    }
//
    public function fetchCategories()
    {
        return json_decode($this->rewards->getRewardCategories());
    }

//    public function fetchCategoriesAndProducts($page = 1, $perPage = 50)
//    {
//        $categories = $this->fetchCategories();
//
//        $categoryIds = array_map(function($category) {
//            return $category->id;
//        }, $categories);
//
//        $rewards = $this->fetchRewards($page, $perPage, ['categoryIds' => $categoryIds]);
//
//        foreach($categories as $key => $category) {
//
//            foreach($rewards as $reward) {
//                if($reward->category_id !== $category->id) {
//                    continue;
//                }
//
//                $categories[$key]->rewards[] = $reward;
//            }
//
//        }
//
//        return ! empty ( $categories ) ? $categories : false;
//    }
//
    public function fetchFeaturedProducts() {
        return json_decode($this->rewards->getRewards(1, 100, ['featured' => true]));
    }
    
}