<?php 
    error_reporting(0);
    require_once('../includes/db.php');
    require_once('../controllers/problems.php');
    require('../../database/sqlconnection.php');

    $success = $database->connect_db();
    
    if($success == "200")
    {
        $connection = $database->get_db();
        $post = new Problems($connection);
        for($i=0;$i<count($_POST['pname']);$i++)
        {
            $post->pname = $_POST['pname'][$i];
            if($post->create())
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