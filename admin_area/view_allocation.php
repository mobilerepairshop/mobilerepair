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

<i class="fa fa-dashboard"></i> Dashboard / View Pricing Allocation

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!--  1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Pricing Allocation

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>
<th>Allocation Number</th> 
<th>Mobile Company Name</th>
<th>Mobile Model Name</th>
<th>Mobile Main Problem</th>
<th>Mobile Sub Problem</th>
<th>Price</th>
<th>Action</th>
<th>Action</th>


</tr>

</thead>

<tbody>

<?php

$get_a = "select * from pricing_allocation 
            inner join mobilemodel on mobilemodel.mmid=pricing_allocation.mmid
            inner join subproblem_master on subproblem_master.subproblem_code=pricing_allocation.subproblem_code
            inner join mobilecompany on mobilecompany.mcid=mobilemodel.mcid
            inner join problem_master on problem_master.problem_code=subproblem_master.problem_code";

$run_a = mysqli_query($con,$get_a);

$ctr = 0;
while($row_a=mysqli_fetch_array($run_a)){

$pa_id = $row_a['paid'];

$m_name = $row_a['mmname'];

$mc_name = $row_a['mcname'];

$main_problem = $row_a['main_problem'];

$sub_problem = $row_a['sub_problem'];

$price = $row_a['price'];

$ctr += 1;

?>

<tr>

<td><?php echo $ctr; ?></td>

<td><?php echo $mc_name; ?></td>

<td><?php echo $m_name; ?></td>

<td><?php echo $main_problem; ?></td>

<td><?php echo $sub_problem; ?></td>

<td><?php echo $price; ?></td>

<td>

<a href="index.php?delete_allocation=<?php echo $pa_id; ?>">

<i class="fa fa-trash-o"> </i> Delete

</a>

</td>

<td>

<a href="index.php?edit_allocation=<?php echo $pa_id; ?>">

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