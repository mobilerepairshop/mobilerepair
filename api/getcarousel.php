<?php 


    require('../controllers/Database.php');
    require('../controllers/Orders.php');

    $success = $database->connect_db();
    if($success == '200')
    {
        $conn = $database->get_db();
    
        $query = 'select image from carousel';
        $stmt = $conn->prepare($query);
        if($stmt->execute())
        {
            $images = array(); 
            $result = $stmt->get_result();   // <--- add this instead
            $userinfo = array();
            while ($data = $result->fetch_assoc()) 
            {
                array_push($images,$data['image']);
            }
            echo(json_encode($images));
        }
        
    }
?>

