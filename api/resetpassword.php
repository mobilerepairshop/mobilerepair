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
        $sql = "SELECT logtype from users where email='$username' ";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              if($row['logtype']==1)
              {
                  echo("google");
                  exit();
              }
            }
          } 
          else {
            echo("nouser");
            exit();
          }
        $pwd=md5($pwd);
        $update = "update users set password='$pwd' where email='$username' and logtype=0";  
    }
    $run= mysqli_query($con,$update);   
    if(mysqli_affected_rows($con) >0)
    {
        echo("200");
    }
    else
    {
        echo("400");
    }
    
    

}

?>