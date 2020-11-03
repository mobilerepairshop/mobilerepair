<?php

include("includes/db.php");

if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['delete_subproblems'])){
$delete_id = $_GET['delete_subproblems'];

$delete_pro = "delete from subproblem_master where subproblem_code=".$delete_id;

$run_delete = mysqli_query($con,$delete_pro);

if($run_delete){
    
    
    echo "<script>alert('One Sub Problem Has Been Removed')</script>";
    
    echo "<script>window.open('index.php?view_subproblems','_self')</script>";
    
    }
    else
    {
        echo "<script>alert($con->error)</script>";
    }
    
}


?>

<?php } ?>