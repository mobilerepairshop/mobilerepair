<?php 

if(isset($_POST))
{
    require_once("../db.php");

    $rid = $_POST['rid'];

    $sql = 'select * from verificationqa where rid='.$rid;
    $res = mysqli_query($con,$sql);
    if(mysqli_num_rows($res) > 0)
    {
        echo "200";
    }
    else
    {
        echo "400";
    }

}

?>