<?php
// include_once('functions.php');
include_once('DataBase.php');
$_POST = json_decode(file_get_contents('php://input'), true);	

	function get_posts(){
		$db = new DataBase();
		$posts = fetchArray($db->get('post'));
		return $posts;
	}
	function get_mainMenu(){
		$db = new DataBase();
		return $db->get('mainMenu');
	}
	function get_company(){
		$db = new DataBase();
		$db->get('company');
		$company = fetchObj($db->resultSet);
		$db->get('address', array('id' => $company['address_id']));
		$company['address'] = fetchArray($db->resultSet, 0);
		$db->get('phone', array('id' => $company['phone_id']));
		$company['phone'] = fetchArray($db->resultSet, 0);
		return $company;		
	}

 ?>