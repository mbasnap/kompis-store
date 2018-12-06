<?php
	include_once('Post.php');
	include_once('Menu.php');
	include_once('Company.php');
	$_POST = json_decode(file_get_contents('php://input'), true);	

	function get_Posts() {
		return Post::getAll();
	}
	function get_menu() {
		return Menu::getMenu();
	}
	function get_company() {
		return Company::getCompany();
	}
 ?>