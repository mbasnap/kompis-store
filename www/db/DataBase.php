<?php 
include_once('functions.php');
class DataBase extends SQLite3{
	function __construct(){
		$this->open('kompis.com');
		// $this->company = $this->init('company');
		// $this->table = $table;
	}

	// function getByGrope($table, $id){
	// 	$res = $this->get($table, array('group_id'=>$id));
	// 	return $res;
	// }
	// function getById($table, $id){
	// 	$res = $this->get($table, array('id'=>$id));
	// 	return $res[0];
	// }
	// function get($params = false){
	// 	$string = $this->select($params);
	// 	return $this->query($string);
	// }
	
	function update($table, $set, $where){
		$update = "UPDATE '$table'";
		$update = $update . "SET " . $set;
		$update = $update . $this->where($where);
		return $this->query($update);
	}

	function select($table, $where = ''){
		$select = "SELECT * FROM '$table'";
		$select = $select . $this->where($where);
		// echo $select;
		return $this->query($select);
	}

	 function where($where){
		if(!$where) return '';
	 	 return 'WHERE ' . $where;
	 }

	// function set($params){
	// 	$set = ' SET ';
	// 	foreach($params as $key => $value){
	// 		$set = $set . "$key = '$value'" ;
	// 		if(!end($params)) $where = $where . ',';
	// 	}
	// 	 return $set;
	// }

	// private function init($name, $res  = array()) {
	// 	$this->get($name);
	// 	while ($row = $this->resultSet->fetchArray()) {
	// 		$res[$row['name']] = $row['value'];
	// 	 }
	// 	return $res;
	// }
}



?>