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

<a href="./index.php?view_enquiries" style="float:right;color:blue;">Refresh</a>

</h3><!-- panel-title Ends -->


</div><!-- panel-heading Ends -->

<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Order ID</th>

<th>User Name</th>

<th>Contact Number</th>

<th>Area Pincode</th>

<th>User Address</th>

<th>Brand : Model</th>

<th>Problem & Problem Description</th>
<th>Under Warranty</th>
<th>Repair Price </th>

<th>Action</th>

</tr>

</thead><!-- thead Ends -->

<tbody><!-- tbody Starts -->

<?php

$get_r = "SELECT * FROM req 
          INNER JOIN problems ON problems.rid = req.rid
          INNER JOIN problem_master ON problems.problem = problem_master.problem_code
          INNER JOIN subproblem_master ON problems.subproblem = subproblem_master.subproblem_code
          where  req.status=0";

$run_r = mysqli_query($con,$get_r);

$prob = [];

while($row_r=mysqli_fetch_array($run_r)){

array_push($prob,[$row_r['rid'],$row_r['main_problem'],$row_r['sub_problem']]);

}


$get_enquiries = "SELECT * FROM req 
                  INNER JOIN mobilemodel ON mobilemodel.mmid = req.mmid 
                  INNER JOIN mobilecompany ON mobilecompany.mcid = mobilemodel.mcid 
                  INNER JOIN users ON users.uid = req.uid 
                  where  req.status=0";
$run_admin = mysqli_query($con,$get_enquiries);

while($row_admin = mysqli_fetch_array($run_admin)){
    
$username = $row_admin['username'];

$Brand = $row_admin['mcname'];

$Model = $row_admin['mmname'];

$price = $row_admin['estprice'];

$inwarr = $row_admin['inwarr'];

$phonenum = $row_admin['phonenum'];

$Area_Pincode = $row_admin['pincode'];

$problem = $row_admin['main_problem'];

$subproblem = $row_admin['sub_problem'];

$address = $row_admin['address'];

$rid = $row_admin['rid'];

?>

<tr>

<td><?php echo "MR".sprintf("%05d", $rid); ?></td>

<td><?php echo $username; ?></td>

<td><?php echo $phonenum; ?></td>

<td><?php echo $Area_Pincode; ?></td>

<td><?php echo $address; ?></td>

<td><?php echo $Brand . " : " .$Model ; ?></td>

<td>
    <table class="table table-bordered">

        <?php 
        for($j=0;$j<count($prob);$j++)
        {
            if($prob[$j][0] == $rid)
            {
        ?>
                <tr>
                    <td> <?php echo $prob[$j][1]; ?></td>
                    <td> <?php echo $prob[$j][2]; ?></td>
                </tr>

        <?php
            }
        }

        ?>
    </table> 

</td>


<td><?php echo $inwarr==1 ? 'Under Warranty' : 'New Request';?></td>

<td><?php echo $price; ?></td>

<td>
  <input type="button" id="<?php echo $rid; ?>" name="assign" value="Assign" class="btn btn-primary form-control" data-toggle="modal" data-target="#exampleModal" onclick="modaldata(this.id)">
</td>


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