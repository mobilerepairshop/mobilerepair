<?php 
    // error_reporting(0);
    require_once('../includes/db.php');
    require_once('../controllers/mobiles.php');
    require('../../database/sqlconnection.php');

    $success = $database->connect_db();
    
    if($success == "200")
    {
        $connection = $database->get_db();
        $post = new Mobiles($connection);
        for($i=0;$i<count($_POST['locations']);$i++)
        {
            $post->ccity = $_POST['locations'][$i][0];
            $post->caddress = $_POST['locations'][$i][1];
            $post->cadmin = $_POST['locations'][$i][2];
            $post->cnumber = $_POST['locations'][$i][3];
            $post->cemail = $_POST['locations'][$i][4];
            if($post->createLocation())
            {
                echo "200";
            }
            // if unable to create the product, tell the user
            else
            {
                echo "404";
            }
        }
    }
   
    
?>