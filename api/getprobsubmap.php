<?php 

    require('../controllers/Database.php');
    require('../controllers/UserAuth.php');
    require('../controllers/Orders.php');

    $success = $database->connect_db();
    if($success == '200')
    {
        $conn = $database->get_db();
        
        // $auth = new UserAuth($conn);
        // $id = $_POST['sid'];

        // $user = $auth->validateSession($id);
    
            $orders = new Orders($conn);
            $values = $orders->getprobsubprobmap();

           echo json_encode($values);
        
    }
 

?>