<?php

namespace App\Modules;
use App\Models\Merchandise;

abstract Class AbstractController extends \Zewa\Controller
{

    protected $data;
    protected $rewards;

    public function __construct()
    {
        parent::__construct();
        $this->data = [];
        $endpoint = $this->configuration->api->host;
        $apiUser = $this->configuration->api->alias;
        $apiKey = $this->configuration->api->key;

        $this->rewards = new \ADR\Rewards($endpoint, $apiUser, $apiKey);

        $this->logged = $this->request->session('user') ? 1 : 0;
        $this->data['feedURL'] = $this->configuration->api->feed_url;
        $this->data['categories'] = json_decode($this->rewards->getRewardCategories());
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