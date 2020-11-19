<style>
    label {
  background-color: #2a65ea;
  color: white;
  padding: 0.5rem;
  font-family: sans-serif;
  border-radius: 0.3rem;
  cursor: pointer;
  margin-top: 1rem;
}

#file-chosen{
  margin-left: 0.3rem;
  font-family: sans-serif;
}

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
<div class="row" ><!-- 1  row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<ol class="breadcrumb" ><!-- breadcrumb Starts -->

<li class="active" >

<i class="fa fa-dashboard" ></i> Dashboard / Insert Carousel Image

</li>



</ol><!-- breadcrumb Ends -->

</div><!-- col-lg-12 Ends -->

</div><!-- 1  row Ends -->

<div class="row" ><!-- 2 row Starts -->

<div class="col-lg-12" ><!-- col-lg-12 Starts -->

<div class="panel panel-default" ><!-- panel panel-default Starts -->

<div class="panel-heading" ><!-- panel-heading Starts -->

<h3 class="panel-title" >

<i class="fa fa-money fa-fw" ></i> Insert Carousel Image

</h3>


</div><!-- panel-heading Ends -->


<div class="panel-body"><!-- panel-body Starts -->

<!-- Form Start -->

<form method="post" enctype="multipart/form-data" id="mcompany">
    <div class="form-container">
        <p class="includedet">Select image</p><br>

        <!-- <input type="text" id="cname1" name="cname1" placeholder="Enter Company 1 Name*" onfocus="addCompany()"><br><br> -->
        

        <input type="file" id="file" name="file" />
        <input type="button" class="button" value="Upload" id="but_upload">

        <br><br>
        <div id="cdetails"> </div>
        
    </div>
    
</form>

<!-- Form End -->

</div><!-- panel-body Ends -->

</div><!-- panel panel-default Ends -->

</div><!-- col-lg-12 Ends -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   
<script>
var ctr = 2


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


$("#but_upload").click(function(){

var fd = new FormData();
var files = $('#file')[0].files;

// Check file selected or not
if(files.length > 0 ){
   fd.append('file',files[0]);

   $.ajax({
      url: './api/submitcarousel.php',
      type: 'post',
      data: fd,
      contentType: false,
      processData: false,
      success: function(response){
        
         if(response != 0){
            alert("Image Added Successfully")
            window.open('index.php?view_carousel','_self');
         }else{
            alert('file not uploaded');
         }
      },
   });
}else{
   alert("Please select a file.");
}
});

 
</script>

</div><!-- 2 row Ends -->
