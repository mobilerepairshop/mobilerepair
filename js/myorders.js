function filter(type)
{
  $.ajax({
    url:'./api/filtermyorders.php',
    type:'POST',
    data:{
      'type':type,
      'sid':sid
    },
    success:function(para)
    {
      if(para != "")
      {
        console.log(para)
        $('.mycards').empty();
        para = $.parseJSON(para)

        if(para == "")
        {
          var norecords = '<div class="form-comments ordercard" ><center><b>No Records Found</b></center></div>' 

          $('.mycards').append(norecords);
        }

        var groupedPeople=groupArrayOfObjects(para,"rid");
        console.log("After process here is the thing - ")
        console.log(groupedPeople)
        flag=0
        s1 = ""
        rids = []
        var size = Object.keys(groupedPeople).length;
        console.log(size)
        for(x in groupedPeople)
        {
          if (groupedPeople.hasOwnProperty(x)) {
              console.log(x + " -> " + groupedPeople[x]);
              var innersize = Object.keys(groupedPeople[x]).length;
              console.log("Inner Size - ",innersize)
                for(let j=0;j<innersize;j++)
                {
                    console.log("Maps - ",groupedPeople[x][j].problem)
                        if(j==innersize-1)
                        {
                              // 0 New Request
                            // 1 Person Assigned
                            // 2 Phone picked up
                            // 3 Phone Dropped to Admin
                            // 4 New problems added price changed by admin. Give an option to accept new price or go with old one or cancel
                            // 5 User accepts the old price/new price
                            // 6 Order Cancel
                            // 7 Admin has started the repair
                            // 8 Delivery Person Assigned 
                            // 9 Completed
                            var orderid = String(x).padStart(5, '0')
                            s1+='<div class="form-comments ordercard" ><div class="row"><div class="col-sm-6 " ><b>Order Number : MR'+orderid+'</b> <br><br><div class="scroll" > <table style="width:220%;">'
                            s1+='<tr><td class="ordhead">Mobile Brand</td><td>'+groupedPeople[x][j].mcname+'</td>'
                            s1+='<td class="ordhead">Mobile Model</td><td>'+groupedPeople[x][j].mmodel+'</td></tr>'
                            s1+='<tr><td class="ordhead">Estimated Price</td><td>'+groupedPeople[x][j].estprice+'</td> '  
                            s1+='<td class="ordhead"><b>Calculated Price</td> <td>'+groupedPeople[x][j].calprice+'</b></td></tr>'
                            s1+='<tr><td class="ordhead">Date Requested</td><td>'+groupedPeople[x][j].created_date+'</td>'
                            s1+='<td class="ordhead">Delivery(days)</td><td>3</td></tr>'

                            
                            switch (groupedPeople[x][j].status)
                              {
                                case 0:
                                      s1+='<tr><td class="ordhead"><b>Status</b></td> <td><a style="color:blue;cursor:pointer;" data-toggle="modal" id="'+groupedPeople[x][j].status+'" data-target="#status"  onclick="getstatus(this.id,'+x+')">Track Product</a></td></div></div>'
                                      s1+='<td class="ordhead">Total Problems </td> <td><a style="color:blue;cursor:pointer;" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#problem" onclick="getproblems(this.id)">View Problem</a></td><tr></table></div>'
                                      s1+='<br><br><div class="row"><div class="col-sm-6"><table><tr><td><button class="btn btn-danger" onclick="cancelRequest('+groupedPeople[x][j].rid+')">Cancel</button></td></tr></table></div></div>'
                                  break;
                                case 1:
                                      // Person Assigned
                                      delivery_status=2
                                      s1+='<tr><td class="ordhead"><b>Status</b></td> <td><a style="color:blue;cursor:pointer;" data-toggle="modal" id="'+groupedPeople[x][j].status+'" data-target="#status"  onclick="getstatus(this.id,'+x+')">Track Product</a></td>'
                                      s1+='<td class="ordhead">Total Problems </td><td><a style="color:blue;cursor:pointer;" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#problem" onclick="getproblems(this.id)">View Problem</a></td></tr><tr><td class="ordhead">Assigned Person </td><td><a style="color:blue;cursor:pointer;" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#person" onclick="getperson(this.id,'+delivery_status+')">View Person</a></td></tr></table></div></div></div>'
                                      s1+='<br><br><div class="row"><div class="col-sm-6"><table><tr><td><button class="btn btn-danger" onclick="cancelRequest('+groupedPeople[x][j].rid+')">Cancel</button></td></tr></table></div></div>'
                                  break;
                                case 2:
                                        // Phone picked up
                                      s1+='<tr><td class="ordhead"><b>Status</b></td> <td><a style="color:blue;cursor:pointer;" data-toggle="modal" id="'+groupedPeople[x][j].status+'" data-target="#status"  onclick="getstatus(this.id,'+x+')">Track Product</a></td>'
                                      s1+='<td class="ordhead">Total Problems </td> <td><a style="color:blue;cursor:pointer;" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#problem" onclick="getproblems(this.id)">View Problem</a></td><tr></table></div></div>'
                                      s1+='<br><br><div class="row"><div class="col-sm-6"><table><tr><td><button class="btn btn-primary" id="'+groupedPeople[x][j].rid+'" data-toggle="modal" data-target="#problem" onclick="getnote(this.id)" >View Note</button></td><td><button class="btn btn-danger" onclick="cancelRequest('+groupedPeople[x][j].rid+')">Cancel</button></td></tr></table></div></div>'
                                  break;
                                case 3:
                                      // Phone Dropped to Admin
                                      s1+='<tr><td class="ordhead"><b>Status</b></td> <td><a style="color:blue;cursor:pointer;" data-toggle="modal" id="'+groupedPeople[x][j].status+'" data-target="#status"  onclick="getstatus(this.id,'+x+')">Track Product</a></td>'
                                      s1+='<td class="ordhead">Total Problems </td> <td><a style="color:blue;cursor:pointer;" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#problem" onclick="getproblems(this.id)">View Problem</a></td><tr></table></div></div></div>'
                                      s1+='<br><br><div class="row"><div class="col-sm-6"><table><tr><td><button class="btn btn-primary" id="'+groupedPeople[x][j].rid+'" data-toggle="modal" data-target="#problem" onclick="getnote(this.id)" >View Note</button></td><td><button class="btn btn-danger" onclick="cancelRequest('+groupedPeople[x][j].rid+')">Cancel</button></td></tr></table></div></div>'
                                  break;
                                case 4:
                                      // New problems added price changed by admin. Give an option to accept new price or go with old one or cancel
                                      s1+='<tr><td class="ordhead"><b>Status</b></td> <td><a style="color:blue;cursor:pointer;" data-toggle="modal" id="'+groupedPeople[x][j].status+'" data-target="#status"  onclick="getstatus(this.id,'+x+')">Track Product</a></td>'
                                      s1+='<td class="ordhead">Total Problems </td> <td><a style="color:blue;cursor:pointer;" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#problem" onclick="getproblems(this.id)">View Problem</a></td></tr></table></div></div></div>'
                                      s1+='<br><br><div class="row" ><div class="col-sm-6"><table><tr><td><button class="btn btn-success" data-toggle="modal" data-target="#payment" id="'+groupedPeople[x][j].rid+'" onclick="getchgprice(this.id)">Select Final Price</button></td><td><button class="btn btn-danger" onclick="cancelRequest('+groupedPeople[x][j].rid+')">Cancel</button></td></tr></table></div></div>'
                                  break;
                                case 5:
                                    // User accepts the old price/new price
                                    if(groupedPeople[x][j].pay_method != "")
                                    {
                                    //  if payment method is confirmed
                                      s1+='<tr><td class="ordhead"><b>Status</b></td><td><a style="color:blue;cursor:pointer;" data-toggle="modal" id="'+groupedPeople[x][j].status+'" data-target="#status"  onclick="getstatus(this.id,'+x+')">Track Product</a></td>'
                                      s1+='<td class="ordhead">Total Problems </td><td><a style="color:blue;cursor:pointer;" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#problem" onclick="getproblems(this.id)">View Problem</a></td></tr></table></div></div></div>'
                                      s1+='<br><div class="row" ><div class="col-sm-6"><table><tr><td><button class="btn btn-primary" id="'+groupedPeople[x][j].rid+'" data-toggle="modal" data-target="#myModal" onclick="getnote(this.id)" >View Note</button></td><td><button class="btn btn-primary" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#bill"  onclick="downloadbill(this.id)" >View Bill</button></td></tr></table></div></div>'
                                    }
                                    else
                                    {
                                    //  payment method is not confirmed yet
                                      s1+='<tr><td class="ordhead"><b>Status</b></td> <td><a style="color:blue;cursor:pointer;" data-toggle="modal" id="'+groupedPeople[x][j].status+'" data-target="#status"  onclick="getstatus(this.id,'+x+')">Track Product</a></td>'
                                      s1+='<td class="ordhead">Total Problems </td> <td><a style="color:blue;cursor:pointer;" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#problem" onclick="getproblems(this.id)">View Problem</a></td></tr></table></div></div></div>'
                                      s1+='<br><div class="row" ><div class="col-sm-6"><table><tr><td><button class="btn btn-primary" id="'+groupedPeople[x][j].rid+'" data-toggle="modal" data-target="#myModal" onclick="getnote(this.id)" >View Note</button></td></tr></table></div></div>'                                              
                                    }
                                  break;
                                case 6:
                                      //Cancel Request 
                                      s1+='<tr><td class="ordhead">Total Problems </td> <td><a style="color:blue;cursor:pointer;" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#problem" onclick="getproblems(this.id)">View Problem</a></td><tr></table></div></div></div>'
                                  break;
                                case 7:
                                      // Admin has started the repair
                                      if(groupedPeople[x][j].pay_method != "")
                                      {
                                        //  if payment method is confirmed
                                        s1+='<tr><td class="ordhead"><b>Status</b></td> <td><a style="color:blue;cursor:pointer;" data-toggle="modal" id="'+groupedPeople[x][j].status+'" data-target="#status"  onclick="getstatus(this.id,'+x+')">Track Product</a></td>'
                                        s1+='<td class="ordhead">Total Problems </td> <td><a style="color:blue;cursor:pointer;" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#problem" onclick="getproblems(this.id)">View Problem</a></td></tr></table></div></div></div>'
                                        s1+='<br><div class="row" ><div class="col-sm-6"><table><tr><td><button class="btn btn-primary" id="'+groupedPeople[x][j].rid+'" data-toggle="modal" data-target="#myModal" onclick="getnote(this.id)" >View Note</button></td><td><button class="btn btn-primary" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#bill"  onclick="downloadbill(this.id)" >View Bill</button></td></tr></table></div></div>'
                                      }
                                      else
                                      {
                                        //  payment method is not confirmed yet
                                        s1+='<tr><td class="ordhead"><b>Status</b></td> <td><a style="color:blue;cursor:pointer;" data-toggle="modal" id="'+groupedPeople[x][j].status+'" data-target="#status"  onclick="getstatus(this.id,'+x+')">Track Product</a></td>'
                                        s1+='<td class="ordhead">Total Problems </td> <td><a style="color:blue;cursor:pointer;" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#problem" onclick="getproblems(this.id)">View Problem</a></td></tr></table></div></div></div>'
                                        s1+='<br><div class="row" ><div class="col-sm-6"><table><tr><td><button class="btn btn-primary" id="'+groupedPeople[x][j].rid+'" data-toggle="modal" data-target="#myModal" onclick="getnote(this.id)" >View Note</button></td><td><button class="btn btn-success" id="'+groupedPeople[x][j].rid+'" data-toggle="modal" data-target="#payModal" onclick="paydetails(this.id)">Payment</button></tr></table></div></div>'
                                      }
                                      break;
                                case 8:
                                      //Delivery Person Assigned 
                                      if(groupedPeople[x][j].pay_method != "")
                                      {
                                        //  if payment method is confirmed
                                        delivery_status=1
                                        s1+='<tr><td class="ordhead"><b>Status</b></td> <td><a  style="color:blue;cursor:pointer;" data-toggle="modal" id="'+groupedPeople[x][j].status+'" data-target="#status"  onclick="getstatus(this.id,'+x+')">Track Product</a></td>'
                                        s1+='<td class="ordhead">Total Problems </td> <td><a style="color:blue;cursor:pointer;" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#problem" onclick="getproblems(this.id)">View Problem</a></td></tr><tr><td class="ordhead">Assigned Person </td><td><a style="color:blue;cursor:pointer;" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#person" onclick="getperson(this.id,'+delivery_status+')">View Person</a></td></tr></table></div></div></div>'
                                        s1+='<br><div class="row" ><div class="col-sm-6"><table><tr><td><button class="btn btn-primary" id="'+groupedPeople[x][j].rid+'" data-toggle="modal" data-target="#myModal" onclick="getnote(this.id)" >View Note</button></td><td><button class="btn btn-primary" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#bill"  onclick="downloadbill(this.id)" >View Bill</button></td><td><button class="btn btn-success" id="'+groupedPeople[x][j].rid+'" data-toggle="modal" data-target="#payModal" onclick="paydetails(this.id)"  disabled>Payment</button></tr></table></div></div>'
                                      }
                                      else
                                      {
                                        //  payment method is not confirmed yet
                                        delivery_status=1
                                        s1+='<tr><td class="ordhead"><b>Status</b></td> <td><a  style="color:blue;cursor:pointer;" data-toggle="modal" id="'+groupedPeople[x][j].status+'" data-target="#status"  onclick="getstatus(this.id,'+x+')">Track Product</a></td>'
                                        s1+='<td class="ordhead">Total Problems </td> <td><a style="color:blue;cursor:pointer;" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#problem" onclick="getproblems(this.id)">View Problem</a></td></tr><tr><td class="ordhead">Assigned Person </td><td><a style="color:blue;cursor:pointer;" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#person" onclick="getperson(this.id,'+delivery_status+')">View Person</a></td></tr></table></div></div></div>'
                                        s1+='<br><div class="row" ><div class="col-sm-6"><table><tr><td><button class="btn btn-primary" id="'+groupedPeople[x][j].rid+'" data-toggle="modal" data-target="#myModal" onclick="getnote(this.id)" >View Note</button></td><td><button class="btn btn-success" id="'+groupedPeople[x][j].rid+'" data-toggle="modal" data-target="#payModal" onclick="paydetails(this.id)">Payment</button></tr></table></div></div>'
                                      }
                                    break;
                                case 9:
                                  // Order Successfull
                                      var today = new Date();
                                      var dd = today.getDate();
                                      var mm = today.getMonth()+1; 
                                      var yyyy = today.getFullYear();
                                      if(dd<10) 
                                      {
                                          dd='0'+dd;
                                      } 

                                      if(mm<10) 
                                      {
                                          mm='0'+mm;
                                      } 
                                      today = yyyy+'-'+mm+'-'+dd;
                                      var d1 = parseDate(today);
                                      if(groupedPeople[x][j].warranty != "" && groupedPeople[x][j].warranty != "nowarr")
                                      {
                                        console.log(groupedPeople[x][j].warranty)
                                        var d2 = parseDate(groupedPeople[x][j].warranty);
                                        console.log(d1.getTime()<d2.getTime());
                                        if(d1.getTime()<d2.getTime())
                                        {
                                          s1+='<tr><td class="ordhead"><b>Status</b></td> <td><a style="color:blue;cursor:pointer;" data-toggle="modal" id="'+groupedPeople[x][j].status+'" data-target="#status"  onclick="getstatus(this.id,'+x+')">Track Product</a></td></div></div>'
                                          s1+='<td class="ordhead">Total Problems </td> <td><a style="color:blue;cursor:pointer;" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#problem" onclick="getproblems(this.id)">View Problem</a></td><tr></table></div>'
                                          s1+='<br><br><div class="row"><div class="col-sm-6"><table><tr><td><button class="btn btn-primary" onclick="initiate('+groupedPeople[x][j].rid+')">Reinitiate</button></td></tr></table></div></div>'
                                        
                                        }
                                        else
                                        {
                                          s1+='<tr><td class="ordhead"><b>Status</b></td> <td><a style="color:blue;cursor:pointer;" data-toggle="modal" id="'+groupedPeople[x][j].status+'" data-target="#status"  onclick="getstatus(this.id,'+x+')">Track Product</a></td></div></div>'
                                          s1+='<td class="ordhead">Total Problems </td> <td><a style="color:blue;cursor:pointer;" id="'+groupedPeople[x][j].rid+'"  data-toggle="modal" data-target="#problem" onclick="getproblems(this.id)">View Problem</a></td><tr></table></div>'
                                        
                                        }
                                      }                                                  
                                        
                                    break;
                                  }
                            s1+='</div></div></div>'
                          
                            flag=1
                        }
                }                      
          }
        }
                    $(".mycards").append(s1)
      
    }
  }
  })
}

