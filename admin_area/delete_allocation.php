<?php

include("includes/db.php");

if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['delete_allocation'])){
$delete_id = $_GET['delete_allocation'];

$delete_com = "delete from pricing_allocation where paid=".$delete_id;

$run_delete = mysqli_query($con,$delete_com);

if($run_delete){
    
    
    echo "<script>alert('One Pricing Allocation Has Been Removed')</script>";
    
    echo "<script>window.open('index.php?view_allocation','_self')</script>";
    
    }
    else
    {
        echo "<script>alert($con->error)</script>";
    }
    
}


?>

<?php } ?>