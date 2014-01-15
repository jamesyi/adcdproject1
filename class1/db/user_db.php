<?php

include("connectDB.php");

class User_db {
	private $user;

	function set_user($name){
		
	}

	function get_user(){
		return "Henry";
	}

	function get_all_user(){
		global $con;
		
		$query = "SELECT * FROM user";
		$result = mysqli_query($con, $query) or die(mysql_error());
		while ($row = mysqli_fetch_array($result)){
			$username[$row['id']] = $row['username'];
		}

		return $username;
	}
}
?>