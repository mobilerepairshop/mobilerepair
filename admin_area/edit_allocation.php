<?php

if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>

<?php

if(isset($_GET['edit_allocation'])){

$edit_id = $_GET['edit_allocation'];

$get_data = "select * from pricing_allocation 
                inner join mobilemodel on mobilemodel.mmid=pricing_allocation.mmid 
                inner join subproblem_master on subproblem_master.subproblem_code=pricing_allocation.subproblem_code
                where paid=$edit_id";

$run_edit = mysqli_query($con,$get_data);

$row_edit = mysqli_fetch_array($run_edit);

$pa_id = $row_edit['paid'];

$mm_name = $row_edit['mmname'];

$mm_id = $row_edit['mmid'];

$sub_problem = $row_edit['sub_problem'];

$subproblem_code = $row_edit['subproblem_code'];

$price = $row_edit['price'];

}

?>


<!DOCTYPE html>

<html>

<head>

<title> Edit Pricing Allocation </title>


<!-- <script src="//cdn.tinymce.com/4/tinymce.min.js"></script> -->

</head>

<body>

<div class="row"><!-- row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"> </i> Dashboard / Edit Pricing Allocation

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- row Ends -->


<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title">

<i class="fa fa-money fa-fw"></i> Edit Pricing Allocation

</h3>

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<form method="post" enctype="multipart/form-data" id="mcompany">
    <div class="form-container">
        <p class="includedet">Selected Model , Sub Problem and Price</p><br>

        <table class="table">
            <tr>
                <th>Select Mobile Model</th>
                <th>Select Sub Problem</th>
                <th>Enter Pricing Details</th>
            </tr>
            <tr>
                <td>
                    <select name="models1" id="models1">
                        <option id="selectedmodel" value="<?php echo $mm_id; ?>"><?php echo $mm_name; ?></option>
                    </select>
                </td>
                <td>
                    <select name="subproblems1" id="subproblems1">
                        <option id="selectedsubproblem" value="<?php echo $subproblem_code; ?>"><?php echo $sub_problem; ?></option>
                    </select>
                </td>
                <td>
                    <input type="text" id="price1" name="price1" value="<?php echo $price; ?>">
                </td>
            </tr>
        </table>
        
        
        
        <div id="padetails"> </div>

        <button class="form-btn" id="update" name="update">Update</button>
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
        url:"api/getmodels.php",
        type:"POST",
        success:function(para)
        {
            para = JSON.parse(para)
            window.models = para
            for(let i=0;i<para.length;i++)
            {
                if(para[i][1] != $("#selectedmodel").val())
                {
                    var str = '<option value="'+para[i][1]+'">'+para[i][0]+'</option>'
                    $("#models1").append(str)
                }
            }
        }
    })

    $.ajax({
        url:"api/getsubproblems.php",
        type:"POST",
        success:function(para)
        {
            para = JSON.parse(para)
            window.subproblems = para
            for(let i=0;i<para.length;i++)
            {
                if(para[i][1] != $("#selectedsubproblem").val())
                {
                    var str = '<option value="'+para[i][1]+'">'+para[i][0]+'</option>'
                    $("#subproblems1").append(str)
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

    
    $mmid = $_POST['models1'];
    $subproblem_code = $_POST['subproblems1'];
    $price = $_POST['price1'];

    $paid = $_GET['edit_allocation'];

    $update_pa = "update pricing_allocation set mmid = ".$mmid." , subproblem_code = ".$subproblem_code." , price = '".$price."' where paid = ".$paid;
    // $update_mm = "update mobilemodel set mcid = ".$com." where mmid = ".$mmid;
    // $update_mm = "update mobilemodel set mmname = '".$mmname."' where mmid = ".$mmid;

    
    $run_pa = mysqli_query($con,$update_pa);
    
    if($run_pa){
    
    echo "<script> alert('Pricing Allocation has been updated successfully') </script>";
    
    echo "<script>window.open('index.php?view_allocation','_self')</script>";
    
}

}

?>

<?php } ?>
