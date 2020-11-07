<?php
if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {
  $get_boys = "SELECT admin_name,admin_id FROM admins where admin_role='delivery_boy'";
  $run_boy = mysqli_query($con,$get_boys);
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
        while($boy = mysqli_fetch_array($run_boy)){
          $namee=$boy['admin_name'];
          $boy_id=$boy['admin_id'];

          echo "<option value='$boy_id'>" .$namee . "</option>";
          }
      ?>
      <label>Time and Date</label>
      <input type="date" placeholder="Enter Date " id="boy_date" name="boy_date">
      <input type="time" placeholder="Enter Date " id="boy_time" name="boy_time">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="" name="quotes" class="btn btn-primary" onclick="updateModal(this.id)">Assign</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal End -->

<div class="row" ><!-- 1 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / View Enquiries
</li>

</ol><!-- breadcrumb Ends -->


</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->


<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" ><!-- panel-title Starts -->

<i class="fa fa-money fa-fw" ></i> View Enquiries

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>
<th>User Name</th>

<th>Brand</th>

<th>Model</th>

<th>Repair Price </th>

<th>Area Pincode</th>

<th>Request Date</th>

<th>Action</th>



</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php


$get_enquiries = "SELECT * FROM requests INNER JOIN users ON users.uid = requests.uid  where  requests.status=2";

$run_admin = mysqli_query($con,$get_enquiries);



while($row_admin = mysqli_fetch_array($run_admin)){


    
$username = $row_admin['username'];

$Brand = $row_admin['mcname'];

$Model = $row_admin['mmodel'];

$price = $row_admin['estprice'];

$Area_Pincode = $row_admin['pincode'];

$req_date = $row_admin['created_date'];
$rid = $row_admin['rid'];

?>

<tr>


<td><?php echo $username; ?></td>

<td><?php echo $Brand; ?></td>

<td><?php echo $Model; ?></td>

<td><?php echo $price; ?></td>

<td><?php echo $Area_Pincode; ?></td>

<td><?php echo $req_date; ?></td>

<td><input type="button" id="<?php echo $rid; ?>" name="assign" value="Assign" class="btn btn-primary form-control" data-toggle="modal" data-target="#exampleModal" onclick="modaldata(this.id)"></td>


</tr>


<?php } ?>

</tbody><!-- tbody Ends -->



</table><!-- table table-bordered table-hover table-striped Ends -->

</div><!-- table-responsive Ends -->


</div><!-- panel-body Ends -->


</div><!-- panel panel-default Ends -->


</div><!-- col-lg-12 Ends -->



</div><!-- 2 row Ends -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>
    function modaldata(rid)
    {
        $("#exampleModalLabel").empty()
        $("#exampleModalLabel").append("Assign Delivery boy for Request No: "+rid)
        $('[name="quotes"]').attr("id",rid)
    }
    function updateModal(rid)
    {
        $.ajax({
        url:"api/assigndeliveryboy.php",
        type:"POST",
        data:{"rid":rid , "boy_date":$("#boy_date").val() ,"boy_name":$("#boy_name").val() , "boy_time":$("#boy_time").val()},
        success:function(para)
        {
            if(para=='success')
            {
                alert("Assigned")
                window.setTimeout(function(){location.reload()},1000)
            }else{
              alert("Not Assigned")
                window.setTimeout(function(){location.reload()},1000)
            }
            
        }
    })
    }
</script>



<?php }  ?>