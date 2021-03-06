<?php
class Problems{
        // database connection and table name
        private $conn;

        public function __construct($db){
            $this->conn = $db;
            
        }
        function create()
        {
            //write query
            $query = 'insert into problem_master(main_problem)
            values(?)';

            $stmt = $this->conn->prepare($query);
            
            // submitted values
            $this->pname=htmlspecialchars(strip_tags($this->pname));

            $stmt->bind_param('s',
            $this->pname
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

        function createSubproblem()
        {
            //write query
            $query = 'insert into subproblem_master(problem_code,sub_problem)
            values(?,?)';

            $stmt = $this->conn->prepare($query);
            
            // submitted values
            $this->sub_problem=htmlspecialchars(strip_tags($this->sub_problem));
            $this->problem_code=htmlspecialchars(strip_tags($this->problem_code));


            $stmt->bind_param('is',
            $this->problem_code,
            $this->sub_problem
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

        function createAllocations()
        {
            //write query
            $query = 'insert into pricing_allocation(mmid,subproblem_code,price)
            values(?,?,?)';

            $stmt = $this->conn->prepare($query);
            
            // submitted values
            $this->mmid=htmlspecialchars(strip_tags($this->mmid));
            $this->subproblem_code=htmlspecialchars(strip_tags($this->subproblem_code));
            $this->price=htmlspecialchars(strip_tags($this->price));


            $stmt->bind_param('iis',
            $this->mmid,
            $this->subproblem_code,
            $this->price
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