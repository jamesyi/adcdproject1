<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/moretofu/db/user_db.php");

class User {
	private $userDB;
	
	function __construct(){
		$this->userDB = new User_db();
	}
	
	function register_user($username, $password, $email){
		$this->userDB->set_user_username($username);
		$this->userDB->set_user_password($password);
		$this->userDB->set_user_email($email);
		$this->userDB->insert_new_user();
	}
	
	function login_user($username, $password){
		$this->userDB->set_user_username($username);
		$this->userDB->set_user_password($password);
		$user = $this->userDB->get_user_by_username();
		if(!empty($username)){
			session_start();
			$_SESSION['username'] = $user['username'];
			$_SESSION['user_id'] = $user['id'];
			return $user;
		}
	}
	
	function show_user_by_id($id){
		$this->userDB->set_user_id($id);
		return $this->userDB->get_user_by_id();
	}
}
?>