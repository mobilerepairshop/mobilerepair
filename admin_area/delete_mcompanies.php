<?php

include("includes/db.php");

if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['delete_mcompanies'])){
$delete_id = $_GET['delete_mcompanies'];

$delete_com = "delete from mobilecompany where mcid=".$delete_id;

$run_delete = mysqli_query($con,$delete_com);

if($run_delete){
    
    
    echo "<script>alert('One Company Has Been Removed')</script>";
    
    echo "<script>window.open('index.php?view_mcompanies','_self')</script>";
    
    }
    else
    {
        echo "<script>alert($con->error)</script>";
    }
    
}


?>

<?php } ?>