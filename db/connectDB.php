<?php
$con = mysqli_connect("localhost", "root", "", "moretofu");

if(mysqli_connect_error()){
	//failed to connect
	echo "failed to connect".mysqli_connect_error();
}
?>