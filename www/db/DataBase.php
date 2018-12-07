<?php 
include_once('functions.php');
class DataBase extends SQLite3{
	function __construct(){
		$this->open('kompis.com');
		$this->init('company');
		// $this->table = $table;
	}
	// public function selectByFieldValue($field, $value, $allResults = false){
		 // $resultSet = $this->query("SELECT * FROM '$this->table' WHERE $field = '$value'");
		 // $res = self::toAttay($resultSet);
		 // if($allResults) return $res;
		 // else return $res[0];
	// }
	function selectAll($table){
		return "SELECT * FROM '$table'";
	}
	function getById($table, $id){
		$res = $this->get(array('id'=>$id));
		return $res[0];
	}
	function get($table, $where = false){
		$string = $this->selectAll($table);
		if($where) $string = $string.$this->getString(' WHERE ', $where);
		//    echo $string;
		$this->resultSet = $this->query($string);
		return fetchArray($this->resultSet);
	}
	function getString($string, $arr ,$and = " AND "){
		foreach($arr as $key => $value){
			$string = $string."$key = '$value'" ;
			if(!end($arr)) $string = $string.$and;
		}
		 return $string;
	}
	private function init($name) {
		$this->$name = array();
		$this->get($name);	
		while ($row = $this->resultSet->fetchArray()) {
			$this->$name[$row['name']] = $row['value'];
		 }
	}
}

?>