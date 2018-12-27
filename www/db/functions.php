<?php
	function fetchArray($resultSet, $index = false){
		$res = array();
		 while ($row = $resultSet->fetchArray()) $res[] = $row;
		 if (is_numeric($index)) return $res[$index];
		 else return $res;
	}

	function getPost($parans){
		$db = new DataBase();
		$id =$parans['id'];
		$resultSet = $db->select('post', "id='$id'");
		return fetchArray($resultSet, 0);
	}

	function updatePost($post){
		$id = $post['id'];
		$content = $post['content'];
		$db = new DataBase();
		$db->update('post', "content='$content'", "id='$id'");
		return $post;
	}

	function getMainMenu(){
		$db = new DataBase();
		$resultSet = $db->select('mainMenu');
		// $resultSet = $db->query($select);
		return fetchArray($resultSet);
	}
	function getLastNews(){
		$db = new DataBase();
		$resultSet = $db->select('news');
		// $resultSet = $db->query($select);
		return fetchArray($resultSet);
	}

	function company($name, $index = false){
		$db = new DataBase();
		$resultSet = $db->select($name, "group_id='1'");
		// $where = $db->where("group_id='1'");
		// $resultSet = $db->query($select . $where);
		return fetchArray($resultSet, $index);
	}

	function getCompany(){
		$db = new DataBase();
		$select = $db->select('company');
		$company = fetchArray($db->query($select), 0);
		$company['phones'] = company('phone');
		$company['mailes'] = company('mail');
		$company['address'] = company('address', 0);
		return $company;
	}

?>