<?php

class Pincode{
    private $conn;
    public function __construct($db){
        $this->conn = $db;  
    }
    public function getCount($pincode)
    {
            $query = 'select * from pincode where pincode="'.$pincode.'"';
            $stmt = $this->conn->prepare($query);
            if($stmt->execute())
            {
                $stmt->store_result();
                return $stmt->num_rows;
            }
            else
            {
                return 400;
            }
    }
    public function getCities()
    {
            $query = 'select * from cities';
            $stmt = $this->conn->prepare($query);
            if($stmt->execute())
            {
                $result = $stmt->get_result();   // <--- add this instead
                $cities = array();
                while ($data = $result->fetch_assoc()) 
                {
                    array_push($cities,[$data['cid'],$data['cname']]);
                }
                return $cities;
            }
            else
            {
                return 400;
            }
    }
    public function getPincode($city)
    {
        $query = 'select * from pincode where cid = ?';
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i',$city);
        if($stmt->execute())
        {
            $result = $stmt->get_result();   // <--- add this instead
            $pincodes = array();
            while ($data = $result->fetch_assoc()) 
            {
                array_push($pincodes,$data['pincode']);
            }
            return $pincodes;
        }
        else
        {
            return 400;
        }
    }
}