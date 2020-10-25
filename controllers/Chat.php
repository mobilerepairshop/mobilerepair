<?php

    class Chat
    {
        private $conn;

        public function __construct($db){
            $this->conn = $db;
            
        }

        function getbuyerseller($aid,$uid)
        {
            // Function to get whether a user is a buyer and seller
            $query = "select uid from ads where aid=$aid";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $stmt->store_result(); 
            $stmt->bind_result($bid); 
        
            while ($stmt->fetch()) {
                if($bid==$uid)
                {
                    return 'Seller';
                }
                else
                {
                    return 'Buyer';
                }
            }

        }
        function fetch_user_last_activity($user_id)
        {
            // Function to get users last login
            $query = "
            SELECT last_activity FROM login_details 
            WHERE uid = '$user_id' 
            ORDER BY last_activity DESC 
            LIMIT 1
            ";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $stmt->store_result();    
            $stmt->bind_result($user_last_activity); 
            while ($stmt->fetch()) {
                return $user_last_activity;
            }
        }
        function fetch_is_type_status($user_id)
        {
            $query = "
            SELECT is_type FROM login_details 
            WHERE uid = '".$user_id."' 
            ORDER BY last_activity DESC 
            LIMIT 1
            ";	
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $stmt->store_result();    
            $stmt->bind_result($is_type); 
            
            while ($stmt->fetch()) {
                return $is_type;
            }

            
        }
        function count_unseen_message($from_user_id, $to_user_id,$aid)
        {
            // Function to get unseen messages
            $query = "
            SELECT aid FROM chat_message 
            WHERE from_user_id = $from_user_id
            AND to_user_id = $to_user_id
            AND status = 1 AND aid=$aid
            ";
            $statement = $this->conn->prepare($query);
            $statement->execute();
            $statement->store_result();
            $count = $statement->num_rows;
            $output = '';
            if($count > 0)
            {
                // echo "Count of unseen msg - ".$count;
                return $count;
            }
            else
            {
                return 0;
            }
            
        }
        public function getSellOrBuy($type,$curruser)
        {
            // Selling Buying and All filters in chat
            if($type=='sell')
            {
                $query = "
                SELECT u.uid ,u.username, b.aid, u.userphoto,a.title FROM users as u INNER JOIN buyers as b INNER JOIN ads as a on (u.uid=b.from_user_id or u.uid=b.to_user_id) and b.aid=a.aid where (b.from_user_id=$curruser AND u.uid<>$curruser)";
            }
            else if($type=='buy')
            {
                $query = "
                SELECT u.uid ,u.username, b.aid,u.userphoto,a.title FROM users as u INNER JOIN buyers as b INNER JOIN ads as a on (u.uid=b.from_user_id or u.uid=b.to_user_id) and b.aid=a.aid where (b.to_user_id=$curruser AND u.uid<>$curruser)";
            }
            else if($type=='all')
            {
                $query = "
                SELECT u.uid ,u.username, b.aid,u.userphoto,a.title FROM users as u INNER JOIN buyers as b INNER JOIN ads as a on (u.uid=b.from_user_id or u.uid=b.to_user_id) and b.aid=a.aid where (b.from_user_id=$curruser OR b.to_user_id=$curruser) AND u.uid<>$curruser";

            }
            $stmt = $this->conn->prepare($query);
            echo $this->conn->error;
            $stmt->execute();
            $stmt->store_result();    
            $stmt->bind_result($id, $username,$aid,$photo,$aidtitle); 
            $contacts = array(); 
            $inc = 0;
            while ($stmt->fetch()) {
            
                    $checkbuyerseller = $this->getbuyerseller($aid,$id);
                    $status = '';
                    $contacts[$inc][0] = $username;
                    $current_timestamp = strtotime(date("Y-m-d H:i:s") . '- 10 second');
                    $current_timestamp = date('Y-m-d H:i:s', $current_timestamp);
                    $user_last_activity = $this->fetch_user_last_activity($id);
                    if($user_last_activity > $current_timestamp)
                    {
                        $contacts[$inc][0] = 'online';
                    }
                    else
                    {
                        $contacts[$inc][0] = 'offline';
                    }
                    $contacts[$inc][1] = $username;
                    $contacts[$inc][2] = $this->count_unseen_message($id, $curruser,$aid);
                    $contacts[$inc][3] = $this->fetch_is_type_status($id);
                    $contacts[$inc][4] = ($id);
                    $contacts[$inc][5] = $checkbuyerseller;
                    $contacts[$inc][6] = $photo;
                    $contacts[$inc][7] = $aid;
                    $contacts[$inc][8] = $aidtitle;
                    $inc++;
                
                
                // array_push($contacts,[$id,$username,$user_last_activity]);
            }
            
            echo json_encode($contacts);
            
        }
        public function getinfo_from_user($from_user_id,$type)
        {
            $query = 'select * from users where uid=?';
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('i',$from_user_id);
            if($type=='getall')
            {
                if($stmt->execute())
                {
                    $result = $stmt->get_result();   // <--- add this instead
                    $userinfo = array();
                    while ($data = $result->fetch_assoc()) 
                    {
                        array_push($userinfo,$data["username"],$data["phonenum"],$data["userphoto"],$data["location"],$data["phonenum"],$data["email"]);
                    }
                    return $userinfo;
                }
                else
                {
                    return 400;
                }
            }
            else
            {
                if($stmt->execute())
                {
                    $result = $stmt->get_result();   // <--- add this instead
                    $userinfo = array();
                    while ($data = $result->fetch_assoc()) 
                    {
                        array_push($userinfo,$data["username"],$data["phonenum"],$data["userphoto"]);
                    }
                    return $userinfo;
                }
                else
                {
                    return 400;
                }
            }
            // Get name and mobile number to display for first message
           
            
        }
        public function checkbuyer($to_user_id, $from_user_id,$aid)
        {
            // Check if old chat is available or not if not sending first message 
            $query = 'select * from buyers where to_user_id=? and from_user_id=? and aid=?';
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param('iii',$to_user_id,$from_user_id,$aid);
            if($stmt->execute())
            {
                $stmt->store_result();
                $no = $stmt->num_rows;
                if($no>0)
                {
                    return 200;
                }
                else
                {
                    return 400;
                }
                
            }
            else
            {
                
            }
        }
        public function addChat($to_user_id, $from_user_id,$status,$aid)
        {
            //  Function to send first message   
            if($status == 200)
            {
                echo "checked old chat";
                return array(200,'oldchat');
            }
            else
            {
                echo "checked new chat";
                $info = $this->getinfo_from_user($from_user_id,'fmessage');
                echo "This is name  - ".$info[0];
                echo "This is phone - ".$info[1];
                $query = 'insert into chat_message(to_user_id,from_user_id,chat_message,timestamp,status,uploadimg,aid)values(?,?,?,?,?,?,?)';
                $stmt = $this->conn->prepare($query);
                $username = $info[0];
                $mobile = $info[1];
                echo json_encode($info);
                $chatmes = "Hello. I am interested in this advertisement. 
                Please find my details below - Name :$username Mobile Number :$mobile";
                $timestamp = date('Y-m-d h:i:sa');
                $read_unread = 1;
                $uploadimg = 'None';
                $stmt->bind_param('iissisi',$to_user_id,$from_user_id,$chatmes,$timestamp,$read_unread, $uploadimg,$aid);
                if($stmt->execute())
                {
                    return array(200,'newchat');
                }
                else
                {
                    return array(400,'error');
                }
            }
            
        }
        public function addBuyer($to_user_id, $from_user_id,$aid)
        {
            // Add Buyer if not present 
            $status =  $this->checkbuyer($to_user_id, $from_user_id,$aid);
            if($status==200)
            {
                return array(200,'oldchat');
            }
            else
            {
                $query = 'insert into buyers(to_user_id,from_user_id,aid)values(?,?,?)';
                $stmt = $this->conn->prepare($query);
                $stmt->bind_param('iii',$to_user_id,$from_user_id,$aid);
                if($stmt->execute())
                {
                    $res = $this->addChat($to_user_id,$from_user_id,$status,$aid);
                    if($res[0]==200 and $res[1]=='oldchat')
                    {
                        return array(200,'oldchat');
                    }
                    else if($res[0]==200 and $res[1]=='newchat')
                    {
                        return array(200,'newchat');
                    }
                    return 200;
                }
                else
                {
                    return 400;
                }
            }
            
        }

        function fetch_user_chat_history($to_user_id, $from_user_id,$aid, $connect)
        {
            $query = "
            SELECT to_user_id,from_user_id,chat_message,timestamp,status FROM chat_message 
            WHERE ((from_user_id = '".$from_user_id."' 
            AND to_user_id = '".$to_user_id."') 
            OR (from_user_id = '".$to_user_id."' 
            AND to_user_id = '".$from_user_id."'))
            AND aid='".$aid."'
            ORDER BY timestamp DESC
            ";
            $stmt = $connect->prepare($query);
            $stmt->execute();
            $stmt->store_result();    
            $stmt->bind_result($to_id,$from_id,$chat_message,$timestamp,$status); 
            $op = array();
            $k=0;
            while ($stmt->fetch()) {
                
                // return $user_last_activity;
                $chatmessage = '';
                if($from_id == $from_user_id)
                {
                    if($status == '2')
                    {
                        $op[$k][0] = 'This message has been removed';
                        $op[$k][1] = 'You';
                        //$op[$k][2] = $row['uploadimg'];
                        $chatmessage = '<em>This message has been removed</em>';
                        $user_name = '<b class="text-success">You</b>';
                        $op[$k][1] =  $user_name;
                    }
                    else
                    {
                        $op[$k][0] = $chat_message;
                        $op[$k][1] = 'You';
                        $op[$k][4] = ($this->getinfo_from_user($from_id,'namephot'))[2];
                        //$op[$k][2] = $row['uploadimg'];
                        $chatmessage = $chat_message;
                        // $user_name = '<button type="button" class="btn btn-danger btn-xs remove_chat" id="'.$row['chat_message_id'].'">x</button>&nbsp;<b class="text-success">You</b>';
                    }
                    $dynamic_background = 'background-color:#ffe6e6;';
                }
                else
                {
                    if($status == '2')
                    {
                        $op[$k][0] = 'This message has been removed';
                        //$op[$k][2] = $row['uploadimg'];
                        $chatmessage = '<em>This message has been removed</em>';
                    }
                    else
                    {
                        $op[$k][0] = $chat_message;
                        //$op[$k][2] = $row['uploadimg'];
                        $chatmessage = $chat_message;
                    }
                    
                    $op[$k][1] = ($this->getinfo_from_user($from_id, 'namephot'))[0];
                    $op[$k][4] = ($this->getinfo_from_user($from_id, 'namephot'))[2];
                    // $user_name = '<b class="text-danger">'.get_user_name($row['from_user_id'], $connect).'</b>';
                    $dynamic_background = 'background-color:#ffffe6;';
                }
                $op[$k][3] =$timestamp;
                $query = "
                UPDATE chat_message 
                SET status = '0' 
                WHERE from_user_id = '".$to_user_id."' 
                AND to_user_id = '".$from_user_id."' 
                AND status = '1' AND aid='".$aid."'
                ";
                $statement = $connect->prepare($query);
                $statement->execute();
                $k++;
            }
            if(count($op)>0)
            {
                return $op;
            }
            else
            {
                return array();
            }
            
        }




    }

?>