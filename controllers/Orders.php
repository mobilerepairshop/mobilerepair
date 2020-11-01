<?php
    class Orders{

            private $conn;

            public function __construct($db){
                $this->conn = $db;
            }
            public function getnote($rid)
            {
                $query = 'select note from requests where rid=?';
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
                $query = 'select count(problem) as problem,count(subproblem) as subproblem,mcname,mmodel,created_date,estprice,status,calprice,r.rid,note from requests as r inner join problems as p on r.rid=p.rid where r.uid=? group by rid order by r.rid desc';
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
                                "mmodel"=>$data["mmodel"],
                                "created_date"=>$data["created_date"],
                                "estprice"=>$data["estprice"],
                                "status"=>$data["status"],
                                "calprice"=>$data["calprice"],
                                "rid"=>$data["rid"],
                                "note"=>$data["note"]
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
                $query = 'select p.problem,p.subproblem,r.rid from requests as r inner join problems as p on r.rid=p.rid where r.uid=? AND r.rid=?';
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
                                "problem"=>$data["problem"],
                                "subproblem"=>$data["subproblem"],
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
    }
?>