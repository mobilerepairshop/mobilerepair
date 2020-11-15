<?php
    class Delivery{

    private $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        
        public function pickedupfromuser($rid)
        {
            $query = 'update req set status = 2 where rid=?';
            $query1 = 'update scheduled_request set delivery_status = 2 where rid=?';
            $stmt = $this->conn->prepare($query);
            $stmt1 = $this->conn->prepare($query);
            $stmt->bind_param('i',$rid);
            $stmt1->bind_param('i',$rid);
            if($stmt->execute() and $stmt1->execute())
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
            $query1 = 'update scheduled_request set delivery_status = 3 where rid=?';
            $stmt = $this->conn->prepare($query);
            $stmt1 = $this->conn->prepare($query);
            $stmt->bind_param('i',$rid);
            $stmt1->bind_param('i',$rid);
            if($stmt->execute() and $stmt1->execute())
            {
                return 200;
            }
            else
            {
                return 400;
            }
        }
        public function pickupcancel($rid)
        {
            $query = 'update req set status = 6 where rid=?';
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