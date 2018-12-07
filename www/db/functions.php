<?php
	function fetchArray($resultSet, $index = false){
		$res = array();
		 while ($row = $resultSet->fetchArray()) {
			$res[] = $row;
		 }
		 return $res[$index];
	}
	// 	function fetchObj($resultSet, $res = array()){
	// 	 while ($row = $resultSet->fetchArray()) {
	// 		$res[$row['name']] = $row['value'];
	// 	 }
	// 	 return $res;
	// }

?>