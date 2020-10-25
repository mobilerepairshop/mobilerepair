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
        public $cnt=0;
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
            $this->expirydate = date('Y-m-d h:i:sa', strtotime($this->postdate. ' + 30 days'));


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
                    echo $this->conn->error;
                    $stmt->bind_param('is',$last_id,$record);
                    if(!$stmt->execute())
                    {
                        $this->$cnt=1;
                        //rollback all transaction and exit
                    }
                    else
                    {
                        // echo "ggghhh";
                    }
                }
                if($this->cnt==0)
                {
                    $query = 'insert into locations(aid,state,city,area,landmark)values(?,?,?,?,?)';
                    $stmt = $this->conn->prepare($query);
                    $stmt->bind_param('issss',$last_id,$this->state,$this->city,$this->area,$this->landmark);
                    if(!$stmt->execute())
                    {
                        echo $this->conn->error;
                        //rollback all transaction and exit
                    }
                    else
                    {
                        
                        return true;
                    }

                }
                else
                {
                    echo $this->conn->error;
                }
                
            }
            else
            {
                echo $this->conn->error;
            }

        }


        public function getAllAds($section)
        {
            if($section == 'allproducts')
            {   
                $query = 'SELECT ads.aid,ads.title, ads.price, locations.city, adimgs.img
                FROM ads
                INNER JOIN locations ON ads.aid=locations.aid and ads.visibility = 1
                INNER JOIN adimgs ON ads.aid=adimgs.aid GROUP BY adimgs.aid 
                ORDER BY RAND()';
                $stmt = $this->conn->prepare($query);
                if($stmt->execute())
                {
                    $result = $stmt->get_result();   // <--- add this instead
                    $ads = array();
                    while ($data = $result->fetch_assoc()) 
                    {
                        array_push($ads,[$data["title"],$data["price"],$data["city"],$data["img"],$data["aid"]]);
                    }
                    return $ads;
                    
                }
                else
                {

                }
            }
            else if($section == 'bulkproducts')
            {
                $query = 'SELECT bulkproducts.bid,bulkproducts.title, bulkproducts.price, bulkimgs.img
                             FROM bulkproducts
                             INNER JOIN bulkimgs ON bulkproducts.bid=bulkimgs.bid GROUP BY bulkimgs.bid
                            ORDER BY RAND()';
                $stmt = $this->conn->prepare($query);
                if($stmt->execute())
                {
                    $result = $stmt->get_result();   // <--- add this instead
                    $ads = array();
                    while ($row = $result->fetch_assoc()) 
                    {
                        // array_push($ads,[$data["title"],$data["price"],$data["city"],$data["img"],$data["aid"]]);
                        array_push($ads,[$row["title"],$row["price"],"Pune",$row["img"],$row["bid"]]);
                    }
                    return $ads; 
                }
                else
                {

                }
            }
           
        }

        public function getFilteredAds($cat,$subcat,$price,$brand)
        {  
            $query = 'SELECT ads.title, ads.aid, adimgs.img, ads.price, locations.city FROM ads 
                        INNER JOIN locations ON ads.aid=locations.aid 
                        INNER JOIN scat ON ads.scid=scat.scid 
                        INNER JOIN cat ON cat.cid=scat.cid 
                        INNER JOIN adimgs ON ads.aid=adimgs.aid where visibility=1 ';
            if(!empty($cat))
            {
                $query.="and cat.cname = '$cat' ";   
            }
            if(!empty($subcat))
            {
                $query.="and scat.scname = '$subcat' ";   
            }
            if(!empty($brand))
            {
                $query.="and ads.brand = '$brand' ";   
            }
            if(!empty($price))
            {
                if($price== 1)
                {
                    $query .= "and ads.price <= 500 "; 
                }
                else if($price== 2)
                {
                    $query .= "and ads.price BETWEEN 500 AND 2000 "; 
                }
                else if($price==3)
                {
                    $query .= "and ads.price BETWEEN 2000 AND 5000 "; 
                }
                else if($price==4)
                {
                    $query .= "and ads.price BETWEEN 5000 AND 10000 "; 
                }
                else if($price==5)
                {
                    $query .= "and ads.price >= 10000 "; 
                }        
            }
            $stmt = $this->conn->prepare($query);
            if($stmt->execute())
            {
                $result = $stmt->get_result();   // <--- add this instead
                $ads = array();
                while ($data = $result->fetch_assoc()) 
                {
                    array_push($ads,[$data["title"],$data["price"],$data["city"],$data["img"],$data["aid"]]);
                }
                return $ads;    
            }
            else
            {

            }
            
        }
}


  ?>