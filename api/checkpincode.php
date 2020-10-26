<?php
    
    require('../controllers/Database.php');
    require('../controllers/UserAuth.php');
    require('../controllers/Pincodes.php');

    $success = $database->connect_db();
    if($success == '200')
    {
        $conn = $database->get_db();
        $auth = new Pincode($conn);
        $pincode = $_POST['pincode'];
        echo $auth->getCount($pincode);
    }

?>