<?php
include("connectDB.php");

class Picture_db {
	function __construct(){
		global $con;
		$this->connectDB = $con;
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
		$query = "SELECT * FROM pictures WHERE id=".$this->picture_id;
		$result = mysqli_query($this->connectDB, $query);
		
		$arr = array();
		while ($row = mysqli_fetch_array($result)){
			$arr[$row["id"]] = $row;
		}
		return $arr;
	}
	
	function set_picture_id($id){
		$this->picture_id = $id;
	}
}
$pictures = new picture_db();
$pictures->set_picture_id(1);
$thepicture = $pictures->get_picture_by_id();
echo "<pre>";
var_dump($thepicture);
echo "</pre>";
?>