<?php
if(isset($_POST))
{
    include_once "../database/connection.php";
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $pwd=md5($pwd);
    $update = "update users set password='$pwd' where email='$username'";  
    $run= mysqli_query($con,$update);   
    if($run){
        echo("200");
    }else{
        echo("400");
    }
    

}

?>