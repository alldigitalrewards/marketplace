<?php

namespace App\Modules\Account\Controllers;

use Zewa\View;
use App\Models;
use App\Traits;

Class Authenticate extends \Zewa\Controller {

//    use Traits\InputHelper;
    use Traits\UserTrait;
    use Traits\GenericTrait;

    private $user;
    private $permission;

    public function __construct()
    {
        parent::__construct();
        $this->user = new Models\User();
    }

    public function index()
    {
        $user = $this->request->post();

        if(empty($user)) {
            $this->logout();
        } else if($user = $this->user->authenticate($user['email_address'], $user['password'])) {
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
