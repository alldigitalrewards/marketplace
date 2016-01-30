<?php 

namespace App\Models;

use Curl\Curl;
use App\Traits;

Class User extends Base
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function create($user)
    {
        
        //The user's shared ID between servers
        $uniqueId = hexdec(substr(sha1($user['email_address']), 0, 15));
        
        //Create user on remote server
        $aUser = [
            'unique_id' => $uniqueId,
            'firstname' => $user['firstname'],
            'lastname' => $user['lastname'],
            'email_address' => $user['email_address'],
            'password' => $user['password'],
            'role' => USER_ID
        ];
        $result = json_decode($this->rewards->createUser($aUser));

        if ($result->success === false) {
            return $result;
        }
        unset($aUser['role']);
        
        //Create user locally
        $sql = 'INSERT INTO User (unique_id, firstname, lastname, email_address, password, credits) VALUES (?,?,?,?,?,?)';

        $aUser['password'] = sha1($aUser['password']);
        
        $arguments = [$aUser['unique_id'], $aUser['firstname'], $aUser['lastname'], $aUser['email_address'], $aUser['password'], 25000];

        $this->modify($sql, $arguments);
        $userId = $this->dbh->lastInsertId();
        
        return true;
    }
    
    public function authenticate($email,$password) 
    {
        $sql = 'SELECT * FROM User WHERE email_address = ? AND password = ?';
        return $this->fetch($sql, [$email, sha1($password)], 'row');
    }
    
    public function fetchUserByUniqueId($uniqueId)
    {
        return json_decode($this->rewards->getUser($uniqueId));
    }

    public function updateUser($uniqueId, $data)
    {
        $sql = 'UPDATE User SET credits = ?, shipping = ? WHERE unique_id = ?';
        $arguments = [$data['credits'], $data['shipping'], $uniqueId];
//        print_r($sql);
//        var_dump($arguments);
//        die();
        return $this->modify($sql, $arguments);
    }
//updateUser
    public function updateUserByUniqueId($uniqueId, $data) 
    {
        if (!empty($data['firstname']) && !empty($data['lastname']) && !empty($data['email_address'])) {
            
            //Create user locally
            $sql = 'UPDATE User SET email_address = ?, firstname = ?, lastname = ?';
            $arguments = [
                $data['email_address'],
                $data['firstname'],
                $data['lastname']
            ];
            
            if (!empty($data['password'])) {
                $sql .= ', password = ?';
                $arguments[] = 
                    password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 11]);
            }
            
            $arguments[] = $uniqueId;
            $sql .= ' WHERE unique_id = ?';
    
            $this->modify($sql, $arguments);
               
        }
        
        //Update user on remote server
        $result = json_decode($this->rewards->updateUser($uniqueId, $data));

        return $result->success;
    }

    public function updateCartId($userId,$cartId)
    {
        $sql = 'UPDATE User SET cart_id = ? WHERE id = ?';
        return $this->modify($sql, [$cartId,$userId]);
    }
}