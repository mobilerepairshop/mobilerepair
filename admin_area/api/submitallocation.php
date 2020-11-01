<?php 
    // error_reporting(0);
    require_once('../includes/db.php');
    require_once('../controllers/problems.php');
    require('../../database/sqlconnection.php');

    $success = $database->connect_db();
    
    if($success == "200")
    {
        $connection = $database->get_db();
        $post = new Problems($connection);
        for($i=0;$i<count($_POST['allocations']);$i++)
        {
            $post->mmid = $_POST['allocations'][$i][0];
            $post->subproblem_code = $_POST['allocations'][$i][1];
            $post->price = $_POST['allocations'][$i][2];

            if($post->createAllocations())
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