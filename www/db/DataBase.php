<?php 
include_once('functions.php');
class DataBase extends SQLite3{
	function __construct(){
		$this->open('kompis.com');
	}

	
	function update($table, $set, $where){
		$update = "UPDATE '$table'";
		$update = $update . "SET " . $set;
		$update = $update . $this->where($where);
		// echo $update;
		return $this->query($update);
	}

	function select($table, $where = ''){
		$select = "SELECT * FROM '$table'";
		$select = $select . $this->where($where);
		//  echo $select;
		return $this->query($select);
	}

	 function where($where){
		if(!$where) return '';
	 	 return 'WHERE ' . $where;
	 }

}



?>