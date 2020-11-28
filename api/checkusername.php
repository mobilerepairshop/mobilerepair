<?php
    
    require('../controllers/Database.php');
    require('../controllers/UserAuth.php');

    $success = $database->connect_db();
    if($success == '200')
    {
        $conn = $database->get_db();
        $auth = new UserAuth($conn);
        $userid = $_POST['userid'];
        echo $auth->checkusername($userid);
    }

?>