<?php
    class Delivery{

    private $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        
        public function pickedupfromuser($rid)
        {
            $query = 'update req set status = 2 where rid=?';
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('i',$rid);
            if($stmt->execute())
            {
                return 200;
            }
            else
            {
                return 400;
            }
        }
        public function droppedtoadmin($rid)
        {
            $query = 'update req set status = 3 where rid=?';
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('i',$rid);
            if($stmt->execute())
            {
                return 200;
            }
            else
            {
                return 400;
            }
        }
        public function droppedtouser($rid)
        {
            $query = 'update req set status = 9 where rid=?';
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('i',$rid);
            if($stmt->execute())
            {
                return 200;
            }
            else
            {
                return 400;
            }
        }
    }
?>