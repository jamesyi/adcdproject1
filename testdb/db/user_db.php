<?php
include("connect.php");
class User_db {
	function get_users(){
		global $con;
		$query = "SELECT * FROM users";
		$result = mysqli_query($con,$query);
		
		$users = array();
		$users_data = array();
		while ($row = mysqli_fetch_array($result)){
			$users_data['username'] = $row['username'];
			$users_data['description'] = $row['description'];
			$users_data['avatar'] = $row['avatar'];
			$users[$row['id']] = $users_data;
		}

		var_dump($users);
		return $users;
	} 
}

$mydb = new User_db();
$mydb -> get_users();

?>