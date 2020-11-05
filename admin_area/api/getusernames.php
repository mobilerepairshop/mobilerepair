<?php

error_reporting(0);
if(isset($_POST))
{
    require('../includes/db.php');
    $sql = 'SELECT max(admin_id) FROM admins';
    $result = mysqli_query($con, $sql);
    
    if (mysqli_num_rows($result) > 0) 
    {
        while($row = mysqli_fetch_assoc($result)) 
        {
            echo $row['max(admin_id)'];
        }
    }
}

?>