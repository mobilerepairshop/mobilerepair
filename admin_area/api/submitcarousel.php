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
            $location = "../../storage/".$filename;
            $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
            $imageFileType = strtolower($imageFileType);
         
            /* Valid extensions */
            $valid_extensions = array("jpg","jpeg","png");
         
            $response = 0;
            /* Check file extension */
            if(in_array(strtolower($imageFileType), $valid_extensions)) {
               /* Upload file */
               if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){

                        $con = $database->get_db();
                        $query = 'insert into carousel(image)
                        values(?)';
                
                        $stmt = $con->prepare($query);
                        $stmt->bind_param('s',$filename);
                        if($stmt->execute())
                        {
                            echo "200";
                        }
                        else
                        {
                            echo $con->error;
                        }
                  echo "200";
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