<?php
if(isset($_POST))
{
    require_once("../includes/db.php");
    $boy_date = $_POST['boy_date'];
    $boy_time = $_POST['boy_time'];
    $boy_id = $_POST['boy_name'];
    $rid = $_POST['rid'];
    $status = $_POST['status'];
    if($status < 0)
    {
        $sql = "update scheduled_request set admin_id='$boy_id', date='$boy_date', time='$boy_time' where rid=$rid";
        $update_status = "update req set status=abs($status), creason='' where rid=$rid";
    }
    else
    {
        $sql = "INSERT INTO scheduled_request(rid,admin_id,date,time,delivery_status)VALUES('$rid','$boy_id','$boy_date','$boy_time','0')";
        $update_status = "update req set status = 1 where rid=$rid";
    }
    $res = mysqli_query($con,$sql);
    $res1 = mysqli_query($con,$update_status);
    if($res and $res1)
    {
        echo "success";
    }
    else
    {
        echo $con->error;
    }
}

?>