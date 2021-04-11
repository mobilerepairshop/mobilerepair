<?php

include("includes/db.php");

if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['delete_carousel'])){
$delete_id = $_GET['delete_carousel'];

$sql = 'select image from carousel where id = '.$delete_id;
$run = mysqli_query($con,$sql);
$row = mysqli_fetch_array($run);
$main_image = $row['image'];
if (unlink("../storage/".$main_image))
{
    $delete_com = "delete from carousel where id=".$delete_id;

    $run_delete = mysqli_query($con,$delete_com);

    if($run_delete)
    {
        echo "<script>alert('One Image Has Been Removed')</script>";
        echo "<script>window.open('index.php?view_carousel','_self')</script>";
    }
    else
    {
        echo "<script>alert($con->error)</script>";
    }
}
else
{
    echo "<script>alert('Error Deleting File')</script>";
}
    
}


?>

<?php } ?>