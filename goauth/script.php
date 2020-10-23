<?php

//config.php

//Include Google Client Library for PHP autoload file
require_once '../vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('411937557386-8fdmnh35is2oo4bckud4bgmg8okeanql.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('fL8w_8g_bhtzby-YyBgUgkp4');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/mobilerepair/goauth/');
$google_client->setAccessType("offline");
$google_client->setApprovalPrompt('force');
//
$google_client->addScope('email');

$google_client->addScope('profile');

//start session on web page
session_start();



?>

 