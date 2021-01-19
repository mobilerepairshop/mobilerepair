<?php

error_reporting(0);
if(isset($_POST))
{
        
    require('../includes/db.php');

    $imei = $_POST['imei'];
    $sql = "SELECT * FROM req where  imeino='$imei'";
    $run_admin = mysqli_query($con,$sql);

    if(mysqli_num_rows($run_admin) > 0)
    {
        echo "200";
    }
    else
    {
        echo "400";
    }

}

?>