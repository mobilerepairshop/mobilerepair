<?php 

    require('../controllers/Database.php');
    require('../controllers/UserAuth.php');

    $success = $database->connect_db();
    if($success == '200')
    {
        $conn = $database->get_db();
        
        $auth = new UserAuth($conn);
        $id = $_POST['sid'];

        $user = $auth->validateSession($id);
        if($user[0]=='200')
        {
            $orders = new UserAuth($conn);
            $uid = $_POST['uid'];
            echo json_encode($orders->getprofiledata($uid));
        }
    }
?>