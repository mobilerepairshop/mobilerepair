<?php

if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_problems'])){

$edit_id = $_GET['edit_problems'];

$get_data = "select * from problem_master where problem_code=$edit_id";

$run_edit = mysqli_query($con,$get_data);

$row_edit = mysqli_fetch_array($run_edit);

$problem_code = $row_edit['problem_code'];

$main_problem = $row_edit['main_problem'];

}

?>


<!DOCTYPE html>

<html>

<head>

<title> Edit Main Problem </title>


<style>
.button {
  background-color: #008CBA; /* Green */
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 10px 320px;
  cursor: pointer;
}
</style>

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Edit Main Problem

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit Main Problem

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" > Main Problem </label>

<div class="col-md-6" >

<input type="text" name="mainproblem" class="form-control" required value="<?php echo $main_problem; ?>">

</div>

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>

<div class="col-md-6" >

<input type="submit" name="update" value="Update" class="button" >

</div>

</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>

<?php

if(isset($_POST['update'])){

$mainproblem = $_POST['mainproblem'];
$update_mp = "update problem_master set main_problem = '".$mainproblem."' where problem_code = ".$_GET['edit_problems'];

$run_mp = mysqli_query($con,$update_mp);

if($run_mp){

echo "<script> alert('Main Problem has been updated successfully') </script>";

echo "<script>window.open('index.php?view_problems','_self')</script>";

}

}

?>

<?php } ?>
