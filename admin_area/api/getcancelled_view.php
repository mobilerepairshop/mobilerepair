<?php

error_reporting(0);
if(isset($_POST))
{
    require('../includes/db.php');

 
    $get_r = "SELECT * FROM req 
          INNER JOIN problems ON problems.rid = req.rid
          INNER JOIN problem_master ON problems.problem = problem_master.problem_code
          INNER JOIN subproblem_master ON problems.subproblem = subproblem_master.subproblem_code
          where  req.status=6 or req.status<0";

$run_r = mysqli_query($con,$get_r);

$prob = [];

while($row_r=mysqli_fetch_array($run_r)){

array_push($prob,[$row_r['rid'],$row_r['main_problem'],$row_r['sub_problem']]);

}

echo json_encode($prob);

}

?>