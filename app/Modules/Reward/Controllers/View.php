<?php

namespace App\Modules\Reward\Controllers;

//use Zewa\View;
use App\Models;

Class View extends \Zewa\Controller {

    public $data;
    private $merch;

    public function __construct()
    {
        parent::__construct();
        $this->data = [];
        $this->merchandise = new Models\Merchandise();
        $this->permission = $this->request->session('user') ? 1 : 0;
        $this->data['feedURL'] = $this->configuration->api->feed_url;
    }

    public function index($rewardId = false)
    {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strcasecmp('XMLHttpRequest', $_SERVER['HTTP_X_REQUESTED_WITH']) === 0){
            $view = $this->paginateRewards();
            return $view->render();
        }

        if($rewardId !== false) {
            $view = $this->rewardSingle($rewardId);
        } else {
            $view = $this->rewardSet();
        }

        $view->setLayout('marketplace');
        return $view->render();
    }

    private function paginateRewards()
    {
        $merchandise = new Models\Merchandise();
        $page = $this->request->get('rewardPage');
        $offset = $this->request->get('rewardOffset');

        $filters = [
            'title' => $this->request->get('title'),
            'priceMin' => $this->request->get('minPrice'),
            'priceMax' => $this->request->get('maxPrice')
        ];

        $categoryIds = $this->request->get('categoryIds');
        if ($categoryIds) {
            $filters['categoryIds'] = array_values((array)$categoryIds);
        }

        $this->data['rewards'] = $merchandise->fetchRewards($page, $offset, $filters);
        $this->data['count'] = (int) $this->data['rewards']->count;
        $this->data['last'] = ($page * $offset) >= $this->data['count'];//($this->data['count'] - $offset);
        $this->data['first'] = ($page == 1);

        unset($this->data['rewards']->count);
        $this->data['feedURL'] = $this->configuration->api->feed_url;
        $view = new \Zewa\View();
        $view->setView('reward-set');
        $view->setLayout(false);
        $view->setProperty($this->data);

        return $view;
    }

    private function rewardSet()
    {
        $view = new \Zewa\View();
        $this->data['categories'] = $this->merchandise->fetchCategories();
        $this->data['search'] = $this->request->get('title','');
        $this->data['categoryIds'] = (array)$this->request->get('categoryIds');
        $this->data['minPrice'] = $this->request->get('minPrice', false);
        $this->data['maxPrice'] = $this->request->get('maxPrice', false);
        $view->setView('rewards');
        $view->setProperty($this->data);

        return $view;
    }

    private function rewardSingle($rewardId)
    {
        $this->data['reward'] = $this->merchandise->fetchReward($rewardId);
        if (empty($this->data['reward'])) {
            return false;
        }

//        $this->data['product']->related = $this->merch->fetchRewards(1, 5, ['categoryId' => $this->data['product']->category_id]);

        $view = new \Zewa\View();
        $view->setView('reward');
        $view->setProperty($this->data);

        return $view;
    }

}