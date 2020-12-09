<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8" />
    <link href="//cdn.syncfusion.com/17.1.0.38/js/web/flat-azure/ej.web.all.min.css" rel="stylesheet" />
    <link href="//cdn.syncfusion.com/17.1.0.38/js/web/responsive-css/ej.responsive.css" rel="stylesheet" />


    <script src="js/jquery.min.js" rel="stylesheet"></script>
    <script src="//cdn.syncfusion.com/js/assets/external/jsrender.min.js"></script>
    <script type="text/javascript" src="//cdn.syncfusion.com/17.1.0.38/js/web/ej.web.all.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>
        .unstyled-button {
          border: none;
          padding: 0;
          background: none;
        }
        </style>
</head>
<body>

<?php
 require('../database/connection.php');
$get_boys = "SELECT admin_name,admin_id FROM admins where admin_role='delivery_boy'";
  $run_boy = mysqli_query($con,$get_boys);
  $run_boy1 = mysqli_query($con,$get_boys);
?>

<!-- Modal Start-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <label>Delivery Boy</label>
          <select  name="boy_name" id="boy_name">
        <?php 
          while($boy1 = mysqli_fetch_array($run_boy1)){
            $namee=$boy1['admin_name'];
            $boy_id=$boy1['admin_id'];
  
            echo "<option value='$boy_id'>" .$namee . "</option>";
            }
        ?>
        <label>Time and Date</label>
        <input type="date" placeholder="Enter Date " id="boy_date" name="boy_date">
        <input type="time" placeholder="Enter Date " id="boy_time" name="boy_time">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="" name="quotes" class="btn btn-primary" onclick="updateModal(this.id)">Update</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal End -->
  
  <!-- Warranty Modal Start-->
  <div class="modal fade" id="warranty" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <label>Warranty Period</label>
   <br><br>
        <input type="radio" value="warr" name="warR">Warranty</input><br><br>
        <input type="radio" value="nowarr" name="warR">No Warranty</input><br><br>
        <div id="datediv"  style="display:none;"><label>Select Date</label> <input type="date" id="wardate" placeholder="Enter Date"></div><br>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="" name="quotes" class="btn btn-primary" onclick="updatewarranty(this.id)">Update</button>
        </div>
      </div>
    </div>
  </div>
  
  <!--Warranty Modal End -->
<!-- Problem Modal -->
<div class="modal fade" id="problem">
  <div class="modal-dialog modal-dialog-centered modal-lg" >
  <div class="modal-content">
  <div class="modal-header">
  <h4 class="modal-title problems"></h4>
  <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>
  <div class="modal-body problem">
      <table class="problem-content" style="width:100%;">
  
      </table>
  </div>
  <div class="modal-footer">
  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
  </div></div></div></div>
  
  <!-- Problem Modal -->

<!-- Modal Start-->
<div class="modal fade" id="exModal" tabindex="-1" role="dialog" aria-labelledby="exModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Total Cost for Repairing (₹) *<input type="text" placeholder="Enter Amount in ₹ " id="price">
          Additional Note (if any)<input type="text" placeholder="Enter Note " id="note">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="" name="temp" class="btn btn-primary" onclick="updateprice(this.id)">Update Price</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal End -->

  <!-- Modal Start-->
  <div class="modal fade" id="eModal" tabindex="-1" role="dialog" aria-labelledby="eModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="eModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <label>Delivery Boy</label>
          <select  name="boy_name" id="boy_name">
        <?php 
          while($boy = mysqli_fetch_array($run_boy)){
            $namee=$boy['admin_name'];
            $boy_id=$boy['admin_id'];
  
            echo "<option value='$boy_id'>" .$namee . "</option>";
            }
        ?>
        <label>Time and Date</label>
        <input type="date" placeholder="Enter Date " id="boy_datee" name="boy_date">
        <input type="time" placeholder="Enter Date " id="boy_timee" name="boy_time">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="" name="temp1" class="btn btn-primary" onclick="deliveryupdateModal(this.id)">Update</button>
        </div>
      </div>
    </div>
  </div>
  
  <!-- Modal End -->
  
  <!-- Repairing Details Modal Start-->
  <div class="modal fade" id="rdModal" tabindex="-1" role="dialog" aria-labelledby="rdModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="rdModalLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Mobile IMEI Number *<input type="text" placeholder="Enter Mobile IMEI Number " id="imeino">
          Repair Person Name *<input type="text" placeholder="Enter Repair Person Name " id="repairperson">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" id="" name="rdbutton" class="btn btn-primary" onclick="repairingdetails(this.id)">Update</button>
        </div>
      </div>
    </div>
  </div>

   <button id="btn1" onclick="Clear()">
    Click here to Clear Filter
  </button>
