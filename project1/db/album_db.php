<?php
include("connectDB.php");

class Album_db {
	function __construct(){
		global $con;
		$this->connectDB = $con;
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
		$query = "SELECT * FROM albums WHERE id=".$this->album_id;
		$result = mysqli_query($this->connectDB, $query);
		
		$arr = array();
		while ($row = mysqli_fetch_array($result)){
			$arr[$row["id"]] = $row;
		}
		return $arr;
	}
	
	function set_album_id($id){
		$this->album_id = $id;
	}
}
$albums = new album_db();
$albums->set_album_id(1);
$thealbum = $albums->get_album_by_id();
echo "<pre>";
var_dump($thealbum);
echo "</pre>";
?>