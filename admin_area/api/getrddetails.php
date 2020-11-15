<?php
// error_reporting(0);
if(isset($_POST))
{
    require_once("../includes/db.php");
    $rid = $_POST['rid'];
    $sql = "SELECT repairperson,imeino FROM req WHERE rid=$rid";
    $res = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($res)){
    $repairperson=$row['repairperson'];
    $imeino=$row['imeino'];
    echo(json_encode(array($imeino,$repairperson)));
    }
    
}
?>