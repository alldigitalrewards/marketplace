<?php 

namespace App\Models;

use Curl\Curl;
use App\Traits;

Class User extends \Zewa\Model
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

    public function updateUser($uniqueId, $data)
    {
        $sql = 'UPDATE User SET credits = ?, shipping = ? WHERE unique_id = ?';
        $arguments = [$data['credits'], $data['shipping'], $uniqueId];
        return $this->modify($sql, $arguments);
    }

    public function authenticate($email,$password) 
    {
        $sql = 'SELECT * FROM User WHERE email_address = ? AND password = ?';
        return $this->fetch($sql, [$email, sha1($password)], 'row');
    }

}