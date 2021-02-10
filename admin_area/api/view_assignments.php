<?php
error_reporting(0);
if($_COOKIE['sid'] == null)
{
    echo "<script>alert('Please Login First')</script>";
}
else
{
    $sid = $_POST['sid'];
    require('../includes/db.php');
    if($_POST['filter'] == "active")
    {
        $sql = 'select *,req.phonenum,req.pincode,req.address from scheduled_request
                inner join req on req.rid = scheduled_request.rid
                inner join mobilemodel on mobilemodel.mmid = req.mmid
                inner join mobilecompany on mobilecompany.mcid = mobilemodel.mcid
                inner join users on users.uid = req.uid
                inner join session on session.uid = scheduled_request.admin_id
                where session.sesid = "'.$sid.'" AND req.status in(1,2,8) AND scheduled_request.delivery_status <> 2';
    }
    if($_POST['filter'] == "cancelled")
    {
        $sql = 'select *,req.phonenum,req.pincode,req.address from scheduled_request
                inner join req on req.rid = scheduled_request.rid
                inner join mobilemodel on mobilemodel.mmid = req.mmid
                inner join mobilecompany on mobilecompany.mcid = mobilemodel.mcid
                inner join users on users.uid = req.uid
                inner join session on session.uid = scheduled_request.admin_id
                where session.sesid = "'.$sid.'" AND req.status < 0';
    }
    // if($_POST['filter'] == "unavailable")
    // {
    //     $sql = 'select *,req.phonenum,req.pincode,req.address from scheduled_request
    //             inner join req on req.rid = scheduled_request.rid
    //             inner join mobilemodel on mobilemodel.mmid = req.mmid
    //             inner join mobilecompany on mobilecompany.mcid = mobilemodel.mcid
    //             inner join users on users.uid = req.uid
    //             inner join session on session.uid = scheduled_request.admin_id
    //             where session.sesid = "'.$sid.'" AND req.status in(1,2,8) AND scheduled_request.delivery_status <> 2';
    // }
    if($_POST['filter'] == "history")
    {
        $sql = 'select *,req.phonenum,req.pincode,req.address from scheduled_request
                inner join req on req.rid = scheduled_request.rid
                inner join mobilemodel on mobilemodel.mmid = req.mmid
                inner join mobilecompany on mobilecompany.mcid = mobilemodel.mcid
                inner join users on users.uid = req.uid
                inner join session on session.uid = scheduled_request.admin_id
                where session.sesid = "'.$sid.'" AND (scheduled_request.delivery_status = 2 OR scheduled_request.delivery_status = 3)';
    }
    $result = mysqli_query($con,$sql);
    $arr = [];
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
            array_push($arr,["rid"=>$row['rid'],"date"=>$row['date'],"time"=>$row['time'],"mmodel"=>$row['mmname'],"mcompany"=>$row['mcname'],"customer"=>$row['username'],"status"=>$row['status'],"address"=>$row['address'],"phonenum"=>$row['phonenum'],"pay_status"=>$row['pay_status'],"pay_method"=>$row['pay_method'],"delivery_status"=>$row['delivery_status']]);
        }
    }
    echo json_encode($arr);

}

?>