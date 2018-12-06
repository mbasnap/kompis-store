<?php 
class DataBase extends SQLite3{
	function __construct(){
		$this->open('kompis.com');
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

function get_Posts() {
	$db = new DataBase();
	$posts = $db->get('posts');
	return $posts;
}
function get_menu() {
	$db = new DataBase();
	$menu['mainMenu'] = $db->get('mainMenu');
	return $menu;
}
function get_company() {
	$db = new DataBase();
	$company = $db->get('company');
	$company['phones'] = $db->get('company');
	return $company;
}

?>