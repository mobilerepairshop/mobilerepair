<?php
    
    require('../controllers/Database.php');
    require('../controllers/UserAuth.php');
    require('../controllers/Services.php');

    $success = $database->connect_db();
    if($success == '200')
    {
        $conn = $database->get_db();
        $auth = new Services($conn);
        $id = $_POST['id'];
        $res = $auth->getMobileFilter('model',$id);
        echo json_encode($res);
    }

?>