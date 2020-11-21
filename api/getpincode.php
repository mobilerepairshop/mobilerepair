<?php
    
    require('../controllers/Database.php');
    require('../controllers/UserAuth.php');
    require('../controllers/Pincodes.php');

    $success = $database->connect_db();
    if($success == '200')
    {
        $conn = $database->get_db();
        $auth = new Pincode($conn);
        $city = $_POST['city'];
        echo json_encode($auth->getPincode($city));
    }

?>