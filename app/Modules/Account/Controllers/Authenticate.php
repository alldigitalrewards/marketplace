<?php

namespace App\Modules\Account\Controllers;

use App\Models;

Class Authenticate extends \Zewa\Controller {

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $user = $this->request->post();
        $mUser = new Models\User();

        if(empty($user)) {
            $this->logout();
        } else if($user = $mUser->authenticate($user['email_address'], $user['password'])) {
            $user->shipping = json_decode($user->shipping);
            $this->request->setSession('user', $user);
        } else {
            $this->request->setFlashdata('notice', (object)['type' => 'warning', 'message' => _('We were unable to complete your authentication process.')]);
        }

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

    private function logout()
    {
        $this->request->destroySession();
    }

}
