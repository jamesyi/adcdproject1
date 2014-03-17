<?php
/*
error 1 = all fields are empty.
error 2 = title is empty.
error 3 = desctiption is empty.
error 4 = no file selected
error 5 = either the file size is too large, or it's not an image file
*/

include('picture.php');

function validate_img_type(){
	$valid_types = array("image/jpg", "image/jpeg", "image/png");
	$type = $_FILES['picture']['type'];
	if (!in_array($type, $valid_types)){
		return 0;
	} else {
		return 1;	
	}
}

if (empty($_POST['title']) && empty($_POST['descr']) && empty($_FILES['picture']['tmp_name'])) {

	header("location: ../index.php?page=userProfile&error=1");

	exit();	

} else if (empty($_POST['title']) && !empty($_POST['descr']) && !empty($_FILES['picture']['tmp_name'])){
	
	header("location: ../index.php?page=userProfile&error=2&descr=".$_POST['descr']);

	exit();
	
} else if (!empty($_POST['title']) && empty($_POST['descr']) && !empty($_FILES['picture']['tmp_name'])){
	
	header("location: ../index.php?page=userProfile&error=3&title=".$_POST['title']);

	exit();
	
} else if (!empty($_POST['title']) && !empty($_POST['descr']) && empty($_FILES['picture']['tmp_name'])){
	
	header("location: ../index.php?page=userProfile&error=4&title=".$_POST['title']."&descr=".$_POST['descr']);

	exit();
	
} else if ((validate_img_type() == 1) && ($_FILES['picture']['size'] < 5000000) && !empty($_POST['title']) && !empty($_POST['descr'])){
	
	$file = $_FILES['picture']['tmp_name'];
	
	$picture_uploaded = addslashes(file_get_contents($_FILES['picture']['tmp_name']));

	$picture_name = addslashes($_FILES['picture']['name']);

	move_uploaded_file($_FILES['picture']['tmp_name'],"../uploads/". $_FILES['picture']['name']);
	
	$link = "uploads/". $_FILES['picture']['name'];
	
	$picture = new Picture();
	
	$photo = $picture->insert_picture($link, $_POST['title'], $_POST['descr']);

	header("location: ../index.php?page=userProfile&success=true");

	exit();					

} else {
	
	header("location: ../index.php?page=userProfile&error=5");

	exit();	
}
?>