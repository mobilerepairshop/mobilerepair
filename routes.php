<?php 
    if($_GET['authtype']=="google")
    {
        include("./login/api/register.php");
    }
    if($_GET['authtype']=="auth")
    {
        include("./login/api/register.php");
    }

?>