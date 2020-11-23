<?php

class UserAuth{
    private $conn;
    public $username;
    public $email;
    public $password;  
    public $location; 
    public $phonenum;  
    public $create_datetime;  

    public function __construct($db){
        $this->conn = $db;  
    }
    public function validateSession($sid)
    {
        $query = 'select uid from session_admin where sesid=?';
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
        $this->create_datetime = date('Y-m-d');
        $query = 'insert into users(username,password,email,create_datetime,userphoto,location,phonenum)values(?,?,?,?,?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssssssi',
            $this->username,
            $this->password,
            $this->email,
            $this->create_datetime,
            $this->userphoto,
            $this->location,
            $this->phonenum
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
        $query = 'select admin_id from admins where admin_email=? and admin_pass=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ss',$email,$pwd);
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
                while ($stmt->fetch()) {
                   
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
        $query = 'insert into session_admin(uid,sesid)
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
            return $this->conn->error;

            //  return '400';
         }
            
    }
    public function logout()
    {
        $query = 'delete from session_admin where sesid=?';
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
}
	