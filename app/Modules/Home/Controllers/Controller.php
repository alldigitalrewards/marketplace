<?php

namespace App\Modules\Home\Controllers;

use Zewa\View;
use App\Models;

Class Controller extends \Zewa\Controller {

    public $data;
    private $merch;

    public function __construct()
    {
        parent::__construct();
        $this->data = [];
        $this->merch = new Models\Merchandise();
        $this->permission = $this->request->session('user') ? 1 : 0;
        $this->data['feedURL'] = $this->configuration->api->feed_url;
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
}