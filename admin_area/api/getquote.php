<?php

if(isset($_POST))
{
    require_once("../includes/db.php");
    $sql = "select estprice,calprice from requests where rid = ".$_POST['rid'];
    $res = mysqli_query($con,$sql);
    if($res)
    {
        $row = mysqli_fetch_assoc($res);
        if($row['calprice'] == "0")
        {
            echo json_encode(array($row['estprice']));
        }
        else
        {
            echo json_encode(array($row['calprice']));
        }
    }
    else
    {
        echo $con->error;
    }
}

?>