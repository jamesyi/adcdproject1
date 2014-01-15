<?php
include ("../db/user_db.php");
class User {
	private $var;
	
	function user_check(){
		$var = new User_db();
		return $var->get_user();
	}

	function get_usernames(){
		$var = new User_db();
		$usernames = $var->get_all_user();
		foreach($usernames as $id => $name){
			if($name == "sebastian"){
				$usernames[$id] = $name." - TROLL";
			}
		}
		return $usernames;
	}
}
?>