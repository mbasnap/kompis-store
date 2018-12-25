<?php
	function fetchArray($resultSet, $index = false){
		$res = array();
		 while ($row = $resultSet->fetchArray()) $res[] = $row;
		 if (is_numeric($index)) return $res[$index];
		 else return $res;
	}

	function updatePost($id, $content){
		$db = new DataBase();
		$db->update('post', "content='$content'", "id='$id'");
	}

	function savePage($page){
		$id = $page['post_id'];
		if($page['post_id']) updatePost($id, $page['content']);
		else {
			$db = new DataBase();
		}



		$db = new DataBase();
		$content = $params['content'];
		$post_id = $params['post_id'];
		$update = $db->update('post', "content='$content'");
		$where = $db->where("id='$post_id'");
		$db->query($update . $where);
		return $content;
	}
	function getPageByName($params){
		$db = new DataBase();
		$name = $params['name'];
		$resultSet = $db->select('PagesView', "name='$name'");
		// $where = $db->where("name='$name'");
		// $resultSet = $db->query($select . $where);
		return fetchArray($resultSet, 0);
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