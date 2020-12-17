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

<i class="fa fa-dashboard"></i> Dashboard / View Pincode

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!--  1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Pincode

<a href="./index.php?cancel" style="float:right;color:blue;">  <i class="fa fa-times" aria-hidden="true"></i></a>

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" style="width:700px;margin-left: auto;margin-right: auto;"><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>

<th style="width:10%">Pincode ID</th>
<th style="width:25%">City Name</th>
<th style="width:25%">Pincode</th>
<th style="width:15%">Action</th>
<th style="width:15%">Action</th>


</tr>

</thead>

<tbody>

<?php

$get_m = "select * from pincode inner join cities on pincode.cid=cities.cid";

$run_m = mysqli_query($con,$get_m);

$ctr = 0;
while($row_m=mysqli_fetch_array($run_m)){

$m_id = $row_m['pid'];

$m_name = $row_m['pincode'];

$mc_name = $row_m['cname'];

$ctr += 1;

?>

<tr>

<td><?php echo $ctr; ?></td>

<td><?php echo $mc_name; ?></td>

<td><?php echo $m_name; ?></td>

<td>

<a href="index.php?delete_pincode=<?php echo $m_id; ?>">

<i class="fa fa-trash-o"> </i> Delete

</a>

</td>

<td>

<a href="index.php?edit_pincode=<?php echo $m_id; ?>">

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