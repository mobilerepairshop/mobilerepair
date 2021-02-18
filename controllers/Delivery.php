<?php
    class Delivery{

    private $conn;

        public function __construct($db){
            $this->conn = $db;
        }

        
        public function pickedupfromuser($rid)
        {
            $date = date("Y-m-d");
            $query = 'update req set status = 2 , pickupdate = "'.$date.'" where rid=?';
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

            $query1 = 'update scheduled_request set delivery_status = "2" where delivery_status = "0" and rid=?';
            $stmt1 = $this->conn->prepare($query1);
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
        public function droppedtouser($rid)
        {
            $date = date("Y-m-d");
            $query = 'update req set status = 9 , dropdate="'.$date.'" where rid=?';
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('i',$rid);

            $query1 = 'update scheduled_request set delivery_status = "3" where delivery_status = "1" and rid=?';
            $stmt1 = $this->conn->prepare($query1);
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
        public function pickupcancel($rid,$status,$creason)
        {
            $query = 'update req set status = -'.$status.' , creason="'.$creason.'" where rid=?';
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
        public function dropcancel($rid,$status,$creason)
        {
            $query = 'update req set status = -'.$status.' , creason="'.$creason.'" where rid=?';
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
        public function setpaymethod($rid,$paymethod)
        {
            if($paymethod == "online")
            {
                $query = 'update req set pay_method=? , pay_status="0" where rid=?';
            }
            else if($paymethod == "cod")
            {
                $query = 'update req set pay_method=? , pay_status="0" where rid=?';
            }
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('si',$paymethod,$rid);
            if($stmt->execute())
            {
                return 200;
            }
            else
            {
                return 400;
            }
        }

        public function paid($rid)
        {
            $query = 'update req set pay_status="1" where rid=?';
            
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