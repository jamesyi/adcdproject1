<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/moretofu/db/album_db.php");

class Album {
	private $albumDB;
	private $joined_album;
	
	function __construct(){
		$this->albumDB = new Album_db();
		$this->joined_album = new Joined_Album();
	}
	
	function show_album_by_uid($uid){
		$this->joined_album->set_uid($uid);
		$albums = $this->joined_album->get_album_by_uid();
		
		return $albums;
	}
	
	function insert_album($data){
		$link  = isset($data['link']) ? $data['link'] : NULL;
		$title = isset($data['title']) ? $data['title'] : NULL;
		$descr = isset($data['descr']) ? $data['descr'] : NULL;
		$this->albumDB->set_album_title($title);
		$this->albumDB->set_album_link($link);
		$this->albumDB->set_album_descr($descr);
		$album_id = $this->albumDB->insert_new_album();
		$user_id = isset($data['uid']) ? $data['uid'] : FALSE;
		$this->joined_album->set_aid($album_id);
		$this->joined_album->set_uid($user_id);
		$this->joined_album->insert_user_album();
		return $album_id;
	}
	
	function update_album_link($id, $link){
		$this->albumDB->set_album_id($id);
		$this->albumDB->set_album_link($link);
		return $this->albumDB->update_album_link_by_id();
	}
	
	function show_all_albums(){
		$albums = $this->albumDB->get_all_albums();
		return $albums;
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

/*
$db = new album();
$uid = 3;
$a = $db->show_album_by_uid($uid);
var_dump($a);
*/
?>