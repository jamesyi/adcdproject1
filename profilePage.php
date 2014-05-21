<?php
if(empty($_SESSION['username'])){
	
	$message = "Please login, you will be redirected to home page in 4 seconds!";
	
	echo "<script type='text/javascript'>alert('$message');</script>";
	
	header( "refresh:4;url=index.php" ); 
	
	exit();
}
?>

<?php include("create_albumPage.php");?>