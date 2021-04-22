<?php
if(isset($_POST))
{
    require_once("../includes/db.php");
    $boy_date = $_POST['boy_date'];
    $boy_time = $_POST['boy_time'];
    $boy_id = $_POST['boy_name'];
    $rid = $_POST['rid'];
    $sql ="INSERT INTO scheduled_request(rid,admin_id,date,time,delivery_status)VALUES('$rid','$boy_id','$boy_date','$boy_time','1')";
    $sql1 ="update req set status='8' where rid=$rid";
    $res = mysqli_query($con,$sql);
    $res1 = mysqli_query($con,$sql1);
    if($res and $res1)
    {
        echo "success";
    }
    else
    {
        echo mysqli_error($con);
    }
}

?>