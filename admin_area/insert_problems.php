<div class="row" ><!-- 1  row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / Insert Main Problems

</li>



</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1  row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw" ></i> Insert Main Problems

</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body"><!-- panel-body Starts -->

<!-- Form Start -->

<form method="post" enctype="multipart/form-data" id="problems">
    <div class="form-container">
        <p class="includedet">Please Enter Main Problem</p><br>

        <input type="text" id="pname1" name="pname1" placeholder="Enter Main Problem 1 *" onfocus="addProblem()"><br><br>
        
        <div id="pdetails"> </div>

        <button class="form-btn" id="submit">Submit</button>
    </div>
    
</form>

<!-- Form End -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
<script>
var ctr = 2
function addProblem()
{
    // alert($("#"+id).val())
    var s = '<input type="text" id="pname'+ctr+'" name="pname'+ctr+'" placeholder="Enter Main Problem '+ctr+' *" onfocus="addProblem()"><br><br>'
    $("#pdetails").append(s)
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
    arr[0]= $('#pname1').val()
    for(let i =1;i<ctr;i++)
    {
        var x = '#pname'+(i+1)
        if($(x).val() != "" && $(x).val() != undefined)
        {
            arr.push($(x).val())
        }
    }

$.ajax({
  url: './api/submitproblem.php',
  type: 'POST',
  data: {"pname":arr},
  success: function(response){
    if(response != "400")
    {
      alert("Main Problem Added Successfully")
      window.open('index.php?view_problems','_self');
    }
  }
})
return false;
});  
</script>

</div><!-- 2 row Ends -->
