<?php
if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {
  $get_boys = "SELECT admin_name,admin_id FROM admins where admin_role='delivery_boy'";
  $run_boy = mysqli_query($con,$get_boys);
  $run_boy1 = mysqli_query($con,$get_boys);
?>

<style>
.unstyled-button {
  border: none;
  padding: 0;
  background: none;
}
</style>


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

<!-- Repairing Details Modal End -->


<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / Track Enquiries
</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> Track Enquiries

<a href="./index.php?track_enquiries" style="float:right;color:blue;">Refresh</a>

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>
<th>Request</th>

<th>User Name </th>

<th>User Contact </th>

<th>User Address </th>

<th>Delivery Person</th>

<th>Date</th>

<th>Time </th>

<th>Status</th>

<th>Action</th>

<th>Confirm Price</th>





</tr>

</thead><!-- thead Ends -->

<tbody id="trackcontent"><!-- tbody Starts -->


</tbody><!-- tbody Ends -->

</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->


</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 2 row Ends -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>

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



    $.ajax({
      url: "./api/gettrackdata.php", 
      method:"POST",
      success: function(para)
      {
        var groupedPeople=groupArrayOfObjects(JSON.parse(para),"rid");
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
        var str = ''
        var dis = 1
        for(let i=0;i<array.length;i++)
        {
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
          if(statuss=="9"){
            statuss="Phone dropped to customer";
          }
          var disabled1 = dis == 0?"" : "disabled";
          var disabled_assign = statuss != "Price accepted by user"?"disabled" : "";
          var orderid = String(array[i].rid).padStart(5, '0')
          if(array[i].status==9)
          {
            var str = "<tr><td>MR"+orderid+"</td><td>"+array[i].username+"</td><td>"+array[i].phonenum+"</td><td>"+array[i].address+"</td><td><input type='button' style='color:#337ab7;' id='"+array[i].rid+"' name='assign' value='"+array[i].admin_name+"'  class='unstyled-button' data-toggle='modal' data-target='#eModal' onclick='deliverymodaldata(this.id)'></td><td>"+array[i].date+"</td><td>"+array[i].time+"</td><td>"+statuss+"</td><td><input type='button' id='"+array[i].rid+"' name='warranty' value='Warranty Period' class='btn btn-primary form-control' data-toggle='modal' data-target='#warranty' onclick='modaldata(this.id)' ></td><td><input type='button' id='"+array[i].rid+"' name='assign' value='Assign' class='btn btn-primary form-control' data-toggle='modal' data-target='#exampleModal' onclick='modaldata(this.id)' "+disabled_assign+"></td></tr>"
          }
          else
          {
            var str = "<tr><td>MR"+orderid+"</td><td>"+array[i].username+"</td><td>"+array[i].phonenum+"</td><td>"+array[i].address+"</td><td><input type='button' style='color:#337ab7;' id='"+array[i].rid+"' name='assign' value='"+array[i].admin_name+"'  class='unstyled-button' data-toggle='modal' data-target='#eModal' onclick='deliverymodaldata(this.id)'></td><td>"+array[i].date+"</td><td>"+array[i].time+"</td><td>"+statuss+"</td><td><input type='button' id='"+array[i].rid+"' name='assign' value='Assign' class='btn btn-primary form-control' data-toggle='modal' data-target='#exampleModal' onclick='modaldata(this.id)' "+disabled_assign+"></td><td><input type='button' id='"+array[i].rid+"' name='pricing' value='Pricing' class='btn btn-primary form-control' "+disabled1+" onclick='pricemodaldata(this.id)' ></td></tr>"
          }
         
          $("#trackcontent").append(str)
        }
      }
    });
  })

  function groupArrayOfObjects(list, key) {
      return list.reduce(function(rv, x) {
        (rv[x[key]] = rv[x[key]] || []).push(x);
        return rv;

      }, {});
    };
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
</script>



<?php }  ?>