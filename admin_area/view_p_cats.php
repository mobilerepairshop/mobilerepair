<?php

if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {

?>


<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View Products Categories

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row"><!-- 2 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"> </i> View Products Categories

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->

<div class="panel-body"><!-- panel-body Starts -->

<div class="table-responsive"><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Product Category Id</th>
<th>Product Category Title</th>
<th>Product Sub-Categories</th>

</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php
$categories = array(
    'property'=>'Properties',
    'vehicle4'=>'Vehicles (Four Wheelers & More)',
    'vehicle2'=>'Vehicles (Two Wheelers)',
    'electronics'=>'Electronics',
    'fashion'=>'Fashion',
    'services'=>'Services',
    );

    $subcategories = array(
        'saleh'=>'Sale:Houses & Apartment',
        'renth'=>'Rent:Houses & Apartment',
        'sales'=>'Sale:Shops & Offices',
        'rents'=>'Rent:Shops & Offices',
        'cars'=>'Cars',
        'otherv'=>'Other Vehicles',
        'spare4'=>'Spare Parts',
        'bikes'=>'Bikes',
        'bicycle'=>'Bicycle',
        'spare2'=>'Spare Parts',
        'computer'=>'Computer & Laptops',
        'games'=>'Games & Entertainment',
        'camera'=>'Cameras & Lenses',
        'men'=>'Men',
        'women'=>'Women',
        's-electronics'=>'Electronics & Computers',
        's-education'=>'Education & Classes',
        's-drivers'=>'Drivers & Taxi',
        's-health'=>'Health & Beauty',
        's-others'=>'Other Services'
        );
    
$get_p_cats = "SELECT cid, cname FROM cat GROUP BY cid";

$run_p_cats = mysqli_query($con,$get_p_cats);

while($row_p_cats = mysqli_fetch_array($run_p_cats)){

$p_cat_id = $row_p_cats['cid'];

$p_cat_title = $categories[$row_p_cats['cname']];

?>

<tr>

<td> <?php echo $p_cat_id; ?> </td>

<td> <?php echo $p_cat_title; ?> </td>


<td> 

<table class="table table-bordered table-hover table-striped">

<?php

$get_p_scats = "SELECT scname FROM scat WHERE cid=".$p_cat_id;

$run_p_scats = mysqli_query($con,$get_p_scats);

while($row_p_scats = mysqli_fetch_array($run_p_scats)){

$p_scat_title = $row_p_scats['scname'];

?>

<tr>
    <td><?php echo $subcategories[$p_scat_title]; ?></td>
</tr>

<?php
}
?>
</table>

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



<?php } ?>