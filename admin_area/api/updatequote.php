<?php

if(isset($_POST))
{
    require_once("../includes/db.php");
    $sql = "update requests set calprice = ".$_POST['price']." where rid = ".$_POST['rid'];
    $res = mysqli_query($con,$sql);
    if($res)
    {
        echo "200";
    }
    else
    {
        echo "400";
    }
}

?>