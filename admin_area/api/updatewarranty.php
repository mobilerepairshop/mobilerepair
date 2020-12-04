<?php
if(isset($_POST))
{
    require_once("../includes/db.php");
    $wardate = $_POST['date'];
    $rid = $_POST['rid'];

    $sql1 ="update req set warranty='$wardate' where rid=$rid";
    $res1 = mysqli_query($con,$sql1);
    if($res1)
    {
        echo "success";
    }
    else
    {
        echo mysqli_error($con);
    }
}

?>