function downloadbill(rid)
{
    // window.open('../bill.html?ordidus='+rid+')
    window.open("./bill.html?ordidus="+ rid);
  // $.ajax({
  //   url:'./api/getbilldata.php',
  //   type:'POST',
  //   data:{
  //     'rid':rid,
  //     'sid':sid
  //   },
  //   success:function(para)
  //   {
      
  //     para = JSON.parse(para)
  //     console.log("This is all - ",para[0])
  //     console.log("This is wada - ",para[0][0].mcname)
  //     // $('[name="updateprofile"]').attr("id", para[0].uid);
  //     $(".brand").html(para[0][0].mcname)
  //     $(".model").html(para[0][0].mmodel)
  //     $(".createdon").html(para[0][0].created_date)
  //     console.log("This is all - ",para[1])
  //     problems = para[1];
  //     s2=''
  //     for(let i=0;i<problems.length;i++)
  //     {
  //         if(i==problems.length-1)
  //         {
  //           s2+='<tr class="item last"><td>'+problems[i].problem+'</td><td>'+problems[i].subproblem+'</td></tr>'
  //         }
  //         else
  //         {
  //           s2+='<tr class="item"><td>'+problems[i].problem+'</td><td>'+problems[i].subproblem+'</td></tr>'
  //         } 
  //     }
  //     s2+='<tr class="total"><td></td><td>Total: '+para[0][0].calprice+'</td></tr>';
  //     $('.billcontent').append(s2)
  //   }
  // })

  
}
function parseDate(input) {
      var parts = input.match(/(\d+)/g);
      // new Date(year, month [, date [, hours[, minutes[, seconds[, ms]]]]])
      return new Date(parts[0], parts[1]-1, parts[2]); // months are 0-based
}         

