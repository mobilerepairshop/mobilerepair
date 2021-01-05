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

<i class="fa fa-dashboard"></i> Dashboard / View Locations

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!--  1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Contact Locations

<a href="./index.php?cancel" style="float:right;color:blue;">  <i class="fa fa-times" aria-hidden="true"></i></a>
</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>


<th >Location ID</th>
<th >Contact Location City</th>
<th >Contact Location Address</th>
<th >Contact Admin Name</th>
<th >Contact Admin Number</th>
<th >Contact Admin Email</th>
<th >Action</th>
<th >Action</th>


</tr>

</thead>

<tbody>

<?php

$get_m = "select * from contactlocations";

$run_m = mysqli_query($con,$get_m);

$ctr = 0;
while($row_m=mysqli_fetch_array($run_m)){

$cl_id = $row_m['clid'];

$cl_city = $row_m['ccity'];

$cl_address = $row_m['caddress'];

$cl_admin = $row_m['cadmin'];

$cl_number = $row_m['cnumber'];

$cl_email = $row_m['cemail'];

$ctr += 1;

?>

<tr>

<td><?php echo $ctr; ?></td>

<td><?php echo $cl_city; ?></td>

<td><?php echo $cl_address; ?></td>
<td><?php echo $cl_admin; ?></td>
<td><?php echo $cl_number; ?></td>
<td><?php echo $cl_email; ?></td>

<td>

<a href="index.php?delete_location=<?php echo $cl_id; ?>">

<i class="fa fa-trash-o"> </i> Delete

</a>

</td>

<td>

<a href="index.php?edit_location=<?php echo $cl_id; ?>">

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