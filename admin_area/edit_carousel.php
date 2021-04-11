<?php

if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_carousel'])){

$edit_id = $_GET['edit_carousel'];

$get_data = "select * from carousel where id=$edit_id";

$run_edit = mysqli_query($con,$get_data);

$row_edit = mysqli_fetch_array($run_edit);

$problem_code = $row_edit['id'];

$main_image = $row_edit['image'];

}

?>


<!DOCTYPE html>

<html>

<head>

<title> Edit Main Problem </title>


<!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> -->

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Edit Image

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

<div class="col-md-6" >


<form method="post" enctype="multipart/form-data" id="mcompany">
    <div class="form-container">
        <p class="includedet">Select image</p><br>
        <img width=150 src="../storage/<?php echo $main_image; ?>">
        <!-- <input type="text" id="cname1" name="cname1" placeholder="Enter Company 1 Name*" onfocus="addCompany()"><br><br> -->
        
        <input type="hidden" id="ids" value="<?php echo $problem_code; ?>" />
        <input type="file" id="file" name="file" />
        <input type="button" class="button" value="Update" id="but_upload">

        <br><br>
        <div id="cdetails"> </div>
        
    </div>
    
</form>

</div>

<div class="form-group" ><!-- form-group Starts -->

<label class="col-md-3 control-label" ></label>



</div><!-- form-group Ends -->

</form><!-- form-horizontal Ends -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends --> 




</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
<script>
$("#but_upload").click(function(){
console.log("Clicked")
var fd = new FormData();
var files = $('#file')[0].files;
var id = $('#ids').val();
console.log("Id is ",id)
// Check file selected or not
if(files.length > 0 ){
   fd.append('file',files[0]);
   fd.append('id',id);
   $.ajax({
      url: './api/updatecarousel.php',
      type: 'post',
      data: fd,
      contentType: false,
      processData: false,
      success: function(response){
      //   alert(response)
         if(response != 0){
            alert("Image Updated Successfully")
            window.open('index.php?view_carousel','_self');
         }else{
            alert('file not uploaded');
         }
      },
   });
}else{
   alert("Please select a file.");
}
});


</script>

<?php } ?>
