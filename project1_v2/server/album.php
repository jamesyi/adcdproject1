<?php
include("../db/album_db.php");

class Album {
	private $albumDB;
	
	function __construct(){
		$this->albumDB = new album_db();
	}
	
	function insert_album($title){
		$this->albumDB->set_album_title($title);
		$this->albumDB->insert_new_album();
	}
	
	function show_albums($id){
		$albums = $this->albumDB->get_all_album();
		if(!empty($albums)){
			foreach ($albums as $album){
				$a = "";
				echo $a;
			}
		}
	}
}

$album = new Album();

$albums = $album->show_albums();
?>