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
}