<?php include("header.php"); ?>
<?php
if (isset($_GET["page"])) {
	switch ($_GET["page"]) {
		case "register":
			include("pages/registerPage.php");
			break;
			
		case "login":
			include("pages/loginPage.php");
			break;
			
		case "cosplayers":
			include("pages/cosplayersPage.php");
			break;
			
		case "profile":
			include("pages/profileSettingsPage.php");
		break;
		
		case "albumCreation":
			include("pages/albumCreationPage.php");
		break;
		
		case "uploadImage":
			include("pages/uploadImagePage.php");
		break;
			
		case "userProfile":
			include("pages/profilePage.php");
			break;
			
		case "about":
			include("pages/aboutPage.php");
			break;
		
		case "home":
			include("pages/homePage.php");
			break;
	}
} else {
	include("pages/homePage.php");
}
?>
<?php include("footer.php"); ?>