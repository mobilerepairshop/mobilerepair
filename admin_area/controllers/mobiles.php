<?php
class Mobiles{
        // database connection and table name
        private $conn;
        private $table_name = "mobilecompany";

        public function __construct($db){
            $this->conn = $db;
            
        }
        function create()
        {
            //write query
            $query = 'insert into mobilecompany(mcname)
            values(?)';

            $stmt = $this->conn->prepare($query);
            
            // submitted values
            $this->cname=htmlspecialchars(strip_tags($this->cname));

            $stmt->bind_param('s',
            $this->cname
           );
        
            if($stmt->execute())
            {
                return true;
            }
            else
            {
                return $this->conn->error;
            }

        }

        function createModel()
        {
            //write query
            $query = 'insert into mobilemodel(mmname,mcid)
            values(?,?)';

            $stmt = $this->conn->prepare($query);
            
            // submitted values
            $this->mmname=htmlspecialchars(strip_tags($this->mmname));
            $this->mcid=htmlspecialchars(strip_tags($this->mcid));


            $stmt->bind_param('si',
            $this->mmname,
            $this->mcid
           );
        
            if($stmt->execute())
            {
                return true;
            }
            else
            {
                return $this->conn->error;
            }

        }

        function createLocation()
        {
            //write query
            $query = 'insert into contactlocations(ccity,cadmin,cnumber,cemail,caddress)
            values(?,?,?,?,?)';

            $stmt = $this->conn->prepare($query);
            
            // submitted values
            $this->ccity=htmlspecialchars(strip_tags($this->ccity));
            $this->caddress=htmlspecialchars(strip_tags($this->caddress));
            $this->cadmin=htmlspecialchars(strip_tags($this->cadmin));
            $this->cnumber=htmlspecialchars(strip_tags($this->cnumber));
            $this->cemail=htmlspecialchars(strip_tags($this->cemail));


            $stmt->bind_param('sssss',
            $this->ccity,
            $this->cadmin,
            $this->cnumber,
            $this->cemail,
            $this->caddress
           );
        
            if($stmt->execute())
            {
                return true;
            }
            else
            {
                return $this->conn->error;
            }

        }
}


  ?>