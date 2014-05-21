<?php
if (isset($_GET['success']) && ($_GET['success'] == true)){
	
	$message = "Album Created!";
	
	echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

<div id='user_profle'>
	<img src='images/4-2.jpg' class='profile_img' />
    <br/>Name: Doge
    <br/>Birthday: Everyday
    <br/>Hobby: More Tofu
    <br/><img src='images/add.png'/>
</div>

<?php include("create_albumPage.php");?>

<div id='album_list'>
	<ul>
    </ul>
</div>