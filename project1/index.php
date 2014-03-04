<?php include("header.php"); ?>
<?php
if (isset($_GET["page"])) {
	switch ($_GET["page"]) {
		case "register":
			include("registerPage.php");
			break;
			
		case "login":
			include("loginPage.php");
			break;
			
		case "cosplayers":
			include("cosplayersPage.php");
			break;
			
		case "userProfile":
			include("userProfilePage.php");
			break;
			
		case "upload":
			include("uploadPicturePage.php");
			break;
	}
} else {
	include("homePage.php");
}
?>
<?php include("footer.php"); ?>