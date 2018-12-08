<?php
	function fetchArray($resultSet){
		$res = array();
		 while ($row = $resultSet->fetchArray()) {
			$res[] = $row;
		 }
		 return $res;
	}
	// 	function fetchObj($resultSet, $res = array()){
	// 	 while ($row = $resultSet->fetchArray()) {
	// 		$res[$row['name']] = $row['value'];
	// 	 }
	// 	 return $res;
	// }

?>