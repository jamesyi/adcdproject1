<?php include("server/session.php") ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>More Tofu</title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
<script src="js/nice.js"></script>
<script src='js/smooth-scroll.js'></script>
<script>
var speed = 'slow';

$('html, body').hide();
$(document).ready(function() {
    $('html, body').fadeIn(speed, function() {
        $('a[href], button[href]').click(function(event) {
            var url = $(this).attr('href');
            if (url.indexOf('#') == 0 || url.indexOf('javascript:') == 0) return;
            event.preventDefault();
            $('html, body').fadeOut(speed, function() {
                window.location = url;
            });
        });
    });
});
</script>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/carousel.css" rel="stylesheet">
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
			<li>Welcome,<span style='color:#E84D5B;'> ".$_SESSION['username']."</span></li> 
			<li id='gear-container'><a><img id='gear-pic' src='images/gear.png'></a></li>
		</ul>
	</div>
	<div id='dropdown_menu'>
		<ul>
			<li><a href='/git/adcdproject1/index.php?page=profile' class='link'>Profile</a>
			</li>
			<li><a href='/git/adcdproject1/index.php?page=albumCreation' class='link'>Create Album</a>
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
				<li><a href='/git/adcdproject1/index.php?page=login'>Login</a></li>
				<li><a href='/git/adcdproject1/index.php?page=register'>Register</a></li>
			</ul>
		</div>	
		"; 
	}			
?>  
		</div>
	</div>
    <div id="content">
