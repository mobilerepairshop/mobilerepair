<?php 

require('../../controllers/Database.php');
require('../../controllers/UserAuth.php');

$success = $database->connect_db();
if($success == "200")
{
    $sid = $database->sanitize($_REQUEST['sid']);    // removes backslashes
    $conn = $database->get_db();
    $auth = new UserAuth($conn);

    $result = $auth->validateSession($sid);
    if($result[0]=='200')
    {
        // $query = 'select u.username, u.userphoto from users as u inner join session as s where u.uid=s.uid and s.sesid=?';
        // // added code to get incomming msg count
        $query="select users.username from users inner join session on users.uid=session.uid where session.sesid=?;";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s',$sid);
      
        if($stmt->execute())
        {
            $res = $stmt->get_result();
            $row = $res->fetch_assoc();
            $result[0] = '200';
            $result[1] = $row['username']?$row['username']:"Admin_User";
            // $result = array('200',$row['username'],$row['userphoto']);
            echo json_encode($result);
        }
        else
        {
            echo  json_encode("400");
        }
        // echo '200';
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