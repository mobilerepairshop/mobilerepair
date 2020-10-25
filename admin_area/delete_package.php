<?php


if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<?php

if(isset($_GET['delete_package'])){

$delete_id = $_GET['delete_package'];

$delete_package = "delete from packages where package_id='$delete_id'";

$run_delete = mysqli_query($con,$delete_package);

if($run_delete){

echo "<script>alert('One Package Has Been Deleted')</script>";

echo "<script> window.open('index.php?view_packages','_self') </script>";

}

}

?>


<?php } ?>