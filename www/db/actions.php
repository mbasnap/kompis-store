﻿<?php
// include_once('functions.php');
include_once('DataBase.php');
$_POST = json_decode(file_get_contents('php://input'), true);	

	function get_post(){
		$db = new DataBase();
		return  $db->get('post', $_POST);
	}
	function update_post(){
		$db = new DataBase();
		$id = $_POST['id'];
		$name = $_POST['name'];
		$content= $_POST['content'];
		$query = "UPDATE post SET name='$name', content='$content' WHERE id='$id'";
		$res = $db->exec($query );
		return  $_POST ;		
	}
	function get_mainMenu(){
		$db = new DataBase();
		return $db->get('mainMenu');
	}
	function get_sideBarMenu(){
		$db = new DataBase();
		return $db->get('sideBarMenu');
	}
	function get_lastNews(){
		$db = new DataBase();
		return $db->get('news');	
	}
	function get_company(){
		$db = new DataBase();
		$company = $db->company;
		$company['address'] = $db->getById('address', $company['address_id']);
		$company['phone'] = $db->getById('phone', $company['phone_id']);
		$company['fax'] = $db->getById('phone', $company['fax_id']);
		$company['mail'] = $db->getById('mail', $company['mail_id']);
		$company['phones'] = $db->getByGrope('phone', $company['group_id']);
		$company['mailes'] = $db->getByGrope('mail', $company['group_id']);
		return $company;		
	}

 ?>