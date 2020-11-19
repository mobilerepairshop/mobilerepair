<?php 

    require('../controllers/Database.php');
    require('../controllers/UserAuth.php');

    $success = $database->connect_db();
    if($success == '200')
    {
        $conn = $database->get_db();
        $orders = new UserAuth($conn);
        $values = $orders->getaboutus();
        echo json_encode($values);
    }
 

?>