
<!--<a href="index.php?page=albumCreation" style="z-index:999;">Back to Album Creation</a>
-->
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

<div class="col-md-3 pull-left image-creation-style" id="img_upload_form">
<?php include("imageUploadForm.php");?>
</div>

<div class="col-md-9 pull-right" style="padding:0;">
    <div class="container-fluid work-container">
        <div class="row" id="user_img_list">
        
        </div>
	</div>
</div>