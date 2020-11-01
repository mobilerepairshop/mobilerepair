<?php
require('../controllers/Database.php');
require('../controllers/UserAuth.php');
require('../controllers/Orders.php');

require_once("../admin_area/includes/db.php");
$success = $database->connect_db();
if($success == '200')
{
    
    $mmodel = $_POST['mmodel'];
    $problems = $_POST['problems'];
    $conn = $database->get_db();
    $auth = new UserAuth($conn);
    $id = $_POST['sid'];

    $user = $auth->validateSession($id);
    if($user[0]=='200')
    {
        $final = 0;
        $query = "select * from req";
        $res = mysqli_query($conn,$query);
        $rid = mysqli_num_rows($res) + 1;
       
        for($i=0;$i<count($problems);$i++)
        {
            $query = "select price from pricing_allocation where mmid=? and subproblem_code=?";
            $stmt = $conn->prepare($query);
            echo $conn->error;
            $stmt->bind_param('ii',$mmodel,$problems[$i][1]);
            if($stmt->execute())
            {
                $result = $stmt->get_result();   // <--- add this instead
                while ($data = $result->fetch_assoc()) 
                {
                    $final+=(int)$data['price'];
                }
               
            }
        }
        echo $final;
       
    }

    

}



?>