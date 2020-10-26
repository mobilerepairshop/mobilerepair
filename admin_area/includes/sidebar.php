<?php


if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<nav class="navbar navbar-inverse navbar-fixed-top" ><!-- navbar navbar-inverse navbar-fixed-top Starts -->

<div class="navbar-header" ><!-- navbar-header Starts -->

<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- navbar-ex1-collapse Starts -->


<span class="sr-only" >Toggle Navigation</span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>

<span class="icon-bar" ></span>


</button><!-- navbar-ex1-collapse Ends -->

<a class="navbar-brand" href="index.php?dashboard" >Admin Panel</a>


</div><!-- navbar-header Ends -->

<ul class="nav navbar-right top-nav" ><!-- nav navbar-right top-nav Starts -->

<li class="dropdown" ><!-- dropdown Starts -->

<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><!-- dropdown-toggle Starts -->

<i class="fa fa-user" ></i>

<?php echo $admin_name; ?> <b class="caret" ></b>


</a><!-- dropdown-toggle Ends -->

<ul class="dropdown-menu" ><!-- dropdown-menu Starts -->

<li><!-- li Starts -->

<a href="index.php?user_profile=<?php echo $admin_id; ?>" >

<i class="fa fa-fw fa-user" ></i> Profile


</a>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="index.php?view_products" >

<i class="fa fa-fw fa-envelope" ></i> Products 

<span class="badge" ><?php echo $count_products; ?></span>


</a>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="index.php?view_customers" >

<i class="fa fa-fw fa-gear" ></i> Customers

<span class="badge" ><?php echo $count_customers; ?></span>


</a>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="index.php?view_p_cats" >

<i class="fa fa-fw fa-gear" ></i> Product Categories

<span class="badge" ><?php echo $count_p_categories; ?></span>


</a>

</li><!-- li Ends -->

<li class="divider"></li>

<li><!-- li Starts -->

<a href="./logout.php">

<i class="fa fa-fw fa-power-off"> </i> Logout

</a>

</li><!-- li Ends -->

</ul><!-- dropdown-menu Ends -->




</li><!-- dropdown Ends -->


</ul><!-- nav navbar-right top-nav Ends -->

<div class="collapse navbar-collapse navbar-ex1-collapse"><!-- collapse navbar-collapse navbar-ex1-collapse Starts -->

<ul class="nav navbar-nav side-nav"><!-- nav navbar-nav side-nav Starts -->

<li><!-- li Starts -->

<a href="index.php?dashboard">

<i class="fa fa-fw fa-dashboard"></i> Dashboard

</a>

</li><!-- li Ends -->

<li><!-- Companies li Starts -->

<a href="#" data-toggle="collapse" data-target="#companies">

<i class="fa fa-fw fa-table"></i> Mobile Companies

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="companies" class="collapse">

<li>
<a href="index.php?insert_mcompanies"> Insert Mobile Companies </a>
</li>

<li>
<a href="index.php?view_mcompanies"> View Mobile Companies </a>
</li>

</ul>

</li><!-- companies li Ends -->


<li><!-- Models li Starts -->

<a href="#" data-toggle="collapse" data-target="#models">

<i class="fa fa-fw fa-table"></i> Mobile Models

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="models" class="collapse">

<li>
<a href="index.php?insert_mmodels"> Insert Mobile Models </a>
</li>

<li>
<a href="index.php?view_mmodels"> View Mobile Models </a>
</li>

</ul>

</li><!-- Models li Ends -->


<li><!-- Pincode li Starts -->

<a href="#" data-toggle="collapse" data-target="#pincodes">

<i class="fa fa-fw fa-table"></i> Available Pincodes

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="pincodes" class="collapse">

<li>
<a href="index.php?insert_pincodes"> Insert New Pincode </a>
</li>

<li>
<a href="index.php?view_pincodes"> View Available Pincodes </a>
</li>

</ul>

</li><!-- Pincode li Ends -->


<li><!-- Requests li Starts -->

<a href="index.php?view_requests" data-target="#requests">

<i class="fa fa-fw fa-table"></i> Problem Requests

</a>

</li><!-- Requests li Ends -->


<li><!-- li Starts -->

<a href="./logout.php">

<i class="fa fa-fw fa-power-off"></i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- nav navbar-nav side-nav Ends -->

</div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

</nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php } ?>