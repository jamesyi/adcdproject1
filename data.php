

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
						<div class='caption' id='".$id."' rel='".$title."'>
							<a href='#'><span class='span-custom'>".$title."<br/><span style='color:#E64C66; font-size:0.8em;'>".$descr."</span></span></a>
							
						</div>
					
					
						<img class='works-image' src='".$link."' width='350' height='350' />
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
				echo "
				<div class='col-md-3 custom-md-3' >
					<div class='thumbnail'>
						<div class='caption' id='".$id."' rel='".$title."'>
							<a href='#'><span class='span-custom'>".$title."<br/><span style='color:#E64C66; font-size:0.8em;'>".$descr."</span></span></a>
							
						</div>
					
					
						<img class='works-image' src='".$link."' width='350' height='350' />
					</div>
				</div>
				";
			}
		break;
		
		case 3: //list all albums for cosplayers page
			$albums = $album->show_all_albums();
			foreach ($albums as $a){
				$link = $a['link'];
				$id = $a['id'];
				$descr = $a['descr'];
				$title = $a['title'];
				echo "
				<div class='col-md-3 custom-md-3' >
					<div class='thumbnail'>
						<div class='caption' id='".$id."' rel='".$title."'>
							<a href='#'><span class='span-custom'>".$title."<br/><span style='color:#E64C66; font-size:0.8em;'>".$descr."</span></span></a>
							
						</div>
					
					
						<img class='works-image' src='".$link."' width='350' height='350' />
					</div>
				</div>
				";
			}
		break;
		
		case 4: //sending user info to user profile page
			$uid = $_SESSION['user_id'];
			$userinfo = $user->show_user_by_id($uid);
			
			if($userinfo){
				$link = $userinfo['link'];
				$username = $userinfo['username'];
				$email = $userinfo['email'];
				echo "
					Name: ".$username."<br/>
					Email: ".$email."
				";
			}
		break;
		
		case 5: //public user page with albums 
			$uid = $_GET['uid'];
			
			$userinfo = $user->show_user_by_id($uid);
			$albuminfo = $album->show_album_by_uid($uid);
			if($userinfo){
				$link = $userinfo['link'];
				$username = $userinfo['username'];
				$email = $userinfo['email'];
				echo "
					Name: ".$username."<br/>
					Email: ".$email."
				";
			}
			
			foreach ($albuminfo as $ai){
				$link = $ai['link'];
				$id = $ai['album_id'];
				$descr = $ai['descr'];
				$title = $ai['title'];
				echo "
				<div class='col-md-3 custom-md-3' >
					<div class='thumbnail'>
						<div class='caption' id='".$id."' rel='".$title."'>
							<a href='#'><span class='span-custom'>".$title."<br/><span style='color:#E64C66; font-size:0.8em;'>".$descr."</span></span></a>
							
						</div>
					
					
						<img class='works-image' src='".$link."' width='350' height='350' />
					</div>
				</div>
				";
			}
			
		break;
		
		case 6: //public album page for one album
			$aid = $_GET['aid'];
			$pictures = $picture->show_picture_by_aid($aid);
			foreach ($pictures as $p){
				$link = $p['link'];
				$id = $p['picture_id'];
				$descr = $p['descr'];
				$title = $p['title'];
				echo "
				<div class='col-md-3 custom-md-3' >
					<div class='thumbnail'>
						<div class='caption' id='".$id."' rel='".$title."'>
							<a href='#'><span class='span-custom'>".$title."<br/><span style='color:#E64C66; font-size:0.8em;'>".$descr."</span></span></a>
							
						</div>
					
					
						<img class='works-image' src='".$link."' width='350' height='350' />
					</div>
				</div>
				";
			}
		break;
		
		case 7: //public picture page for one picture
			$pid = $_GET['pid'];
			$pic = $picture->show_picture_by_id($pid);
			
			if($pic){
				$link = $pic['link'];
				$descr = $pic['descr'];
				$title = $pic['title'];
				$id = $pic['id'];
				echo "
					<div class='col-md-3 custom-md-3' >
						<div class='thumbnail'>
							<div class='caption' id='".$id."' rel='".$title."'>
								<a href='#'><span class='span-custom'>".$title."<br/><span style='color:#E64C66; font-size:0.8em;'>".$descr."</span></span></a>
								
							</div>
						
						
							<img class='works-image' src='".$link."' width='350' height='350' />
						</div>
					</div>
				";
			}
		break;
	}
}
?>