<?php
include("connectDB.php");

class User_db {
	function __construct(){
		global $con;
		$this->connectDB = $con;
	}
	
	function get_all_users(){
		$query = "SELECT * FROM users";
		$result = mysqli_query($this->connectDB, $query);
		
		$arr = array();
		while ($row = mysqli_fetch_array($result)){
			$arr[$row["id"]] = $row;
		}
		return $arr;
	}
	
	function get_user_by_id(){
		$query = "SELECT * FROM users WHERE id=".$this->user_id;
		$result = mysqli_query($this->connectDB, $query);
		
		$arr = array();
		while ($row = mysqli_fetch_array($result)){
			$arr[$row["id"]] = $row;
		}
		return $arr;
	}
	
	function set_user_id($id){
		$this->user_id = $id;
	}
}

$users = new User_db();
$users->set_user_id(1);
$theuser = $users->get_user_by_id();
echo "<pre>";
var_dump($theuser);
echo "</pre>";
?>