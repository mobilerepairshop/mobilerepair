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

<i class="fa fa-dashboard" ></i> Dashboard / View Users

</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Users

<a href="./index.php?cancel" style="float:right;color:blue;">  <i class="fa fa-times" aria-hidden="true"></i></a>

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" style="width:1000px;margin-left: auto;margin-right: auto;"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>
<th>User Image</th>

<th>User Full Name</th>

<th>Username</th>

<th>User Address</th>

<th>User Contact</th>

<th>User Role</th>

<th>Delete</th>

<th >Edit </th>


</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$get_admin = "select * from admins";

$run_admin = mysqli_query($con,$get_admin);

while($row_admin = mysqli_fetch_array($run_admin)){

$admin_id = $row_admin['admin_id'];

$admin_name = $row_admin['admin_name'];

$admin_email = $row_admin['admin_email'];

$admin_image = $row_admin['admin_image'];

$admin_country = $row_admin['admin_address'];

$admin_job = $row_admin['admin_contact'];

$admin_role = $row_admin['admin_role'];

?>

<tr>
    
<td><img src="admin_images/<?php echo $admin_image; ?>" width="60" height="60" ></td>

<td><?php echo $admin_name; ?></td>

<td><?php echo $admin_email; ?></td>

<td><?php echo $admin_country; ?></td>

<td><?php echo $admin_job; ?></td>

<td><?php echo $admin_role; ?></td>

<td>

<?php 
if($admin_id == 0)
{
    echo "<b style='font-size: 12px;'>SuperAdmin</b>";
}
else
{
?>



<a href="index.php?user_delete=<?php echo $admin_id; ?>" >

<i class="fa fa-trash-o" ></i> Delete

<?php
}
?>

</td>

<td>
</a>
<a href="index.php?user_profile=<?php echo $admin_id; ?>">

<i class="fa fa-pencil"> </i> Edit

</a>
</td>

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
