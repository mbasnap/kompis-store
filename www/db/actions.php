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
		$company = $db ->company;
		// $company['address'] = $db->getById('address', $company['address_id']);
		// $company['phone'] = $db->getById('phone', $company['phone_id']);
		return $company;		
	}

 ?>