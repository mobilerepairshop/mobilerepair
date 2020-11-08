<?php
error_reporting(1);
if(isset($_POST))
{
    require_once("../includes/db.php");
    $rid = $_POST['rid'];
    $sql = "SELECT estprice,note FROM req WHERE rid=1";
    $res = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($res)){
    $price=$row['estprice'];
    $note=$row['note'];
    echo(json_encode(array($price,$note)));
    }
    
}
?>