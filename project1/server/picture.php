<?php
include("../db/picture_db.php");

class Picture {
	private $pictureDB;
	
	function __construct(){
		$this->pictureDB = new Picture_db();
	}
	
	function insert_picture($link, $title, $descr){
		$this->pictureDB->set_picturer_username($link);
		$this->pictureDB->set_picturer_password($title);
		$this->pictureDB->set_picture_email($descr);
		$this->pictureDB->insert_new_picture();
	}
	
}
?>