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

<i class="fa fa-dashboard" ></i> Dashboard / View Contact Response
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

<table class="table table-bordered table-hover table-striped" style="width:800px;margin-left: auto;margin-right: auto;" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>


<th style="width:20%">Name</th>
<th style="width:20%">Email</th>
<th style="width:20%">Contact Number</th>
<th style="width:40%">Subject</th>

</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php


$get_enquiries = "SELECT * FROM contactus";

$run_admin = mysqli_query($con,$get_enquiries);

while($row_admin = mysqli_fetch_array($run_admin)){
  
$name = $row_admin['name'];

$email = $row_admin['email'];

$phone = $row_admin['phone'];

$sub = $row_admin['subject'];

?>

<tr>


<td><?php echo $name; ?></td>

<td><?php echo $email; ?></td>

<td><?php echo $phone; ?></td>

<td><?php echo $sub; ?></td>

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