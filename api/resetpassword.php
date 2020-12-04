<?php
if(isset($_POST))
{
    include_once "../database/connection.php";
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    if($_POST['role'] == "admin")
    {
        $update = "update admins set admin_pass='$pwd' where admin_email='$username'";  
    }
    else if($_POST['role'] == "user")
    {
        $pwd=md5($pwd);
        $update = "update users set password='$pwd' where email='$username'";  
    }
    $run= mysqli_query($con,$update);   
    if($run){
        echo("200");
    }else{
        echo("400");
    }
    

}

?>