<?php

if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_location'])){

$edit_id = $_GET['edit_location'];

$get_data = "select * from contactlocations where clid=$edit_id";

$run_edit = mysqli_query($con,$get_data);

$row_edit = mysqli_fetch_array($run_edit);

$cl_id = $row_edit['clid'];

$cl_city = $row_edit['ccity'];

$cl_address = $row_edit['caddress'];

$cl_admin = $row_edit['cadmin'];

$cl_number = $row_edit['cnumber'];

$cl_email = $row_edit['cemail'];

}

?>


<!DOCTYPE html>

<html>

<head>

<title> Edit Contact Location </title>


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
  margin: 10px 5px;
  cursor: pointer;
}
</style>


</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Edit Location

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit Contact Location

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form method="post" enctype="multipart/form-data" id="clocations">
    <div class="form-container">
        <p class="includedet">Entered City and Address</p><br>

        <table class="table">
        <tr>
                <th>Enter City</th>
                <th>Enter Detailed Address</th>
                <th>Enter Admin Name</th>
                <th>Enter Admin Contact</th>
                <th>Enter Admin Email</th>
            </tr>
            <tr>
                <td>
                    <input type="text" id="contactcity1" name="contactcity" placeholder="Enter Contact Location City 1 *" value="<?php echo $cl_city;?>" require>
                </td>
                <td>
                    <input type="text" id="contactaddress1" name="contactaddress" placeholder="Enter Location Address 1 *"value="<?php echo $cl_address;?>" require>
                </td>
                <td>
                    <input type="text" id="contactadmin1" name="contactadmin" placeholder="Enter Contact Admin Name 1 *" value="<?php echo $cl_admin;?>" require>
                </td>
                <td>
                    <input type="text" id="contactnumber1" name="contactnumber" placeholder="Enter Admin Contact Number 1 *" value="<?php echo $cl_number;?>" require>
                </td>
                <td>
                    <input type="text" id="contactemail1" name="contactemail" placeholder="Enter Admin Contact Email 1 *" value="<?php echo $cl_email;?>" require>
                </td>
                
            </tr>
        </table>
        
        <div id="cdetails"> </div>

        <button class="button" id="update" name="update">Update</button>
    </div>
    
</form>


</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

</body>

</html>

<?php

if(isset($_POST['update'])){
    
    $contactcity = $_POST['contactcity'];
    $contactaddress = $_POST['contactaddress'];
    $contactadmin = $_POST['contactadmin'];
    $contactnumber = $_POST['contactnumber'];
    $contactemail = $_POST['contactemail'];

    $update_mm = "update contactlocations set ccity = '".$contactcity."' , caddress = '".$contactaddress."' , cadmin = '".$contactadmin."' , cnumber = '".$contactnumber."' , cemail = '".$contactemail."' where clid = ".$edit_id;
    
    $run_mm = mysqli_query($con,$update_mm);
    
    if($run_mm){
    
    echo "<script> alert('Location has been updated successfully') </script>";
    
    echo "<script>window.open('index.php?view_locations','_self')</script>";
    
}
else
{
    echo "<script>alert($con->error)</script>";

}

}

?>

<?php } ?>
