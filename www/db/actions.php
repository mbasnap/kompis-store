<?php
	include_once('DataBase.php');
	$_POST = json_decode(file_get_contents('php://input'), true);	

	function getPostByName(){
		 $db= new DataBase('posts');
		 $res = $db->selectByFieldValue("name", $_POST['name']);
		return $res['city'];
	}
	function getAllPosts(){
		$db= new DataBase('posts');
		return json_encode($db->getAll());
	}
	function getMenu(){
		$db= new DataBase('menu');
		return json_encode($db->getAll());
	}
 ?>