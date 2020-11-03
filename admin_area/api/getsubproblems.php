<?php

error_reporting(0);
if(isset($_POST))
{
    require('../includes/db.php');
    $sql = 'SELECT sub_problem,subproblem_code FROM subproblem_master';
    $result = mysqli_query($con, $sql);

    $arr = [];
    
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
            array_push($arr,[$row['sub_problem'],$row['subproblem_code']]);
        }
    }

    echo json_encode($arr);
}

?>