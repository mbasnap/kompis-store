<?php
header("Access-Control-Allow-Origin:*");
include_once('actions.php');
if(function_exists( $_GET['action'] )) echo $_GET['action']();
?>