<?php
// setcookie('AD', '123', time() + (86400 * 30), "/"); // 86400 = 1 day
// $sess_id = md5(uniqid(mt_rand(), true));
$sess_id = $_GET['sesid'];
setcookie('sid', $sess_id , time()+60*60*7 , '/');

echo "<script>window.open('./index.php','_self')</script>";
?>