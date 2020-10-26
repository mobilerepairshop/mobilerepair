<?php

class Services{
    private $conn;
    public function __construct($db){
        $this->conn = $db;  
    }
    public function getMobileFilter($type,$id)
    {
        
        $mc = array();
        if($id=='demo')
        {
            $query = 'select * from mobilecompany';
            $stmt = $this->conn->prepare($query);
            if($stmt->execute())
            {
                $result = $stmt->get_result();   // <--- add this instead
                $userinfo = array();
                while ($data = $result->fetch_assoc()) 
                {
                    array_push($mc,array($data["mcid"],$data["mcname"]));
                }
                return $mc;
            }
            else
            {
                return 400;
            }
        }
        else
        {
            $query = 'select * from mobilemodel where mcid=?';
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('i',$id);
            if($stmt->execute())
            {
                $result = $stmt->get_result(); 
                while ($data = $result->fetch_assoc()) 
                {
                    array_push($mc,array($data["mmid"],$data["mmname"]));
                }
                return $mc;
            }
            else
            {
                return 40020;
            }
        }
       
    }

}