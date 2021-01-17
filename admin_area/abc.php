<?php
// setcookie('AD', '123', time() + (86400 * 30), "/"); // 86400 = 1 day
// $sess_id = md5(uniqid(mt_rand(), true));
$sess_id = $_GET['sesid'];
setcookie('sid', $sess_id , time()+60*60*7 , '/');


// echo "<script>window.open('./index.php','_self')</script>";
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
$(document).ready(function(){
    $.ajax({
        url:"./api/getrights.php",
        type:"POST",
        success:function(para)
        {
            para = JSON.parse(para)
            var dashboard = 1
            for(let i=0;i<=16;i++)
            {
                if(!(para[1].includes(i)))
                {
                    console.log("nahi hai : "+i)
                    dashboard = 0
                }
            }
            if(dashboard == 1)
            {
                window.open('./index.php?dashboard','_self')
            }
            else
            {
                window.open('./index.php','_self')
            }
        }
    })
})
</script>