<?php

session_start();

include("includes/db.php");

?>
<!DOCTYPE HTML>
<html>

<head>

<title>Admin Login</title>

<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/login.css" >

</head>

<body>

<div class="container" ><!-- container Starts -->

<form class="form-login" action="" method="post" ><!-- form-login Starts -->

<h2 class="form-login-heading" >Admin Login</h2>

<input type="text" class="form-control" name="admin_email" placeholder="Email Address" required >

<input type="password" class="form-control" name="admin_pass" placeholder="Password" required >

<button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login" >

Log in

</button>


</form><!-- form-login Ends -->

</div><!-- container Ends -->



</body>

</html>

<?php

// if(isset($_POST['admin_login'])){

// $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);

// $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);

// $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";

// $run_admin = mysqli_query($con,$get_admin);

// $count = mysqli_num_rows($run_admin);

// if($count==1){

// $_SESSION['admin_email']=$admin_email;

// echo "<script>alert('You are Logged in into admin panel')</script>";

// echo "<script>window.open('index.php?dashboard','_self')</script>";

// }
// else {

// echo "<script>alert('Email or Password is Wrong')</script>";

// }

// }


    error_reporting(0);
    require('../database/sqlconnection.php');
    require('./controllers/UserAuth.php');

    $success = $database->connect_db();

    if($success == '200')
    {
        if(isset($_POST['admin_login'])){
      
            if (isset($_POST['admin_email'])) 
            {
                $email = $database->sanitize($_REQUEST['admin_email']);    // removes backslashes
                $pwd = $database->sanitize($_REQUEST['admin_pass']);
                $conn = $database->get_db();
                $auth = new UserAuth($conn);
                $result = $auth->checkValidUser($email,$pwd);
                
                if($result[0]=='200')
                {   
                    if($auth->registerSession($result[1])=='200')
                    {
                        echo "<script>alert('You are Logged in into admin panel')</script>";

                        echo "<script>window.open('./abc.php','_self')</script>";
                    }
                    else
                    {
                        echo "<script>alert('Email or Password is Wrong')</script>";
                    }
                }
                else
                {
                    echo "<script>alert('Email or Password is Wrong')</script>";
                }

            }
            else
            {
                echo '111111400';
            }
    }
}
    else
    {
        echo "<script>alert('Not Connected')</script>";
    }




?>