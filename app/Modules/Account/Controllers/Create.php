<?php

namespace App\Modules\Account\Controllers;

use App\Models;

Class Create extends \Zewa\Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $user = $this->request->post();

        $mUser = new Models\User();

        $result = $mUser->create($user);
        if ($result === true) {
            $user = $mUser->authenticate($user['email_address'], $user['password']);
            $this->request->setSession('user', $user);

            $this->request->setFlashdata('notice', (object)['type' => 'success', 'message' => _('Your rewards account has been created, and you\'ve been signed in!')]);
        } else {
            $this->request->setFlashdata('notice', (object)['type' => 'warning', 'message' => $result->message]);
        }
        //false
        $this->redirect();

    }

    private function redirect()
    {
        $redirect = $this->request->get('r', false);

        if($redirect !== false) {
            $redirect = urldecode(base64_decode($redirect));
        } else {
            $redirect = $this->router->baseURL();
        }

        $this->router->redirect($redirect);
    }

}
