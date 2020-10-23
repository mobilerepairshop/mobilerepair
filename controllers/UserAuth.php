<?php

class UserAuth{
    private $conn;
    public $username;
    public $email;
    public $password;  
    public $create_datetime;  

    public function __construct($db){
        $this->conn = $db;  
    }
    public function validateSession($sid)
    {
        $query = 'select uid from session where sesid=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s',$sid);
        if($stmt->execute())
        {
            $stmt->store_result();
            $no = ($stmt->num_rows);
            $stmt->bind_result($userid); 
            if($no==0)
            {
               
                    return array('400',99);;
            }
            else
            {
                while ($stmt->fetch()) {
                    return array('200',$userid);
                }
               
            }  
        }
        else
        {
            return '400';
        }
    }
    public function registerUser()
    {
        $this->create_datetime = date('Y-m-d h:i:sa');
        $query = 'insert into users(email,password,create_datetime,username)values(?,?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssss',
            $this->email,
            $this->password,
            $this->create_datetime,
            $this->username
           );
           if($stmt->execute())
           {
               return '200';
           }
           else
           {
               return '400';
           }
    }
    public function checkValidUser($email,$pwd)
    {
        $query = 'select uid from users where email=? and password=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss',$email,md5($pwd));
        if($stmt->execute())
        {
            $stmt->store_result();
            $stmt->bind_result($userid); 
            if(($stmt->num_rows)==0)
            {
                return array('400',99);
            }
            else
            {
                while ($stmt->fetch()) 
                {  
                    return array('200',$userid); 
                }
            }
            
            
        }
        else
        {
            return '400';
            // return $this->conn->error;
        }
        // $session_id = md5(uniqid(mt_rand(), true));
    }
    public function registerSession($uid)
    {
        $sess_id = md5(uniqid(mt_rand(), true));
        $query = 'insert into session(uid,sesid)
            values(?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('is',
            $uid,
            $sess_id
         );
         if($stmt->execute())
         {
            setcookie('sid', $sess_id , time()+60*60*7 , '/');
            return '200';
         }
         else
         {
             return '400';
         }
            
    }
    public function logout()
    {
        $query = 'delete from session where sesid=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s',
            $_COOKIE['sid']
         );
         if($stmt->execute())
         {
            setcookie("sid",$_COOKIE['sid'] , time()-3600 , '/');
            return '200';
         }
         else
         {
             return '400';
         }
        
    }
    public function getinfo_from_user($uid)
    {
        $query = 'select username from users where uid=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i',$uid);
        if($stmt->execute())
        {
            $result = $stmt->get_result();   // <--- add this instead
            $userinfo = array();
            while ($data = $result->fetch_assoc()) 
            {
                $username = $data["username"];
            }
            return $username;
        }
        else
        {
            return 400;
        }
        
        // Get name and mobile number to display for first message
       
        
    }
}
	