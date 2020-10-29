<?php
    class Orders{

            private $conn;

            public function __construct($db){
                $this->conn = $db;
            }
            public function getmyorders($uid)
            {
                $mc = array();
                $query = 'select problem,subproblem,mcname,mmodel,created_date,estprice,status,calprice,r.rid from requests as r inner join problems as p on r.rid=p.rid where r.uid=? order by r.rid desc';
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
    }
?>