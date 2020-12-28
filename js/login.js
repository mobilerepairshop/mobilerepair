function editprofile(id)
{
  $.ajax({
    url:'./api/getprofiledata.php',
    type:'POST',
    data:{
      'uid':id,
      'sid':sid
    },
    success:function(para)
    {
      para = JSON.parse(para)
      $('[name="updateprofile"]').attr("id", para[0].uid);
      $("#user_fullname").val(para[0].fullname)
      $("#edit_title").html("Login ID: "+para[0].loginid)
      $("#user_mobile").val(para[0].contact)
      $("#user_address").val(para[0].address)
    }
  })  
}


function alertdata(data,title)
{
  $("#alerttitle").empty()
  $("#alertcontent").empty()
  $("#alerttitle").append(title)
  $("#alertcontent").append(data)
}




function updateprofile(id)
{
  $.ajax({
    url:'./api/updateprofiledata.php',
    type:'POST',
    data:{
      'uid':id,
      'fullname':$("#user_fullname").val(),
      'mobile':$("#user_mobile").val(),
      'address':$("#user_address").val(),
      'sid':sid
    },
    success:function(para)
    {
      if(para == "200")
      {
        $('#editprofile').modal('hide')
        alertdata("Information Updated Successfully","Update Status")
        $('#alert').modal({backdrop: 'static', keyboard: false})
        $('#alert').modal('show')
        $("#modalclose").click(function() {
          window.location.reload()
        });
      }
      else
      {
        alertdata(para)
        $('#alert').modal('show')
      }
    }
  })  
}

