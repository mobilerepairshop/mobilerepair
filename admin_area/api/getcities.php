<?php
error_reporting(0);
if(isset($_POST))
{
    require('../includes/db.php');
    $sql = 'SELECT cname,cid FROM cities';
    $result = mysqli_query($con, $sql);

    $arr = [];
    
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
            array_push($arr,[$row['cname'],$row['cid']]);
        }
    }

    echo json_encode($arr);
}

?>