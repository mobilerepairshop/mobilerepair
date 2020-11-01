<?php

if($_COOKIE['sid'] == null){

echo "<script>window.open('login.php','_self')</script>";

}

else {


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
        Total Cost for Repairing (₹) *<input type="text" placeholder="Enter Amount in ₹ " id="price">
        Additional Note (if any)<input type="text" placeholder="Enter Note " id="note">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="" name="quotes" class="btn btn-primary" onclick="updateModal(this.id)">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal End -->

<div class="row"><!-- 1 row Starts -->

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<ol class="breadcrumb"><!-- breadcrumb Starts -->

<li class="active">

<i class="fa fa-dashboard"></i> Dashboard / View Problem Requests

</li>

</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts --> 

<div class="col-lg-12"><!-- col-lg-12 Starts -->

<div class="panel panel-default"><!-- panel panel-default Starts -->

<div class="panel-heading"><!-- panel-heading Starts -->

<h3 class="panel-title"><!-- panel-title Starts -->

<i class="fa fa-money fa-fw"></i> View Problem Requests

</h3><!-- panel-title Ends -->

</div><!-- panel-heading Ends -->


<div class="panel-body" ><!-- panel-body Starts -->

<div class="table-responsive" ><!-- table-responsive Starts -->

<table class="table table-bordered table-hover table-striped" ><!-- table table-bordered table-hover table-striped Starts -->

<thead><!-- thead Starts -->

<tr>

<th>Request No</th>
<th>Pincode</th>
<th>Mobile Company</th>
<th>Mobile Model</th>
<th>Problem and Problem Description</th>
<th>Quotation</th>
<th>Status</th>

</tr>

</thead><!-- thead Ends -->


<tbody><!-- tbody Starts -->

<?php

$pro_desc = ["waterdamage"=>"Water Damage" , "mobiledead"=>"Mobile is Dead" , "toucherror"=>"Display is OK but partial/full touch not working" , "displayerror"=>"Touch is OK display damaged" , "touchdisplayerror"=>"Touch and display both not working" , "micerror"=>"Mic Problem" , "speakererror"=>"Speaker problem" , "loudspeakererror"=>"Loud speaker problem" , "vibratorerror"=>"Ringer/Vibrator problem" , "faultybattery"=>"Battery is faulty" , "chargingerror"=>"Mobile is not charging" , "networkerror"=>"Network not showing" , "towererror"=>"Only 1-2 tower showing in mobile" , "simerror"=>"SIM not detecting" , "detectionerror"=>"Memory card not detecting" , "powererror"=>"Power ON button not working" , "volumerror"=>"Volume buttons are not working" , "cameraerror"=>"Camera not working" , "lockerror"=>"Forgot screen lock/Password" , "flasherror"=>"Flash new software"];

$get_r = "select * from requests where status=0";

$run_r = mysqli_query($con,$get_r);

$req = [];
while($row_r=mysqli_fetch_array($run_r)){
if($row_r['status'] == 0)
{
  $status = "Requested By User";
}
else if($row_r['status'] == 1)
{
  $status = "Quotation Sent";
}
array_push($req,[$row_r['rid'],$row_r['pincode'],$row_r['mcname'],$row_r['mmodel'],$status]);

}

$get_r = "select * from problems";

$run_r = mysqli_query($con,$get_r);

$prob = [];
while($row_r=mysqli_fetch_array($run_r)){

array_push($prob,[$row_r['rid'],$row_r['problem'],$pro_desc[$row_r['subproblem']]]);

}

for($i=0;$i<count($req);$i++)
{

?>

<tr>

<td><?php echo $i+1; ?></td>

<td><?php echo $req[$i][1]; ?></td>

<td><?php echo $req[$i][2]; ?></td>

<td><?php echo $req[$i][3]; ?></td>

<td>
    <table class="table table-bordered">

        <?php 
        for($j=0;$j<count($prob);$j++)
        {
            if($prob[$j][0] == $req[$i][0])
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
<td>
    <button id="<?php echo $i+1; ?>" name="<?php echo $req[$i][0]; ?>" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="modaldata(this.id,this.name)">
    Pricing
    </button>
</td>
<td><?php echo $req[$i][4]; ?></td>

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
    function modaldata(id,rid)
    {
        $("#exampleModalLabel").empty()
        $("#exampleModalLabel").append("Quotation For Request No: "+id)
        $('[name="quotes"]').attr("id",rid)
        $.ajax({
        url:"api/getquote.php",
        type:"POST",
        data:{"rid":rid},
        success:function(para)
        {
            para = JSON.parse(para)
            $("#price").val(para[0])
            $("#note").val(para[1])
        }
    })
    }
    function updateModal(rid)
    {
        $.ajax({
        url:"api/updatequote.php",
        type:"POST",
        data:{"rid":rid , "price":$("#price").val() , "note":$("#note").val()},
        success:function(para)
        {
            if(para == "200")
            {
                alert("Updated Successfully")
                window.setTimeout(function(){location.reload()},1000)
            }
            else
            {
                alert("Please Resubmit the Data")
                window.setTimeout(function(){location.reload()},1000)
            }
        }
    })
    }
</script>

<?php } ?>