<?php
include("../db/connectDB.php");
include("../db/picture_db.php");

class User{
	private $userDB;
	private $pictureDB;
	
	function __construct(){
		$this->userDB = new User_db();
		$this->pictureDB = new Picture_db();
	}
	
	function get_user_info($id){
		$userDB->set_user_id($id);
		$picture->set_user_id($id);
		
		$user = $userDB->get_user_id();
		$picture = $pictureDB->get_picture_by_id();
		
		$user["picture"] = $photo;
		
		return $user;
	}
}

$user = new User();
$user_info = $user->get_user_info($id);

?>