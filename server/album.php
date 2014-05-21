<?php
include("../db/album_db.php");

class Album {
	private $albumDB;
	
	function __construct(){
		$this->albumDB = new album_db();
	}
	
	function insert_album($data){
		$link  = isset($data['link']) ? $data['link'] : NULL;
		$title = isset($data['title']) ? $data['title'] : NULL;
		$descr  = isset($data['descr']) ? $data['descr'] : NULL;
		$this->albumDB->set_album_title($title);
		$this->albumDB->set_album_link($link);
		$this->albumDB->set_album_descr($descr);
		return $this->albumDB->insert_new_album();
	}
	
	function update_album_link($id, $link){
		$this->albumDB->set_album_id($id);
		$this->albumDB->set_album_link($link);
		return $this->albumDB->update_album_link_by_id();
	}
	
	function show_all_albums(){
		$albums = $this->albumDB->get_all_albums();
		if(!empty($albums)){
			foreach ($albums as $album){
				$user_albums = "<li><p><a href='#'><img src='".$album['link']."' class='user_imgs'/></a>".$album['title']."<br/>".$album['descr']."</p></li>";
				echo $user_albums;
			}
		}
	}
	
	function validate_img_type(){
		$valid_types = array("image/jpg", "image/jpeg", "image/png");
		$type = $_FILES['picture']['type'];
		if (!in_array($type, $valid_types)){
			return 0;
		} else {
			return 1;	
		}
	}
}

/*
$db = new album();
$var = array(
		"title" => "a",
		"descr" => "b",
		"link" => "c", 
	);
$a = $db->insert_album($var);
var_dump($a);
*/

?>