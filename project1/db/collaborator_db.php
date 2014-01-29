<?php
include("connectDB.php");

class Collaborator_db {
	function __construct(){
		global $con;
		$this->connectDB = $con;
	}
	
	function get_all_collaborators(){
		$query = "SELECT * FROM collaborators";
		$result = mysqli_query($this->connectDB, $query);
		
		$arr = array();
		while ($row = mysqli_fetch_array($result)){
			$arr[$row["id"]] = $row;
		}
		return $arr;
	}
	
	function get_collaborator_by_id(){
		$query = "SELECT * FROM collaborators WHERE id=".$this->collaborator_id;
		$result = mysqli_query($this->connectDB, $query);
		
		$arr = array();
		while ($row = mysqli_fetch_array($result)){
			$arr[$row["id"]] = $row;
		}
		return $arr;
	}
	
	function set_collaborator_id($id){
		$this->collaborator_id = $id;
	}
}
$collaborators = new collaborator_db();
$collaborators->set_collaborator_id(1);
$thecollaborator = $collaborators->get_collaborator_by_id();
echo "<pre>";
var_dump($thecollaborator);
echo "</pre>";
?>