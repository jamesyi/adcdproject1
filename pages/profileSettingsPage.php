<?php
if(empty($_SESSION['username'])){
	
	$message = "Please login, you will be redirected to home page in 4 seconds!";
	
	echo "<script type='text/javascript'>alert('$message');</script>";
	
	header( "refresh:4;url=index.php" ); 
	
	exit();
}

?>

<div id='user_profile'>
	
</div>

<div id='user_profile_form'>
<?php include("profileSettingsForm.php");?>
</div>