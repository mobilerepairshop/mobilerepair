<?php

class UserAuth{
    private $conn;
    public $username;
    public $email;
    public $password;  
    public $create_datetime;  
    public $logtype=0;
    public function __construct($db){
        $this->conn = $db;  
    }
    public function validateSession($sid)
    {
        $query = 'select uid from session where sesid=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s',$sid);        if($stmt->execute())
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
        $this->pincode = "";
        $this->phonenum = "";
        $this->address = "";
        $query = 'insert into users(email,password,create_datetime,username,pincode,phonenum,address,logtype)values(?,?,?,?,?,?,?,?)';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('ssssssss',
            $this->email,
            $this->password,
            $this->create_datetime,
            $this->username,
            $this->pincode,
            $this->phonenum,
            $this->address,
            $this->logtype
           );
           if($stmt->execute())
           {
               return '200';
           }
           else
           {
               return mysqli_error($this->conn);
           }
    }
    public function checkValidUser($email,$pwd,$role)
    {
        if($role == "user")
        {
            $query = 'select uid from users where email=? and password=?';
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('ss',$email,md5($pwd));
            setcookie('role', 'user' , time()+(10 * 365 * 24 * 60 * 60) , '/');
        }
        else if($role == "admin")
        {
            $query = 'select admin_id from admins where admin_email=? and admin_pass=?';
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('ss',$email,$pwd);
            setcookie('role', 'admin' , time()+60*60*7 , '/');
        }
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
            setcookie('sid', $sess_id , time()+(10 * 365 * 24 * 60 * 60) , '/');
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
            setcookie("role",'user' , time()-3600 , '/');
            setcookie("role",'admin' , time()-3600 , '/');
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
    public function getcontactinfo($sid)
    {
        $query = 'select users.phonenum,users.address from users
                    inner join session on session.uid = users.uid
                    where sesid=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s',$sid);
        if($stmt->execute())
        {
            $result = $stmt->get_result();   // <--- add this instead
            $userinfo = array();
            while ($data = $result->fetch_assoc()) 
            {
                array_push($userinfo,$data["phonenum"],$data["address"]);
            }
            return $userinfo;
        }
        else
        {
            return 400;
        }
        
    }
    public function getaboutus()
    {
        $query = 'select * from contactlocations';
        $stmt = $this->conn->prepare($query);
        if($stmt->execute())
        {
            $result = $stmt->get_result();   // <--- add this instead
            $userinfo = array();
            while ($data = $result->fetch_assoc()) 
            {
                array_push($userinfo,[$data["cadmin"],$data["ccity"],$data["caddress"],$data["cnumber"],$data["cemail"]]);
            }
            return $userinfo;
        }
        else
        {
            return 400;
        }
        
    }

    public function checkusername($userid)
    {
        $query = 'select uid from users where email=?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s',$userid);
        if($stmt->execute())
        {
            $stmt->store_result();
            if($stmt->num_rows == 0)
            {
                return "200";
            }
            else
            {
                return "400";
            }  
        }
        else
        {
            return '400';
        }
    }

    public function getprofiledata($uid)
    {
        $query = 'select uid,email,username,phonenum,address from users where uid = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i',$uid);
        if($stmt->execute())
        {
            $result = $stmt->get_result();   // <--- add this instead
            $userinfo = array();
            while ($data = $result->fetch_assoc()) 
            {
                array_push($userinfo,["fullname"=>$data["username"],"address"=>$data["address"],"contact"=>$data["phonenum"],"loginid"=>$data["email"],"uid"=>$data["uid"]]);
            }
            return $userinfo;
        }
        else
        {
            return 400;
        }
        
    }

    public function updateprofiledata($uid,$address,$contact,$name)
        {
            $query = 'update users set username=?, phonenum=?, address=? where uid=?';
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('sssi',$name,$contact,$address,$uid);
            if($stmt->execute())
            {
                return "200";
            }
            else
            {
                return "400";
            }
        }

}
	