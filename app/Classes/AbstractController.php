<?php

namespace App\Classes;
use App\Models\Merchandise;

Class AbstractController extends \Zewa\Controller
{

    protected $data;
    protected $merchandise;

    public function __construct()
    {
        parent::__construct();
        $this->data = [];
        $this->merchandise = new Merchandise();
        $this->logged = $this->request->session('user') ? 1 : 0;
        $this->data['feedURL'] = $this->configuration->api->feed_url;
        $this->data['categories'] = $this->merchandise->fetchCategories();
        $this->data['cart'] = $this->request->session('cart');
        $this->data['user'] = $this->request->session('user');
    }

    protected function handleAuthentication()
    {
        if($this->logged === 0) {
            $this->request->setFlashdata('notice', (object) ['type' => 'warning', 'message' => _("You must be logged in to continue.")]);
            $this->router->redirect($this->router->baseURL());
        }
    }
}