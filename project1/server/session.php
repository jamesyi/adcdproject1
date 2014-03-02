<?php
session_start();

if(isset($_GET['LoggedIn'])){
	echo json_encode($_SESSION);
	echo $_SESSION['LoggedIn'];
}
?>