<?php
if(isset($_POST))
{
    require_once("../includes/db.php");
    $price = $_POST['price'];
    $note = $_POST['note'];
    $rid = $_POST['rid'];
    $sql ="update req set calprice='$price',note='$note' where rid=$rid";
    $res = mysqli_query($con,$sql);
    if($res)
    {
        echo "success";
    }
    else
    {
        echo mysqli_error($con);
    }
}

?>