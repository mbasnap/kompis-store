<?php
header("Access-Control-Allow-Origin:*");
include_once('DataBase.php');
$_POST = json_decode(file_get_contents('php://input'), true);
$action = $_POST['action'];
if(function_exists($action)) echo json_encode($action($_POST['params']));

?>