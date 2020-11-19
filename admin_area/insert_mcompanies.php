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

<i class="fa fa-dashboard" ></i> Dashboard / Insert Mobile Companies

</li>



</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1  row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw" ></i> Insert Mobile Companies

</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body"><!-- panel-body Starts -->

<!-- Form Start -->

<form method="post" enctype="multipart/form-data" id="mcompany">
    <div class="form-container">
        <p class="includedet">Please Enter Company Details</p><br>

        <input type="text" id="cname1" name="cname1" placeholder="Enter Company 1 Name*" onfocus="addCompany()"><br><br>
        
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
function addCompany()
{
    // alert($("#"+id).val())
    var s = '<input type="text" id="cname'+ctr+'" name="cname'+ctr+'" placeholder="Enter Company '+ctr+' Name*" onfocus="addCompany()"><br><br>'
    $("#cdetails").append(s)
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
    arr[0]= $('#cname1').val()
    for(let i =1;i<ctr;i++)
    {
        var x = '#cname'+(i+1)
        if($(x).val() != "" && $(x).val() != undefined)
        {
            arr.push($(x).val())
        }
    }

$.ajax({
  url: './api/submitcname.php',
  type: 'POST',
  data: {"cname":arr},
  success: function(response){
    if(response != "400")
    {
      alert("Company Added Successfully")
      window.open('index.php?view_mcompanies','_self');
    }
  }
})
return false;
});  
</script>

</div><!-- 2 row Ends -->
