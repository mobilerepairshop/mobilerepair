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
        for($i=0;$i<count($_POST['subproblems']);$i++)
        {
            $post->problem_code = $_POST['subproblems'][$i][1];
            $post->sub_problem = $_POST['subproblems'][$i][0];
            if($post->createSubproblem())
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