<?php 

require('../../database/sqlconnection.php');
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
        $query = 'select u.username, u.userphoto from users as u inner join session as s where u.uid=s.uid and s.sesid=?';
        // added code to get incomming msg count
        $query="select users.*,(select count(*) from likes where uid=session.uid) as totallikes ,(select count(status) from chat_message where status=1 and to_user_id=session.uid) as msgs from session inner join users on session.uid=users.uid where session.sesid=?;";
        
        $stmt = $conn->prepare($query);
        $stmt->bind_param('s',$sid);
        if($stmt->execute())
        {
            $res = $stmt->get_result();
            $row = $res->fetch_assoc();
           
            $result[0] = '200';
            $result[1] = $row['username'];
            $result[2] = $row['userphoto'];
            $result[3] = $row['totallikes'];
            $result[4] = $row['msgs'];

            // $result = array('200',$row['username'],$row['userphoto']);
            echo json_encode($result);
        }
        else
        {
            echo "400";
        }
        // echo '200';
    }
    else
    {
        echo '400';
    }
}
else
{

}

?>