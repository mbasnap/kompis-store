<?php
header("Access-Control-Allow-Origin:*");
require_once "start.php";
	$_POST = json_decode(file_get_contents('php://input'), true);
	$request = new Request();
	// $api = new API();

	
	//  $obj = new $class();


	$result = false;
	if($request->get) {
		$class = $request->get."DB";
		$result = $class::get($_POST);
	}
	elseif($request->update) {
		$class = $request->update."DB";
		$result = $class::update($request->id, $_POST);
	}
	

	 echo json_encode($result);
?>