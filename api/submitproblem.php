<?php

$pincode = $_POST['pincode'];
$mcompany = $_POST['mcompany'];
$mmodel = $_POST['mmodel'];
$problems = $_POST['problems'];

require_once("../admin_area/includes/db.php");

$query = "select * from requests";
$res = mysqli_query($con,$query);
$rid = mysqli_num_rows($res) + 1;

$query = "insert into requests values(".$rid.",'".$pincode."','".$mcompany."','".$mmodel."')";
$res = mysqli_query($con,$query);
if($res)
{
    for($i=0;$i<count($problems);$i++)
    {
        $query = "insert into problems values(".$rid.",'".$problems[$i][0]."','".$problems[$i][1]."')";
        $res = mysqli_query($con,$query);
    }
    if($res)
    {
        echo "Request Sent Successfully";
    }
    else
    {
        echo "Error in Request";
    }
}


?>