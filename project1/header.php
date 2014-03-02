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
<ul>
<?php 
	if (isset($_SESSION['username'])) { 
		echo "<li id='user'>Welcome, ".$_SESSION['username']." (<a href='#' class='link' id='logout' onclick='logout();'>Log out</a>)</li>"; 
	} else {
		echo "<li><a href='/project1/index.php?page=login' class='link'>Login</a></li>
			<li><a href='/project1/index.php?page=register' class='link'>Register</a></li>"; 
	}			
?>
</ul>
</div>
<div id="nav">
	<ul>
		<li><a href="/project1/index.php?page=upload" class="link">Upload</a></li>
	</ul>
</div>