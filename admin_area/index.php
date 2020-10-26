<?php

session_start();
error_reporting(0);
include("includes/db.php");

if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {




?>

<?php

$admin_session = $_COOKIE['sid'];

$get_admin = 'SELECT * FROM admins 
              INNER JOIN session_admin ON admins.admin_id=session_admin.uid
              WHERE session_admin.sesid='.$admin_session;

$run_admin = mysqli_query($con,$get_admin);

$row_admin = mysqli_fetch_array($run_admin);

$admin_id = $row_admin['admin_id'];

$admin_name = $row_admin['admin_name'];

$admin_email = $row_admin['admin_email'];

$admin_image = $row_admin['admin_image'];

$admin_contact = $row_admin['admin_contact'];

?>


<!DOCTYPE html>
<html>

<head>

<title>Admin Panel</title>

<link href="css/bootstrap.min.css" rel="stylesheet">

<link href="css/style.css" rel="stylesheet">

<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" >
<link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/2484/9148/files/SDQSDSQ_32x32.png?v=1511436147" type="image/png">
<link rel="stylesheet" href="../public/css/forms.css">

</head>

<body>

<div id="wrapper"><!-- wrapper Starts -->

<?php include("includes/sidebar.php");  ?>

<div id="page-wrapper"><!-- page-wrapper Starts -->

<div class="container-fluid"><!-- container-fluid Starts -->

<?php

if(isset($_GET['dashboard'])){

include("dashboard.php");

}

if(isset($_GET['user_profile'])){

include("user_profile.php");

}    

if(isset($_GET['view_mcompanies'])){

include("view_mcompanies.php");

}

if(isset($_GET['delete_mcompanies'])){

include("delete_mcompanies.php");

}

if(isset($_GET['edit_mcompanies'])){

include("edit_mcompanies.php");

}

if(isset($_GET['insert_mcompanies'])){

include("insert_mcompanies.php");

}

if(isset($_GET['view_mmodels'])){

include("view_mmodels.php");

}

if(isset($_GET['delete_mmodels'])){

include("delete_mmodels.php");

}

if(isset($_GET['edit_mmodels'])){

include("edit_mmodels.php");

}

if(isset($_GET['insert_mmodels'])){

include("insert_mmodels.php");

}

if(isset($_GET['view_pincodes'])){

include("view_pincodes.php");

}

if(isset($_GET['delete_pincodes'])){

include("delete_pincodes.php");

}

if(isset($_GET['edit_pincodes'])){

include("edit_pincodes.php");

}
    
if(isset($_GET['insert_pincodes'])){

include("insert_pincodes.php");

}
?>

</div><!-- container-fluid Ends -->

</div><!-- page-wrapper Ends -->

</div><!-- wrapper Ends -->

<script src="js/jquery.min.js"></script>


<script src="js/bootstrap.min.js"></script>


</body>


</html>

<?php } ?>