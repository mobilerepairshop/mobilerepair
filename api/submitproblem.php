<?php
require('../controllers/Database.php');
require('../controllers/UserAuth.php');
require('../controllers/Orders.php');

require_once("../admin_area/includes/db.php");
$success = $database->connect_db();
if($success == '200')
{
    
    $pincode = $_POST['pincode'];
    $mmodel = $_POST['mmodel'];
    $problems = $_POST['problems'];
    $estprice = $_POST['estprice'];
    $created_date = date("d-m-Y");
    $note = "NA";
    $status = 0;
    $calprice = '0';
    $conn = $database->get_db();
    $auth = new UserAuth($conn);
    $id = $_POST['sid'];

    $user = $auth->validateSession($id);
    if($user[0]=='200')
    {
        $query = "select * from req";
        $res = mysqli_query($conn,$query);
        $rid = mysqli_num_rows($res) + 1;
        
        $query = "insert into req values(".$rid.",'".$mmodel."','".$user[1]."','".$estprice."','".$status."','".$calprice."','".$created_date."','".$note."')";
        $res = mysqli_query($conn,$query);
        echo $conn->error;
        if($res)
        {
            for($i=0;$i<count($problems);$i++)
            {
                $query = "insert into problems values(".$rid.",'".$problems[$i][0]."','".$problems[$i][1]."')";
                $res = mysqli_query($conn,$query);
            }
            if($res)
            {
                echo "Request Sent Successfully";
            }
            else
            {
                echo "Error in Request";
            }
        }
    }

    

}



?>