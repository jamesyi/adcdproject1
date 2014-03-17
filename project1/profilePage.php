<?php
if(empty($_SESSION['username'])){
	
	$message = "Please login, you will be redirected to home page in 4 seconds!";
	
	echo "<script type='text/javascript'>alert('$message');</script>";
	
	header( "refresh:4;url=index.php" ); 
	
	exit();
}
?>
<div id="add_album">
<form action="server/ablum_client.php" method="post" enctype="multipart/form-data">

Enter album name:<br/>

<input name="album" type="text" id="album" class="input"><br/>

<input type="submit" name="Create" value="Create"/>

</form>
</div>

<?php include("unloadPage.php");?>

<div id="grid">
	<ul>
    </ul>
</div>