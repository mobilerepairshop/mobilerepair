<?php 
    // error_reporting(0);
    require_once('../includes/db.php');
    require_once('./pincodes.php');
    require('../../database/sqlconnection.php');

    $success = $database->connect_db();
    
    if($success == "200")
    {
        $connection = $database->get_db();
        $post = new Pincode($connection);
        for($i=0;$i<count($_POST['pincodes']);$i++)
        {
            $post->pincode = $_POST['pincodes'][$i];
            if($post->createPincode())
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