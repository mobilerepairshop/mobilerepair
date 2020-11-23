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
    $phonenum = $_POST['phonenum'];
    $address = $_POST['address'];
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
        
        $query = "insert into req values(".$rid.",'".$mmodel."','".$user[1]."','".$estprice."','".$status."','".$calprice."','".$created_date."','".$note."','','','','0')";
        $userquery = "update users set pincode='".$pincode."',address='".$address."',phonenum='".$phonenum."' where uid=".$user[1];
        $userres = mysqli_query($conn,$userquery);
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
                echo 'Your request has been submitted successfully,
Our customer care executive shall be contact you soon,
You can track your request status at “Track Mobile Repair Service” menu
Price may very if more problems found during repair”';
            }
            else
            {
                echo "Error in Request";
            }
        }
    }

    

}



?>