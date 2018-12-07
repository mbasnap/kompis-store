<?php 
include_once('functions.php');
class DataBase extends SQLite3{
	function __construct(){
		$this->open('kompis.com');
		// $this->table = $table;
	}
	// public function selectByFieldValue($field, $value, $allResults = false){
		 // $resultSet = $this->query("SELECT * FROM '$this->table' WHERE $field = '$value'");
		 // $res = self::toAttay($resultSet);
		 // if($allResults) return $res;
		 // else return $res[0];
	// }
	function get($table, $where = false){
		$string = "SELECT * FROM '$table'";
		if($where) $string = $string.$this->getString(' WHERE ', $where);
		  // echo $string;
		$this->resultSet = $this->query($string);
		return fetchArray($this->resultSet);
	}
	function getString($string, $arr){
		foreach($arr as $key => $value){
			$string = $string."$key = '$value'" ;
			if(!end($arr)) $string = $string." AND ";
		}
		 return $string;
	}
	
	// function fetchArray($resultSet){
		 // $res = array(); 
		 // while ($row = $resultSet->fetchArray()) {
			// $res[$row['name']] = $row['value'];
		 // }
		 // return $res;
	// }
}

?>