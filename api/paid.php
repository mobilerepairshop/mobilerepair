<?php 

    require('../controllers/Database.php');
    require('../controllers/UserAuth.php');
    require('../controllers/Delivery.php');

    $success = $database->connect_db();
    if($success == '200')
    {
        $conn = $database->get_db();
        
        $auth = new UserAuth($conn);
        $id = $_POST['sid'];

        $user = $auth->validateSession($id);
        if($user[0]=='200')
        {
            $orders = new Delivery($conn);
            $rid = $_POST['rid'];
            echo $orders->paid($rid);
        }
    }
?>