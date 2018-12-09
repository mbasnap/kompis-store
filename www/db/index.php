<?php
// header("Access-Control-Allow-Origin:*");
include_once('actions.php');
if($_GET['get']) echo action('get_'.$_GET['get']);
if($_GET['add']) echo action('add_'.$_GET['add']);
if($_GET['update']) echo action('update_'.$_GET['update']);
if($_GET['remove']) echo action('remove_'.$_GET['remove']);

function action($action){
	$res = array();
	if(function_exists($action)) 
		$res = $action();
	return json_encode($res);	
}
?>