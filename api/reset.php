<?php
if(isset($_POST))
{
    include_once "../database/connection.php";
    $username=$_POST['username'];
    $sql = "select phonenum from users where username='$username'";
    $run = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($run)){
        $customer_phone = $row['phonenum'];
        echo($customer_phone);
    }
}

?>