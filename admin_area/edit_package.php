<?php


if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<?php

if(isset($_GET['edit_package'])){

$edit_id = $_GET['edit_package'];

$edit_package = "select * from packages where package_id='$edit_id'";

$run_edit = mysqli_query($con,$edit_package);

$row_edit = mysqli_fetch_array($run_edit);

$c_id = $row_edit['package_id'];

$c_title = $row_edit['package_title'];

$c_price = $row_edit['package_price'];

$c_code = $row_edit['package_code'];

$c_limit = $row_edit['package_limit'];

$c_used = $row_edit['package_used'];

$p_id = $row_edit['product_id'];

$get_products = "select * from products where product_id='$p_id'";

$run_products = mysqli_query($con,$get_products);

$row_products = mysqli_fetch_array($run_products);

$product_id = $row_products['product_id'];

$product_title = $row_products['product_title'];


}


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Edit Package

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts --->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"> </i> Edit Package

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!--panel-body Starts -->

<form class="form-horizontal" method="post" action=""><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label"> Package Title </label>

<div class="col-md-6">

<input type="text" name="package_title" class="form-control" value="<?php echo $c_title; ?>" >

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label"> Package Price </label>

<div class="col-md-6">

<input type="text" name="package_price" class="form-control" value="<?php echo $c_price; ?>">

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label"> Package Code </label>

<div class="col-md-6">

<input type="text" name="package_code" class="form-control" value="<?php echo $c_code; ?> ">

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label"> Package Limit </label>

<div class="col-md-6">

<input type="number" name="package_limit" value="<?php echo $c_limit; ?>" class="form-control">

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label"> Select Package For Product or Bundle </label>

<div class="col-md-6">

<select name="product_id" class="form-control">

<option value="<?php echo $product_id; ?>"> <?php echo $product_title; ?> </option>


<?php

$get_p = "select * from products where status='product'";

$run_p = mysqli_query($con,$get_p);

while($row_p = mysqli_fetch_array($run_p)){

$p_id = $row_p['product_id'];

$p_title = $row_p['product_title'];

echo "<option value='$p_id'> $p_title </option>";

}

?>

<option></option>

<option>Select Package for bundle</option>

<option></option>

<?php

$get_p = "select * from products where status='bundle'";

$run_p = mysqli_query($con,$get_p);

while($row_p = mysqli_fetch_array($run_p)){

$p_id = $row_p['product_id'];

$p_title = $row_p['product_title'];

echo "<option value='$p_id'> $p_title </option>";

}

?>

</select>

</div>

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label"> </label>

<div class="col-md-6">

<input type="submit" name="update" class=" btn btn-primary form-control" value=" Update Package ">

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!--panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --->

<?php

if(isset($_POST['update'])){

$package_title = $_POST['package_title'];

$package_price = $_POST['package_price'];

$package_code = $_POST['package_code'];

$package_limit = $_POST['package_limit'];

$product_id = $_POST['product_id'];

$update_package = "update packages set product_id='$product_id',package_title='$package_title',package_price='$package_price',package_code='$package_code',package_limit='$package_limit',package_used='$c_used' where package_id='$c_id'";

$run_package = mysqli_query($con,$update_package);


if($run_package){

echo "<script>alert('One Package Has Been Updated')</script>";

echo "<script>window.open('index.php?view_packages','_self')</script>";

}


}

?>

<?php } ?>