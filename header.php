<?php include("server/session.php") ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>More Tofu</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="js/nice.js"></script>
<script src='js/smooth-scroll.js'></script>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

<div class="wrapper">
    <div class="header">
        <div id="user_panel">
<?php 
if (isset($_SESSION['username'])) { 
	echo "
	<div id='user'>
		<ul>
			<li>Welcome, ".$_SESSION['username']."</li> 
			<li id='gear-container'><a><img id='gear-pic' src='images/gear.png'></a></li>
		</ul>
	</div>
	<div id='dropdown_menu'>
		<ul>
			<li><a href='/moretofu/index.php?page=cosplayer_profile' class='link'>User Profile</a>
			</li>
			<li><a href='#' id='logout' onclick='logout();'>Log out</a>
			</li>
		</ul>
	</div>
	"; 
	} else {
		echo "
		<div id='user_section'>
			<ul>
				<li><a href='/moretofu/index.php?page=login'>Login</a></li>
				<li><a href='/moretofu/index.php?page=register'>Register</a></li>
			</ul>
		</div>	
		"; 
	}			
?>  
		</div>
	</div>
