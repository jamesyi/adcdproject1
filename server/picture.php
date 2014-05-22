<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/git/adcdproject1/db/picture_db.php");

class Picture {
	private $pictureDB;
	private $joined_picture;
	
	function __construct(){
		$this->pictureDB = new Picture_db();
		$this->joined_picture = new Joined_Picture();
	}
	
	function show_picture_by_aid($aid){
		$this->joined_picture->set_aid($aid);
		$albums = $this->joined_picture->get_picture_by_aid();
		
		return $albums;
	}
	
	function insert_picture($data){
		$link  = isset($data['link']) ? $data['link'] : NULL;
		$title = isset($data['title']) ? $data['title'] : NULL;
		$descr = isset($data['descr']) ? $data['descr'] : NULL;
		$this->pictureDB->set_picture_title($title);
		$this->pictureDB->set_picture_link($link);
		$this->pictureDB->set_picture_descr($descr);
		$picture_id = $this->pictureDB->insert_new_picture();
		$album_id = isset($data['aid']) ? $data['aid'] : FALSE;
		$this->joined_picture->set_aid($album_id);
		$this->joined_picture->set_pid($picture_id);
		$this->joined_picture->insert_album_picture();
		return $picture_id;
	}
	
	function show_picture_by_id($id){
		$this->pictureDB->set_picture_id($id);
		return $this->pictureDB->get_picture_by_id();
	}
	
	function update_picture_link($id, $link){
		$this->pictureDB->set_picture_id($id);
		$this->pictureDB->set_picture_link($link);
		return $this->pictureDB->update_picture_link_by_id();
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

?>