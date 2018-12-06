<?php
    header("Access-Control-Allow-Origin:*");
    include_once('DataBase.php');
   if($_GET['get']) echo action('get_'.$_GET['get']);
   if($_GET['add']) echo action('add_'.$_GET['add']);
   if($_GET['update']) echo action('update_'.$_GET['update']);
   
   function action($action) {
        if(function_exists($action)) json_encode($action());  
   }
?>