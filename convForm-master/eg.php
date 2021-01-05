<?php

    $con = mysqli_connect("localhost","root","","mobilerepair");

    if(isset($_POST)) 
    {
        $fname=$_POST['fname'];
        $serv=$_POST['serv'];
        $city=$_POST['city'];
        $pincode=$_POST['pincode'];
        $mno = $_POST['mno'];
    
        $insert_chat = "insert into chat(work,city,pin,mobile,fname)values('$serv','$city','$pincode','$mno','$fname')";
        $run_admin = mysqli_query($con,$insert_chat);
        if($run_admin){
            echo("inserted");
        }
        else {
            echo("Error");
        }
    }
   

?>