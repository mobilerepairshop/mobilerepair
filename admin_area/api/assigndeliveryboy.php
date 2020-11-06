<?php
if(isset($_POST))
{
    require_once("../includes/db.php");
    $boy_date = $_POST['boy_date'];
    $boy_time = $_POST['boy_time'];
    $boy_name = $_POST['boy_name'];
    $rid = $_POST['rid'];
    $sql = "INSERT INTO scheduled_request(rid,admin_name,date,time)VALUES('$rid','$boy_name','$boy_date','$boy_time')";
    $update_status = "update requests set status = 2 where rid=$rid";
    $res = mysqli_query($con,$sql);
    $res1 = mysqli_query($con,$update_status);
    if($res and $res1)
    {
        echo "success";
    }
    else
    {
        echo "fail";
    }
}

?>