<?php 
include_once('functions.php');
class DataBase extends SQLite3{
	function __construct(){
		$this->open('kompis.com');
		$this->company = $this->init('company');
		// $this->table = $table;
	}
	function selectAll($table){
		return "SELECT * FROM '$table'";
	}
	function getByGrope($table, $id){
		$res = $this->get($table, array('group_id'=>$id));
		return $res;
	}
	function getById($table, $id){
		$res = $this->get($table, array('id'=>$id));
		return $res[0];
	}
	function get($table, $where = false){
		$string = $this->selectAll($table);
		if($where) $string = $string.$this->getString(' WHERE ', $where);
		//   echo $string;
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
	private function init($name, $res  = array()) {
		$this->get($name);
		while ($row = $this->resultSet->fetchArray()) {
			$res[$row['name']] = $row['value'];
		 }
		return $res;
	}
}

?>