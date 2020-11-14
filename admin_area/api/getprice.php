<?php
error_reporting(1);
if(isset($_POST))
{
    require_once("../includes/db.php");
    $rid = $_POST['rid'];
    $sql = "SELECT estprice,calprice,note FROM req WHERE rid=$rid";
    $res = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($res)){
    $estprice=$row['estprice'];
    $calprice=$row['calprice'];
    $note=$row['note'];
    echo(json_encode(array($estprice,$calprice,$note)));
    }
    
}
?>