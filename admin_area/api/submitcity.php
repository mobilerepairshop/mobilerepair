<?php
if(isset($_POST))
{
    require_once("../includes/db.php");

    for($i=0;$i<count($_POST['cname']);$i++)
    {
        $cname=$_POST['cname'];
        $city= $cname[$i];
        $sql ="INSERT INTO cities(cname)VALUES('$city')";
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