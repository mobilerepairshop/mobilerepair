<?php
if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {
?>


<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / View Response
</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Response

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Mobile Repair/Mobile Insuarance</th>

<th>City</th>

<th>Area Pincode</th>

<th>Mobile Number</th>



</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php


$get_enquiries = "SELECT * FROM chat";

$run_admin = mysqli_query($con,$get_enquiries);

while($row_admin = mysqli_fetch_array($run_admin)){
  
$query = $row_admin['work'];

$city = $row_admin['city'];

$pin = $row_admin['pin'];

$mobile = $row_admin['mobile'];

?>

<tr>


<td><?php echo $query; ?></td>

<td><?php echo $city; ?></td>

<td><?php echo $pin; ?></td>

<td><?php echo $mobile; ?></td>

</tr>


<?php } ?>

</tbody><!-- tbody Ends -->



</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->


</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->


</div><!-- col-lg-12 Ends -->



</div><!-- 2 row Ends -->

<?php }  ?>