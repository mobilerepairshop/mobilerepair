<?php
     
class Mailer
{
    public $mail;
        function __construct($mail) {
            $this->mail = $mail;
        }
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
            echo "<script>console.log('$sql')</script>";
            
            $result = mysqli_query($con,$sql);
            if($result)
            {
                $i=0;
                while($property_result = mysqli_fetch_assoc($result))
                {
                    $email = $property_result["email"];
                    // echo "<script>alert($email)</script>";
                    $mails[$i] = $email;
                    $i++;
                }
                return $mails;
            }
            else
            {
                return 1;
            }

        }
      function sendmail($address,$property_id)
      {
        
        $this->mail->setFrom('Mridha Developers', 'Notification');
        $this->mail->addReplyTo(Email, 'Information');
        $this->mail->isHTML(true);  
        
        
        $this->mail->addAddress($address);
        $url='http://'.$_SERVER['SERVER_NAME'].'/realestatebuilder/property-detail.php?id='.$property_id;

        $this->mail->Subject = 'Property has been added! You can check it';
        // $mail->AddEmbeddedImage("logo.png", "logoimg", "logo.png");
        $this->mail->isHTML(true);  
        $this->mail->Body ='<p class="data"
                    style="text-align: justify-all; 
                            align-items: center; 
                            font-size: 18px; 
                            padding-bottom: 12px;"> 
                            This is link.'.$url.'
                    </p> ';

                    $this->mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$this->mail->send()) 
        {
            $ctr = 1;
        }
      }
}
      



?>