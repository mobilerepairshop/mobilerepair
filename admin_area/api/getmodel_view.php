<?php

error_reporting(0);
if(isset($_POST))
{
    require('../includes/db.php');
    $sql = "select * from mobilemodel inner join mobilecompany on mobilemodel.mcid=mobilecompany.mcid";

    $result = mysqli_query($con, $sql);

    $arr = [];
    
    if (mysqli_num_rows($result) > 0) 
    {$ctr=1;
        while($row = mysqli_fetch_assoc($result)) 
        {
            array_push($arr,[$ctr,$row['mmid'],$row['mmname'],$row['mcname']]);
            $ctr++;
        }
    }

    echo json_encode($arr);
}

?>