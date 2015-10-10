<?php

namespace App\Modules\Merchandise\Controllers;

use Zewa\View;
use App\Models;

Class Product extends \Zewa\Controller {

    public $data;
    private $merch;

    public function __construct()
    {
        parent::__construct();
        $this->data = [];
        $this->merch = new Models\Merchandise();
        $this->permission = $this->request->session('user') ? 1 : 0;
        $this->data['feedUrl'] = $this->configuration->api->feed_url;
        $this->data['categories'] = $this->merch->fetchCategoriesAndProducts();
        $this->data['search'] = $this->request->get('q','');
        $this->data['isLoggedIn'] = $this->permission;
    }

    public function index()
    {
        $this->data['hotPicks'] = $this->merch->fetchHotPicks();
        $this->data['featuredProducts'] = $this->merch->fetchFeaturedProducts();
        $view = new View();
        $view->setView('home');
        $view->setLayout('marketplace');
        $view->setProperty($this->data);
        return $view->render();
    }
    
    public function result()
    {
        $view = new View();
        $this->data['categoryIds'] = (array)$this->request->get('categoryIds');
        $this->data['priceMin'] = $this->request->get('priceMin', 800);
        $this->data['priceMax'] = $this->request->get('priceMax', 90000);
        $view->setView('result');
        $view->setLayout('marketplace');
        $view->setProperty($this->data);
        return $view->render();
    }
    
    public function wishlist()
    {
        $view = new View();
        $view->setView('wishlist');
        $view->setLayout('marketplace');
        $view->setProperty($this->data);
        return $view->render();
    }
    
    public function compare()
    {
        $view = new View();
        $view->setView('compare');
        $view->setLayout('marketplace');
        $view->setProperty($this->data);
        return $view->render();
    }
    
    public function detail($productId = false)
    {
        $this->data['product'] = $this->merch->fetchProduct($productId);
        
        if (empty($this->data['product'])) {
            die('Oop! Wrong URL');
        }
        
        $this->data['product']->related = 
            $this->merch->fetchProductsByCategoryId(
                $this->data['product']->category_id
            );
        
        $view = new View();
        $view->setView('detail');
        $view->setLayout('marketplace');
        $view->setProperty($this->data);
        return $view->render();
    }

}