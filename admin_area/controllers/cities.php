    <?php
class Cities{
        // database connection and table name
        private $conn;
        private $table_name = "cities";

        public function __construct($db){
            $this->conn = $db;
            
        }
        function create()
        {
            //write query
            $query = 'insert into cities(cname)
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
}


  ?>