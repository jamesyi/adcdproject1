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
		$id = $this->userDB->insert_new_user();
		$this->userDB->set_user_id($id);
		$user = $this->userDB->get_user_by_id();
		if(!empty($user)){
			session_start();
			$_SESSION['username'] = $user['username'];
			$_SESSION['user_id'] = $user['id'];
			return $user;
		}
	}
	
	function login_user($username, $password){
		$this->userDB->set_user_username($username);
		$this->userDB->set_user_password($password);
		$user = $this->userDB->get_user_by_username();
		if(!empty($user)){
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
	
	function check_password($data){
		$id		   = $data['id'];
		$password  = $data['password'];
		$this->userDB->set_user_id($id);
		$this->userDB->set_user_password($password);
		return $this->userDB->get_user_by_id_and_password();
	}
	
	function update_user($data){
		$id		   = isset($data['id']) ? $data['id'] : NULL;
		$password  = isset($data['password']) ? $data['password'] : NULL;
		$new_password  = isset($data['new_password']) ? $data['new_password'] : NULL;
		$email	   = isset($data['email']) ? $data['email'] : NULL;
		$this->userDB->set_user_id($id);
		$this->userDB->set_user_password($password);
		$this->userDB->set_user_new_password($new_password);
		$this->userDB->set_user_email($email);
		
		return $this->userDB->update_user();

	}
}
/*
$db = new User();
$a = $db->register_user("lolo","1111","1111");
var_dump($a);
*/
?>