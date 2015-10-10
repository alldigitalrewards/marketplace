<?php 

namespace App\Models;

use Curl\Curl;
use App\Traits;

Class User extends \Zewa\Model
{
    use Traits\RemoteTrait;
    
    public function __construct()
    {
        parent::__construct();
        $this->remoteUri = 'user';
    }
    
    public function create($data,$role = false) 
    {
        if (!$role) {
            $role = USER_ID;
        }
        
        //The user's mutual ID between servers
        $uniqueId = hexdec(substr(sha1($data['email_address']), 0, 15));
        
        //Create user on remote server
        $response = $this->request([
            'unique_id' => $uniqueId,
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email_address' => $data['email_address'],
            'password' => $data['password'],
            'credit' => 25000,
            'role' => $role
        ],'post');
        
        if (!$response->success) {
            return $response;
        }
        
        //Create user locally
        $sql = 'INSERT INTO User (unique_id,firstname,lastname,email_address,password) '
             . 'VALUES (?,?,?,?,?)';
        
        $data['password'] = 
            password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => 11]);
        
        $arguments = [];
        $arguments[] = $uniqueId;
        $arguments[] = $data['firstname'];
        $arguments[] = $data['lastname'];
        $arguments[] = $data['email_address'];
        $arguments[] = $data['password'];
        
        $this->modify($sql,$arguments);
        $userId = $this->dbh->lastInsertId();
        
        return true;
    }
    
    public function authenticate($email,$password) 
    {    
        $sql = 'SELECT * FROM User WHERE email_address = ? LIMIT 1';
        $query = $this->dbh->prepare($sql);
        $query->execute([$email]);
        $user = $query->fetch();
        
        if (empty($user)) {
            return false;
        }
        
        if(!password_verify($password,$user['password'])) {
            return false;
        }
        
        return $user;
    }
    
    public function fetchUserByUniqueId($uniqueId)
    {
        return $this->request([],'get','index/'.$uniqueId);//Cache user data
    }
    
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
        $response = $this->request($data,'put','index/'.$uniqueId);
        
        if ($this->curlError) {
            return $response;
        } else {
            return true;
        }
    }
    
    public function updateCartId($userId,$cartId) 
    {
        $sql = 'UPDATE User SET cart_id = ? WHERE id = ?';
        return $this->modify($sql, [$cartId,$userId]);
    }
}