function proceedtoproblems()
{
  if($("#city").val() != "" && $("#pincode").val() != "" && $("#devicecompany").val() != "" && $("#devicemodel").val() != null)
  {
    $(".deviceinfo").fadeOut()
    $("#problemdiv").fadeIn(1000)
    $("#problemdiv1").fadeIn(1000)
    $("#problemdiv2").fadeIn(1000)
    $("#problemdiv3").fadeIn(1000)
  }
  else
  {
    alertdata("Please Select All Fields","")
    $('#alert').modal('show')
  }
}

function backtodeviceinfo()
{
  $("#problemdiv").fadeOut()
  $("#problemdiv1").fadeOut()
  $("#problemdiv2").fadeOut()
  $("#problemdiv3").fadeOut()
  $(".deviceinfo").fadeIn()
}

function proceedtocontactinfo()
{
  if(problems != "")
  {
    if(quote == 1)
    {
      $.ajax({
        url:"./api/getcontactdetails.php",
        method:"POST",
        data:{"sid":sid},
        success: function(para){
          para = JSON.parse(para)
          $("#phonenum").val(para[0])
          $("#address").val(para[1])
        }
      })
      $("#problemdiv").fadeOut()
      $("#problemdiv1").fadeOut()
      $("#problemdiv2").fadeOut()
      $("#problemdiv3").fadeOut()
      $("#contact_details").fadeIn()
      $("#contact_details1").fadeIn()
      $("#contact_details2").fadeIn()
    }
    else
    {
      alertdata("Please Check Quotation First")
      $('#alert').modal('show')
    }
  }
  else
  {
    alertdata("Please Select at least 1 Problem")
    $('#alert').modal('show')
  }
}

function backtoproblems()
{
  $("#contact_details").fadeOut()
  $("#contact_details1").fadeOut()
  $("#contact_details2").fadeOut()
  $("#problemdiv").fadeIn()
  $("#problemdiv1").fadeIn()
  $("#problemdiv2").fadeIn()
  $("#problemdiv3").fadeIn()
}
function groupArrayOfObjects(list, key) {
      return list.reduce(function(rv, x) {
        (rv[x[key]] = rv[x[key]] || []).push(x);
        return rv;

      }, {});
    };

