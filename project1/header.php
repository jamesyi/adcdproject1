<?php include("server/session.php") ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Project 1</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="js/nice.js"></script>
<script src='js/smooth-scroll.js'></script>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

<div class="wrapper">
    <div class="header">
        <ul class="login">
<?php 
if (isset($_SESSION['username'])) { 
	echo 
	"<div id='user_panel'>
		Welcome, ".$_SESSION['username']." 
		<div id='user_option'>
			<a href='' onClick='show_option()'><img id='gear-pic' src='http://png-2.findicons.com/files/icons/1681/siena/256/gear.png'></a>
		</div>
		
		<div id='dropdown'>
			<ul>
				<li>
					<a href='/project1/index.php?page=userProfile' class='link'>Account Page</a>
				</li>
				<li>
					<a href='#' class='link' id='logout' onclick='logout();'>Log out</a>
				</li>
			</ul>
		</div>
	</div>"; 
	} else {
		echo "<span><a href='/project1/index.php?page=login' class='link'>Login</a></span>
			<span><a href='/project1/index.php?page=register' class='link'>Register</a></span>"; 
	}			
?> 
           	</li>       
		</ul>
	</div>
