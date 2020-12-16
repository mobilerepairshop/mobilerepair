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

<i class="fa fa-dashboard" ></i> Dashboard / Insert Pincode

</li>



</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1  row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw" ></i> Insert Pincode

<a href="./index.php?cancel" style="float:right;color:blue;">  <i class="fa fa-times" aria-hidden="true"></i></a>

</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body"><!-- panel-body Starts -->

<!-- Form Start -->

<form method="post" enctype="multipart/form-data" id="mcompany">
    <div class="form-container">
        <p class="includedet">Please Enter Pincode</p><br>

        <table class="table">
            <tr>
                <th>Select City Name</th>
                <th>Enter Pincode</th>
            </tr>
            <tr>
                <td>
                    <select name="companies1" id="companies1">
                    </select>
                </td>
                <td>
                    <input type="text" id="mmodel1" name="mmodel1" placeholder="Enter Pincode 1 *" onfocus="addModel()">
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
$(document).ready(function(){

    $.ajax({
        url:"api/getcities.php",
        type:"POST",
        success:function(para)
        {
            para = JSON.parse(para)
            window.companies = para
            for(let i=0;i<para.length;i++)
            {
                var str = '<option value="'+para[i][1]+'">'+para[i][0]+'</option>'
                $("#companies1").append(str)
            }
        }
})
})
var ctr = 2
function addModel()
{
    var s = '<tr><td><select name="companies'+ctr+'" id="companies'+ctr+'"></select></td><td><input type="text" id="mmodel'+ctr+'" name="mmodel'+ctr+'" placeholder="Enter Pincode'+ctr+'*" onfocus="addModel()"></td></tr>'
    $(".table").append(s)
    for(let i=0;i<window.companies.length;i++)
    {
        var str = '<option value="'+window.companies[i][1]+'">'+window.companies[i][0]+'</option>'
        $("#companies"+ctr).append(str)
    }
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
    arr[0]= [$('#mmodel1').val(),$('#companies1').val()]
    for(let i =1;i<ctr;i++)
    {
        var x = '#mmodel'+(i+1)
        var y = '#companies'+(i+1)
        if($(x).val() != "" && $(x).val() != undefined)
        {
            arr.push([$(x).val(),$(y).val()])
        }
    }
    console.log(arr)
$.ajax({
  url: './api/submitpin.php',
  type: 'POST',
  data: {"mmodel":arr},
  success: function(response){
    if(response != "400")
    {
      alert("Pincode added successfully")
      window.open('index.php?view_pincode','_self');

    }
  }
})
return false;
});  
</script>

</div><!-- 2 row Ends -->
