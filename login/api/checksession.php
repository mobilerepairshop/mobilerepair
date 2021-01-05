<?php 
error_reporting(0);
require('../../controllers/Database.php');
require('../../controllers/UserAuth.php');

$success = $database->connect_db();
if($success == "200")
{
    $sid = $database->sanitize($_REQUEST['sid']);    // removes backslashes
    $user_role = $database->sanitize($_REQUEST['role']);    // removes backslashes
    $conn = $database->get_db();
    $auth = new UserAuth($conn);

    $result = $auth->validateSession($sid);
    if($result[0]=='200')
    {
        // // added code to get incomming msg count
        if($user_role == 'user')
        {
            $query="select users.username,users.uid from users inner join session on users.uid=session.uid where session.sesid=?;";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s',$sid);
          
            if($stmt->execute())
            {
                $res = $stmt->get_result();
                $row = $res->fetch_assoc();
                $result[0] = '200';
                $result[1] = $row['username']?$row['username']:"";
                $result[2] = $row['uid']?$row['uid']:"";
                $result[3] = 'user';
                echo json_encode($result);
            }
            else
            {
                echo  json_encode("400");
            }
        }
        else if($user_role == 'admin')
        {
            $query="select admins.admin_name,admins.admin_id from admins inner join session on admins.admin_id=session.uid where session.sesid=?;";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('s',$sid);
          
            if($stmt->execute())
            {
                $res = $stmt->get_result();
                $row = $res->fetch_assoc();
                $result[0] = '200';
                $result[1] = $row['admin_name']?$row['admin_name']:"";
                $result[2] = $row['admin_id']?$row['admin_id']:"";
                $result[3] = 'Admin_User';
                echo json_encode($result);
            }
            else
            {
                echo  json_encode("400");
            }
        }
    }
    else
    {
        echo  json_encode('400');
    }
}
else
{

}

?>