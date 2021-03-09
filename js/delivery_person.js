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
    $.ajax({
      url:'./api/checkquestions.php',
      type:'POST',
      data:{
        "rid":rid
      },
      success:function(para)
      {
        if(para == "200")
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
        else
        {
          alertdata("Please Fillout Mandatory Questions First","")
          $('#alert').modal('show')
        }
      }
    })
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
function SendOTPtoUser(rid,status)
{
  $('[name="setridtoquestions"]').attr('id',rid);
  $.ajax({
    url:'./api/checkquestions.php',
    type:'POST',
    data:{
      "rid":rid
    },
    success:function(para)
    {
      if(para == "200")
      {
        $('#verifyuserdelivery').modal('hide')
        alertdata("Already Submitted","Questions Status")
        $('#alert').modal('show')
      }
      else
      {
        $('#verifyuserdelivery').modal('show')
        $('#verifyuserdelivery').modal({backdrop: 'static', keyboard: false})
        // $('#verifyuserdelivery').modal('hide')
      }
    }
  })
}

function verifyuserdelivery(rid)
{
  $.ajax({
    url:'./api/submitanswers.php',
    type:'POST',
    data:{
      'rid':rid,
      'q1':$("input[name='phonelock']:checked").val(),
      'q2A':$("input[name='display']:checked").val(),
      'q2B':$("input[name='touchkey']:checked").val(),
      'q2C':$("input[name='headphone']:checked").val(),
      'q2D':$("input[name='charging']:checked").val(),
      'q2E':$("input[name='vibration']:checked").val(),
      'q2F':$("input[name='ringer']:checked").val(),
      'q2G':$("input[name='loudspeaker']:checked").val(),
      'q2H':$("input[name='mic']:checked").val(),
      'q2I':$("input[name='earspeaker']:checked").val(),
      'q2J':$("input[name='camera']:checked").val(),
      'q2K':$("input[name='fintouch']:checked").val(),
      'q2L':$("input[name='powerbtn']:checked").val(),
      'q2M':$("input[name='volbutton']:checked").val(),
      'q2N':$("input[name='netdetect']:checked").val(),
      'q3':$("input[name='backup']:checked").val(),
      'q4':$("input[name='simcard']:checked").val()
    },
    success:function(para)
    {
      // alert(para)
      $('#verifyuserdelivery').modal('hide');
      alertdata("Answers Submitted","Submission Status")
      $('#alert').modal('show')
      $('[name="sendotpbutton"]').prop('disabled','true');
      window.location.reload()
    }
  })
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
          alertdata("Please Choose Different Username Number","Registration Status")
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
