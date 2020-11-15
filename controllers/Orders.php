<?php
    class Orders{

            private $conn;

            public function __construct($db){
                $this->conn = $db;
            }

            public function cancelreq($rid)
            {
                $query = 'update req set status=-1 where rid=?';
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('i',$rid);
                if($stmt->execute())
                {
                    return 200;
                }
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
            public function getproblems($uid,$rid)
            {
                $mc = array();
                $query = 'select main_problem,sub_problem,r.rid from req as r inner join problems as p inner join subproblem_master as sp INNER JOIN problem_master as pm on r.rid=p.rid and p.subproblem=sp.subproblem_code and sp.problem_code=pm.problem_code where r.uid=? AND r.rid=?';
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('ii',$uid,$rid);
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

            public function getperson($rid)
            {
                $mc = array();
                $query = 'select admin_name,admin_contact,date,time from scheduled_request as s inner join admins as a on s.admin_id=a.admin_id where a.admin_role="delivery_boy" and s.rid=?';
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
    }
?>