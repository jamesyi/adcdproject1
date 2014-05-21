<?php
if(empty($_SESSION['username'])){
	
	$message = "Please login, you will be redirected to home page in 4 seconds!";
	
	echo "<script type='text/javascript'>alert('$message');</script>";
	
	header( "refresh:4;url=index.php" ); 
	
	exit();
}

?>

<div id='user_profile'>
	<img src='images/4-2.jpg' class='profile_img' />
    <br/>Name: Doge
    <br/>Birthday: Everyday
    <br/>Hobby: More Tofu
</div>