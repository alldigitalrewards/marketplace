<?php

namespace App\Modules\Redemption\Controllers;

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
        $this->data['feedUrl'] = \Zewa\Load::getInstance()->config('api','api')->feed_url;
        $this->permission = $this->request->session('user') ? 1 : 0;
        $this->data['isLoggedIn'] = $this->permission;
    }

    public function index()
    {
        if (!$this->permission) {
            $view = new View();
            $view->setView('login');
            $view->setLayout('redemption');
            $view->setProperty($this->data);
            return $view->render();   
        }
        
        $this->data['hotPicks'] = $this->merch->fetchHotPicks();
        $view = new View();
        $view->setView('home');
        $view->setLayout('redemption');
        $view->setProperty($this->data);
        return $view->render();
    }
    
    public function result()
    {
        if (!$this->permission) {
            die('Opps! Wrong page');    
        }
        
        $redemption = $this->request->session('redemption');
        if (empty($redemption['code'])) {
            $this->router->redirect('redemption/product');
        }
        
        $view = new View();
        $this->data['categoryIds'] = (array)$this->request->get('categoryIds');
        $this->data['priceMin'] = $this->request->get('priceMin', 800);
        $this->data['priceMax'] = $this->request->get('priceMax', 90000);
        $view->setView('result');
        $view->setLayout('redemption');
        $view->setProperty($this->data);
        return $view->render();
    }
    
    public function detail($productId = false)
    {
        if (!$this->permission) {
            die('Opps! Wrong page');    
        }
        
        $redemption = $this->request->session('redemption');
        if (empty($redemption['code'])) {
            $this->router->redirect('redemption/product');
        }
        
        $this->data['product'] = $this->merch->fetchProduct($productId);
        
        if (empty($this->data['product'])) {
            die('Oop! Wrong URL');
        }
        
        $view = new View();
        $view->setView('detail');
        $view->setLayout('redemption');
        $view->setProperty($this->data);
        return $view->render();
    }
}