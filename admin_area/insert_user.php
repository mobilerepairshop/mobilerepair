<?php

if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {
   
?>

<div class="row" ><!-- 1  row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / Insert User


</li>



</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1  row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw" ></i> Insert User

<a href="./index.php?cancel" style="float:right;color:blue;">  <i class="fa fa-times" aria-hidden="true"></i></a>
</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Full Name: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" id="admin_name" name="admin_name" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Username: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" id="username" name="username" class="form-control" readonly>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->



<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Password: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="password" name="admin_pass" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Address: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_address" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Contact: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_contact" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Image: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="file" name="admin_image" class="form-control" required>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->



<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Role: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<select name="userrole" id="userrole" onchange="myFunction()">
	<option value="delivery_boy">Delivery Boy</option>
	<option value="admin">Admin</option>
</select>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label userright">User Rights: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<table>

  <tr>
    <td><input type="checkbox" class="userright" name="role[]" value="1" /><label class="userright"> Add User</label><br /></td>
<td><input type="checkbox" class="userright" name="role[]" value="2" /><label class="userright"> Add Mobile company</label><br /></td>
  </tr>

  <tr>
    <td><input type="checkbox" class="userright" name="role[]" value="3" /><label class="userright">Add Mobile Model</label><br /></td>
    <td><input type="checkbox" class="userright" name="role[]" value="4" /><label class="userright">Add City</label><br /></td>
  </tr>

  <tr>
    <td><input type="checkbox" class="userright" name="role[]" value="5" /><label class="userright">Add Pincode</label><br /></td>
    <td><input type="checkbox" class="userright" name="role[]" value="6" /><label class="userright">Add Problem</label><br /></td>
  </tr>
  <tr>
    <td><input type="checkbox" class="userright" name="role[]" value="7" /><label class="userright">Add Sub-Problem</label><br /></td>
    <td><input type="checkbox" class="userright" name="role[]" value="8" /><label class="userright">Add Pricing</label><br /></td>
  </tr>
  <tr>
    <td><input type="checkbox" class="userright" name="role[]" value="9" /><label class="userright">Add carousel Image</label><br /></td>
    <td><input type="checkbox" class="userright" name="role[]" value="10" /><label class="userright">Track Enquiries</label><br /></td>
  </tr>
  <tr>
    <td><input type="checkbox" class="userright" name="role[]" value="11" /><label class="userright">View History</label><br /></td>
    <td><input type="checkbox" class="userright" name="role[]" value="12" /><label class="userright">View cancelled Request</label><br /></td>
  </tr>
  <tr>
    <td><input type="checkbox" class="userright" name="role[]" value="13" /><label class="userright">View Chat Response</label><br /></td>
     <td><input type="checkbox" class="userright" name="role[]" value="14" /><label class="userright">View Contact Us Response</label><br /></td>
  </tr>
  <tr>
    <td><input type="checkbox" class="userright" name="role[]" value="15" /><label class="userright">View Customers</label><br /></td>
  </tr>
</table>

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"></label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="submit" name="submit" value="Insert User" class="btn btn-primary form-control">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>

$(document).ready(function(){
	$(".userright").hide();
});

function myFunction() {
  var x = document.getElementById("userrole").value;
  alert(x);
  if(x){
	$(".userright").show();
  }
}
	$("#admin_name").change(function() {
		var nm = $("#admin_name").val().split(" ")
		var unm = nm[0]
		for(let i=1;i<nm.length;i++)
		{
			unm += nm[i].substr(0,1)
		}
		unm += "_admin"

		$.ajax({
			url:"api/getusernames.php",
			type:"POST",
			success:function(para)
			{
				unm += "_"+para
				$("#username").val(unm)
			}
		})


	})
</script>

</div><!-- 2 row Ends -->

<?php
require_once('includes/db.php');

if(isset($_POST['role'])){

$admin_name = $_POST['admin_name'];

$username = $_POST['username'];

$admin_pass = $_POST['admin_pass'];

$admin_address = $_POST['admin_address'];

$admin_contact = $_POST['admin_contact'];

$admin_role = $_POST['userrole'];

$temp = $_POST['role'];

console.log($temp);
$N = count($temp);
$str1="";
for($i=0; $i < $N; $i++)
{
	//echo "<script>alert('$temp[$i]')</script>";
	$str1=$str1.$temp[$i].",";
  

}
console.log($str1);

$admin_image = $_FILES['admin_image']['name'];

$temp_admin_image = $_FILES['admin_image']['tmp_name'];

move_uploaded_file($temp_admin_image,"admin_images/$admin_image");

$insert_admin = "insert into admins (admin_name,admin_email,admin_pass,admin_image,admin_contact,admin_address,admin_role,admin_rights) values ('$admin_name','$username','$admin_pass','$admin_image','$admin_contact','$admin_address','$admin_role','$str1')";

$run_admin = mysqli_query($con,$insert_admin);


if($run_admin){

echo "<script>alert('One User Has Been Inserted successfully')</script>";

echo "<script>window.open('index.php?view_users','_self')</script>";

}else {
	echo "Error: " . $sql . "" . mysqli_error($con);
 }


}


?>



<?php }  ?>
