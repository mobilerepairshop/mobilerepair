<?php

// error_reporting(0);
if(isset($_POST))
{
    session_start();
    require('../includes/db.php');

    $prev = $_POST['imgarray'];
    $sql = 'SELECT img FROM bulkimgs WHERE bid='.$_POST["bid"];
    $res = $con->query($sql);
    $previmg = [];
    while($row = $res->fetch_assoc()) 
    {
        array_push($previmg,$row['img']);
    }
    foreach ($prev as $key => $value)
    {
        if($key == "new")
        {
            $sql = 'INSERT INTO bulkimgs(bid,img) VALUES('.$_POST["bid"].',"'.$value.'")';   
            $result = $con->query($sql);
        }
        else
        {
            for($i=0;$i<count($previmg);$i++)
            {
                if($previmg[$i] == $key)
                {
                    $sql = 'UPDATE bulkimgs SET img="'.$value.'" WHERE img = "'.$key.'"';   
                    $result = $con->query($sql);
                }
            }
        }
    }
    if($result)
    {
        echo "200";
    }
    else
    {
        echo "fail";
    }
}
else
{
    echo "100";
}

?>