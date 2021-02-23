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
            $status = $_POST['status'];
            $creason = $_POST['creason'];
            if($status == 1)
            {
                echo $orders->pickupcancel($rid,$status,$creason);
            }
            else if($status == 8)
            {
                echo $orders->dropcancel($rid,$status,$creason);
            }
        }
    }
?>