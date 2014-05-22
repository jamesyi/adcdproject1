<?php
include('user.php');

if(!isset($_POST['mode'])){
	exit;	
}

//register user
if($_POST['mode'] == 1 && !empty($_POST['username']) && !empty($_POST['password'])) { 
		$user = new User();
		$user->register_user($_POST['username'], $_POST['password'], $_POST['email']);
}

//login user
if($_POST['mode'] == 2 && isset($_POST['username']) && isset($_POST['password'])){
		$user = new User();
		$username = $user->login_user($_POST['username'], $_POST['password']);
		echo json_encode($username);
} 

//update user
if($_POST['mode'] == 3){
	$user = new User();
	$id = array("id" => $_POST['id']);
	
	if(!empty($_POST["password"]) && !empty($_POST["new_password"])){
		$passwords = array("password" => $_POST['password'] , "new_password" => $_POST['new_password']);
	} else {
		$passwords = array();
	}
	
	if(!empty($_POST["email"])){
		$email = array("email" => $_POST['email']);
	} else {
		$email = array();
	}
	
	$var = array_merge($id, $passwords, $email);

	if(!empty($passwords)){
		$result = $user->check_password($var);
		if ($result == true){ 
			return $user->update_user($var);
		} else {
			echo "Your password is not correct!";	
		}
	} else {
		return $user->update_user($var);
	}
}

?>