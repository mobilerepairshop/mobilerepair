<?php 

if(isset($_POST))
{
    require_once("../db.php");

    $rid = $_POST['rid'];
    $q1 = $_POST['q1'];
    $q2a = $_POST['q2A'];
    $q2b = $_POST['q2B'];
    $q2c = $_POST['q2C'];
    $q2d = $_POST['q2D'];
    $q2e = $_POST['q2E'];
    $q2f = $_POST['q2F'];
    $q2g = $_POST['q2G'];
    $q2h = $_POST['q2H'];
    $q2i = $_POST['q2I'];
    $q2j = $_POST['q2J'];
    $q2k = $_POST['q2K'];
    $q2l = $_POST['q2L'];
    $q2m = $_POST['q2M'];
    $q2n = $_POST['q2N'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];

    $sql = 'insert into verificationqa values('.$rid.',"'.$q1.'","'.$q2a.'","'.$q2b.'","'.$q2c.'","'.$q2d.'","'.$q2e.'","'.$q2f.'","'.$q2g.'","'.$q2h.'","'.$q2i.'","'.$q2j.'","'.$q2k.'","'.$q2l.'","'.$q2m.'","'.$q2n.'","'.$q3.'","'.$q4.'")';
    $res = mysqli_query($con,$sql);

}

?>