function isItemInArray(array, item) {
    for (var i = 0; i < array.length; i++) {
        // This if statement depends on the format of your array
        if (array[i][0] == item[0] && array[i][1] == item[1]) {
            return i;   // Found it
        }
    }
    return -1;   // Not found
}
problem = []
function getvalue(id)
{
    
    console.log("Id - ",id)
    id = id.split("-")
    console.log(isItemInArray(problem,[id[0],id[1]]))
    if(isItemInArray(problem,[id[0],id[1]])>=0)
    {
        const index = isItemInArray(problem,[id[0],id[1]]);
        console.log(index)
        if (index > -1) {
            problem.splice(index, 1);
        }
    }
    else
    {
        console.log("Id - ",id[0])
        console.log("bId - ",id[1])
        problem.push([id[0],id[1]]);

    }
   
}
    $(document).ready(function()
    {
      var sid = getCookie("sid");
      if(sid)
      {
        $(".form-comments2").hide()
        $("#contact_details").hide()
        $("#contact_details1").hide()
        $("#contact_details2").hide()
        $("#problemdiv").hide()
        $("#problemdiv1").hide()
        $("#problemdiv2").hide()
        $("#problemdiv3").hide()
      }
      else
      {
        $(".form-comments2").show()
        $(".form-comments").hide()
        $("#damageproblemlist").hide()
        $("#touchdisplayproblemlist").hide()
        $("#hardwareproblemlist").hide()
        $("#batteryproblemlist").hide()
        $("#memorycardproblemlist").hide()
        $("#networkproblemlist").hide()
        $("#otherproblemlist").hide()
        $("#ownproblemlist").hide()
        // $("#es2div").hide()
        $("#contact_details").hide()
        $("#pincode").hide()
      }
      
      $.ajax(
      {
        url: "./api/getprobsubmap.php", 
        method:"POST",
        data:{
          'sid':sid,
          },
        success: function(para)
        {
            s1 = ''
            console.log(para)
            para = JSON.parse(para)
            var groupedPeople=groupArrayOfObjects(para,"pcode");
            subpro_desc = {
                        "Water Damage":"waterdamage" , 
                        "Mobile is Dead":"mobiledead" , 
                        "Display is OK but partial/full touch not working":"toucherror" , 
                        "Touch is OK display damaged":"displayerror" ,
                        "Touch and display both not working":"touchdisplayerror" ,
                        "Mic Problem":"micerror" ,
                        "Speaker problem":"speakererror" , 
                        "Loud speaker problem":"loudspeakererror" , 
                        "Ringer/Vibrator problem ":"vibratorerror" , 
                        "Battery is faulty":"faultybattery" , 
                        "Mobile is not charging":"chargingerror" ,
                        "Network not showing":"networkerror" , 
                        "Only 1-2 tower showing in mobile":"towererror" ,
                        "SIM not detecting":"simerror" , 
                        "Memory card not detecting":"detectionerror" , 
                        "Power ON button not working":"powererror" ,
                        "Volume buttons are not working":"volumerror" , 
                        "Camera not working":"cameraerror" , 
                        "Forgot screen lock/Password":"lockerror" , 
                        "Flash new software":"flasherror"
                       }
                       pro_desc = {
                        'Damage Problem':'damageproblem',
                        'Touch &amp; Display Problem':'touchdisplayproblem',
                       ' Common Hardware Problem':'hardwareproblem',
                        'Battery Problem':'batteryproblem',
                        'Network Related Problem':'networkproblem',
                        'Memory Card Problem':'memorycardproblem',
                        'Other Problems':'otherproblem',
                       }

            // console.log(groupedPeople)
            // <div class="form-group ">
              for(x in groupedPeople)
            {
                if (groupedPeople.hasOwnProperty(x)) 
                {
                    console.log(x + " -> " + groupedPeople[x]);
            
                    // s1+='<div class="col-md-6 mb-2 "><div class="form-group "><div class="form-check"><div class="custom-checkbox">'
                    // s1+='<input type="checkbox" class="custom-control-input" id="'+x+'"  onclick="showproblems(this.id)">'
                    // s1+='<label class="custom-control-label" for="'+x+'">'+groupedPeople[x][0].problem+'</label></div></div><div id="'+x+'list" style="display:none;">'
                   
                    s1+='<div class="col-md-6 mb-2 "><div class="form-group "><div class="form-check"><div class="custom-checkbox">'
                    s1+='<input type="checkbox" class="custom-control-input" id="'+x+'" onclick="showproblems(this.id)">'
                    s1+='<label class="custom-control-label" for="'+x+'">'+groupedPeople[x][0].problem+'</label></div></div><div id="'+x+'list" style="display:none;">'

                    var innersize = Object.keys(groupedPeople[x]).length;
                    console.log("Inner size - ",innersize)
                    window.ids = x;
                    for(let j=0;j<innersize;j++)
                    {
                        
                        s1+='<div class="form-check"><div class="custom-control custom-checkbox">' 
                        s1+='<input type="checkbox" class="custom-control-input" id="'+x+'-'+groupedPeople[x][j].spcode+'" onchange="getvalue(this.id)" name="'+x+'" >'
                        s1+='<label class="custom-control-label" for="'+x+'-'+groupedPeople[x][j].spcode+'">'+groupedPeople[x][j].subproblem+'</label>'
                        s1+='</div></div>'
                        
                    }
                   s1+='</div></div></div>'
                }
            }
            $('.problem').append(s1)
           

        }
      })
      });
     
     $.ajax(
     {
       url: "./api/getMobileFilter.php",
       method:"POST",
       success: function(para)
       {
         console.log(para)
         s1 = ""
         para = JSON.parse(para)
         for(i=0;i<para.length;i++)
         {
           s1 += '<option value="'+para[i][0]+'">'+para[i][1]+'</option>'
         }
         $(".mcomp").append(s1)
        }

      });

      // get cities 
      $.ajax(
            {
              url: "./api/getcities.php", 
              method:"POST",
              success: function(para)
              {
                para = JSON.parse(para)
                var str = ''
                for(let i=0;i<para.length;i++)
                {
                  str += '<option value="'+para[i][0]+'">'+para[i][1]+'</option>'
                }
                $("#city").append(str)
              }
                
           });
      // 



    // get pincodes from cities

    $("#city").change(function(){
      $("#pincode").empty()
      if($("#city").val() != "")
      {
        $("#pincode").show()
        $.ajax(
        {
          url: "./api/getpincode.php", 
          method:"POST",
          data:{'city':$("#city").val()},
          success: function(para)
          {
            para = JSON.parse(para)
            var str = '<option value="" selected disabled>Select Your Pincode</option>'
            for(let i=0;i<para.length;i++)
            {
              str += '<option value="'+para[i]+'">'+para[i]+'</option>'
            }
            $("#pincode").append(str)
          }
        })
      }
    })

    // 

    problems = []
    function showproblems(id)
    {
        console.log("ID - ",id)
      if($("#"+id).is(":checked"))
      {
        $("#"+id+"list").fadeIn(1000)
        $('[name="'+id+'"]').attr("required", "true");
        // problems.push(id,)
        problems.push([id,$('[name="'+id+'"]').attr('id')])
      }
      else
      {
        $("#"+id+"list").fadeOut(100)
        $('[name="'+id+'"]').attr("required", "false");
        for (var i = 0; i < problems.length; i++)
        { 
          if (problems[i][0] === id) 
          { 
              problems.splice(i, 1);  
          } 
        } 
      }
      console.log(problems)
    }

