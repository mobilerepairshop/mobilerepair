<?php



if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>


<div class="row"><!--  1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard"></i> Dashboard / View Available Pincodes

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!--  1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Available Pincodes

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>
<th>Pincode ID</th>
<th>Available Pincode</th>
<th>Action</th>
<th>Action</th>




</tr>

</thead>

<tbody>

<?php

$get_pin = "select * from pincode";

$run_pin = mysqli_query($con,$get_pin);

$ctr = 0;
while($row_pin=mysqli_fetch_array($run_pin)){

$pin_id = $row_pin['pid'];

$pincode = $row_pin['pincode'];

$ctr += 1;

?>

<tr>

<td><?php echo $ctr; ?></td>

<td><?php echo $pincode; ?></td>

<td>

<a href="index.php?delete_pincodes=<?php echo $pin_id; ?>">

<i class="fa fa-trash-o"> </i> Delete

</a>

</td>

<td>

<a href="index.php?edit_pincodes=<?php echo $pin_id; ?>">

<i class="fa fa-pencil"> </i> Edit

</a>

</td>

</tr>

<?php } ?>


</tbody>


</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->




<?php } ?>