<?php
require_once('includes/db.php');

if(isset($_GET['user_delete'])){

$delete_id = $_GET['user_delete'];
echo $delete_id;

$delete_user = "delete from admins where admin_id='$delete_id'";

$run_delete = mysqli_query($con,$delete_user);

if($run_delete){

echo "<script>alert('One User Has Been Deleted')</script>";

echo "<script>window.open('index.php?view_users','_self')</script>";

}
else{
	echo "Error: " . $sql . "" . mysqli_error($con);
 }



}


?>

