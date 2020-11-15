<?php
include("db.php");
if(isset($_REQUEST["userresponse"])) {
    $arr=($_REQUEST["userresponse"]);  
    $var1=$arr[0];
    $var2=$arr[1];
    $var3=$arr[2];
    $var4=$arr[3];

    $insert_chat = "insert into chat(work,city,pin,mobile)values('$var1','$var2','$var3','$var4')";
    $run_admin = mysqli_query($con,$insert_chat);
    if($run_admin){
        echo("inserted");

    }else {
        echo("Error");
    }
    }

?>