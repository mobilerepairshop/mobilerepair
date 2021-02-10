<?php

require('../controllers/Database.php');
require('../controllers/UserAuth.php');
require('../controllers/Orders.php');

$success = $database->connect_db();
if($success == '200')
{
    $conn = $database->get_db();
    $orders = new Orders($conn);
    $values = $orders->getquotedetails($_POST['mmodel'],$_POST['problems']);
    echo json_encode($values);
    
}



?>