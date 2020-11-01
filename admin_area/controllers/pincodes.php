<?php
class Pincode{
        // database connection and table name
        private $conn;
        private $table_name = "pincode";

        public function __construct($db){
            $this->conn = $db;
            
        }
        function createPincode()
        {
            //write query
            $query = 'insert into pincode(pincode)
            values(?)';

            $stmt = $this->conn->prepare($query);
            
            // submitted values
            $this->pincode=htmlspecialchars(strip_tags($this->pincode));

            $stmt->bind_param('s',
            $this->pincode
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