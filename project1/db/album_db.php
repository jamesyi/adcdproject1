<?php
include("connectDB.php");

class Album_db {
	private $id;
	private $title;
	
	function __construct(){
		global $con;
		$this->connectDB = $con;
	}
	
	function set_album_id($id){
		$this->id = $id;
	}
	
	function set_album_title($title){
		$this->title = $title;
	}
	
	function get_all_album(){
		$query = "SELECT * FROM albums";
		$result = mysqli_query($this->connectDB, $query);
		
		$arr = array();
		while ($row = mysqli_fetch_array($result)){
			$arr[$row["id"]] = $row;
		}
		return $arr;
	}
	
	function get_album_by_id(){
		$query = "SELECT * FROM albums WHERE id=".$this->id;
		$result = mysqli_query($this->connectDB, $query);
		
		$arr = array();
		while ($row = mysqli_fetch_array($result)){
			$arr[$row["id"]] = $row;
		}
		return $arr;
	}
	
	function insert_new_album(){
		$query = "INSERT INTO users (username, password, email) VALUES ( '".$this->username."', '".$this->password."', '".$this->email."')";
		echo $query;
		$result = mysqli_query($this->connectDB, $query);
	}
	
}

?>