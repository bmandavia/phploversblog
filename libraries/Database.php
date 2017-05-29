<?php

class Database{
	public $host = DB_HOST;
	public $username = DB_USER;
	public $password = DB_PASS;
	public $db_name = DB_NAME;
	
	public $link;
	public $error;

	/*
	* Class Constructor
	*/
	public function __construct(){		
		//Call Connect function
		$this->connect();
	}
	/*
	* Connector
	*/
	
	private function connect(){
		
		$this->link = new mysqli($this->host, $this->username, $this->password, $this->db_name);
		
		if(!$this->link)
		{
			$this->error = "Connection failed:".$this->link->connect_error;
			return false;
		}
	}
	
	/*
	* Select
	*/
	public function select($query){
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		if($result->num_rows > 0){
			return $result;
		}else{
			return false;
		}
	}
	
	/*
	* Insert
	*/
	
	public function insert($query){
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
		
		if($insert_row){
			header("Location:index.php?msg=".urlencode('Records Added'));
			exit();
		}else{
			die('Error : ('. $this->link->errno . ') '. $this->link->error);
		}
	}
		
	
	/*
	* Update
	*/
	
	public function update($query){
		$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
		
		if($update_row){
			header("Location:index.php?msg=".urlencode('Records Updated'));
			exit();
		}else{
			die('Error : ('. $this->link->errno . ') '. $this->link->error);
		}
		
	}
	
	/*
	* Delete
	*/
	
	public function delete($query){
		$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
		
		if($delete_row){
			header("Location:index.php?msg=".urlencode('Records Deleted'));
			exit();
		}else{
			die('Error : ('. $this->link->errno . ') '. $this->link->error);
		}
		
	}
}

/*
$mysqli = mysqli_connect("localhost", "root", "", "phploversblog");
//$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);

//Error handler

if($mysqli->connect_error)
{
	printf("Connect failed: %$\n", $mysqli->connect_error);
	exit();
}*/
?>