<?php

require_once("../includes/db.php");
$rid = $_POST['rid'];
$status = $_POST['status'];
$get_enquiries = "SELECT * FROM verificationqa where rid = ".$rid." and status= ".$status;

$arr = [];
$run_admin = mysqli_query($con,$get_enquiries);
while($row_admin = mysqli_fetch_array($run_admin)){
   array_push($arr,[$row_admin['q1'],$row_admin['q2a'],$row_admin['q2b'],$row_admin['q2c'],$row_admin['q2d'],$row_admin['q2e'],$row_admin['q2f'],$row_admin['q2g'],$row_admin['q2h'],$row_admin['q2i'],$row_admin['q2j'],$row_admin['q2k'],$row_admin['q2l'],$row_admin['q2m'],$row_admin['q2n'],$row_admin['q3'],$row_admin['q4']]);
}
echo json_encode($arr);

?>