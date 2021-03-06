<?php
    class Orders{

            private $conn;

            public function __construct($db){
                $this->conn = $db;
            }

            public function cancelreq($rid)
            {
                $query = 'update req set status=6 where rid=?';
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('i',$rid);
                if($stmt->execute())
                {
                    return 200;
                }
            }
            public function getorderbyid($rid)
            {
                $query = 'select * from req  where rid=?';
                $query2 = 'select * from problems  where rid=?';
                
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('i',$rid);

                $stmt2 = $this->conn->prepare($query2);
                $stmt2->bind_param('i',$rid);


                if($stmt->execute())
                {
                    
                    $mc = array();
                    $result = $stmt->get_result();   // <--- add this instead
                    $mc2 = array();
                    $stmt2->execute();
                    $result2 = $stmt2->get_result();
                    while ($data = $result->fetch_assoc()) 
                    {
                        
                        array_push($mc,
                            [
                                "mmid"=>$data["mmid"],
                                "uid"=>$data["uid"],
                                "estprice"=>0,
                                "status"=>0,
                                "calprice"=>0,
                                "rid"=>$data["rid"],
                                "note"=>'',
                                "pay_method"=>'',
                                "pay_status"=>'',
                                "warranty"=>'',
                                "imeino"=>$data["imeino"]
                            ]);
                    }
                    while ($data = $result2->fetch_assoc()) 
                    {
                        
                        array_push($mc2,
                            [
                                "problem"=>$data["problem"],
                                "subproblem"=>$data["subproblem"],
                               
                            ]);
                    }
                    $mc[1] = $mc2;
                    return $mc;
                }
            }
            public function getfiltords($type,$uid,$rid)
            {
                // echo $type;
                $mc = array();
                if($rid==-1)
                {
                    if($type=='active')
                    {
                        $query = 'select count(problem) as problem,count(subproblem) as subproblem,mcname,mmname,created_date,estprice,status,calprice,r.rid,note,r.pay_method,r.pay_status,r.warranty,r.pickupdate,r.dropdate from req as r inner join problems as p inner join mobilemodel as m inner join mobilecompany as mc inner join subproblem_master  as sp inner join problem_master as pm on r.rid=p.rid and r.mmid=m.mmid and m.mcid=mc.mcid and sp.subproblem_code=p.subproblem and sp.problem_code=pm.problem_code where uid=? and (status<>9 and status<>6) group by r.rid';
                    }
                    else if($type=='cancel')
                    {
                        $query = 'select count(problem) as problem,count(subproblem) as subproblem,mcname,mmname,created_date,estprice,status,calprice,r.rid,note,r.pay_method,r.pay_status,r.warranty,r.pickupdate,r.dropdate from req as r inner join problems as p inner join mobilemodel as m inner join mobilecompany as mc inner join subproblem_master  as sp inner join problem_master as pm on r.rid=p.rid and r.mmid=m.mmid and m.mcid=mc.mcid and sp.subproblem_code=p.subproblem and sp.problem_code=pm.problem_code where uid=? and status=6 group by r.rid';
    
                    }
                    else if($type=='history')
                    {
                        $query = 'select count(problem) as problem,count(subproblem) as subproblem,mcname,mmname,created_date,estprice,status,calprice,r.rid,note,r.pay_method,r.pay_status,r.warranty,r.pickupdate,r.dropdate from req as r inner join problems as p inner join mobilemodel as m inner join mobilecompany as mc inner join subproblem_master  as sp inner join problem_master as pm on r.rid=p.rid and r.mmid=m.mmid and m.mcid=mc.mcid and sp.subproblem_code=p.subproblem and sp.problem_code=pm.problem_code where uid=? and status=9 group by r.rid';
                    }
                }
                else
                {
                    if($type=='bill')
                    {
                        $query = 'select count(problem) as problem,count(subproblem) as subproblem,mcname,mmname,created_date,estprice,status,calprice,r.rid,note,r.pay_method,r.pay_status,r.warranty,r.pickupdate,r.dropdate from req as r inner join problems as p inner join mobilemodel as m inner join mobilecompany as mc inner join subproblem_master  as sp inner join problem_master as pm on r.rid=p.rid and r.mmid=m.mmid and m.mcid=mc.mcid and sp.subproblem_code=p.subproblem and sp.problem_code=pm.problem_code where uid=? and r.rid=? group by r.rid';
                    
                    }
                }
                
                $stmt = $this->conn->prepare($query);
                if($type=='bill')
                {
                    $stmt->bind_param('ii',$uid,$rid);
                }
                else
                {
                    $stmt->bind_param('i',$uid);
                }
                
               
                if($stmt->execute())
                {
                    $result = $stmt->get_result();   // <--- add this instead
                    $userinfo = array();
                    while ($data = $result->fetch_assoc()) 
                    {
                        
                        array_push($mc,
                            [
                                "problem"=>$data["problem"],
                                "subproblem"=>$data["subproblem"],
                                "mcname"=>$data["mcname"],
                                "mmodel"=>$data["mmname"],
                                "created_date"=>$data["created_date"],
                                "estprice"=>$data["estprice"],
                                "status"=>$data["status"],
                                "calprice"=>$data["calprice"],
                                "rid"=>$data["rid"],
                                "note"=>$data["note"],
                                "pay_method"=>$data["pay_method"],
                                "pay_status"=>$data["pay_status"],
                                "warranty"=>$data["warranty"],
                                "pickupdate"=>$data["pickupdate"],
                                "dropdate"=>$data["dropdate"],
                            ]);
                    }
                }
                return $mc;
            }
            public function submitfinal($rid)
            {
                // Selection of final price
                $query = 'update req set status=7 where rid=?';
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('i',$rid);
                if($stmt->execute())
                {
                    return 200;
                }
                else
                {
                    return 400;
                }
            }

            public function updateaddressdetails($rid,$address,$phonenum,$pincode)
            {
                $query = 'update req set address="'.$address.'" , phonenum="'.$phonenum.'" , pincode="'.$pincode.'" where rid=?';
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('i',$rid);
                if($stmt->execute())
                {
                    return 200;
                }
                else
                {
                    return 400;
                }
            }
            
            public function getnote($rid)
            {
                $query = 'select note from req where rid=?';
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('i',$rid);
                if($stmt->execute())
                {
                    $result = $stmt->get_result();   // <--- add this instead
                    $userinfo = array();
                    while ($data = $result->fetch_assoc()) 
                    {
                        $note = $data['note'];
                    }
                    return $note;
                }
            }
            public function getmyorders($uid)
            {
                $mc = array();
                // $query = 'select count(problem) as problem,count(subproblem) as subproblem,created_date,estprice,status,calprice,r.rid,note from req as r inner join problems as p inner join mobilemodel on r.rid=p.rid where r.uid=?';
                // $query = 'select count(problem) as problem,count(subproblem) as subproblem,mcname,mmodel,created_date,estprice,status,calprice,r.rid,note from requests as r inner join problems as p on r.rid=p.rid where r.uid=? group by rid order by r.rid desc';
                
                $query = 'select count(problem) as problem,count(subproblem) as subproblem,mcname,mmname,created_date,estprice,status,calprice,r.rid,note,r.pay_method,r.pay_status from req as r inner join problems as p inner join mobilemodel as m inner join mobilecompany as mc inner join subproblem_master  as sp inner join problem_master as pm on r.rid=p.rid and r.mmid=m.mmid and m.mcid=mc.mcid and sp.subproblem_code=p.subproblem and sp.problem_code=pm.problem_code where uid=? group by r.rid';
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('i',$uid);
                if($stmt->execute())
                {
                    $result = $stmt->get_result();   // <--- add this instead
                    $userinfo = array();
                    while ($data = $result->fetch_assoc()) 
                    {
                        array_push($mc,
                            [
                                "problem"=>$data["problem"],
                                "subproblem"=>$data["subproblem"],
                                "mcname"=>$data["mcname"],
                                "mmodel"=>$data["mmname"],
                                "created_date"=>$data["created_date"],
                                "estprice"=>$data["estprice"],
                                "status"=>$data["status"],
                                "calprice"=>$data["calprice"],
                                "rid"=>$data["rid"],
                                "note"=>$data["note"],
                                "pay_method"=>$data["pay_method"],
                                "pay_status"=>$data["pay_status"]
                            ]);
                    }
                    return $mc;
                }
                else
                {
                    return 400;
                }
            }
            public function getprobsubprobmap()
            {
                $mc = array();
                // $query = 'select p.problem,p.subproblem,r.rid from requests as r inner join problems as p on r.rid=p.rid where r.uid=? AND r.rid=?';
                $query = 'select p.problem_code,p.main_problem,s.subproblem_code,s.sub_problem from problem_master as p INNER JOIN subproblem_master as s on  p.problem_code=s.problem_code';
                $stmt = $this->conn->prepare($query);
                if($stmt->execute())
                {
                    $result = $stmt->get_result();   // <--- add this instead
                    while ($data = $result->fetch_assoc()) 
                    {
                        
                        array_push($mc,
                            [
                                "pcode"=>$data["problem_code"],
                                "problem"=>$data["main_problem"],
                                "spcode"=>$data["subproblem_code"],
                                "subproblem"=>$data["sub_problem"],
                            ]);
                    }
                    return $mc;
                }
            }
            public function getchprice($rid)
            {
                $mc = array();
                $query = 'select estprice,calprice,note,rid from req where rid=?';
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('i',$rid);
                if($stmt->execute())
                {
                    $result = $stmt->get_result();   // <--- add this instead
                    $userinfo = array();
                    while ($data = $result->fetch_assoc()) 
                    {
                        array_push($mc,
                            [
                                "estprice"=>$data["estprice"],
                                "calprice"=>$data["calprice"],
                                "note"=>$data["note"],
                                "rid"=>$data["rid"],
                            ]);
                    }
                    return $mc;
                }
                else
                {
                    return 400;
                }
  
            }

            public function getaddressdetails($rid)
            {
                $mc = array();
                $query = 'select rid,address,pincode,phonenum from req where rid=?';
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('i',$rid);
                if($stmt->execute())
                {
                    $result = $stmt->get_result();   // <--- add this instead
                    $userinfo = array();
                    while ($data = $result->fetch_assoc()) 
                    {
                        array_push($mc,
                            [
                                "address"=>$data["address"],
                                "phonenum"=>$data["phonenum"],
                                "pincode"=>$data["pincode"],
                                "rid"=>$data["rid"]
                            ]);
                    }
                    return $mc;
                }
                else
                {
                    return 400;
                }
            }


            public function getproblems($uid,$rid)
            {
                $mc = array();
                // $query = 'select main_problem,sub_problem,r.rid from req as r inner join problems as p inner join subproblem_master as sp INNER JOIN problem_master as pm on r.rid=p.rid and p.subproblem=sp.subproblem_code and sp.problem_code=pm.problem_code where r.uid=? AND r.rid=?';
                $query = 'select main_problem,sub_problem,r.rid,pa.price from req as r 
                inner join problems as p 
                inner join subproblem_master as sp 
                INNER JOIN problem_master as pm inner join pricing_allocation as pa INNER JOIN mobilemodel as mm
                on r.rid=p.rid and p.subproblem=sp.subproblem_code 
                and sp.problem_code=pm.problem_code 
                and mm.mmid=pa.mmid and pa.subproblem_code=sp.subproblem_code
                where r.uid=? AND r.rid=? group by p.problem';
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('ii',$uid,$rid);
                echo $this->conn->error;
                if($stmt->execute())
                {
                    $result = $stmt->get_result();   // <--- add this instead
                    $userinfo = array();
                    while ($data = $result->fetch_assoc()) 
                    {
                        array_push($mc,
                            [
                                "problem"=>$data["main_problem"],
                                "subproblem"=>$data["sub_problem"],
                                "price"=>$data["price"],
                                "rid"=>$data["rid"],
                            ]);
                    }
                    return $mc;
                }
                else
                {
                    return 400;
                }
            }

            // repeated function - has to be removed
            public function getproblemsforadmin($rid)
            {
                $mc = array();
                $query = 'select main_problem,sub_problem,r.rid from req as r 
                            inner join problems as p 
                            inner join subproblem_master as sp 
                            INNER JOIN problem_master as pm 
                            on r.rid=p.rid and p.subproblem=sp.subproblem_code and sp.problem_code=pm.problem_code 
                            where r.rid=?';
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('i',$rid);
                if($stmt->execute())
                {
                    $result = $stmt->get_result();   // <--- add this instead
                    $userinfo = array();
                    while ($data = $result->fetch_assoc()) 
                    {
                        array_push($mc,
                            [
                                "problem"=>$data["main_problem"],
                                "subproblem"=>$data["sub_problem"],
                                "rid"=>$data["rid"],
                            ]);
                    }
                    return $mc;
                }
                else
                {
                    return 400;
                }
            }

            public function getperson($rid,$type)
            {
                $mc = array();
                if($type==2)
                {
                    $query = 'select admin_name,admin_contact,date,time from scheduled_request as s inner join admins as a on s.admin_id=a.admin_id where a.admin_role="delivery_boy" and (s.delivery_status=2 or s.delivery_status=0) and s.rid=? ';

                }
                else if($type==1)
                {
                    $query = 'select admin_name,admin_contact,date,time from scheduled_request as s inner join admins as a on s.admin_id=a.admin_id where a.admin_role="delivery_boy" and s.delivery_status=1  and s.rid=? ';
                }
                $stmt = $this->conn->prepare($query);
                echo $this->conn->error;
                $stmt->bind_param('i',$rid);
                if($stmt->execute())
                {
                    $result = $stmt->get_result();   // <--- add this instead
                    $userinfo = array();
                    while ($data = $result->fetch_assoc()) 
                    {
                        array_push($mc,
                            [
                                "admin_name"=>$data["admin_name"],
                                "admin_contact"=>$data["admin_contact"],
                                "date"=>$data["date"],
                                "time"=>$data["time"]
                            ]);
                    }
                    return $mc;
                }
                else
                {
                    return 400;
                }
            }

            public function getbilldetails($rid,$uid)
            {
                $problems = $this->getproblems($uid,$rid);
                $reqinfo = $this->getfiltords('bill',$uid,$rid);

                $details = array();
                $details[0] = $reqinfo;
                $details[1] = $problems;
                
                return $details;
            }
            public function getquotedetails($model, $problems)
            {
                $details = array();
                $mc = array();
                $final = 0;
             
                for($i=0;$i<count($problems);$i++)
                {
                        $query = 'select p.main_problem,sp.sub_problem,pa.price from 
                                pricing_allocation as pa inner join 
                                problem_master as p INNER JOIN 
                                subproblem_master as sp on pa.subproblem_code=sp.subproblem_code
                                where pa.mmid = '.(int)$model.' and pa.subproblem_code='.$problems[$i][1].' and p.problem_code='.$problems[$i][0];

                        $stmt = $this->conn->prepare($query);
            
                        if($stmt->execute())
                        {
                            $result = $stmt->get_result();   // <--- add this instead
                            $userinfo = array();
                            while ($data = $result->fetch_assoc()) 
                            {
                                $final+=(int)$data['price'];
                                array_push($mc,
                                    [
                                        "problem"=>$data["main_problem"],
                                        "subproblem"=>$data["sub_problem"],
                                        "price"=>$data["price"],
                                    ]);
                            }
                           
                        }      
                }
               
                $details[0] = $mc;
                $details[1] = $final;
                
                return $details;
            }
    }
?>