<?php 
    error_reporting(0);
    require_once('../includes/db.php');
    require_once('./mobiles.php');
    require('../../database/sqlconnection.php');

    $success = $database->connect_db();
    
    if($success == "200")
    {
        $connection = $database->get_db();
        $post = new Mobiles($connection);
        for($i=0;$i<count($_POST['mmodel']);$i++)
        {
            $post->mmname = $_POST['mmodel'][$i][0];
            $post->mcid = $_POST['mmodel'][$i][1];
            if($post->createModel())
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