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
                            array(
                                $data["problem"],
                                $data["subproblem"],
                                $data["mcname"],
                                $data["mmodel"],
                                $data["created_date"],
                                $data["estprice"],
                                $data["status"],
                                $data["calprice"],
                                $data["rid"]
                            ));
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