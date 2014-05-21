<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<a href="index.php?page=albumCreation">Back to Album Creation</a>

<?php
if(empty($_SESSION['username'])){
	
	$message = "Please login, you will be redirected to home page in 2 seconds!";
	
	echo "<script type='text/javascript'>alert('$message');</script>";
	
	header( "refresh:2;url=index.php" ); 
	
	exit();
}
if (isset($_GET['success']) && ($_GET['success'] == true)){
	
	$message = "Image Uploaded!";
	
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

<?php include("imageUploadForm.php");?>

<div id='user_img_list'>
	<ul>
    </ul>
</div>