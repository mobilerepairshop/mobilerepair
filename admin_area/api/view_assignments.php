<?php

if($_COOKIE['sid'] == null)
{
    echo "<script>alert('Please Login First')</script>";
}
else
{
    $sid = $_POST['sid'];
    require('../includes/db.php');
    $sql = 'select * from scheduled_request
                inner join req on req.rid = scheduled_request.rid
                inner join mobilemodel on mobilemodel.mmid = req.mmid
                inner join mobilecompany on mobilecompany.mcid = mobilemodel.mcid
                inner join users on users.uid = req.uid
                inner join session on session.uid = scheduled_request.admin_id
                where session.sesid = "'.$sid.'" AND req.status in(1,2,8,9)';
    $result = mysqli_query($con,$sql);
    $arr = [];
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
            array_push($arr,["rid"=>$row['rid'],"date"=>$row['date'],"time"=>$row['time'],"mmodel"=>$row['mmname'],"mcompany"=>$row['mcname'],"customer"=>$row['username'],"status"=>$row['status']]);
        }
    }
    echo json_encode($arr);

}

?>