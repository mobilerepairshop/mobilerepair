<?php

error_reporting(0);
if(isset($_POST))
{
    require('../includes/db.php');


$cancelled = [];
$get_enquiries = "SELECT * FROM req 
                  INNER JOIN mobilemodel ON mobilemodel.mmid = req.mmid 
                  INNER JOIN mobilecompany ON mobilecompany.mcid = mobilemodel.mcid 
                  INNER JOIN users ON users.uid = req.uid 
                  where  req.status=6";
$run_admin = mysqli_query($con,$get_enquiries);

while($row_admin = mysqli_fetch_array($run_admin)){
    array_push($cancelled,["MR".sprintf("%05d", $rid),$row_admin['username'],$row_admin['mcname'],$row_admin['mmname'],$row_admin['calprice'],$row_admin['phonenum'],$row_admin['pincode'],$row_admin['main_problem'],$row_admin['sub_problem'],$row_admin['address'],$row_admin['rid']]);
}



echo json_encode($cancelled);

}

?>