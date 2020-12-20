<?php

error_reporting(0);
if(isset($_POST))
{
    require('../includes/db.php');


$pincodes = [];
$get_enquiries = "select * from pincode inner join cities on pincode.cid=cities.cid";
$run_admin = mysqli_query($con,$get_enquiries);
$ctr=1;
while($row_admin = mysqli_fetch_array($run_admin)){
    array_push($pincodes,[$ctr,$row_admin['pid'],$row_admin['pincode'],$row_admin['cname']]);
$ctr++;
}



echo json_encode($pincodes);

}

?>