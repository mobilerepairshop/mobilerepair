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



<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

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
if(isset($_GET['user_delete'])){

    include("user_delete.php");
    
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

if(isset($_GET['view_requests'])){

include("view_requests.php");

}
if(isset($_GET['delete_problems'])){

include("delete_problems.php");

}

if(isset($_GET['edit_problems'])){

include("edit_problems.php");

}
    
if(isset($_GET['insert_problems'])){

include("insert_problems.php");

}

if(isset($_GET['view_problems'])){

include("view_problems.php");

}

if(isset($_GET['delete_carousel'])){

    include("delete_carousel.php");
    
    }
    
    if(isset($_GET['edit_carousel'])){
    
    include("edit_carousel.php");
    
    }
        
    if(isset($_GET['insert_carousel'])){
    
    include("insert_carousel.php");
    
    }
    
    if(isset($_GET['view_carousel'])){
    
    include("view_carousel.php");
    
    }


if(isset($_GET['delete_subproblems'])){

include("delete_subproblems.php");

}

if(isset($_GET['edit_subproblems'])){

include("edit_subproblems.php");

}
    
if(isset($_GET['insert_subproblems'])){

include("insert_subproblems.php");

}

if(isset($_GET['view_subproblems'])){

include("view_subproblems.php");

}

if(isset($_GET['delete_allocation'])){

include("delete_allocation.php");

}

if(isset($_GET['edit_allocation'])){

include("edit_allocation.php");

}
    
if(isset($_GET['insert_allocation'])){

include("insert_allocation.php");

}

if(isset($_GET['view_allocation'])){

include("view_allocation.php");

}

if(isset($_GET['view_enquiries'])){

include("view_enquiries.html");

}
if(isset($_GET['track_enquiries'])){

include("track.php");

}
if(isset($_GET['insert_user'])){

include("insert_user.php");

}
if(isset($_GET['view_users'])){

include("view_users.php");

}
if(isset($_GET['chat_response'])){

include("chat_response.php");

}
if(isset($_GET['contact_response'])){

    include("contact_response.php");
    
}

if(isset($_GET['view_history'])){

include("history.html");
    
}

if(isset($_GET['view_cancelled'])){

include("cancelled.html");
    
}

if(isset($_GET['insert_city'])){

    include("insert_city.php");
        
}

if(isset($_GET['view_city'])){

    include("view_city.php");
        
}
if(isset($_GET['delete_city'])){

    include("delete_city.php");
        
}
if(isset($_GET['edit_city'])){

    include("edit_city.php");
        
}

if(isset($_GET['insert_pincode'])){

    include("insert_pincode.php");
        
}

if(isset($_GET['view_pincode'])){

    include("view_pincode.php");
        
}

if(isset($_GET['delete_pincode'])){

    include("delete_pincode.php");
        
}
if(isset($_GET['edit_pincode'])){

    include("edit_pincode.php");
        
}

if(isset($_GET['view_customers'])){

    include("view_customers.php");
        
}

?>

</div><!-- container-fluid Ends -->

</div><!-- page-wrapper Ends -->

</div><!-- wrapper Ends -->



</body>


</html>

<?php } ?>