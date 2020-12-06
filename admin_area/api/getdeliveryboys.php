<?php

if(isset($_POST))
{
    require_once("../includes/db.php");
    $get_boys = "SELECT admin_name,admin_id FROM admins where admin_role='delivery_boy'";
    $run_boy = mysqli_query($con,$get_boys);
    $arr = [];
    while($boy = mysqli_fetch_array($run_boy))
    {
        $namee=$boy['admin_name'];
        $boy_id=$boy['admin_id'];
        array_push($arr,[$boy_id,$namee]);
    }
    echo json_encode($arr);
}

?>