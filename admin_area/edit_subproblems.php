<?php

if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_subproblems'])){

$edit_id = $_GET['edit_subproblems'];

$get_data = "select * from subproblem_master inner join problem_master on subproblem_master.problem_code=problem_master.problem_code where subproblem_code=$edit_id";

$run_edit = mysqli_query($con,$get_data);

$row_edit = mysqli_fetch_array($run_edit);

$sp_id = $row_edit['subproblem_code'];

$subproblem = $row_edit['sub_problem'];

$p_id = $row_edit['problem_code'];

$mainproblem = $row_edit['main_problem'];

}

?>


<!DOCTYPE html>

<html>

<head>

<title> Edit Sub Problem </title>

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

<i class="fa fa-dashboard"> </i> Dashboard / Edit Sub Problem

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit Sub Problem

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form method="post" enctype="multipart/form-data" id="mcompany">
    <div class="form-container">
        <p class="includedet">Selected Main Problem and Subproblem</p><br>

        <table class="table">
            <tr>
                <th>Select Main Problem</th>
                <th>Select Sub Problem</th>
            </tr>
            <tr>
                <td>
                    <select name="problems1" id="problems1">
                        <option id="selectedproblem" value="<?php echo $p_id; ?>"><?php echo $mainproblem; ?></option>
                    </select>
                </td>
                <td>
                    <input type="text" id="subproblem" name="subproblem" value="<?php echo $subproblem; ?>">
                </td>
            </tr>
        </table>
        
        
        
        <div id="spdetails"> </div>

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
        url:"api/getproblems.php",
        type:"POST",
        success:function(para)
        {
            para = JSON.parse(para)
            window.problems = para
            for(let i=0;i<para.length;i++)
            {
                if(para[i][1] != $("#selectedproblem").val())
                {
                    var str = '<option value="'+para[i][1]+'">'+para[i][0]+'</option>'
                    $("#problems1").append(str)
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
    
    $subproblem = $_POST['subproblem'];
    $problems = $_POST['problems1'];
    $spid = $_GET['edit_subproblems'];

    $update_sp = "update subproblem_master set problem_code = ".$problems." , sub_problem = '".$subproblem."' where subproblem_code = ".$spid;
   
    $run_sp = mysqli_query($con,$update_sp);
    
    if($run_sp){
    
    echo "<script> alert('Sub Problem has been updated successfully') </script>";
    
    echo "<script>window.open('index.php?view_subproblems','_self')</script>";
    
}

}

?>

<?php } ?>
