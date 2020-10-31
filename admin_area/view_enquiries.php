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

<i class="fa fa-dashboard" ></i> Dashboard / View Enquiries
</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Enquiries

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>
<th>User Name</th>

<th>Brand</th>

<th>Model</th>

<th>Repair Price </th>

<th>Area Pincode</th>

<th>Request Date</th>

<th>Action</th>



</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php


$get_enquiries = "SELECT * FROM requests INNER JOIN users ON users.uid = requests.uid  where  requests.status=1";

$run_admin = mysqli_query($con,$get_enquiries);

while($row_admin = mysqli_fetch_array($run_admin)){
    
$username = $row_admin['username'];

$Brand = $row_admin['mcname'];

$Model = $row_admin['mmodel'];

$price = $row_admin['estprice'];

$Area_Pincode = $row_admin['pincode'];

$req_date = $row_admin['created_date'];

?>

<tr>


<td><?php echo $username; ?></td>

<td><?php echo $Brand; ?></td>

<td><?php echo $Model; ?></td>

<td><?php echo $price; ?></td>

<td><?php echo $Area_Pincode; ?></td>

<td><?php echo $req_date; ?></td>

<td><input type="button" name="assign" value="Assign" class="btn btn-primary form-control"></td>


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