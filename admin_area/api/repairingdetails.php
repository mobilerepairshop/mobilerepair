<?php
if(isset($_POST))
{
    require_once("../includes/db.php");
    $repairperson = $_POST['repairperson'];
    $imeino = $_POST['imeino'];
    $rid = $_POST['rid'];
    $sql ="update req set repairperson='$repairperson' , imeino='$imeino' where rid=$rid";
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