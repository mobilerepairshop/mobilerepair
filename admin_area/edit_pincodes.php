<?php

if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_pincodes'])){

$edit_id = $_GET['edit_pincodes'];

$get_data = "select * from pincode where pid=$edit_id";

$run_edit = mysqli_query($con,$get_data);

$row_edit = mysqli_fetch_array($run_edit);

$p_id = $row_edit['pid'];

$pincode = $row_edit['pincode'];

}

?>


<!DOCTYPE html>

<html>

<head>

<title> Edit Available Pincode </title>


<!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> -->

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Edit Available Pincode

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit Available Pincode

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Pincode </label>

<div class="col-md-6" >

<input type="text" name="pincode" class="form-control" required value="<?php echo $pincode; ?>">

</div>

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="update" value="Update" class="btn btn-primary form-control" >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

<?php

if(isset($_POST['update'])){

$pincode = $_POST['pincode'];
$update_pincode = "update pincode set pincode = '".$pincode."' where pid = ".$_GET['edit_pincodes'];

$run_pincode = mysqli_query($con,$update_pincode);

if($run_pincode){

echo "<script> alert('Pincode has been updated successfully') </script>";

echo "<script>window.open('index.php?view_pincodes','_self')</script>";

}

}

?>

<?php } ?>
