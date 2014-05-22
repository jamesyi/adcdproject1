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
			$arr = $row;
		}
		return $arr;
	}
	
	function insert_new_picture(){
		$query = "INSERT INTO pictures SET title='".$this->title."',  link='".$this->link."', descr='".$this->descr."'";
		$query = rtrim($query, ",");
		$result = mysqli_query($this->connectDB, $query);
		if($result){
			return mysqli_insert_id($this->connectDB);
		} else {
			return false;
		}
	}
	
	function update_picture_link_by_id(){
		$query = "UPDATE pictures SET link='".$this->link."' WHERE id=".$this->id;
		$result = mysqli_query($this->connectDB, $query);
		if($result){
			return true;
		} else {
			return false;
		}
	}
}

class Joined_Picture{
	private $uid;
	private $aid;
	private $pid;
	
	function __construct(){
		global $con;
		$this->connectDB = $con;
	}
	
	function set_uid($uid){
		$this->uid = $uid;	
	}
	
	function set_pid($pid){
		$this->pid = $pid;
	}
	
	function set_aid($aid){
		$this->aid = $aid;
	}
	
	function get_picture_by_aid(){
		$query  = "SELECT albums.id AS album_id, pictures.id AS picture_id, pictures.title, pictures.descr, pictures.link FROM pictures 
			LEFT JOIN album_picture ON (pictures.id=album_picture.picture_id) 
			LEFT JOIN albums ON (albums.id=album_picture.album_id) 		
			WHERE albums.id=".$this->aid;
		$result = mysqli_query($this->connectDB, $query);
		
		$arr = array();
		while ($row = mysqli_fetch_array($result)){
			$arr[$row["picture_id"]] = $row;
		}
		return $arr;
	}
	
	function insert_album_picture(){
		$query = "INSERT into album_picture SET picture_id='".$this->pid."', album_id='".$this->aid."'";
		$result = mysqli_query($this->connectDB, $query);
	}
}

?>