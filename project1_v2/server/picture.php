<?php
include("../db/picture_db.php");

class Picture {
	private $pictureDB;
	
	function __construct(){
		$this->pictureDB = new Picture_db();
	}
	
	function insert_picture($link, $title, $descr){
		$this->pictureDB->set_picture_link($link);
		$this->pictureDB->set_picture_title($title);
		$this->pictureDB->set_picture_descr($descr);
		$this->pictureDB->insert_new_picture();
	}
	
	function show_all_pictures(){
		$pictures = $this->pictureDB->get_all_pictures();
		if(!empty($pictures)){
			foreach ($pictures as $picture){
				$photos = "<li><p><img src='".$picture['link']."' class='user_imgs'>".$picture['title']."<br/>".$picture['descr']."</p></li>";
				echo $photos;
			}
		}
	}
}

$picture = new Picture();

$pictures = $picture->show_all_pictures();
?>