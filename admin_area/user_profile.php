<?php



if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['user_profile'])){

$edit_id = $_GET['user_profile'];

$get_admin = "select * from admins where admin_id='$edit_id'";

$run_admin = mysqli_query($con,$get_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_id = $row_admin['admin_id'];

$admin_name = $row_admin['admin_name'];

$admin_email = $row_admin['admin_email'];

$admin_image = $row_admin['admin_image'];

$new_admin_image = $row_admin['admin_image'];

$admin_address = $row_admin['admin_address'];

$admin_role = $row_admin['admin_role'];

$admin_contact = $row_admin['admin_contact'];

$admin_rights = $row_admin['admin_rights'];

$admin_rights = explode(",",$admin_rights);

// echo "<script>alert(".count($admin_rights).")</script>";
// for($i=0;$i<count($admin_rights);$i++)
// {
//     echo $admin_rights[$i];
// }


}



?>


<div class="row" ><!-- 1  row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / Edit Profile

</li>



</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1  row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw" ></i> Edit Profile

</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Full Name: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_name" class="form-control" required value="<?php echo $admin_name; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Name </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_email" class="form-control" required disabled  value="<?php echo $admin_email; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Address </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_address" class="form-control" required value="<?php echo $admin_address; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->

<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">Contact No</label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_contact" class="form-control" required value="<?php echo $admin_contact; ?>">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Role </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="text" name="admin_role" class="form-control" required disabled value="<?php echo $admin_role; ?>">


<table class="table" style=<?php echo $admin_role == "admin" ? "display:block" : "display:none"; ?>>

  <tr>
    <td><input type="checkbox" class="userright" name="role[]" value="0" <?php echo (in_array("0", $admin_rights)? 'checked' : '');?>/>&nbsp;&nbsp;<label class="userright"> Dashboard</label><br /></td>
    <td><input type="checkbox" class="userright" name="role[]" value="1" <?php echo (in_array("1", $admin_rights)? 'checked' : '');?>/>&nbsp;&nbsp;<label class="userright"> Add User</label><br /></td>
  </tr>

  <tr>
    <td><input type="checkbox" class="userright" name="role[]" value="2" <?php echo (in_array("2", $admin_rights)? 'checked' : '');?>/>&nbsp;&nbsp;<label class="userright"> Add Mobile company</label><br /></td>
    <td><input type="checkbox" class="userright" name="role[]" value="3" <?php echo (in_array("3", $admin_rights)? 'checked' : '');?>/>&nbsp;&nbsp;<label class="userright">Add Mobile Model</label><br /></td>
  </tr>

  <tr>
    <td><input type="checkbox" class="userright" name="role[]" value="4" <?php echo (in_array("4", $admin_rights)? 'checked' : '');?>/>&nbsp;&nbsp;<label class="userright">Add City</label><br /></td>
    <td><input type="checkbox" class="userright" name="role[]" value="5" <?php echo (in_array("5", $admin_rights)? 'checked' : '');?>/>&nbsp;&nbsp;<label class="userright">Add Pincode</label><br /></td>
  </tr>
  <tr>
    <td><input type="checkbox" class="userright" name="role[]" value="6" <?php echo (in_array("6", $admin_rights)? 'checked' : '');?>/>&nbsp;&nbsp;<label class="userright">Add Problem</label><br /></td>
    <td><input type="checkbox" class="userright" name="role[]" value="7" <?php echo (in_array("7", $admin_rights)? 'checked' : '');?>/>&nbsp;&nbsp;<label class="userright">Add Sub-Problem</label><br /></td>
  </tr>
  <tr>
    <td><input type="checkbox" class="userright" name="role[]" value="8" <?php echo (in_array("8", $admin_rights)? 'checked' : '');?>/>&nbsp;&nbsp;<label class="userright">Add Pricing</label><br /></td>
    <td><input type="checkbox" class="userright" name="role[]" value="9" <?php echo (in_array("9", $admin_rights)? 'checked' : '');?>/>&nbsp;&nbsp;<label class="userright">Add carousel Image</label><br /></td>
  </tr>
  <tr>
    <td><input type="checkbox" class="userright" name="role[]" value="10" <?php echo (in_array("10", $admin_rights)? 'checked' : '');?>/>&nbsp;&nbsp;<label class="userright">Track Enquiries</label><br /></td>
    <td><input type="checkbox" class="userright" name="role[]" value="11" <?php echo (in_array("11", $admin_rights)? 'checked' : '');?>/>&nbsp;&nbsp;<label class="userright">View History</label><br /></td>
  </tr>
  <tr>
    <td><input type="checkbox" class="userright" name="role[]" value="12" <?php echo (in_array("12", $admin_rights)? 'checked' : '');?>/>&nbsp;&nbsp;<label class="userright">View cancelled Request</label><br /></td>
    <td><input type="checkbox" class="userright" name="role[]" value="13" <?php echo (in_array("13", $admin_rights)? 'checked' : '');?>/>&nbsp;&nbsp;<label class="userright">View Chat Response</label><br /></td>
  </tr>
  <tr>
    <td><input type="checkbox" class="userright" name="role[]" value="14" <?php echo (in_array("14", $admin_rights)? 'checked' : '');?>/>&nbsp;&nbsp;<label class="userright">View Contact Us Response</label><br /></td>
    <td><input type="checkbox" class="userright" name="role[]" value="15" <?php echo (in_array("15", $admin_rights)? 'checked' : '');?>/>&nbsp;&nbsp;<label class="userright">View Customers</label><br /></td>
  </tr>
  <tr>
    <td><input type="checkbox" class="userright" name="role[]" value="16" <?php echo (in_array("16", $admin_rights)? 'checked' : '');?>/>&nbsp;&nbsp;<label class="userright">View Contact Locations</label><br /></td>
  </tr>
</table>


</div><!-- col-md-6 Ends -->



</div><!-- form-group Ends -->



<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label">User Image: </label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="file" name="admin_image" class="form-control" >
<br>
<img src="admin_images/<?Php echo $admin_image; ?>" width="70" height="70" >

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


<div class="form-group"><!-- form-group Starts -->

<label class="col-md-3 control-label"></label>

<div class="col-md-6"><!-- col-md-6 Starts -->

<input type="submit" name="update" value="Update User" class="btn btn-primary form-control">

</div><!-- col-md-6 Ends -->

</div><!-- form-group Ends -->


</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->


</div><!-- 2 row Ends -->

<?php

if(isset($_POST['update'])){

$admin_name = $_POST['admin_name'];

$admin_email = $_POST['admin_email'];

$admin_address = $_POST['admin_address'];

$admin_contact = $_POST['admin_contact'];

$admin_role = $_POST['admin_role'];

$temp = $_POST['role'];

$str1 = "";

if($temp)
{
  $N = count($temp);
  for($i=0; $i < $N; $i++)
  {
    //echo "<script>alert('$temp[$i]')</script>";
    $str1=$str1.$temp[$i].",";
  }
}

$admin_image = $_FILES['admin_image']['name'];

$temp_admin_image = $_FILES['admin_image']['tmp_name'];

move_uploaded_file($temp_admin_image,"admin_images/$admin_image");

if(empty($admin_image)){

$admin_image = $new_admin_image;

}

$update_admin = "update admins set admin_name='$admin_name',admin_image='$admin_image',admin_contact='$admin_contact' ,admin_address='$admin_address' , admin_rights='$str1' where admin_id='$admin_id'";

$run_admin = mysqli_query($con,$update_admin);

if($run_admin){

echo "<script>alert('User Has Been Updated successfully')</script>";

echo "<script>window.open('index.php?view_users','_self')</script>";

// session_destroy();

}

}


?>



<?php }  ?>