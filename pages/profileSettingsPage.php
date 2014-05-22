<?php
if(empty($_SESSION['username'])){
	
	$message = "Please login, you will be redirected to home page in 2 seconds!";
	
	echo "<script type='text/javascript'>alert('$message');</script>";
	
	header( "refresh:2;url=index.php" ); 
	
	exit();
}

if (isset($_GET['success']) && ($_GET['success'] == "t")){
	
	$message = "Profile Updated!";
	
	echo "<script type='text/javascript'>alert('$message');</script>";
}

if (isset($_GET['success']) && ($_GET['success'] == "f")){
	
	$message = "Old password is not correct!";
	
	echo "<script type='text/javascript'>alert('$message');</script>";
}

if (isset($_GET['success']) && ($_GET['success'] == "e")){
	
	$message = "Fields are empty!";
	
	echo "<script type='text/javascript'>alert('$message');</script>";
}

?>

<div style="text-align:center;margin-bottom:0; padding-top:80px;font-size:1.5em;" id='user_profile'>
	
</div>

<div id='user_profile_form'>
	<?php include("profileSettingsForm.php");?>
</div>