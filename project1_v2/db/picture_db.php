<?php
include("connectDB.php");

class Picture_db {
	private $id;
	private $link;
	private $title;
	private $descr;
	
	function __construct(){
		global $con;
		$this->connectDB = $con;
	}
	
	function set_picture_id($id){
		$this->id = $id;
	}
	
	function set_picture_link($link){
		$this->link = $link;
	}
	
	function set_picture_title($title){
		$this->title = $title;
	}
	
	function set_picture_descr($descr){
		$this->descr = $descr;
	}
	
	function get_all_pictures(){
		$query = "SELECT * FROM pictures";
		$result = mysqli_query($this->connectDB, $query);
		
		$arr = array();
		while ($row = mysqli_fetch_array($result)){
			$arr[$row["id"]] = $row;
		}
		return $arr;
	}
	
	function get_picture_by_id(){
		$query = "SELECT * FROM pictures WHERE id=".$this->id;
		$result = mysqli_query($this->connectDB, $query);
		
		$arr = array();
		while ($row = mysqli_fetch_array($result)){
			$arr[$row["id"]] = $row;
		}
		return $arr;
	}
	
	function insert_new_picture(){
		$query = "INSERT INTO pictures (link, title, descr) VALUES ( '".$this->link."', '".$this->title."', '".$this->descr."')";
		$result = mysqli_query($this->connectDB, $query);
	}
}

?>