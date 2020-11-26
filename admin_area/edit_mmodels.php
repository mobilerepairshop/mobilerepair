<?php

if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_mmodels'])){

$edit_id = $_GET['edit_mmodels'];

$get_data = "select * from mobilemodel inner join mobilecompany on mobilemodel.mcid=mobilecompany.mcid where mmid=$edit_id";

$run_edit = mysqli_query($con,$get_data);

$row_edit = mysqli_fetch_array($run_edit);

$mm_id = $row_edit['mmid'];

$mm_name = $row_edit['mmname'];

$mc_name = $row_edit['mcname'];

$mc_id = $row_edit['mcid'];

}

?>


<!DOCTYPE html>

<html>

<head>

<title> Edit Mobile Model </title>


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

<i class="fa fa-dashboard"> </i> Dashboard / Edit Mobile Model

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit Mobile Model

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form method="post" enctype="multipart/form-data" id="mcompany">
    <div class="form-container">
        <p class="includedet">Selected Company and Model</p><br>

        <table class="table">
            <tr>
                <th>Select Company Name</th>
                <th>Select Mobile Model</th>
            </tr>
            <tr>
                <td>
                    <select name="companies1" id="companies1">
                        <option id="selectedcompany" value="<?php echo $mc_id; ?>"><?php echo $mc_name; ?></option>
                    </select>
                </td>
                <td>
                    <input type="text" id="mmname" name="mmname" value="<?php echo $mm_name; ?>">
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

<script>
$(document).ready(function(){
    $.ajax({
        url:"api/getcompanies.php",
        type:"POST",
        success:function(para)
        {
            para = JSON.parse(para)
            window.companies = para
            for(let i=0;i<para.length;i++)
            {
                if(para[i][1] != $("#selectedcompany").val())
                {
                    var str = '<option value="'+para[i][1]+'">'+para[i][0]+'</option>'
                    $("#companies1").append(str)
                }
            }
        }
    })
})
</script>

</body>

</html>

<?php

if(isset($_POST['update'])){

    // echo "<script> alert(".$_POST['companies1'].") </script>";
    // echo "<script> alert(".$_POST['mmname1'].") </script>";

    
    $mmname = $_POST['mmname'];
    $com = $_POST['companies1'];
    $mmid = $_GET['edit_mmodels'];

    $update_mm = "update mobilemodel set mcid = ".$com." , mmname = '".$mmname."' where mmid = ".$mmid;
    // $update_mm = "update mobilemodel set mcid = ".$com." where mmid = ".$mmid;
    // $update_mm = "update mobilemodel set mmname = '".$mmname."' where mmid = ".$mmid;

    
    $run_mm = mysqli_query($con,$update_mm);
    
    if($run_mm){
    
    echo "<script> alert('Model has been updated successfully') </script>";
    
    echo "<script>window.open('index.php?view_mmodels','_self')</script>";
    
}

}

?>

<?php } ?>
