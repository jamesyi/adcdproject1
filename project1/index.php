<?php include("header.php"); ?>
<?php
if (isset($_GET["page"])) {
	switch ($_GET["page"]) {
		case "register":
			include("registerPage.php");
			break;
		case "upload":
			include("uploadPicturePage.php");
			break;
		case "login":
			include("loginPage.php");
			break;
	}
} else {
	include("homePage.php");
}
?>
<?php include("footer.php"); ?>