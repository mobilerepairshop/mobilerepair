<?php
if(isset($_POST))
{
    require_once("../includes/db.php");

    
    for($i=0;$i<count($_POST['mmodel']);$i++)
    {
        $pin=$_POST['mmodel'][$i][0];
        $cid=$_POST['mmodel'][$i][1];
        $sql = "insert into pincode(pincode,cid) values('$pin','$cid')";
        $res = mysqli_query($con,$sql);
        if($res)
        {
            echo("success");
        }
        else
        {
            echo mysqli_error($con);
        }
    }

}

?>