

<?php
include("server/session.php");
include("server/picture.php");
include("server/album.php");
include("server/user.php");

if(isset($_GET['data'])){
	$picture = new Picture();
	$album = new Album();
	$user = new User();
	switch ($_GET['data']){
		case 1: //list all user's albums for album creation page
			$uid = $_SESSION['user_id'];
			$album_covers = $album->show_album_by_uid($uid);
			
			foreach ($album_covers as $a){
				$link = $a['link'];
				$id = $a['album_id'];
				$descr = $a['descr'];
				$title = $a['title'];
				echo "
				<div class='col-md-3 custom-md-3' >
					<div class='thumbnail'>
						<div class='caption'>
							<a href='#'><span class='span-custom'>".$title."<br/><span style='color:#E64C66;'>".$descr."</span></span></a>
							
						</div>
					
					
						<img class='works-image' src='".$link."' width='350' height='350' id='".$id."' class='userAlbum' rel='".$title."'/>
					</div>
				</div>
				";
			}
		
		break;
		
		case 2: //list all pictures that belongs to the album
			$aid = $_GET['aid'];
			$pictures = $picture->show_picture_by_aid($aid);
			foreach ($pictures as $p){
				$link = $p['link'];
				$id = $p['picture_id'];
				$descr = $p['descr'];
				$title = $p['title'];
				echo "<div><img src='".$link."' width='350' height='350' id='".$id."' class='albumPicture' rel='".$title."'/><br/>".$title." ".$descr."</div>";
			}
		break;
		
		case 3: //list all albums for cosplayers page
			$albums = $album->show_all_albums();
			foreach ($albums as $a){
				$link = $a['link'];
				$id = $a['id'];
				$descr = $a['descr'];
				$title = $a['title'];
				echo "<div><img src='".$link."' width='350' height='350' id='".$id."' class='cosplayAlbums' rel='".$title."'/><br/>".$title." ".$descr."</div>";
			}
		break;
		
		case 4:
			$uid = $_SESSION['user_id'];
			$userinfo = $user->show_user_by_id($uid);
		break;
	}
}
?>