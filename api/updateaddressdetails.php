<?php 

    require('../controllers/Database.php');
    require('../controllers/UserAuth.php');
    require('../controllers/Orders.php');

    $success = $database->connect_db();
    if($success == '200')
    {
        $conn = $database->get_db();
        
        $auth = new UserAuth($conn);
        $id = $_POST['sid'];

        $user = $auth->validateSession($id);
        if($user[0]=='200')
        {
            $orders = new Orders($conn);
            $rid = $_POST['rid'];
            $address = $_POST['address'];
            $contact = $_POST['phonenum'];
            $pincode = $_POST['pincode'];
            echo $orders->updateaddressdetails($rid,$address,$contact,$pincode);
        }
        else
        {
            echo $_POST['rid'];
        }
    }
?>