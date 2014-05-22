<?php
include_once ($_SERVER['DOCUMENT_ROOT']."/moretofu/db/search_db.php");
class Search{
	private $searchDB;
	
	function __construct(){
		$this->searchDB = new Search_db();
	}
	
	function search_all($var){
		$this->searchDB->set_keyword($var);
		$results = $this->searchDB->get_result_by_keywords();
		if(!empty($results)){
			return $results;	
		} else {
			return false;	
		}
	}
}

/*
$db = new Search();
$result = $db->search_all("leo");
var_dump($result);
*/
?>