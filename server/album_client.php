<?php
/*
error 1 = all fields are empty.
error 2 = title is empty.
error 3 = desctiption is empty.
error 4 = no file selected
error 5 = either the file size is too large, or it's not an image file
error 6 = bot title & description are empty
*/

include('album.php');

$album = new Album();
$valid_type = $album->validate_img_type();

if (empty($_POST['title']) && empty($_POST['descr']) && empty($_FILES['picture']['tmp_name'])) {

	header("location: ../index.php?page=albumCreation&error=1");

	exit();	

} else if (empty($_POST['title']) && !empty($_POST['descr']) && !empty($_FILES['picture']['tmp_name'])){
	
	header("location: ../index.php?page=albumCreation&error=2&descr=".$_POST['descr']);

	exit();
	
} else if (!empty($_POST['title']) && empty($_POST['descr']) && !empty($_FILES['picture']['tmp_name'])){
	
	header("location: ../index.php?page=albumCreation&error=3&title=".$_POST['title']);

	exit();
	
} else if (!empty($_POST['title']) && !empty($_POST['descr']) && empty($_FILES['picture']['tmp_name'])){
	
	header("location: ../index.php?page=albumCreation&error=4&title=".$_POST['title']."&descr=".$_POST['descr']);

	exit();
	
} else if (($valid_type == 1) && ($_FILES['picture']['size'] < 5000000) && !empty($_POST['title']) && !empty($_POST['descr'])){

	$album = new Album();
	
	$var = array(
		"title" => $_POST['title'],
		"descr" => $_POST['descr'],
		"link" => NULL, 
		"uid" => $_POST['user_session_id'],
	);
	
	$id = $album->insert_album($var);
	
	$filename  = basename($_FILES['picture']['name']);
	$extension = pathinfo($filename, PATHINFO_EXTENSION);
	$new_filename = $id.".".$extension;
	rename($filename, $new_filename);
	
	//create root folder - "uploads"
	$root_folder = "../uploads/";
	if(!file_exists($root_folder)){
		mkdir($root_folder, 0777);
	}
	
	//create album folder under uploads for each user, folder named after user id
	$dir_path1 = "../uploads/".$_POST['user_session_id']."/";
	$dir_path2 = $dir_path1."albums/";
	if(!file_exists($dir_path1)){
		mkdir($dir_path1, 0777);
	}
	
	if(!file_exists($dir_path2)){
		mkdir($dir_path2, 0777);
	}
	
	move_uploaded_file($_FILES['picture']['tmp_name'], $dir_path2.$new_filename);
	
	$link = "uploads/".$_POST['user_session_id']."/albums/".$new_filename;
	
	$album->update_album_link($id, $link);
	
	header("location: ../index.php?page=albumCreation&success=true");

	exit();					

} else if ((($valid_type == 1) && ($_FILES['picture']['size'] < 5000000) && empty($_POST['title']) && empty($_POST['descr']))) {
	
	header("location: ../index.php?page=albumCreation&error=5");

	exit();	
} else if (($valid_type == 0) || ($_FILES['picture']['size'] > 5000000)){
	
	header("location: ../index.php?page=albumCreation&error=6");

	exit();	
}
?>