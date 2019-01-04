<?php
header("Access-Control-Allow-Origin:*");
require_once "start.php";
	$_POST = json_decode(file_get_contents('php://input'), true);
	$request = new Request();
	$result = false;
	if($request->get) {
		$class = $request->get."DB";
		$result = $class::buildMultiple($class::get($_POST));
	}
	elseif($request->update) {
		$class = $request->update."DB";
		$obj = new $class($_POST);
		if($obj->save()) $result = $obj->id;
	}
	

	 echo json_encode($result);
?>