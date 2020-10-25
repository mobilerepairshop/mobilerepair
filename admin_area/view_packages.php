<?php


if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {


?>

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View Packages

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> View Packages

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Package Id : </th>
<th>Package Title : </th>
<th>Product Title : </th>
<th>Package Price : </th>
<th>Package Code : </th>
<th>Package Limit : </th>
<th>Package Used : </th>
<th>Delete Package : </th>
<th>Edit Package : </th>

</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$i = 0;

$get_packages = "select * from packages";

$run_packages = mysqli_query($con,$get_packages);

while($row_packages = mysqli_fetch_array($run_packages)){

$package_id = $row_packages['package_id'];

$product_id = $row_packages['product_id'];

$package_title = $row_packages['package_title'];

$package_price = $row_packages['package_price'];

$package_code = $row_packages['package_code'];

$package_limit = $row_packages['package_limit'];

$package_used = $row_packages['package_used'];


$get_products = "select * from products where product_id='$product_id'";

$run_products = mysqli_query($con,$get_products);

$row_products = mysqli_fetch_array($run_products);

$product_title = $row_products['product_title'];

$i++;

?>

<tr>

<td><?php echo $i; ?></td>

<td><?php echo $package_title; ?></td>

<td><?php echo $product_title; ?></td>

<td><?php echo "$$package_price"; ?></td>

<td><?php echo $package_code; ?></td>

<td><?php echo $package_limit; ?></td>

<td><?php echo $package_used; ?></td>

<td>

<a href="index.php?delete_package=<?php echo $package_id; ?>">

<i class="fa fa-trash-o"></i> Delete

</a>

</td>

<td>

<a href="index.php?edit_package=<?php echo $package_id; ?>">

<i class="fa fa-pencil"></i> Edit

</a>

</td>

</tr>

<?php } ?>

</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<?php } ?>