<br><br>
    <div id="Grid"></div>
    <script type="text/javascript">
      var Data = [];
        $(function () {
                $.ajax({
                url:"api/gettrackdata.php",
                  type:"POST",
                  success:function(para1)
                  {
                    var groupedPeople=groupArrayOfObjects(JSON.parse(para1),"rid");
                    console.log("This is - ",groupedPeople)
                    var array = []
                    for(x in groupedPeople)
                    {
                      for(let j=0;j<groupedPeople[x].length;j++)
                      {
                        if(groupedPeople[x][j].status >= 8 && groupedPeople[x][j].delivery_status == 1)
                        {
                          array.push(groupedPeople[x][j])
                        }
                        else if(groupedPeople[x][j].status < 8 && (groupedPeople[x][j].delivery_status == 0 || groupedPeople[x][j].delivery_status == 2))
                        {
                          array.push(groupedPeople[x][j])
                        }
                      } 
                    }
                    for(let i=0;i<array.length;i++)
                    {
                        var dis = 1
                       
                          var statuss = array[i].status
                          if(statuss=="1"){
                            statuss="Delivery person assigned";
                          }
                          if(statuss=="2"){
                            statuss="Phone picked up from user";
                          }
                          if(statuss=="3"){  
                            statuss="Phone dropped to admin <br> <a id='"+(array[i].rid)+"' data-toggle='modal' data-target='#rdModal' style='cursor:pointer;' onclick='rddata(this.id)'>Repairing Details</a>";
                            dis = 0;
                          }
                          if(statuss=="4"){
                            statuss="Price Updated";
                          }
                          if(statuss=="7"){
                            statuss="Price accepted by user";
                          }
                          if(statuss=="8"){
                            statuss="Person assigned for delivery";
                          }
                          var disabled1 = dis == 0?"" : "disabled";
                          var disabled_assign = statuss != "Price accepted by user"?"disabled" : "";
                          if(statuss=="9"){
                            statuss="Phone dropped to customer";
                            actionn="<input type='button' id='"+array[i].rid+"' name='warranty' value='Warranty Period' class='btn btn-primary form-control' data-toggle='modal' data-target='#warranty' onclick='modaldata(this.id)' >"
                          }
                          else{
                            actionn="<input type='button' id='"+array[i].rid+"' name='assign' value='Assign' class='btn btn-primary form-control' data-toggle='modal' data-target='#exampleModal' onclick='modaldata(this.id)' "+disabled_assign+">"
                          }
                         
                      Data.push({
                      rid:array[i].rid,
                      date:array[i].date,
                      time:array[i].time,
                      username:array[i].username,
                      phonenum:array[i].phonenum,
                      address:array[i].address,
                      status:statuss,
                      admin_name:'<input type="button" style="color:#337ab7;" id="'+array[i].rid+'" name="assign" value="'+array[i].admin_name+'"  class="unstyled-button" data-toggle="modal" data-target="#eModal" onclick="deliverymodaldata(this.id)">',
                      pricing:"<input type='button' id='"+array[i].rid+"' name='pricing' value='Pricing' class='btn btn-primary form-control' "+disabled1+" onclick='pricemodaldata(this.id)' >",
                      action:actionn,
                      delivery_status:array[i].delivery_status,
                      warranty:array[i].warranty,
                      orderid:array[i].orderid
                     
                  });           
                }
                    
                $("#Grid").ejGrid({
                dataSource: Data,
                allowPaging: true,
                allowFiltering: true,
                allowScrolling:true,
                enableHeaderHover: true,
                filterSettings: { filterType: "excel" },
                columns: [
                { field: "orderid", isPrimaryKey: true, headerText: "Order ID", width: 110 },
                         { field: "username", headerText: "Customer Name", width: 160 },
                         { field: "phonenum", headerText: "Contact Number", width: 160 },
                         { field: "address", headerText: "Customer Address", width: 110 },
                         { field: "admin_name", headerText: "Delivery Person", width: 230 },
                         { field: "date", headerText: "Date ", width: 100 },
                         { field: "time", headerText: "Time", width: 100 },
                         { field: "status", headerText: "Status", width: 150 },
                         { field: "action", headerText: "Action", width: 150 },
                         { field: "pricing", headerText: "Confirm Pricing", width: 150 },

                ]
            });
               
              }
            })


          });        
      
      function Filter(){
                var gridObj = $("#Grid").ejGrid("instance");
                    gridObj.filterColumn([
                        { field: "orderid", operator: "contains", value: 'S', predicate: "and", matchcase: false },
                        { field: "orderid", operator: "contains", value: 'A', predicate: "and", matchcase: false },
                    ])
      }
      function Clear(){
                var gridObj = $("#Grid").ejGrid("instance");
                    gridObj.clearFiltering();
      }
      function groupArrayOfObjects(list, key) {
      return list.reduce(function(rv, x) {
        (rv[x[key]] = rv[x[key]] || []).push(x);
        return rv;

      }, {});
    };