function paydetails(rid)
{
  $("#submitpaymethod").attr("name",rid)
}

$("#submitpaymethod").click(function(){
  $.ajax({
    url:'./api/setpaymethod.php',
    type:'POST',
    data:{
      'paymethod':$("input[type='radio'][name='paymethod']:checked").val(),
      'rid':$("#submitpaymethod").attr("name"),
      'sid':sid
    },
    success:function(para)
    {
        if(para == "200")
        {
          window.location.reload()
        }      
        else
        {
          alertdata(para,"")
          $('#alert').modal('show')
        } 
    }
  })
})

function groupArrayOfObjects(list, key) {
      return list.reduce(function(rv, x) {

        (rv[x[key]] = rv[x[key]] || []).push(x);
        return rv;
      }, {});
    };



    function getstatus(status,rid)
    {
      $('.status-content').empty()
      orderid = String(rid).padStart(5, '0')
      s1=""
      var obj = {
            0: ["New Request","fa fa-handshake"],
            1: ["Pickup Assigned","fa fa-car fa-sm"],
            2: ["Pickup Successfull","fa fa-thumbs-up"],
            3:["Device Dropped","fa fa-thumbs-up"],
            4:["Price Updated","fa fa-refresh"],
            5:["Sent For Repair","fa fa-paper-plane"],
            6:["Request Cancelled","fa fa-times"],
            7:["In progress","fa fa-cog"],
            8:["Delivery Assigned","fa fa-car"],
            9:["Order Successfull","fa fa-check-square"],
      }
      
        s1+='<div class="container padding-bottom-3x mb-1">'
        s1+='<div class="modalcard card mb-3" style="width:100%;">'
        s1+='<div class="p-4 text-center text-white text-lg bg-dark rounded-top"><span class="text-uppercase">Order No - </span><span class="text-medium">MR'+orderid+'</span></div>'
        s1+='<div class="d-flex flex-wrap flex-sm-nowrap justify-content-between py-3 px-2 bg-secondary">'
        s1+='<div class="w-100 text-center py-1 px-2"><span class="text-medium">Current Status of Your Order</span></div>'
        // s1+='<div class="w-100 text-center py-1 px-2"><span class="text-medium">Status:</span> Repair in progress</div>'
        s1+='</div>'
        s1+='<div class="card-body">'
        s1+='<div class="steps d-flex flex-wrap flex-sm-nowrap justify-content-between padding-top-2x padding-bottom-1x">'
        for(let i=0;i<10;i++)
        {
          str=''
          if(i==1)
          {
            delivery_status=2
            str = '<b><a style="color:blue;cursor:pointer;font-size:10px;" id="'+rid+'"  data-toggle="modal" data-target="#person" onclick="getperson(this.id,'+delivery_status+')">View Person</a></b>'; 
          }
          else if(i==8)
          {
           delivery_status=1
           str ='<b><a style="color:blue;cursor:pointer;font-size:10px;" id="'+rid+'"  data-toggle="modal" data-target="#person" onclick="getperson(this.id,'+delivery_status+')">View Person</a></b>'; 
          }
          
          if(i==6)
          {

          }
          else if(i<=status)
          {
            
            console.log("This is - "+str)
            s1+='<div class="step completed">'
            s1+='<div class="step-icon-wrap">'
            s1+='<div class="step-icon"></div>'
            s1+=' </div>'
            s1+='<h5 class="step-title">'+obj[i][0]+'</h4><a style="font-size:10px;">'+str+'</a>'
            s1+='</div>'
          }
          else
          {
            s1+='<div class="step">'
            s1+='<div class="step-icon-wrap">'
            s1+='<div class="step-icon"></div>'
            s1+=' </div>'
            s1+='<h5 class="step-title">'+obj[i][0]+'</h4>'
            s1+='</div>'
          }
           
        } 
      
          s1+='</div></div></div></div>'
          $('.status-content').append(s1)
    }
    function getproblems(rid)
    {
        $.ajax({
            url:'./api/getproblems.php',
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
    function getperson(rid,type)
    {
        $.ajax({
            url:'./api/getperson.php',
            type:'POST',
            data:{'rid':rid,'sid':sid,'type':type},
            success:function(para)
            {
                s2=""
                console.log("This is note - ",para)
                para = JSON.parse(para)
                // pro_desc = {"waterdamage":"Water Damage" , "mobiledead":"Mobile is Dead" , "toucherror":"Display is OK but partial/full touch not working" , "displayerror":"Touch is OK display damaged" , "touchdisplayerror":"Touch and display both not working" , "micerror":"Mic Problem" , "speakererror":"Speaker problem" , "loudspeakererror":"Loud speaker problem" , "vibratorerror":"Ringer/Vibrator problem" , "faultybattery":"Battery is faulty" , "chargingerror":"Mobile is not charging" , "networkerror":"Network not showing" , "towererror":"Only 1-2 tower showing in mobile" , "simerror":"SIM not detecting" , "detectionerror":"Memory card not detecting" , "powererror":"Power ON button not working" , "volumerror":"Volume buttons are not working" , "cameraerror":"Camera not working" , "lockerror":"Forgot screen lock/Password" , "flasherror":"Flash new software"}

               for(let i=0;i<para.length;i++)
               {
                    // console.log(para[i].)
                    s2+='<tr><td class="ordhead">Person Name </td> <td>'+para[i].admin_name+'</td></tr>'
                    s2+='<tr><td class="ordhead">Contact Number </td> <td>'+para[i].admin_contact+'</td></tr>'
                    s2+='<tr><td class="ordhead">Arrival Date </td> <td>'+para[i].date+'</td></tr>'
                    s2+='<tr><td class="ordhead">Arrival Time</td> <td>'+para[i].time+'</td></tr>'
                    
                    $('.person-content').html(s2)
               }
                
                
            }
        })
    }
    function getchgprice(rid)
    {
      console.log("Id = ",rid)
        $.ajax({
            url:'./api/getchgprice.php',
            type:'POST',
            data:{'rid':rid,'sid':sid},
            success:function(para)
            {
                s2=""
                console.log("This is note - ",para)
                para = JSON.parse(para)

                for(let i=0;i<para.length;i++)
                {

                  s2+='<div class="ordhead"><b>Calculated Price -</b> '+para[i].calprice+'</div><br>'
                  s2+='<table><tr><td class="ordhead"><b>Note</b></td></tr><tr><td><p>'+para[i].note+'</p></td></tr></table><br>'
                  s2+='<button class="btn btn-success" onclick="submitfinal('+para[i].rid+')">Submit Price</button>&nbsp;&nbsp;&nbsp;&nbsp;<button  class="btn btn-danger">Cancel Request</button>'
 
                }
                
                $('.payment-content').html(s2)
             
                
                
            }
        })
    }
    $(document).ready(function()
    {
        filter('active')
  })
  
  function getnote(rid)
  {
    $.ajax({
        url:'./api/getnote.php',
        type:'POST',
        data:{'rid':rid},
        success:function(para)
        {
          console.log("This is note - ",para)
          $('.note .note-content').html(para)
        }
    })
  }

  function initiate(rid)
  { 
      $.ajax({
          url:'./api/reinitiate.php',
          type:'POST',
          data:{'rid':rid,'sid':sid},
          success:function(para)
          {
            console.log("This is note - ",para)
            alertdata(para,"")
            $('#alert').modal('show')
            $("#modalclose").click(function() {
              window.location.reload()
            });
          }
      })
  }
  function cancelRequest(rid)
  {
    $.ajax({
        url:'./api/cancelrequest.php',
        type:'POST',
        data:{'rid':rid,'sid':sid},
        success:function(para)
        {
          console.log("This is note - ",para)
          alertdata("Cancelled","Request Status")
          $('#alert').modal({backdrop: 'static', keyboard: false})
          $('#alert').modal('show')
          $("#modalclose").click(function() {
            window.location.reload()
          });
        }
    })
  }
  function submitfinal(rid)
  {
    // fprice = $("input[name='price']:checked").val()
    $.ajax({
        url:'./api/submitfinal.php',
        type:'POST',
        data:{'rid':rid,'sid':sid},
        success:function(para)
        {
          console.log("This is note - ",para)
          $('#payment').modal('hide')
          alertdata("Submitted Successfully","Pricing Status")
          $('#alert').modal({backdrop: 'static', keyboard: false})
          $('#alert').modal('show')
          $("#modalclose").click(function() {
              window.location.reload()
          });
        }
    })
  }

      // Desktop View
     
        console.log("desktop")
       
    
      
      var flag=0;
      



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