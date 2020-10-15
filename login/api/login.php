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

            $conn = $database->get_db();
            $auth = new UserAuth($conn);
            $result = $auth->checkValidUser($email,$pwd);
            if($result[0]=='200')
            {
                // $result = $db->session->insertOne(array('uid'=>$_POST['uid'],'sid' => $session_id,'rg'=>$cursor["rg"],'dept'=>$cursor["dept"],'dsg'=>$cursor["dsg"],'mail'=>$cursor["mail"],'name'=>$cursor["name"]));
                if($auth->registerSession($result[1])=='200')
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
                echo '400';
            }

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