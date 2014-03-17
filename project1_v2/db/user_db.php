<?php
include("connectDB.php");

class User_db {
	private $id;
	private $email;
	private $username;
	private $password;
	
	function __construct(){
		global $con;
		$this->connectDB = $con;
	}
	
	function set_user_id($id){
		$this->id = $id;
	}
	
	function set_user_email($email){
		$this->email = $email;
	}
	
	function set_user_username($username){
		$this->username = $username;
	}
	
	function set_user_password($password){
		$this->password = $password;	
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
		$query = "SELECT * FROM users WHERE id='".$this->id."'";
		$result = mysqli_query($this->connectDB, $query);
		
		$arr = array();
		while ($row = mysqli_fetch_array($result)){
			$arr[$row["id"]] = $row;
		}
		return $arr;
	}
	
	function get_user_by_email(){
		$query = "SELECT * FROM users WHERE email='".$this->email."'";
		$result = mysqli_query($this->connectDB, $query);
		
		$arr = array();
		while ($row = mysqli_fetch_array($result)){
			$arr[$row["id"]] = $row;
		}
		return $arr;
	} 
	
	function get_user_by_username(){
		$query = "SELECT * FROM users WHERE username='".$this->username."'";
		$result = mysqli_query($this->connectDB, $query);
		
		$arr = array();
		$name = "";
		while ($row = mysqli_fetch_array($result)){
			$name = $row['username'];
		}
		return $name;
	} 
	
	function get_user_id(){
		$query = "SELECT * FROM users";
		
		$result = mysqli_query($this->connectDB, $query);
		
		$arr = array();
		$id = "";
		while ($row = mysqli_fetch_array($result)){
			$id = $row['id'];	
		}
		return $id;
	}
	
	function insert_new_user(){
		$query = "INSERT INTO users (username, password, email) VALUES ( '".$this->username."', '".$this->password."', '".$this->email."')";
		$result = mysqli_query($this->connectDB, $query);
	}
	
}

?>