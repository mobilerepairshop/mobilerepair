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
            $role = $database->sanitize($_POST['role']);

            $conn = $database->get_db();
            $auth = new UserAuth($conn);
            $result = $auth->checkValidUser($email,$pwd,$role);
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
                if($_POST['authtype']=="google")
                {
                    $auth = new UserAuth($conn);
                    $auth->email = $database->sanitize($_REQUEST['email']);
                    $auth->password = md5($database->sanitize($_REQUEST['pwd']));
                    $auth->username = $database->sanitize($_REQUEST['username']);
                    $auth->logtype = 1;
                    if($auth->registerUser()=='200')
                    {
                        if($auth->registerSession($result[1])=='200')
                        {
                            echo '200';
                        }
                    }
                    else
                    {
                        echo '400';
                    }
                }
                else
                {echo "Wrong1";
                    echo '400';
                }
                
            }

        }
        else
        {
            echo "Wrong2";
            echo '400';
        }
    }
    else
    {
        echo "52103";
    }


?>