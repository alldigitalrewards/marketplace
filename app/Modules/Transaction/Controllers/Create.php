<?php

namespace App\Modules\Transaction\Controllers;

use App\Classes\AbstractController;
use App\Models;
use App\Modules\Checkout\Controllers\Cart;
use App\Traits;

Class Create extends AbstractController
{

    use Traits\GenericTrait;
    use Traits\UserTrait;

    public function __construct($deductCredit = true)
    {
        parent::__construct();
        $this->process($deductCredit);
    }

    private function process($deductCredit = true)
    {
        $user = $this->data['user'];
        $cart = $this->data['cart'];

        //Check credits

        $transaction = ['rewards' => []];

        foreach ($cart as $c) {
            $transaction['rewards'][] = $c->id;
        }

        $transaction['shipping_address'] = $user->shipping;
        $transactionModel = new Models\Transaction();
        $create = $transactionModel->create($user->unique_id, $transaction);

        if ($create->success !== true) {
            return false;
        }

        if($deductCredit !== false) {

            $oCart = new Cart();
            $userModel = new Models\User();
            $remainingCredit = bcsub($user->credits, $oCart->total(), 2);
            //Update user credit
            $userModel->updateUser($user->unique_id, [
                'credits' => $remainingCredit,
                'shipping' => json_encode($user->shipping)
            ]);

            $user->credits = $remainingCredit;
            $this->request->setSession('user', $user);

        }

        $this->request->setSession('cart', false);
    }

}