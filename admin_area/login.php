<?php

session_start();

include("includes/db.php");

?>
<!DOCTYPE HTML>
<html>

<head>

<title>Admin Login</title>

<link rel="stylesheet" href="css/bootstrap.min.css" >

<link rel="stylesheet" href="css/login.css" >
<style>
.footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   background-color: black;
   color: white;
   text-align: center;
   height:3vw;
}
</style>
</head>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="font-size:25px;color:white">Mobile Repair</a>
    </div>
    <ul class="nav navbar-nav" style="float:right;">
      <li class="active"><a href="../index2.html" style="font-size:25px;">Home</a></li>
    </ul>
  </div>
</nav>
<body>

<div class="container box" style="background-color:white;width:26%;height:23vw;border-radius:2%;box-shadow: 0 1px 0px 0px rgba(0, 0, 0.09, 0.09) ;margin-top:8%;" ><!-- container Starts -->
  <div id="loginBox">
    <form class="form-login" action="" method="post"  ><!-- form-login Starts -->
    <h2 class="form-login-heading" >Admin Login</h2>
    <input type="text" class="form-control" name="admin_email" placeholder="Email Address" required >
    <input type="password" class="form-control" name="admin_pass" placeholder="Password" required >
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login" >
        Log in
    </button>
    <br>
    <center><a href="javascript: showForm('reset');" style="color: #0078ff;">Forgot Password? Reset</a></center>
    </form><!-- form-login Ends -->
</div>


</div><!-- container Ends -->

<div class="footer">
  <p style="padding-top:1%;">Copyright @Mobile Repair</p>
</div>


<!-- Forgot password form -->

              <div class="content resetBox" id="resetBox" style="display:none;">
                <div class="form">
                  <form method="" html="{:multipart=>true}" data-remote="true" action="" accept-charset="UTF-8">
                    <h2 class="form-login-heading" >Admin Login</h2>
                    <input id="userreset" class="form-control" type="text" placeholder="Email/Mobile Number" name="userreset"><br>
                    <input class="btn btn-lg btn-primary btn-block" id="otp" type="button" value="Send OTP" name="commit" onclick="resetAjax()">
                  </form>
                  <br>
                  <center><a href="javascript: showForm('login');" style="color: #0078ff;">Login</a></center>

                </div>
              </div>
           
        
            <div class="content otpBox" id="otpBox" style="display:none;">
              <div class="form">
                <form method="" html="{:multipart=>true}" data-remote="true" action="" accept-charset="UTF-8">
                <h2 class="form-login-heading" >Admin Login</h2>
                <p id="successsnote" style="display:none;"></p>
                  <input id="enterotp" class="form-control" type="text" placeholder="Enter OTP" name="userreset">
                  <br>
                  <input class="btn btn-lg btn-primary btn-block" id="otpc" type="button" value="Confirm OTP" name="commit" onclick="resetotp()">
                </form>
                <br>
                  <center><a href="javascript: showForm('otpbox');" style="color: #0078ff;">Login</a></center>

              </div>
            </div>
        
            <div class="content otppassword" style="display:none;">
              <div class="form">
                <form method="" html="{:multipart=>true}" data-remote="true" action="" accept-charset="UTF-8">
                  <input id="user" class="form-control" type="text" placeholder="Email/Mobile Number" name="user">
                  <input id="passwordotp" class="form-control" type="password" placeholder="Password" name="passwordotp">
                  <input id="password_confirmationotp" class="form-control" type="password" placeholder="Repeat Password" name="password_confirmationotp">
                  <p id="errnote" style="display:none;"></p>
                  <input class="btn btn-default btn-register" type="button" value="Confirm Password" name="commit" onclick="resetpassword()">
                </form>
              </div>
            </div>
         
<!-- Forgot password end -->


</body>
<script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../lib/popper/popper.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
</html>
<script>

