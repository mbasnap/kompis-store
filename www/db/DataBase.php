<?php 
class DataBase extends SQLite3{
	function __construct($table){
		$this->open('kompis.com');
		$this->table = $table;
	}
	public function selectByFieldValue($field, $value, $allResults = false){
		 $resultSet = $this->query("SELECT * FROM '$this->table' WHERE $field = '$value'");
		 $res = self::toAttay($resultSet);
		 if($allResults) return $res;
		 else return $res[0];
	}
	public function getAll($jsonEncode = true){
		 $resultSet = $this->query("SELECT * FROM '$this->table'");
		 return self::toAttay($resultSet, $jsonEncode);
	}
	static function toAttay($resultSet, $json = false){
		 $res = array(); 
		 while ($row = $resultSet->fetchArray()) {
			if($json) $res[] = json_encode($row);
			else $res[] = $row;
		 }
		 return $res;
	}
}

?>