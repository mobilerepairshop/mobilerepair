<?php

error_reporting(0);
if(isset($_POST))
{
    require('../includes/db.php');


$customers = [];
$get_enquiries = "select * from users";
$run_admin = mysqli_query($con,$get_enquiries);
$i=1;
while($row_admin = mysqli_fetch_array($run_admin)){


    array_push($customers,[$i,$row_admin['username'],$row_admin['email'],$row_admin['create_datetime'],$row_admin['address'],$row_admin['phonenum']]);
    $i++;
}

echo json_encode($customers);

}

?>