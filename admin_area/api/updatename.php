<?php
if(isset($_POST))
{
    require_once("../includes/db.php");
    $boy_date = $_POST['boy_date'];
    $boy_time = $_POST['boy_time'];
    $boy_id = $_POST['boy_name'];
    $rid = $_POST['rid'];
    $sql ="update scheduled_request set admin_id='$boy_id',date='$boy_date',time='$boy_time' where rid=$rid";
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