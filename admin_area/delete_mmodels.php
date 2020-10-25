<?php

include("includes/db.php");

if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['delete_mmodels'])){
$delete_id = $_GET['delete_mmodels'];

$delete_com = "delete from mobilemodel where mmid=".$delete_id;

$run_delete = mysqli_query($con,$delete_com);

if($run_delete){
    
    
    echo "<script>alert('One Model Has Been Removed')</script>";
    
    echo "<script>window.open('index.php?view_mmodels','_self')</script>";
    
    }
    else
    {
        echo "<script>alert($con->error)</script>";
    }
    
}


?>

<?php } ?>