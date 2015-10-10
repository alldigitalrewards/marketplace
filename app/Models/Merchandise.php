<?php 

namespace App\Models;

use Curl\Curl;
use App\Traits;

Class Merchandise extends \Zewa\Model
{
    use Traits\RemoteTrait;
    
    public function __construct()
    {
        parent::__construct();
        $this->remoteUri = 'reward';
    }
    
    public function fetchProduct($productId) {
        if (!$productId) {
            return false;
        }
        return $this->request([],'get','index/'.$productId);
    }

    public function fetchProducts($page = 0, $perPage = 5, $filters = []) 
    {
        $page++;
        $filters['page'] = $page;
        $filters['offset'] = $perPage;
        return $this->request($filters,'get','index');
    }

    public function fetchHotPicks($page = 0, $perPage = 5) 
    {
        return $this->request([
            'page' => $page, 
            'offset' => $perPage, 
            'hotpick' => 1
        ],'get','index');
    }
    
    public function fetchCategories($page = 0, $perPage = 6) 
    {
        return $this->request([
            'page' => $page, 
            'offset' => $perPage,
        ],'get','category');
    }
    
    public function fetchProductsByCategoryId($categoryId, $page = 0, $perPage = 50) 
    {
        $page++;
        return $this->request([
            'page' => $page, 
            'offset' => $perPage,
            'categoryId' => $categoryId
        ],'get','index');
    }
    
    public function fetchCategoriesAndProducts($page = 0, $perPage = 50) 
    {
        $categoires = $this->fetchCategories();
        
        if (!empty($categoires)) {
            
            foreach($categoires as $key => $category) {
                
                if ($category->active == 'no') {
                    unset($categoires[$key]);
                    continue;
                }
                
                $categoires[$key]->products = 
                    $this->fetchProductsByCategoryId(
                        $category->id,
                        $page,
                        $perPage
                    );
                
            }
            
        }
        
        return !empty($categoires) ? $categoires : false;
    }
    
    public function fetchFeaturedProducts($page = 0, $perPage = 50) {
        return $this->request([
            'page' => $page, 
            'offset' => $perPage,
            'featured' => true
        ],'get','index');
    }
    
}