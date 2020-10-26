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

<i class="fa fa-dashboard"></i> Dashboard / View Problem Requests

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> View Problem Requests

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->


<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Request No</th>
<th>Pincode</th>
<th>Mobile Company</th>
<th>Mobile Model</th>
<th>Problem</th>
<th>Problem Description</th>


</tr>

</thead><!-- thead Ends -->


<tbody><!-- tbody Starts -->

<?php

$pro_desc = ["waterdamage"=>"Water Damage" , "mobiledead"=>"Mobile is Dead" , "toucherror"=>"Display is OK but partial/full touch not working" , "displayerror"=>"Touch is OK display damaged" , "touchdisplayerror"=>"Touch and display both not working" , "micerror"=>"Mic Problem" , "speakererror"=>"Speaker problem" , "loudspeakererror"=>"Loud speaker problem" , "vibratorerror"=>"Ringer/Vibrator problem" , "faultybattery"=>"Battery is faulty" , "chargingerror"=>"Mobile is not charging" , "networkerror"=>"Network not showing" , "towererror"=>"Only 1-2 tower showing in mobile" , "simerror"=>"SIM not detecting" , "detectionerror"=>"Memory card not detecting" , "powererror"=>"Power ON button not working" , "volumerror"=>"Volume buttons are not working" , "cameraerror"=>"Camera not working" , "lockerror"=>"Forgot screen lock/Password" , "flasherror"=>"Flash new software"];
$i=0;

$get_r = "select * from requests inner join problems on requests.rid=problems.rid";

$run_r = mysqli_query($con,$get_r);

while($row_r=mysqli_fetch_array($run_r)){

$rid = $row_r['rid'];

$pincode = $row_r['pincode'];

$mcname = $row_r['mcname'];

$mmodel = $row_r['mmodel'];

$problem = $row_r['problem'];

$subproblem = $pro_desc[$row_r['subproblem']];

$i++;

?>

<tr>

<td><?php echo $i; ?></td>

<td><?php echo $pincode; ?></td>

<td><?php echo $mcname; ?></td>

<td><?php echo $mmodel; ?></td>

<td><?php echo $problem; ?></td>

<td><?php echo $subproblem; ?></td>

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