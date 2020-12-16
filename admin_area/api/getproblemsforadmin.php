<?php 

    require('../../controllers/Database.php');
    require('../../controllers/UserAuth.php');
    require('../../controllers/Orders.php');

    $success = $database->connect_db();
    if($success == '200')
    {
        $conn = $database->get_db();
        $orders = new Orders($conn);
        $rid = $_POST['rid'];
        $values = $orders->getproblemsforadmin($rid);
        echo json_encode($values);
    }
?>