function updatewarranty(id)
{
  var radioValue = $("input[name='warR']:checked").val();

  if(radioValue=='warr')
  {
    date = $('#wardate').val()
  }
  else
  {
    date = "nowarr"
  }

    $.ajax({
        url:"api/updatewarranty.php",
        type:"POST",
        data:{"rid":id , "date":date},
        success:function(para)
        {
            if(para=='success')
            {
                alert("Updated")
                window.setTimeout(function(){location.reload()},1000)
            }else{
              alert(para)
                window.setTimeout(function(){location.reload()},1000)
            }
            
        }
    })
}
$(document).ready(function()
  {
    $('#eModal').modal('hide');
    $('#exModal').modal('hide');
    $('#exampleModal').modal('hide');
    $("input[type=radio]").change(function(){
      alert(this.value)
      if(this.value=='warr')
      {
          $('#datediv').show();
      }
      else
      {
        $('#datediv').hide();
      }
    });

  })


    function pricemodaldata(rid)
    {
      $.ajax({
          url:"./api/getrddetails.php",
          method:"POST",
          data:{"rid":rid},
          success:function(para)
          {
              para = JSON.parse(para)
              if(para[0] == "" && para[1] == "")
              {
                alert("Please Provide IMEI Number and Repair Person Name First")
                $('#exModal').modal('hide');
              } 
              else
              {
                $('#exModal').modal('show');
                $("#exModalLabel").empty()
                $("#exModalLabel").append("Assign Delivery boy for Request No: "+rid)
                $('[name="temp"]').attr("id",rid)
                $.ajax({
                  url:"api/getprice.php",
                  method:"POST",
                  data:{"rid":rid},
                  success:function(para)
                  {
                    console.log(para);
                    para = JSON.parse(para)
                    $("#price").val(para[0])
                    $("#note").val(para[2])
                    if(para[1]!="0")
                    {
                      $("#price").val(para[1])
                    }
                  }
                })
              }
          }
        })
    }

    function updateprice(rid)
    {
        $.ajax({
        url:"api/updateprice.php",
        type:"POST",
        data:{"rid":rid , "price":$("#price").val() , "note":$("#note").val()},
        success:function(para)
        {
            if(para == "success")
            {
                alert("Updated Successfully")
                window.setTimeout(function(){location.reload()},1000)
            }
            else
            {
                alert(para)
                
            }
        }
    })
    }
    function deliverymodaldata(rid)
    {
        $("#eModalLabel").empty()
        $("#eModalLabel").append("Update Delivery boy for Request No: "+rid)
        $('[name="temp1"]').attr("id",rid)
    }
    function rddata(rid)
    {
        $("#rdModalLabel").empty()
        $("#rdModalLabel").append("Update Repairing Details for Request No: "+rid)
        $('[name="rdbutton"]').attr("id",rid)
        $.ajax({
          url:"./api/getrddetails.php",
          method:"POST",
          data:{"rid":rid},
          success:function(para)
          {
              para = JSON.parse(para)
              $("#repairperson").val(para[1])
              $("#imeino").val(para[0])  
          }
        })
    }
    function modaldata(rid)
    {
        $("#exampleModalLabel").empty()
        $("#exampleModalLabel").append("Assign Delivery boy for Request No: "+rid)
        $('[name="quotes"]').attr("id",rid)
    }
    function deliveryupdateModal(rid)
    {
        $.ajax({
        url:"api/updatename.php",
        type:"POST",
        data:{"rid":rid , "boy_date":$("#boy_datee").val() ,"boy_name":$("#boy_name").val() , "boy_time":$("#boy_timee").val()},
        success:function(para)
        {
            if(para=='success')
            {
                alert("Updated")
                window.setTimeout(function(){location.reload()},1000)
            }else{
              alert(para)
                window.setTimeout(function(){location.reload()},1000)
            }
            
        }
    })
    }
    function updateModal(rid)
    {
        $.ajax({
        url:"api/updatedeliveryboy.php",
        type:"POST",
        data:{"rid":rid , "boy_date":$("#boy_date").val() ,"boy_name":$("#boy_name").val() , "boy_time":$("#boy_time").val()},
        success:function(para)
        {
            if(para=='success')
            {
                alert("Updated")
                window.setTimeout(function(){location.reload()},1000)
            }else{
              alert(para)
                window.setTimeout(function(){location.reload()},1000)
            }
            
        }
    })
    }

    function repairingdetails(rid)
    {
        $.ajax({
        url:"api/repairingdetails.php",
        type:"POST",
        data:{"rid":rid , "repairperson":$("#repairperson").val() , "imeino":$("#imeino").val()},
        success:function(para)
        {
            if(para=='success')
            {
                alert("Updated")
                window.setTimeout(function(){location.reload()},1000)
            }else{
              alert(para)
                window.setTimeout(function(){location.reload()},1000)
            }
            
        }
    })
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




    </script>
</body>
</html>
