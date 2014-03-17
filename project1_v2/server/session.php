<?php
ob_start();
session_start();

if(isset($_SESSION['username'])){
	json_encode($_SESSION);
}
?>