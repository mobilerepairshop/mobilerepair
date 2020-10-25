<?php

if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_mcompanies'])){

$edit_id = $_GET['edit_mcompanies'];

$get_data = "select * from mobilecompany where mcid=$edit_id";

$run_edit = mysqli_query($con,$get_data);

$row_edit = mysqli_fetch_array($run_edit);

$mc_id = $row_edit['mcid'];

$mc_name = $row_edit['mcname'];

}

?>


<!DOCTYPE html>

<html>

<head>

<title> Edit Mobile Company </title>


<!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> -->

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Edit Mobile Company

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit Mobile Company

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Mobile Company Name </label>

<div class="col-md-6" >

<input type="text" name="mcname" class="form-control" required value="<?php echo $mc_name; ?>">

</div>

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="update" value="Update Product" class="btn btn-primary form-control" >

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

$mcname = $_POST['mcname'];
$update_mc = "update mobilecompany set mcname = '".$mcname."' where mcid = ".$_GET['edit_mcompanies'];

$run_mc = mysqli_query($con,$update_mc);

if($run_mc){

echo "<script> alert('Product has been updated successfully') </script>";

echo "<script>window.open('index.php?view_mcompanies','_self')</script>";

}

}

?>

<?php } ?>
