<?php
include("connectDB.php");
class Search_db{
	private $con;
	private $keyword;
	
	function set_keyword($keyword){
		$this->keyword = $keyword;
	}
	
	function __construct(){
		global $con;
		$this->connectDB = $con;
	}
	
	function get_result_by_keywords(){
		$words = explode(" ", $this->keyword);
		$title = array();
		$descr = array();
		$username = array();
		foreach($words as $word){
			$title[] = "title LIKE '%".$word."%'";
			$descr[] = "descr LIKE '%".$word."%'";
			$username[] = "username LIKE '%".$word."%'";
		}
		$title_phrase = implode(" OR ", $title);
		$descr_phrase = implode(" OR ", $descr);
		$username_phrase = implode(" OR ", $username);
		
		$query = "
		(SELECT id, link, title, descr, 'username', 'email'
			FROM pictures 
			WHERE $title_phrase 
				OR $descr_phrase)
		UNION
		(SELECT id, link, title, descr, '', ''
			FROM albums 
			WHERE $title_phrase 
				OR $descr_phrase)
		UNION
		(SELECT id, '', '', '', username, email
			FROM users
			WHERE $username_phrase) 
		";

		$result = mysqli_query($this->connectDB, $query);
		$arr = array();
		if($result){
			while ($row = mysqli_fetch_array($result)){
				$arr[] = $row;
			}
		} 
		return $arr;
	}
}
/*
$db = new Search_db();
$db->set_keyword("leo");
$result = $db->get_result_by_keywords();
var_dump($result);
*/
?>