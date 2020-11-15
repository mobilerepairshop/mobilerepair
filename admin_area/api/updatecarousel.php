<?php 
    error_reporting(0);
    require_once('../includes/db.php');
    require_once('../controllers/mobiles.php');
    require('../../database/sqlconnection.php');

    $success = $database->connect_db();
    
    if($success == "200")
    {
        if(isset($_FILES['file']['name'])){

            /* Getting file name */
            $filename = $_FILES['file']['name'];
         
            /* Location */
            $location = "../carousel_images/".$filename;
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);
         
            /* Valid extensions */
            $valid_extensions = array("jpg","jpeg","png");
         
            $response = 0;
            /* Check file extension */
            if(in_array(strtolower($imageFileType), $valid_extensions)) {
               /* Upload file */
               if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
                        // echo $_POST['id'];
                        $con = $database->get_db();
                        $query = 'update carousel set image="'.$filename.'" where id='.$_POST['id'];
                        $stmt = $con->prepare($query);
                        if($stmt->execute())
                        {
                            echo "200";
                        }
                        else
                        {
                            echo $con->error;
                        }
                 
               }
               else
               {
                echo "400";
               }
            }

            exit;
         }


    }
   else
   {
       echo "400c";
   }
    
?>