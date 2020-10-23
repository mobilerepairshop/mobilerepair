
<?php

//logout.php

include('script.php');

$accesstoken=$_SESSION['access_token'];

//Reset OAuth access token
$google_client->revokeToken($accesstoken);
//Reset OAuth access token


//Destroy entire session data.
session_destroy();

//redirect page to index.php
header('location:index.php');

?>