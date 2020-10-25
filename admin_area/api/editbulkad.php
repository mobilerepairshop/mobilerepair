<?php

error_reporting(0);
if(isset($_POST))
{
    session_start();
    require('../includes/db.php');
    $images = [];
    $title = $_POST['title'];
    $brand = $_POST['brand'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $bid = $_GET['bid'];
    for($i=1;$i<=12;$i++)
    {
        if($_POST['image'.$i]=='no')
        {
            continue;
        }
        else
        {
            $imgFile = $_FILES['image'.$i]['name'];
            $ctemp = $_FILES["image".$i]['tmp_name'];
            
            move_uploaded_file($ctemp,'../product_images/'.$imgFile);
            
        }
        
    }
    $sql = 'UPDATE bulkproducts SET title="'.$title.'", description="'.$desc.'", price='.$price.', brand="'.$brand.'" WHERE bid='.$bid;

    if($con->query($sql))
    {
        echo "200";
    }
    else
    {
        echo "500";
    }


}
else
{
    echo "100";
}

?>