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
        if($user[0]=='200' and $user[1]==$_POST['uid'])
        {
            $orders = new UserAuth($conn);
            $uid = $_POST['uid'];
            $address = $_POST['address'];
            $contact = $_POST['mobile'];
            $name = $_POST['fullname'];
            echo $orders->updateprofiledata($uid,$address,$contact,$name);
        }
        else
        {
            echo $_POST['uid'];
        }
    }
?>