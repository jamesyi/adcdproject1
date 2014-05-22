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

<div class="col-md-3 pull-left album-creation-style" id="album_creation_form">
<?php include("albumCreationForm.php");?>
</div>

<div class="col-lg-9 pull-right" style="padding:0;">
    <div class="container-fluid work-container">
        <div class="row" id="user_album_list">
        
        </div>
	</div>
</div>