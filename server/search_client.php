<?php
include("search.php");
if(!empty($_GET['keyword'])){
	$search = new Search();
	$var = trim($_GET['keyword']);
	$result = $search->search_all($var);
	echo json_encode($result);
} else {
	echo json_encode("No input!");
}
?>