<?php

require_once("../includes/db.php");
$get_enquiries = "SELECT * FROM scheduled_request 
                  inner join admins on admins.admin_id=scheduled_request.admin_id 
                  inner join req on req.rid=scheduled_request.rid 
                  inner join users on req.uid=users.uid
                  where req.status>0 and req.status<9";

$arr = [];
$run_admin = mysqli_query($con,$get_enquiries);
while($row_admin = mysqli_fetch_array($run_admin)){
    array_push($arr,["rid"=>$row_admin['rid'],"date"=>$row_admin['date'],"time"=>$row_admin['time'],"username"=>$row_admin['username'],"phonenum"=>$row_admin['phonenum'],"address"=>$row_admin['address'],"admin_name"=>$row_admin['admin_name'],"status"=>$row_admin['status'],"delivery_status"=>$row_admin['delivery_status']]);
}

echo json_encode($arr);

?>