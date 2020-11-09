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
            if($status == 1)
            {
                echo $orders->pickedupfromuser($rid);
            }
            if($status == 2)
            {
                echo $orders->droppedtoadmin($rid);
            }
            if($status == 8)
            {
                echo $orders->droppedtouser($rid);
            }
        }
    }
?>