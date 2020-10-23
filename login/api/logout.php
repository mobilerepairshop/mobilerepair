<?php 
        require('../../controllers/Database.php');
        require('../../controllers/UserAuth.php');
        
        
        $success = $database->connect_db();
        if($success == "200")
        {
            $conn = $database->get_db();
            $auth = new UserAuth($conn);
            if($auth->logout()=='200')
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