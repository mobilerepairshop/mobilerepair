<?php 

    require('../../controllers/Database.php');
    require('../../controllers/UserAuth.php');

    
    $success = $database->connect_db();
    if($success == "200")
    {
            $conn = $database->get_db();
            $auth = new UserAuth($conn);
            $auth->email = $database->sanitize($_REQUEST['email']);
            $auth->password = md5($database->sanitize($_REQUEST['pwd']));
            $auth->username = $database->sanitize($_REQUEST['username']);
            $auth->logtype = 0;
            if($auth->registerUser()=='200')
            {
                echo '200';
            }
            else
            {
                echo '400';
            }
    }
    else
    {

    }




?>