<?php 
    error_reporting(0);
    require('../../controllers/Database.php');
    require('../../controllers/UserAuth.php');

    $success = $database->connect_db();
    if($success == '200')
    {
        if (isset($_POST['email'])) 
        {
            $email = $database->sanitize($_REQUEST['email']);    // removes backslashes
            $pwd = $database->sanitize($_REQUEST['pwd']);
            $username = $database->sanitize($_REQUEST['username']);

            $conn = $database->get_db();
            $auth = new UserAuth($conn);
            $result = $auth->checkValidUser($email,$pwd,"google");
        }
    }


?>