<?php 
    include "includes/db.php";
    function notify($price,$bed_room,$property_type)
    {
    // echo "<script>alert('successfully')</script>";
    include "includes/db.php";

    if($price>5000 and $price<50000)
    {
        $priceCheck = 1;
    }
    else if($price>50000 and $price<100000)
    {
        $priceCheck = 2;
    }
    else if($price>100000 and $price<200000)
    {
        $priceCheck = 3;
    }
    else if($price>200000)
    {
        $priceCheck = 4;
    }
  
    $sql = "select * from customer_expectations where budget='$priceCheck' or bhk='$bed_room' or property_type='$property_type'";
    $result = mysqli_query($con,$sql);
    if($result)
    {
        $i=0;
        while($property_result = mysqli_fetch_assoc($result))
        {
            $mail = $property_result["email"];
            $mails[$i] = $mail;
            $i++;
            // echo "<script>alert('$mail')</script>";
        }
        return $mails;
    }
    else
    {
        return 2;
    }

}

    $price = 8000;
    $bed_room = 1;
    $property_type = "Shop";
    $stat = notify($price,$bed_room,$property_type);
    foreach($stat as $d)
    {
        echo "<script>alert('$d')</script>";
    }
?>