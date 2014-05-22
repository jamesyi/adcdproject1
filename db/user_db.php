<?php
include("connectDB.php");

class User_db {
	private $id;
	private $email;
	private $username;
	private $password;
	private $new_password;
	private $link;
	
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
		$this->password = md5($password);	
	}
	
	function set_user_new_password($new_password){
		if(!empty($new_password)){
			$this->new_password = md5($new_password);
		}
	}
	
	function set_user_link($link){
		$this->link = $link;	
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
			$arr = $row;
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
		$query = "SELECT * FROM users WHERE username='".$this->username."' AND password = '".$this->password."'";
		$result = mysqli_query($this->connectDB, $query);
		
		$arr    = array();
		if($result){
			while ($row = mysqli_fetch_array($result)){
				$arr = $row;
			}
		}
		return $arr;
	} 
	
	function get_user_by_id_and_password(){
		$query = "SELECT * FROM users WHERE id='".$this->id."' AND password='".$this->password."'";
		$result = mysqli_query($this->connectDB, $query);
		if ($result){
			$row = mysqli_fetch_array($result);
			if(!empty($row)){
				return true;
			} else {
				return false;
			}
		}
		return false;
	}
	
	function insert_new_user(){
		$query = "INSERT INTO users (username, password, email) VALUES ( '".$this->username."', '".$this->password."', '".$this->email."')";
		$result = mysqli_query($this->connectDB, $query);
		if ($result) {
			return mysqli_insert_id($this->connectDB);
		} else {
			return false;
		}
	}
	
	function update_user(){
		$password = (isset($this->new_password)) ? "password='".$this->new_password."', " : "";
		$email = (isset($this->email)) ? "email='".$this->email."', " : "";
		
		$query  = "UPDATE users SET ".$password.$email;
		$query = rtrim($query, " ");
		$query = rtrim($query, ",");
		$query .= " WHERE id='".$this->id."'";
		$result = mysqli_query($this->connectDB, $query);
		if($result){
			return true;
		} else {
			return false;
		}
	}
	
}
/*
$db = new User_db();
$db->set_user_new_password("2222");
$db->set_user_id(3);
$db->set_user_email("gggggg");
$a = $db->update_user();
var_dump($a);
*/
?>