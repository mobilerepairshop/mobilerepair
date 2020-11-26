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

<i class="fa fa-dashboard"></i> Dashboard / View Sub Problems

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!--  1 row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Sub Problems

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" style="width:700px;margin-left: auto;margin-right: auto;"  ><!-- table table-bordered table-hover table-striped Starts -->

<thead>

<tr>

<th style="width:10%">SubProblem ID</th>
<th style="width:25%">Main Problem</th>
<th style="width:25%">Sub Problem</th>
<th style="width:15%">Action</th>
<th style="width:15%">Action</th>


</tr>

</thead>

<tbody>

<?php

$get_p = "select * from subproblem_master inner join problem_master on subproblem_master.problem_code=problem_master.problem_code";

$run_p = mysqli_query($con,$get_p);

$ctr = 0;
while($row_p=mysqli_fetch_array($run_p)){

$p_id = $row_p['subproblem_code'];

$subproblem = $row_p['sub_problem'];

$problem = $row_p['main_problem'];

$ctr += 1;

?>

<tr>

<td><?php echo $ctr; ?></td>

<td><?php echo $problem; ?></td>

<td><?php echo $subproblem; ?></td>

<td>

<a href="index.php?delete_subproblems=<?php echo $p_id; ?>">

<i class="fa fa-trash-o"> </i> Delete

</a>

</td>

<td>

<a href="index.php?edit_subproblems=<?php echo $p_id; ?>">

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