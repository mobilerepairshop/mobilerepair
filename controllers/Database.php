<?php

class Database{
	
	private $connection;
	public function connect_db(){
		$this->connection = mysqli_connect('localhost', 'root', '', 'mobilerepair');
		if(mysqli_connect_error()){
			return die("Database Connection Failed" . mysqli_connect_error() . mysqli_connect_errno());
        }
        else{
            return "200";
        }
	}
	public function get_db(){
		return $this->connection;
	}

	public function sanitize($var){
		$return = mysqli_real_escape_string($this->connection, $var);
		return $return;
	}
}

$database = new Database();
$database->connect_db();
?>