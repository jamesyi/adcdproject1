<?php
include('user.php');
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])) {
	$user = new User();
	$user->register_user($_POST['username'], $_POST['password'], $_POST['email']);
} else if(isset($_POST['username']) && isset($_POST['password'])) {
	$user = new User();
	$username = $user->login_user($_POST['username'], $_POST['password']);
	echo json_encode($username);
} else {
	echo json_encode("Login/Register Failed!");
}

?>