function showForm(type)
{
    if(type=='login')
    {
        console.log(type)
        form = document.getElementById("loginBox");
        document.getElementById("loginBox").style.display = "block";
        document.getElementById("resetBox").style.display = "none";
        $('.box').append(form);
    }
    else if(type=='reset')
    {
        form = document.getElementById("resetBox");
        document.getElementById("loginBox").style.display = "none";
        document.getElementById("resetBox").style.display = "block";
        $('.box').append(form);
    }
    else if(type=='otpbox')
    {
        console.log(type)
        form = document.getElementById("loginBox");
        document.getElementById("loginBox").style.display = "block";
        document.getElementById("otpBox").style.display = "none";
        $('.box').append(form);
    }
   
}
function resetpassword()
{
        user = String($('#user').val());
        pwd = String($('#passwordotp').val());
        pwdcnf = String($('#password_confirmationotp').val());
        if(pwd==pwdcnf)
        {
              if(user.split("_").length == 3 && user.split("_")[1] == "admin" && !isNaN(user.split("_")[2]))
              {
                role = "admin"
              }
              else
              {
                role = "user"
              }
              $.ajax({
                url:'../api/resetpassword.php',
                type:'POST',
                data:{
                  'username':user,
                  'pwd':pwd,
                  'role':role
                },
                success:function(para)
                {
                    console.log("This is - ",para)
                    if(para=='200')
                    {
                      alertdata("Updated Successfully","")
                      $('#alert').modal({backdrop: 'static', keyboard: false})
                      $('#alert').modal('show')
                      $("#modalclose").click(function() {
                        window.location.replace("./index2.html");   
                      });  
                    }
                    else
                    {
                      shakeModal(); 
                    }
                }
            })
        }
        else
        {
          $("#errornote").text("Password does not matach")
          $("#errornote").css('color','red')
        }

        
}

function resetAjax()

{
        var username = $('#userreset').val();
              $.ajax({
                url:'../api/reset.php',
                type:'POST',
                data:{
                  'username':username
                },
                success:function(para)
                {
                    $('.resetBox').hide();
                    form = document.getElementById("otpBox");
                    $('.box').append(form)
                    document.getElementById("otpBox").style.display = "block";
                  $('.error').removeClass('alert alert-danger').html('');

                  $("#otp").hide()
                  $("#successsnote").show()
                
                  $("#successsnote").text("OTP sent successfully to registerd email/mobile number")
                  $("#successsnote").css('color','green')
                }
            })   
}
function resetotp()
{
    $('.otpBox').fadeOut('fast',function(){
    $('.otppassword').fadeIn('fast');
    $('.login-footer').fadeOut('fast',function(){
    $('.register-footer').fadeIn('fast');
    });
    $('.modal-title').html('Register with');
    }); 
    $('.error').removeClass('alert alert-danger').html('');    
}
</script>
<?php

// if(isset($_POST['admin_login'])){

// $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);

// $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);

// $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";

// $run_admin = mysqli_query($con,$get_admin);

// $count = mysqli_num_rows($run_admin);

// if($count==1){

// $_SESSION['admin_email']=$admin_email;

// echo "<script>alert('You are Logged in into admin panel')</script>";

// echo "<script>window.open('index.php?dashboard','_self')</script>";

// }
// else {

// echo "<script>alert('Email or Password is Wrong')</script>";

// }

// }


    error_reporting(0);
    require('../database/sqlconnection.php');
    require('./controllers/UserAuth.php');

    $success = $database->connect_db();

    if($success == '200')
    {
        if(isset($_POST['admin_login'])){
      
            if (isset($_POST['admin_email'])) 
            {
                $email = $database->sanitize($_REQUEST['admin_email']);    // removes backslashes
                $pwd = $database->sanitize($_REQUEST['admin_pass']);
                $conn = $database->get_db();
                $auth = new UserAuth($conn);
                $result = $auth->checkValidUser($email,$pwd);
                
                if($result[0]=='200')
                {   
                    $res = $auth->registerSession($result[1]);
                    $r = explode(",",$res);
                    if($r[0]=='200')
                    {
                        echo "<script>alert('You are Logged in into admin panel')</script>";

                        echo "<script>window.open('./abc.php?sesid=".$r[1]."','_self')</script>";
                    }
                    else
                    {
                        echo "<script>alert('Email or Password is Wrong')</script>";
                    }
                }
                else
                {
                    echo "<script>alert('Email or Password is Wrong')</script>";
                }

            }
            else
            {
                echo '111111400';
            }
    }
}
    else
    {
        echo "<script>alert('Not Connected')</script>";
    }




?>