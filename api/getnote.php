<?php 

    require('../controllers/Database.php');
    require('../controllers/UserAuth.php');
    require('../controllers/Orders.php');

    $success = $database->connect_db();
    if($success == '200')
    {
        $conn = $database->get_db();
        $rid = $_POST['rid'];
        $orders = new Orders($conn);
        $values = $orders->getnote($rid);
        echo $values;   
    }

?>