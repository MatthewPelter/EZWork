<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "ezwork";
	public $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
		return $conn;
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn, $query) or die(mysqli_errno());
		$data = mysqli_fetch_assoc($result);
		return $data;
	}		
	
	function numRows($query) {
		$result  = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>