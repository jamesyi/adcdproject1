<?php
include("connectDB.php");

class Album_db {
	private $id;
	private $link;
	private $title;
	private $descr;
	
	function __construct(){
		global $con;
		$this->connectDB = $con;
	}
	
	function set_album_id($id){
		$this->id = $id;
	}
	
	function set_album_link($link){
		$this->link = $link;
	}
	
	function set_album_title($title){
		$this->title = $title;
	}
	
	function set_album_descr($descr){
		$this->descr = $descr;
	}
	
	function get_all_albums(){
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
		$query = "INSERT INTO albums SET title='".$this->title."',  link='".$this->link."', descr='".$this->descr."'";
		$query = rtrim($query, ",");
		$result = mysqli_query($this->connectDB, $query);
		if($result){
			return mysqli_insert_id($this->connectDB);
		} else {
			return false;
		}
	}
	
	function update_album_link_by_id(){
		$query = "UPDATE albums SET link='".$this->link."' WHERE id=".$this->id;
		$result = mysqli_query($this->connectDB, $query);
		if($result){
			return true;
		} else {
			return false;
		}
	}
}

class Joined_Album{
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
	
	function get_album_by_uid(){
		$query  = "SELECT users.id AS user_id, albums.id AS album_id, albums.title, albums.descr, albums.link FROM albums 
			LEFT JOIN user_album ON (albums.id=user_album.album_id) 
			LEFT JOIN users ON (users.id=user_album.user_id) 		
			WHERE users.id=".$this->uid;
		$result = mysqli_query($this->connectDB, $query);
		
		$arr = array();
		while ($row = mysqli_fetch_array($result)){
			$arr[$row["album_id"]] = $row;
		}
		return $arr;
	}
	
	function insert_user_album(){
		$query = "INSERT into user_album SET user_id='".$this->uid."', album_id='".$this->aid."'";
		$result = mysqli_query($this->connectDB, $query);
	}
}

/*
$db = new Album_db();
$db->set_album_title("title");
$db->set_album_link("link");
$db->set_album_descr("descr");
$link = $db->insert_new_album();
var_dump($link);
*/

/*
$db = new Joined_Album();
$db->set_uid(3);
$a = $db->get_album_by_uid();
var_dump($a);
*/
?>