var firebaseConfig = {
    apiKey: "AIzaSyDyQhgM0Q5UUIt-MbIIDzPpbpLVudkmKK4",
    authDomain: "hopeful-summer-292810.firebaseapp.com",
    databaseURL: "https://hopeful-summer-292810.firebaseio.com",
    projectId: "hopeful-summer-292810",
    storageBucket: "hopeful-summer-292810.appspot.com",
    messagingSenderId: "411937557386",
    appId: "1:411937557386:web:838b8dd854ca6d9a165673"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  function fbSignin()
  {
    const provider =  new firebase.auth.FacebookAuthProvider();
    provider.setCustomParameters({
      prompt: 'select_account',
      display: 'popup'

    }); 
    firebase.auth().signInWithPopup(provider).then(function(result) {
      // This gives you a Facebook Access Token. You can use it to access the Facebook API.
      var token = result.credential.accessToken;
      // The signed-in user info.
      var user = result.user;
      console.log(user)
      // ...
    }).catch(function(error) {
      // Handle Errors here.
      var errorCode = error.code;
      var errorMessage = error.message;
      // The email of the user's account used.
      var email = error.email;
      // The firebase.auth.AuthCredential type that was used.
      var credential = error.credential;
      // ...
    });

  }
  function googleSignin(){
    var provider = new firebase.auth.GoogleAuthProvider();
    provider.setCustomParameters({
      prompt: 'select_account'
    });
    firebase.auth().signInWithPopup(provider).then
    (
      function(result) 
      {
        console.log("Google linked")
        console.log(result.additionalUserInfo.profile.email)
        id = result.id;
        // Ajax Google sign in
            $.ajax({
                url:'./login/api/login.php',
                type:'POST',
                data:{
                  'email':result.additionalUserInfo.profile.email,
                  'pwd':result.additionalUserInfo.profile.id,
                  'username':result.additionalUserInfo.profile.name,
                  'authtype':'google',
                  'role':'user'
                },
                success:function(para)
                {
                    console.log("This is - ",para)
                    para = JSON.parse(para)
                    if(para=='200')
                    {
                      $('#loginModal').modal('hide')
                      console.log("Successfully Registered")
                      window.location.replace("./index2.html")
                    }
                    else
                    {
                      shakeModal(); 
                    }
                }
            })

      }
   )

  }

  
  function getCookie(name) {
    // Split cookie string and get all individual name=value pairs in an array
    var cookieArr = document.cookie.split(";");
    
    // Loop through the array elements
    for(var i = 0; i < cookieArr.length; i++) {
        var cookiePair = cookieArr[i].split("=");
        
        /* Removing whitespace at the beginning of the cookie name
        and compare it with the given string */
        if(name == cookiePair[0].trim()) {
            // Decode the cookie value and return
            return decodeURIComponent(cookiePair[1]);
        }
    }
    
    // Return null if not found
    return null;
}

firebase.auth().onAuthStateChanged(function(user) {
    console.log(user)
  if (user) {
    console.log("User Signed in")
    // name = user.displayName;
    // email = user.email;
    // photoUrl = user.photoURL;
    // $("#login_button").hide()
    // $("#name").html(name)
  } else {
    console.log("User Signed out")
    // $("#login_button").show()
    // $("#username").hide()

  }
});
// firebase.auth().signOut()
function signout()
{
  var user = firebase.auth().currentUser;
  if(user)
  {
      firebase.auth().signOut().then(function() {
        console.log("SIgnout success")
        $.ajax({
            url:'./login/api/logout.php',
            type:'POST',
            success:function(para)
            {
                console.log(para)
                if(para=='200')
                {
                  console.log("Successfully Logged Out")
                  window.location.replace("./index2.html");   
                }
                else
                {
                  alertdata("Cannot Logout","Login Status")
                  $('#alert').modal({backdrop: 'static', keyboard: false})
                  $('#alert').modal('show')
                }
            }
        })



      }).catch(function(error) {
        // An error happened.
      });
  }
  else
  {
    $.ajax({
            url:'./login/api/logout.php',
            type:'POST',
            success:function(para)
            {
                console.log(para)
                if(para=='200')
                {
                  console.log("Successfully Logged Out")
                  window.location.replace("./index2.html");
                }
                else
                {
                  alertdata("Cannot Logout","Login Status")
                  $('#alert').modal({backdrop: 'static', keyboard: false})
                  $('#alert').modal('show')
                }
            }
        })
  }
  

}


function checkpasswordmatch(){
    pwd = String($('#passwordreg').val())   
    confpwd = String($('#password_confirmationreg').val());
    if(pwd==confpwd && pwd != "" && confpwd != "")
    {
      $("#errornote").show()
      $("#errornote").text("Password match")
      $("#errornote").css('color','green')
    }
    else
    {
      $("#errornote").show()
      $("#errornote").text("Password does not matach")
      $("#errornote").css('color','red')
    }
    
  };

  function openLoginModal(){
    showLoginForm();
    setTimeout(function(){
        $('#loginModal').modal('show');    
    }, 230);
    
}
function showRegisterForm(){
    $('.loginBox').fadeOut('fast',function(){
        $('.registerBox').fadeIn('fast');
        $('.login-footer').fadeOut('fast',function(){
            $('.register-footer').fadeIn('fast');
        });
        $('.modal-title').html('Register with');
    }); 
    $('.error').removeClass('alert alert-danger').html('');
       
}


function showResetForm(){
    $('.loginBox').fadeOut('fast',function(){
        $('.resetBox').fadeIn('fast');
        $('.login-footer').fadeOut('fast',function(){
            $('.register-footer').fadeIn('fast');
           
        });
        $('.modal-title').html('Register with');
    }); 
    $('.error').removeClass('alert alert-danger').html('');
       
}

function showLoginForm(){
    $('#loginModal .registerBox').fadeOut('fast',function(){
      $('.resetBox').fadeOut('fast');
        $('.loginBox').fadeIn('fast');
        $('.register-footer').fadeOut('fast',function(){
            $('.login-footer').fadeIn('fast');    
        });
        
        $('.modal-title').html('<button type="button" class="close" data-dismiss="modal" style="float:right;">&times;</button><br>Login to your account');
    });       
     $('.error').removeClass('alert alert-danger').html(''); 
}


function registerAjax()
{
  if(window.userexist == 0)
  {
    if($('#userreg').val() != "" && $('#emailreg').val() != "" && $('#passwordreg').val() != "" && $('#password_confirmationreg').val() != "" && $('#termsconditions').prop("checked"))
    {
        username = $('#userreg').val();
        email = $('#emailreg').val();
        pwd = String($('#passwordreg').val());
        pwdcnf = String($('#password_confirmationreg').val());
        if(pwd==pwdcnf)
        {
              $.ajax({
                url:'./login/api/register.php',
                type:'POST',
                data:{
                  'username':username,
                  'email':email,
                  'pwd':pwd
                },
                success:function(para)
                {
                    console.log("This is - ",para)
                    if(para=='200')
                    {
                      $('#loginModal').modal('hide')
                      console.log("Registered Successfully")
                      window.location.replace("./index2.html");   
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
      else
      {
        alertdata("Please Fill and Check All the Fields","")
        $('#alert').modal('show')
      }
  }
  else
  {
    alertdata("Please Choose Different Email/Mobile Number","")
    $('#alert').modal('show')
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
                url:'api/resetpassword.php',
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
                url:'api/reset.php',
                type:'POST',
                data:{
                  'username':username
                },
                success:function(para)
                {
                  $('.resetBox').fadeOut('fast',function(){
                  $('.otpBox').fadeIn('fast');
                  $('.login-footer').fadeOut('fast',function(){
                  $('.register-footer').fadeIn('fast');
                  });
                  $('.modal-title').html('Register with');
                  }); 
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

function loginAjax(){

  email = $('#emaillog').val();
  pwd = $('#passwordlog').val();
  if(email.split("_").length == 3 && email.split("_")[1] == "admin" && !isNaN(email.split("_")[2]))
  {
    role = "admin"
  }
  else
  {
    role = "user"
  }
  $.ajax({
    url:'./login/api/login.php',
    type:'POST',
    data:{
      'email':email,
      'pwd':pwd,
      'authtype':'emailpass',
      'role':role
    },
    success:function(para)
    {
        console.log("This is - ",para)
        
        if(para=="200")
        {
            console.log("Successfully Loggedin")
            $("#login_button").hide()
            window.location.replace('./index2.html')
        }
        else
        {
          shakeModal(); 
        }
    }
  }) 
}
/*   Simulate error message from the server   */
    //  shakeModal();


function shakeModal(){
    $('#loginModal .modal-dialog').addClass('shake');
             $('.error').addClass('alert alert-danger').html("Invalid email/password combination");
             $('input[type="password"]').val('');
             setTimeout( function(){ 
                $('#loginModal .modal-dialog').removeClass('shake'); 
    }, 1000 ); 
}


var sid = getCookie("sid");
console.log(sid)
$.ajax({
      url:'./login/api/checksession.php',
      type:'POST',
      data:{'sid':sid},
      success:function(para)
      {
          console.log(para)
          para = JSON.parse(para)
          if(para[0]=='200')
          {
            $("#login_button").hide()
            // $(".botnavbar").css("display", "none")

            $("#username").html(para[1])
            $("#username").show()
            $('[name="editprofile"]').attr("id", para[2]);
            // check if user is admin
            if(para[1] == "Admin_User")
            {
              $(".botnavbar").css("display", "none")
              $("#blog").hide()
              $("#homenav").hide()
              $("#servicenav").hide()
              $("#contactnav").hide()
              $("#carouselExampleIndicators").hide()
              $("#work").hide()
              $("#info").hide()
              $("#client").hide()
              $("#contactform-user").hide()
              $("#leftnavpane").hide()
              $('[name="editprofile"]').hide();
              $('[name="dashboard"]').hide();
              
              $("#contactform-admin").css("display", "block");
              $.ajax({
                url:'./admin_area/api/view_assignments.php',
                type:'POST',
                data : {"sid":sid,"filter":"active"},
                success:function(para)
                {
                    para = JSON.parse(para)
                    console.log(para[0])

                    var str = ''
                    var status = ["","Picked Up","Dropped to Admin","","","","","","Dropped to user",""]
                    for(let i=0;i<para.length;i++)
                    {
                      var disable_button = para[i].status==1?"":"disabled"
                      var disable_drop = para[i].pay_status!="1"?"disabled":""
                      str += '<div class="form-comments"><div class="title-box-2"><h3 class="title-left">Task Number : '+(i+1)+'</h3></div><div class="form-mf"><div class="row"><div class="col-md-10"><table class="table table-responsive"><tbody id="taskdetails">'
                      str += '<tr><th>Customer Name </th><td>'+para[i].customer+'</td><th>Pickup Date </th><td>'+para[i].date+'</td></tr>'
                      str += '<tr><th>Mobile Company </th><td>'+para[i].mcompany+'</td><th>Pickup Time </th><td>'+para[i].time+'</td></tr>'
                      str += '<tr><th>Mobile Model </th><td>'+para[i].mmodel+'</td><th>Problems </th><td><a style="color:blue;" data-toggle="modal" data-target="#problem" onclick="getproblems_admin('+para[i].rid+')">Problems</a></td></tr>'
                      str += '<tr><th>Customer Address </th><td>'+para[i].address+'</td><th>Customer Contact </th><td><a href="tel:'+para[i].phonenum+'">'+para[i].phonenum+'</td></tr>'
                      if(para[i].delivery_status==1 && para[i].pay_method=="cod" && para[i].pay_status=="0")
                      {
                        str += '</tbody></table></div><div class="col-md-3"><br><button id="'+para[i].rid+'" class="button btn-success button-small " onclick="paid(this.id,'+para[i].status+')">Amount Paid</button></div><div class="col-md-4"><br><button id="'+para[i].rid+'" class="button btn-success button-small " onclick="pickedup(this.id,'+para[i].status+')" '+disable_drop+'>'+status[para[i].status]+'</button></div></div></div></div>'
                      }
                      else if(para[i].delivery_status==1 && para[i].pay_status=="1")
                      {
                        str += '</tbody></table></div><div class="col-md-4"><br><button id="'+para[i].rid+'" class="button btn-success button-small " onclick="pickedup(this.id,'+para[i].status+')">'+status[para[i].status]+'</button></div></div></div></div>'
                      }
                      else if(para[i].delivery_status==0 && para[i].status==1)
                      {
                        str += '</tbody></table></div><div class="col-md-4"><br><button id="'+para[i].rid+'" class="button btn-success button-small " data-toggle="modal" data-target="#verifyuserdelivery" data-backdrop="static" data-keyboard="false" onclick="SendOTPtoUser(this.id,'+para[i].status+')" name="sendotpbutton">Send OTP</button></div><div class="col-md-4"><br><button id="'+para[i].rid+'" class="button btn-success button-small " onclick="pickedup(this.id,'+para[i].status+')">'+status[para[i].status]+'</button></div><div class="col-md-4"><br><button id="'+para[i].rid+'" class="button btn-danger button-small " onclick="cancelled(this.id,'+para[i].status+')">Cancelled</button></div></div></div></div>'
                      }
                      else if(para[i].delivery_status==1 && para[i].status==8)
                      {
                        str += '</tbody></table></div><div class="col-md-4"><br><button id="'+para[i].rid+'" class="button btn-success button-small " data-toggle="modal" data-target="#verifyuserdelivery" data-backdrop="static" data-keyboard="false" onclick="SendOTPtoUser(this.id,'+para[i].status+')" name="sendotpbutton">Send OTP</button></div><div class="col-md-4"><br><button id="'+para[i].rid+'" class="button btn-success button-small " onclick="pickedup(this.id,'+para[i].status+')">'+status[para[i].status]+'</button></div></div></div></div>'
                      }
                      else
                      {
                        str += '</tbody></table></div><div class="col-md-4"><br><button id="'+para[i].rid+'" class="button btn-success button-small " onclick="pickedup(this.id,'+para[i].status+')">'+status[para[i].status]+'</button></div></div></div></div>'
                      }
                    }
                    $(".mycards").append(str) 
                }
              })
            }
          }
          else
          {
            $("#login_button").show()
            if($("#username").css('display','none'))
            {
              console.log('Hidden')
            }
            else
            {
              console.log('Not Hidden')
            }

          }
      }
      
  })

  function admin_filter(filter)
  {
    $('.btn-block').removeClass('clickedButton');
    $('#'+filter).addClass('clickedButton');
    $.ajax({
      url:'./admin_area/api/view_assignments.php',
      type:'POST',
      data : {"sid":sid,"filter":filter},
      success:function(para)
      {
          para = JSON.parse(para)
          console.log(para[0])

          $(".mycards").empty() 
          var str = ''
          var status = ["","Picked Up","Dropped to Admin","","","","","","Dropped to user",""]
          for(let i=0;i<para.length;i++)
          {
            var disable_button = para[i].status==1?"":"disabled"
            var disable_drop = para[i].pay_status!="1"?"disabled":""
            str += '<div class="form-comments"><div class="title-box-2"><h3 class="title-left">Task Number : '+(i+1)+'</h3></div><div class="form-mf"><div class="row"><div class="col-md-10"><table class="table table-responsive"><tbody id="taskdetails">'
            str += '<tr><th>Customer Name </th><td>'+para[i].customer+'</td><th>Pickup Date </th><td>'+para[i].date+'</td></tr>'
            str += '<tr><th>Mobile Company </th><td>'+para[i].mcompany+'</td><th>Pickup Time </th><td>'+para[i].time+'</td></tr>'
            str += '<tr><th>Mobile Model </th><td>'+para[i].mmodel+'</td><th>Problems </th><td><a style="color:blue;" data-toggle="modal" data-target="#problem" onclick="getproblems_admin('+para[i].rid+')">Problems</a></td></tr>'
            str += '<tr><th>Customer Address </th><td>'+para[i].address+'</td><th>Customer Contact </th><td><a href="tel:'+para[i].phonenum+'">'+para[i].phonenum+'</td></tr>'
            if(para[i].status == 6 || para[i].delivery_status == '2')
            {
              str += ''
            }
            else if(para[i].delivery_status==1 && para[i].pay_method=="cod" && para[i].pay_status=="0")
            {
              str += '</tbody></table></div><div class="col-md-3"><br><button id="'+para[i].rid+'" class="button btn-success button-small " onclick="paid(this.id,'+para[i].status+')">Amount Paid</button></div><div class="col-md-4"><br><button id="'+para[i].rid+'" class="button btn-success button-small " onclick="pickedup(this.id,'+para[i].status+')" '+disable_drop+'>'+status[para[i].status]+'</button></div></div></div></div>'
            }
            else if(para[i].delivery_status==1 && para[i].pay_status=="1")
            {
              str += '</tbody></table></div><div class="col-md-4"><br><button id="'+para[i].rid+'" class="button btn-success button-small " onclick="pickedup(this.id,'+para[i].status+')">'+status[para[i].status]+'</button></div></div></div></div>'
            }
            else if(para[i].delivery_status==0 && para[i].status==1)
            {
              str += '</tbody></table></div><div class="col-md-4"><br><button id="'+para[i].rid+'" class="button btn-success button-small " data-toggle="modal" data-target="#verifyuserdelivery" data-backdrop="static" data-keyboard="false" onclick="SendOTPtoUser(this.id,'+para[i].status+')" name="sendotpbutton">Send OTP</button></div><div class="col-md-4"><br><button id="'+para[i].rid+'" class="button btn-success button-small " onclick="pickedup(this.id,'+para[i].status+')">'+status[para[i].status]+'</button></div><div class="col-md-4"><br><button id="'+para[i].rid+'" class="button btn-danger button-small " onclick="cancelled(this.id,'+para[i].status+')">Cancelled</button></div></div></div></div>'
            }
            else if(para[i].delivery_status==1 && para[i].status==8)
            {
              str += '</tbody></table></div><div class="col-md-4"><br><button id="'+para[i].rid+'" class="button btn-success button-small " data-toggle="modal" data-target="#verifyuserdelivery" data-backdrop="static" data-keyboard="false" onclick="SendOTPtoUser(this.id,'+para[i].status+')" name="sendotpbutton">Send OTP</button></div><div class="col-md-4"><br><button id="'+para[i].rid+'" class="button btn-success button-small " onclick="pickedup(this.id,'+para[i].status+')">'+status[para[i].status]+'</button></div></div></div></div>'
            }
            else
            {
              str += '</tbody></table></div><div class="col-md-4"><br><button id="'+para[i].rid+'" class="button btn-success button-small " onclick="pickedup(this.id,'+para[i].status+')">'+status[para[i].status]+'</button></div></div></div></div>'
            }
          }
          $(".mycards").append(str) 
      }
    })
  }

  window.userexist = 0
  function checkusername (){
    $.ajax({
      url:'./api/checkusername.php',
      type:'POST',
      data:{
        'userid':$('#emailreg').val()
      },
      success:function(para)
      {
          if(para=='400')
          {
            window.userexist = 1
            alertdata("You Already Have an Account. Please Login Directly","Registration Status")
            $('#alert').modal({backdrop: 'static', keyboard: false})
            $('#alert').modal('show')
            $("#modalclose").click(function() {
                $("#emailreg").val("")
                openLoginModal()
            });
          }
          else
          {
            window.userexist = 0
          }
      }
  })
  }
  