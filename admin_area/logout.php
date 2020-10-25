<?php

require('../database/sqlconnection.php');
        require('./controllers/UserAuth.php');
        
        
        $success = $database->connect_db();
        if($success == "200")
        {
            $conn = $database->get_db();
            $auth = new UserAuth($conn);
            if($auth->logout()=='200')
            {
                echo "<script>window.open('login.php','_self')</script>";
            }
            else
            {
                echo "<script>alert('Unable to Logout')</script>";
            }
        }

?>