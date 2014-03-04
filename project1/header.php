<?php include("server/session.php") ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Project 1</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<div id="user_panel">
<?php 
	if (isset($_SESSION['username'])) { 
		echo "<span>Welcome, ".$_SESSION['username']." 
		<a href='#' id='accountOption'><img src='images/option.png' alt='account options' height='16' width='16'></a>
		<ul>
		<li><a href='/project1/index.php?page=userProfile' class='link'>Account Page</a></li>
		<li><a href='#' class='link' id='logout' onclick='logout();'>Log out</a></span></li>
		</ul>"; 
	} else {
		echo "<span><a href='/project1/index.php?page=login' class='link'>Login</a></span>
			<span><a href='/project1/index.php?page=register' class='link'>Register</a></span>"; 
	}			
?>
</div>

<div id="nav">
	<ul>
    	<li><a href="/project1/index.php?page=home" class="link">Home</a></li>
		<li><a href="/project1/index.php?page=cosplayers" class="link">Cosplayers</a></li>
	</ul>
</div>
