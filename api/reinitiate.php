<?php
require('../controllers/Database.php');
require('../controllers/UserAuth.php');
require('../controllers/Orders.php');


$success = $database->connect_db();
if($success == '200')
{    

    $created_date = date("Y-m-d");
    $note = "NA";
    $status = 0;
    $calprice = '0';
    $conn = $database->get_db();
    $auth = new UserAuth($conn);
    $id = $_POST['sid'];

    $user = $auth->validateSession($id);
    if($user[0]=='200')
    {
     
        $orders = new Orders($conn);
        $values = $orders->getorderbyid($_POST['rid']);
    
        $query = "insert into req(mmid,uid,estprice,status,calprice,created_date,note,repairperson,imeino,pay_method,pay_status,warranty,inwarr)values('".$values[0]['mmid']."','".$user[1]."','".$values[0]['estprice']."','".$values[0]['status']."','".$values[0]['calprice']."','".$created_date."','".$note."','','".$values[0]['imeino']."','','0','',1)";
        $res = mysqli_query($conn,$query);
        echo $conn->error;
        $last_id = $conn->insert_id;
        if($res)
        {
            for($i=0;$i<count($values[1]);$i++)
            {
                $query = "insert into problems values(".$last_id.",'".$values[1][$i]['problem']."','".$values[1][$i]['subproblem']."')";
                $res = mysqli_query($conn,$query);
            }
            if($res)
            {
                echo 'Your warranty request has been submitted successfully,
                Our customer care executive shall be contact you soon,
                You can track your request status at “Track Repair Service” menu
                Price may very if more problems found during repair”';
            }
            else
            {
                echo "Error in Request";
            }
        }
        else
        {
            echo "Req not executed";
        }
      
     
    }
    else
    {
        echo "Sid invalid";
    }

    

}
else
{
    echo "database not connected";
}


?>