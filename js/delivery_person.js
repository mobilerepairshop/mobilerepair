function paid(rid,status)
{
  $.ajax({
    url:'./api/paid.php',
    type:'POST',
    data:{
      'rid':rid,
      'status':status,
      'sid':sid
    },
    success:function(para)
    {
      if(para == "200")
      {
        alertdata("Done")     
        $('#alert').modal({backdrop: 'static', keyboard: false})
        $('#alert').modal('show')
        $("#modalclose").click(function() {
          window.location.reload()
        });
      }
    }
  })
}

function pickedup(rid,status)
{if(status == 1 || status == 8)
  {
    if(window.otpverified == 0)
    {
      alertdata("Please Verify OTP First","")
        $('#alert').modal('show')
    }
    else
    {
      $.ajax({
        url:'./api/pickedup.php',
        type:'POST',
        data:{
          'rid':rid,
          'status':status,
          'sid':sid
        },
        success:function(para)
        {
            alertdata("Done","Delivery Status")
            $('#alert').modal({backdrop: 'static', keyboard: false})
            $('#alert').modal('show')
            $("#modalclose").click(function() {
              window.location.reload()
            });        
        }
      })
    }
  }
  else
  {
    $.ajax({
      url:'./api/pickedup.php',
      type:'POST',
      data:{
        'rid':rid,
        'status':status,
        'sid':sid
      },
      success:function(para)
      {
        alertdata("Done","Delivery Status")
        $('#alert').modal({backdrop: 'static', keyboard: false})
        $('#alert').modal('show')
        $("#modalclose").click(function() {
          window.location.reload()
        });
      }
    })
  }
}
window.otpverified = 0
function SendOTPtoUser(rid,status)
{
  // $.ajax({
  //   // url:'./api/sendotptouser.php',
  //   type:'POST',
  //   data:{
  //     'rid':rid,
  //     'status':status,
  //     'sid':sid
  //   },
  //   success:function(para)
  //   {
  //       alert("Done")
  //       window.setTimeout(function(){location.reload()},1000)
  //   }
  // })
}

function verifyuserdelivery()
{
  // alert($("#verificationotp").val())
  window.otpverified = 1
  alertdata("Verified","Verification Status")
  $('#alert').modal('show')
  $('[name="sendotpbutton"]').html('Re-send OTP');
  $('#verifyuserdelivery').modal('hide');
}

function cancelledreason(rid,status)
{
  $('[name="sendcancelledreason"]').attr('id',rid+","+status);
}

function cancelled(ridstatus)
{
  var rid = ridstatus.split(",")[0]
  var status = ridstatus.split(",")[1]
  var creason = $("#reasonforcancellation").val()
  $.ajax({
    url:'./api/cancelled.php',
    type:'POST',
    data:{
      'rid':rid,
      'status':status,
      'creason':creason,
      'sid':sid
    },
    success:function(para)
    {
      $('#cancelledreason').modal('hide')
      alertdata("Cancelled","Delivery Status")
        $('#alert').modal({backdrop: 'static', keyboard: false})
        $('#alert').modal('show')
        $("#modalclose").click(function() {
          window.location.reload()
        });
    }
  })
}

window.userexist = 0
$('#emailreg').change(function (){
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
          alertdata("Please Choose Different Email/Mobile Number","Registration Status")
          $('#alert').modal({backdrop: 'static', keyboard: false})
          $('#alert').modal('show')
          $("#modalclose").click(function() {
              $("#emailreg").val("")
          });
        }
        else
        {
          window.userexist = 0
        }
    }
})
})



function getproblems_admin(rid)
    {
        $.ajax({
            url:'./api/getproblemsforadmin.php',
            type:'POST',
            data:{'rid':rid,'sid':sid},
            success:function(para)
            {
                s2=""
                console.log("This is note - ",para)
                para = JSON.parse(para)

               for(let i=0;i<para.length;i++)
               {
                    console.log(para[i].problem)
                    
                    s2+='<tr><td class="ordhead">Problem '+(i+1)+'</td> <td>'+para[i].problem+'</td><td class="ordhead">Sub-Problem '+(i+1)+'</td> <td>'+para[i].subproblem+'</td> </tr>'
                    $('.problem-content').html(s2)
               }
                
                
            }
        })
    }
