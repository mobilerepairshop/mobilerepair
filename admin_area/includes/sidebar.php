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

<b id="username"></b>


</a><!-- dropdown-toggle Ends -->

<ul class="dropdown-menu" ><!-- dropdown-menu Starts -->

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

<li id="div0"><!-- li Starts -->

<a href="index.php?dashboard">

<i class="fa fa-fw fa-dashboard"></i> Dashboard

</a>

</li><!-- li Ends -->


<li id="div1"><!-- li Starts -->

<a href="#" data-toggle="collapse" data-target="#users">

<i class="fa fa-user"></i>  Users

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="users" class="collapse">

<li>
<a href="index.php?insert_user"> Insert User </a>
</li>

<li>
<a href="index.php?view_users"> View Users </a>
</li>

</ul>

</li><!-- li Ends -->
<li id="div2"><!-- Companies li Starts -->

<a href="#" data-toggle="collapse" data-target="#companies">

<i class="fa fa-mobile-phone" style="font-size:25px"></i> Mobile Companies

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


<li id="div3"><!-- Models li Starts -->

<a href="#" data-toggle="collapse" data-target="#models">

<i class="fa fa-mobile-phone" style="font-size:25px"></i> Mobile Models

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


<li id="div4"><!-- city li Starts -->

<a href="#" data-toggle="collapse" data-target="#city">

<i class="fa fa-building-o" ></i> Manage Cities

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="city" class="collapse">

<li>
<a href="index.php?insert_city"> Insert City </a>
</li>

<li>
<a href="index.php?view_city"> View Cities </a>
</li>

</ul>

</li><!-- city li Ends -->

<li id="div5"><!-- city li Starts -->

<a href="#" data-toggle="collapse" data-target="#pincode">

<i class="fa fa-map-marker" style="font-size:20px" ></i> Manage Pincodes

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="pincode" class="collapse">

<li>
<a href="index.php?insert_pincode"> Insert Pincode </a>
</li>

<li>
<a href="index.php?view_pincode"> View Pincode  </a>
</li>

</ul>

</li><!-- city li Ends -->

<li id="div6"><!-- Problems li Starts -->

<a href="#" data-toggle="collapse" data-target="#problems">

<i class="fa fa-fw fa-table"></i> Main Problems

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="problems" class="collapse">

<li>
<a href="index.php?insert_problems"> Insert Main Problems </a>
</li>

<li>
<a href="index.php?view_problems"> View Main Problems </a>
</li>

</ul>

</li><!-- Problems li Ends -->

<li id="div7"><!-- Subproblems li Starts -->

<a href="#" data-toggle="collapse" data-target="#subproblems">

<i class="fa fa-fw fa-table"></i> Sub Problems

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="subproblems" class="collapse">

<li>
<a href="index.php?insert_subproblems"> Insert Sub Problems </a>
</li>

<li>
<a href="index.php?view_subproblems"> View Sub Problems </a>
</li>

</ul>

</li><!-- Subproblems li Ends -->


<li id="div8"><!-- Allocation li Starts -->

<a href="#" data-toggle="collapse" data-target="#allocation">

<i class="fa fa-inr"></i> Pricing Allocation

<i class="fa fa-fw fa-caret-down"></i>

</a>

<ul id="allocation" class="collapse">

<li>
<a href="index.php?insert_allocation"> New Pricing Allocation </a>
</li>

<li>
<a href="index.php?view_allocation"> View Pricing Allocations </a>
</li>

</ul>

</li><!-- Allocation li Ends -->

<li id="div9"><!-- li Starts -->

<a href="#" data-toggle="collapse" data-target="#enquiries">

<i class="fa fa-envelope-o"></i> Active Enquiries 

<i class="fa fa-fw fa-caret-down"></i>

</a>

<ul id="enquiries" class="collapse">

<li>
<a href="index.php?view_enquiries"> View Enquiries </a>
</li>

<li>
<a href="index.php?track_enquiries"> Track Enquiries </a>
</li>

</ul>

</li><!-- li Ends -->

<li id="div10"><!-- li Starts -->

<a href="index.php?view_history" data-toggle="collapse" data-target="#history">

<i class="fa fa-envelope-o"></i> View History 

</a>

</li><!-- li Ends -->

<li id="div11"><!-- li Starts -->

<a href="index.php?view_cancelled" data-toggle="collapse" data-target="#cancelled">

<i class="fa fa-envelope-o"></i> View Cancelled Requests 

</a>

</li><!-- li Ends -->

<li id="div12"><!-- Requests li Starts -->

<a href="index.php?chat_response">

<i class="fa fa-fw fa-table"></i> Chat Response

</a>

</li><!-- Requests li Ends -->

<li id="div13"><!-- Requests li Starts -->

<a href="index.php?contact_response">

<i class="fa fa-fw fa-table"></i> Contact Us Response

</a>

</li><!-- Requests li Ends -->


<li id="div14"><!-- Carousel li Starts -->

<a href="#" data-toggle="collapse" data-target="#carousel">

<i class="fa fa-fw fa-table"></i> Carousel Images

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="carousel" class="collapse">

<li>
<a href="index.php?insert_carousel"> Insert Carousel Images </a>
</li>

<li>
<a href="index.php?view_carousel"> View Carousel Images </a>
</li>

</ul>

</li><!-- Carousel li Ends -->

<li id="div15"><!-- li Starts -->

<a href="index.php?view_customers" data-toggle="collapse" data-target="#customers">

<i class="fa fa-user"></i> View Customers 

</a>

</li><!-- li Ends -->


<li id="div16"><!-- li Starts -->

<a href="#" data-toggle="collapse" data-target="#contactus">

<i class="fa fa-user"></i>  Contact Locations

<i class="fa fa-fw fa-caret-down"></i>


</a>

<ul id="contactus" class="collapse">

<li>
<a href="index.php?insert_locations"> Insert Loations </a>
</li>

<li>
<a href="index.php?view_locations"> View Locations </a>
</li>

</ul>

</li><!-- li Ends -->

<li><!-- li Starts -->

<a href="./logout.php">

<i class="fa fa-fw fa-power-off"></i> Log Out

</a>

</li><!-- li Ends -->

</ul><!-- nav navbar-nav side-nav Ends -->

</div><!-- collapse navbar-collapse navbar-ex1-collapse Ends -->

</nav><!-- navbar navbar-inverse navbar-fixed-top Ends -->

<?php } ?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
$(document).ready(function(){
    
    $.ajax({
        url:"./api/getrights.php",
        type:"POST",
        success:function(para)
        {
            para = JSON.parse(para)
            newpara = para[1].split(",")
            console.log(newpara)

            $("#username").html(para[0])
            for(let i=0;i<=16;i++)
            {
                i = i.toString()
                if(!(newpara.includes(i)))
                {
                    console.log("nahi hai : "+i)
                    $("#div"+i).hide()
                }
                else
                {
                    console.log(i)
                }
            }
        }
    })
})
</script>