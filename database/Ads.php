<?php
class Ads{
        // database connection and table name
        private $conn;
        private $table_name = "ads";

        // post properties
 
        public $title;
        public $brand;
        public $desc;
        public $price;
        public $ploc;
        public $name;
        public $landmark;
        public $city;
        public $state;
        public $cid;
        public $uid;
        public $scid;
        public $images;
        public $area;
        public $postdate;
        public $expirydate;

        public function __construct($db){
            $this->conn = $db;
            
        }
        function create()
        {
        
            //write query
            $query = 'insert into ads(title,brand,price,description,tperiod,visibility,uid,scid,postdate,expirydate)
            values(?,?,?,?,?,?,?,?,?,?)';

            $stmt = $this->conn->prepare($query);
            
            // posted values
            $this->title=htmlspecialchars(strip_tags($this->title));
            $this->price=htmlspecialchars(strip_tags($this->price));
            $this->brand=htmlspecialchars(strip_tags($this->brand));
            $this->ploc=htmlspecialchars(strip_tags($this->ploc));
            $this->desc=htmlspecialchars(strip_tags($this->desc));
            // $this->cid=htmlspecialchars(strip_tags($this->cid));
            $this->scid=htmlspecialchars(strip_tags($this->scid));
            $this->uid=htmlspecialchars(strip_tags($this->uid));
            // $this->pimg=htmlspecialchars(strip_tags($this->pimg));
            $this->visibility=htmlspecialchars(strip_tags($this->visibility));
            $this->tperiod=htmlspecialchars(strip_tags($this->tperiod));
            $this->city=htmlspecialchars(strip_tags($this->city));
            $this->state=htmlspecialchars(strip_tags($this->state));
            $this->landmark=htmlspecialchars(strip_tags($this->landmark));
            $this->area=htmlspecialchars(strip_tags($this->area));

            // to get time-stamp for 'created' field
            $this->postdate = date('Y-m-d h:i:sa');
            $this->expirydate = date('Y-m-d h:i:sa', strtotime($this->$postdate. ' + 30 days'));


            $stmt->bind_param('ssisiiiiss',
            $this->title,
            $this->brand,
            $this->price,
            $this->desc,
            $this->tperiod,
            $this->visibility,
            $this->uid,
            $this->scid,
            $this->postdate,
            $this->expirydate

           );
        
            if($stmt->execute())
            {
                // $cnt = 0;
                $last_id = mysqli_insert_id($this->conn);
                foreach($this->images as $record)
                {
                    $query = 'insert into adimgs(aid,img)values(?,?)';
                    $stmt = $this->conn->prepare($query);
                    $stmt->bind_param('is',$last_id,$record);
                    if(!$stmt->execute())
                    {
                        $cnt=1;
                        //rollback all transaction and exit
                    }
                }
                if($cnt==0)
                {
                    $query = 'insert into locations(aid,state,city,area,landmark)values(?,?,?,?,?)';
                    $stmt = $this->conn->prepare($query);
                    $stmt->bind_param('issss',$last_id,$this->state,$this->city,$this->area,$this->landmark);
                    if(!$stmt->execute())
                    {
                        return $this->conn->error;
                        //rollback all transaction and exit
                    }
                    else
                    {
                         return true;
                    }

                }
                else
                {
                    return $this->conn->error;
                }
                
            }
            else
            {
                return $this->conn->error;
            }

        }


        public function getAds()
        {

        }
}


  ?>