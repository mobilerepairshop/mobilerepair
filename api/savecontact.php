<?php
include_once "../database/connection.php";
if (isset($_POST['name'])) {
	$name = strip_tags($_POST['name']);
	$email = strip_tags($_POST['email']);
	$phone = strip_tags($_POST['phone']);
    $subject = strip_tags($_POST['subject']);
    $sql = "INSERT INTO contactus (name,email,phone,subject) VALUES('" . $name. "', '" . $email. "','" . $phone. "','" . $subject. "')";
    if (mysqli_query($con, $sql)) {
        echo "Response recorded successfully";
    } else {
        echo "Error: " . $sql . "" . mysqli_error($con);
    }
    $con->close();
	

}
?>