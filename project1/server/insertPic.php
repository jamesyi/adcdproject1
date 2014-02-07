<?php
include("../db/connectDB.php");
$query = "INSERT INTO pictures (link, title, descr) VALUES ( '".$_POST['link']."', '".$_POST['title']."', '".$_POST['descr']."')";
$result = mysqli_query($con, $query);
?>