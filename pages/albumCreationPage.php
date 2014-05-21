<?php
if(empty($_SESSION['username'])){
	
	$message = "Please login, you will be redirected to home page in 2 seconds!";
	
	echo "<script type='text/javascript'>alert('$message');</script>";
	
	header( "refresh:2;url=index.php" ); 
	
	exit();
}
if (isset($_GET['success']) && ($_GET['success'] == true)){
	
	$message = "Album Created!";
	
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

<?php include("albumCreationForm.php");?>

<div id='user_album_list'>
	<ul>
    </ul>
</div>