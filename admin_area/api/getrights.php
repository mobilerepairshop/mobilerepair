<?php


require('../controllers/UserAuth.php');
require('../../database/sqlconnection.php');
$conn = $database->get_db();

$auth = new UserAuth($conn);

$user = $auth->validateSession($_COOKIE['sid']);

if($user[0] == 200)
{
    $rights = $auth->checkAccess($user[1]);
    // $rights = explode(",",$rights);
    echo json_encode($rights);
}


?>