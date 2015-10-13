<?php

namespace App\Modules\Account\Controllers;

use Zewa\View;
use App\Models;
use App\Traits;

Class Ajax extends \Zewa\Controller {
    
    use Traits\GenericTrait;
    use Traits\UserTrait;

    public $data;

    public function __construct() 
    {
        parent::__construct();
        $this->data = [];
        $this->user = new Models\User();
    }
    
    public function create() 
    {
        $response = $this->user->create($this->request->post());
        
        if ($response !== true) {
            
            return json_encode([
                'success' => false,
                'message' => $response->message
             ]);
            
        } else {
            
            $request = $this->request->post();
            $user = $this->user->authenticate($request['email_address'], $request['password']);
            $this->request->setSession('user', $user);
            
            return json_encode([
                'redirect' => $this->router->baseUrl('account/home')
            ]);
            
        }
    }
    
    public function update() 
    {
        $data = $this->request->post();
        
        if (!empty($data['new_password'])) {
            
            $userSession = $this->request->session('user');
            
            //Validate current password
            $correctPass = 
                $this->user->authenticate(
                    $userSession['email_address'], 
                    $data['current_password']
                );
            
            if (!$correctPass) {
                return json_encode([
                    'success' => false,
                    'message' => 'The password you provided is incorrect.'
                ]);
            }
            
            if (!$this->validateUpdatePassword($data)) {
                return json_encode([
                    'success' => false,
                    'message' => $this->fetchValidationError()
                ]);
            }
            
            $data['password'] = $data['new_password'];
            
        }
        
        $userData = $this->request->session('user');
        $update = $this->user->updateUserByUniqueId($userData['unique_id'], $data);
        
        if ($update === true) {
            
            $user = $this->request->session('user');
            $user['email_address'] = $data['email_address'];
            $this->request->setSession('user', $user);
            
            return json_encode([
                'success' => true,
                'message' => 'Your account was successfully updated'
            ]);
            
        } else {
            
            return json_encode([
                'success' => false,
                'message' => $update->message
            ]);
            
        }
    }
    
    public function authenticate() 
    {
        $user = $this->request->post();
        
        if (!$this->validateUserLogin($user)) {
            
            return json_encode([
                'success' => false,
                'message' => $this->fetchValidationError()
            ]);
            
        }
        
        if ($user = $this->user->authenticate($user['email_address'], $user['password'])) {
            
            $this->request->setSession('user', $user);
            $response = [
                'success' => true,
                'login' => true,
            ];
            
            if ($redirect = $this->request->post('redirect')) {
                $response['redirect'] = $redirect;    
            } else {
                $response['redirect'] = $this->router->baseUrl('account/home');
            }
            
            return json_encode($response);
            
        } else {
            
            return json_encode([
                'success' => false,
                'message' => 'Invalid credentials. Try again.'
            ]);
            
        }
    }
    
    public function fetchTransactions() 
    {
        $view = new View;
        $user = $this->request->session('user');
        $transactionModel = new Models\Transaction;
        $this->data['transactions'] = $transactionModel->fetchPaginated( $user['unique_id'] );

        $view->setProperty($this->data);
        $view->setLayout('vanilla');
        $view->setView('partial/transactions');
        return $view->render();
    }
    
}