var quote = 0
function getquote(){
  // window.open('../estbill.html')
  window.problems = problem
  window.open("./estbill.html?ordidus");
    // $.ajax(
    //     {
    //     url: "./api/getquote.php", 
    //     method:"POST",
    //     data:{
    //             'sid':sid,
    //             'mmodel':$(".mmod").val(),
    //             'problems':problem
    //         },
    //     success: function(para)
    //     {

    //         alertdata("Estimated Price for your request is Rs "+para , "")
    //         window.estprice = para
    //         $('#alert').modal('show')
    //         quote = 1
    //     }
    //     })
}

function gobacktopincode(){
  
  $(".form-comments").show()
  $("#requestquotation").hide()
  $("#damageproblemlist").hide()
  $("#touchdisplayproblemlist").hide()
  $("#hardwareproblemlist").hide()
  $("#batteryproblemlist").hide()
  $("#memorycardproblemlist").hide()
  $("#networkproblemlist").hide()
  $("#otherproblemlist").hide()
  $("#ownproblemlist").hide()
  // $("#es2div").hide()
  $("#contact_details").hide()
  $("#pincode").hide() 
  $("#mobile_details").hide()
 //  $("#problemdiv").hide()
  $("#quotebuttons").hide()

  $("#selectcity").show()
  // $("#selectpincode").show()
  $(".checkpincode").show()
  $("#divtitle").html("Check Service Availability")

}

function submitrequest()
{
    var sid = getCookie("sid");
    if(sid)
    {
        console.log(problem)
    
        console.log(window.mcname)
        if($("#phonenum").val() != "" && $("#address").val() != "")
        {
          $("#submitrequest").prop("disabled","true")
            $.ajax(
            {
            url: "./api/submitproblem.php", 
            method:"POST",
            data:{
                    'sid':sid,
                    'pincode':$("#pincode").val(),
                    'mmodel':$(".mmod").val(),
                    'problems':problem,
                    'estprice':window.estprice,
                    'phonenum':$("#phonenum").val(),
                    'address':$("#address").val()
                },
            success: function(para)
            {
            //   alertdata(para,"Delivery Status")
              $('#submitalert').modal({backdrop: 'static', keyboard: false})
              $('#submitalert').modal('show')
            }
            })
        }
        else
        {
          alertdata("Please Provide Address and Phone Number","")
          $('#alert').modal('show')

        }
    }
    else
    {

    }
  }

var alterClass = function() {
    var ww = document.body.clientWidth;
   
    if (ww > 600) {
      console.log("Desktop")
      $('.google').attr('src','google.png')
      $('.google').css('width','25%')
    }
    else{
      console.log("Mobile")
      $('.google').attr('src','google.png')
      $('.google').css('width','25%')
    }
    }
    $(window).resize(function(){
      alterClass();
      
        });
    alterClass()