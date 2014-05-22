

<h1>Create an album:</h1>
<form action="../adcdproject1/server/album_client.php" method="post" enctype="multipart/form-data">

<p style="font-size:1.3em;">Select an album cover image:</p><br/>




<button type="button" class="btn btn-primary album-upload-button" onclick="document.getElementById('picture').click();"><p><span class="glyphicon glyphicon-folder-open">&nbsp;</span> Choose A File</p></button>
<div id="upload-wrap">

<input name="picture" type="file" id="picture">

</div><br/>
<?php
	if (isset($_GET['error']) && ($_GET['error'] == 1)){
		echo "<div id='error'>Please choose an image file.</div>";
	} else if (isset($_GET['error']) && ($_GET['error'] == 2)){
		echo "<div id='error'>Please choose your image file again.</div>";
	} else if (isset($_GET['error']) && ($_GET['error'] == 3)){
		echo "<div id='error'>Please choose your image file again.</div>";
	} else if (isset($_GET['error']) && ($_GET['error'] == 4)){
		echo "<div id='error'>Please choose an image file.</div>";
	} else if (isset($_GET['error']) && ($_GET['error'] == 5)){
		echo "<div id='error'>Please select your image again.</div>";
	} else if (isset($_GET['error']) && ($_GET['error'] == 6)){
		echo "<div id='error'>You can only choose a jpeg/jpg/png file smaller than 5MB to upload.</div>";
	} 
?>



<input name="title" type="text" placeholder="Album Title"id="title" class="input" value="<?php if (isset($_GET['title'])){echo $_GET['title'];} ?>"/><br/>
<?php
	if (isset($_GET['error']) && ($_GET['error'] == 1)) {
		echo "<div id='error'>Please give your image a title.</div>";
	} else if (isset($_GET['error']) && ($_GET['error'] == 2)) {
		echo "<div id='error'>Please give your image a title.</div>";
	} else if (isset($_GET['error']) && ($_GET['error'] == 5)) {
		echo "<div id='error'>Please give your image a title.</div>";
	} else if (isset($_GET['error']) && ($_GET['error'] == 6)){
		echo "<div id='error'>Please enter the title again.</div>";
	} 
?>



<textarea name="descr" type="text" id="descr" placeholder="Album Description" value="<?php if (isset($_GET['descr'])){echo $_GET['descr'];} ?>" class="input" rows="7" maxlength="1000"></textarea>
<?php
	if (isset($_GET['error']) && ($_GET['error'] == 1)){
		echo "<div id='error'>Please give your image a description.</div>";
	} else if (isset($_GET['error']) && ($_GET['error'] == 3)){
		echo "<div id='error'>Please give your image a description.</div>";
	} else if (isset($_GET['error']) && ($_GET['error'] == 5)) {
		echo "<div id='error'>Please give your image a title.</div>";
	} else if (isset($_GET['error']) && ($_GET['error'] == 6)){
		echo "<div id='error'>Please enter the description again.</div>";
	} 
?>

<br/>
<input name="user_session_id" id="user_session_id" type="hidden" value="<?php echo $_SESSION['user_id']; ?>"/>
<input type="submit" name="Submit" value="Upload" class="btn btn-danger" id="create_album"/>

</form>
