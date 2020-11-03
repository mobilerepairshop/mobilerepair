<div class="row" ><!-- 1  row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / Insert Sub Problems

</li>



</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1  row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw" ></i> Insert Sub Problems

</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body"><!-- panel-body Starts -->

<!-- Form Start -->

<form method="post" enctype="multipart/form-data" id="subproblems">
    <div class="form-container">
        <p class="includedet">Please Enter Sub Problem Details</p><br>

        <table class="table">
            <tr>
                <th>Select Main Problem</th>
                <th>Select Sub Problem</th>
            </tr>
            <tr>
                <td>
                    <select name="problems1" id="problems1">
                    </select>
                </td>
                <td>
                    <input type="text" id="subproblem1" name="subproblem1" placeholder="Enter Sub Problem 1 *" onfocus="addSubproblem()">
                </td>
            </tr>
        </table>
        
        
        
        <div id="spdetails"> </div>

        <button class="form-btn" id="submit">Submit</button>
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
        url:"api/getproblems.php",
        type:"POST",
        success:function(para)
        {
            para = JSON.parse(para)
            window.problems = para
            for(let i=0;i<para.length;i++)
            {
                var str = '<option value="'+para[i][1]+'">'+para[i][0]+'</option>'
                $("#problems1").append(str)
            }
        }
})
})
var ctr = 2
function addSubproblem()
{
    var s = '<tr><td><select name="problems'+ctr+'" id="problems'+ctr+'"></select></td><td><input type="text" id="subproblem'+ctr+'" name="subproblem'+ctr+'" placeholder="Enter Sub Problem '+ctr+' *" onfocus="addSubproblem()"></td></tr>'
    $(".table").append(s)
    for(let i=0;i<window.problems.length;i++)
    {
        var str = '<option value="'+window.problems[i][1]+'">'+window.problems[i][0]+'</option>'
        $("#problems"+ctr).append(str)
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
    arr[0]= [$('#subproblem1').val(),$('#problems1').val()]
    for(let i =1;i<ctr;i++)
    {
        var x = '#subproblem'+(i+1)
        var y = '#problems'+(i+1)
        if($(x).val() != "" && $(x).val() != undefined)
        {
            arr.push([$(x).val(),$(y).val()])
        }
    }
    console.log(arr)
$.ajax({
  url: './api/submitsubproblem.php',
  type: 'POST',
  data: {"subproblems":arr},
  success: function(response){
    if(response != "400")
    {
      alert("Sub Problem Added Successfully")
      window.open('index.php?view_subproblems','_self');

    }
  }
})
return false;
});  
</script>

</div><!-- 2 row Ends -->
