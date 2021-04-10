<?php

require_once("../includes/db.php");
$get_enquiries = "SELECT *,req.phonenum,req.pincode,req.address FROM scheduled_request 
                  INNER join req on req.rid=scheduled_request.rid 
                  INNER JOIN mobilemodel ON mobilemodel.mmid = req.mmid 
                  INNER JOIN mobilecompany ON mobilecompany.mcid = mobilemodel.mcid 
                  INNER join admins on admins.admin_id=scheduled_request.admin_id 
                  INNER join users on req.uid=users.uid
                  where req.status>0 and req.warranty=''";

$arr = [];
$run_admin = mysqli_query($con,$get_enquiries);
while($row_admin = mysqli_fetch_array($run_admin)){
   array_push($arr,["rid"=>$row_admin['rid'],"date"=>$row_admin['date'],"time"=>$row_admin['time'],"username"=>$row_admin['username'],"phonenum"=>$row_admin['phonenum'],"address"=>$row_admin['address'],"admin_name"=>$row_admin['admin_name'],"status"=>$row_admin['status'],"delivery_status"=>$row_admin['delivery_status'],"warranty"=>$row_admin['warranty'],"orderid"=>"MR".sprintf("%05d", $row_admin['rid']),"imeino"=>$row_admin['imeino'],"mcname"=>$row_admin['mcname'],"mmname"=>$row_admin['mmname'],"pay_status"=>$row_admin['pay_status'],"pay_method"=>$row_admin['pay_method'],"est_price"=>$row_admin['estprice'],"final_price"=>$row_admin['calprice']]);
  // array_push($arr,[$row_admin['rid'],$row_admin['date'],$row_admin['time'],$row_admin['username'],$row_admin['phonenum'],$row_admin['address'],$row_admin['admin_name'],$row_admin['status'],$row_admin['delivery_status'],$row_admin['warranty'],"MR".sprintf("%05d", $row_admin['rid'])]);
}
echo json_encode($arr);

?>