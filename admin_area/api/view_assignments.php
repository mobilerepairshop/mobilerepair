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
                inner join session on session.uid = scheduled_request.admin_id
                inner join requests on requests.rid = scheduled_request.rid
                inner join users on users.uid = requests.uid
                where session.sesid = "'.$sid.'"';
    $result = mysqli_query($con,$sql);
    $arr = [];
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
            array_push($arr,["rid"=>$row['rid'],"date"=>$row['date'],"time"=>$row['time'],"mmodel"=>$row['mmodel'],"mcompany"=>$row['mcname'],"customer"=>$row['username']]);
        }
    }
    echo json_encode($arr);

}

?>