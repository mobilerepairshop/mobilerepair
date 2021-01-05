<head>
<style>
.button {
  background-color: #008CBA; /* Green */
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
</head>
<div class="row" ><!-- 1  row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / Insert Locations

</li>



</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1  row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw" ></i> Insert Contact Locations
<a href="./index.php?cancel" style="float:right;color:blue;">  <i class="fa fa-times" aria-hidden="true"></i></a>
</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body"><!-- panel-body Starts -->

<!-- Form Start -->

<form method="post" enctype="multipart/form-data" id="mcompany">
    <div class="form-container">
        <p class="includedet">Please Enter Location Details</p><br>

        <table class="table">
            <tr>
                <th>Enter City</th>
                <th>Enter Detailed Address</th>
                <th>Enter Admin Name</th>
                <th>Enter Admin Contact</th>
                <th>Enter Admin Email</th>
            </tr>
            <tr>
                <td>
                    <input type="text" id="contactcity1" name="contactcity" placeholder="Enter Contact Location City 1 *" onfocus="addContactCity()" require>
                </td>
                <td>
                    <input type="text" id="contactaddress1" name="contactaddress" placeholder="Enter Location Address 1 *" require>
                </td>
                <td>
                    <input type="text" id="contactadmin1" name="contactadmin" placeholder="Enter Contact Admin Name 1 *" require>
                </td>
                <td>
                    <input type="text" id="contactnumber1" name="contactnumber" placeholder="Enter Admin Contact Number 1 *" require>
                </td>
                <td>
                    <input type="text" id="contactemail1" name="contactemail" placeholder="Enter Admin Contact Email 1 *" require>
                </td>
                
            </tr>
        </table>
        
        
        
        <div id="cdetails"> </div>

        <button class="button" id="submit">Submit</button>
    </div>
    
</form>

<!-- Form End -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
<script>
var ctr = 2
function addContactCity()
{
    var s = '<tr><td><input type="text" id="contactcity'+ctr+'" name="contactcity'+ctr+'" placeholder="Enter Contact Location City '+ctr+' *" onfocus="addContactCity()" required></td><td><input type="text" id="contactaddress'+ctr+'" name="contactaddress'+ctr+'" placeholder="Enter Location Address '+ctr+' *" required></td><td><input type="text" id="contactadmin'+ctr+'" name="contactadmin'+ctr+'" placeholder="Enter Contact Admin Name '+ctr+' *" required></td><td><input type="text" id="contactnumber'+ctr+'" name="contactnumber'+ctr+'" placeholder="Enter Admin Contact Number '+ctr+' *" require></td><td><input type="text" id="contactemail'+ctr+'" name="contactemail'+ctr+'" placeholder="Enter Admin Contact Email '+ctr+' *" require></td></tr>'
    $(".table").append(s)
    ctr+=1
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


var sid = getCookie("sid");
console.log(sid)
if(sid==null)
{
  window.location.replace('./')
}

$("#submit").click(function() {

    var arr=[]
    arr[0]= [$('#contactcity1').val(),$('#contactaddress1').val(),$('#contactadmin1').val(),$('#contactnumber1').val(),$('#contactemail1').val()]
    for(let i =1;i<ctr;i++)
    {
        var a = '#contactcity'+(i+1)
        var b = '#contactaddress'+(i+1)
        var c = '#contactadmin'+(i+1)
        var d = '#contactnumber'+(i+1)
        var e = '#contactemail'+(i+1)
        if($(a).val() != "" && $(a).val() != undefined && $(b).val() != "" && $(b).val() != undefined && $(c).val() != "" && $(c).val() != undefined && $(d).val() != "" && $(d).val() != undefined && $(e).val() != "" && $(e).val() != undefined)
        {
            arr.push([$(a).val(),$(b).val(),$(c).val(),$(d).val(),$(e).val()])
        }
    }
$.ajax({
  url: './api/submitcontactlocations.php',
  type: 'POST',
  data: {"locations":arr},
  success: function(response){
    if(response != "400")
    {
      alert("Contact Location Added Successfully")
      window.open('index.php?view_locations','_self');
    }
  }
})
return false;
});  
</script>

</div><!-- 2 row Ends -->
