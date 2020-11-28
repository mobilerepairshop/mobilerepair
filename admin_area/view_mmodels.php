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

<i class="fa fa-dashboard"></i> Dashboard / View Mobile Models

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!--  1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Mobile Models

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" style="width:700px;margin-left: auto;margin-right: auto;" ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>


<th style="width:10%">Mobile Model ID</th>
<th style="width:25%">Mobile Company Name</th>
<th style="width:25%">Mobile Model Name</th>
<th style="width:15%">Action</th>
<th style="width:15%">Action</th>


</tr>

</thead>

<tbody>

<?php

$get_m = "select * from mobilemodel inner join mobilecompany on mobilemodel.mcid=mobilecompany.mcid";

$run_m = mysqli_query($con,$get_m);

$ctr = 0;
while($row_m=mysqli_fetch_array($run_m)){

$m_id = $row_m['mmid'];

$m_name = $row_m['mmname'];

$mc_name = $row_m['mcname'];

$ctr += 1;

?>

<tr>

<td><?php echo $ctr; ?></td>

<td><?php echo $mc_name; ?></td>

<td><?php echo $m_name; ?></td>

<td>

<a href="index.php?delete_mmodels=<?php echo $m_id; ?>">

<i class="fa fa-trash-o"> </i> Delete

</a>

</td>

<td>

<a href="index.php?edit_mmodels=<?php echo $m_id; ?>">

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