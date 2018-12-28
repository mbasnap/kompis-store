<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_my_conections = "localhost";
$database_my_conections = "myrusakov";
$username_my_conections = "root";
$password_my_conections = "";
$my_conections = mysql_pconnect($hostname_my_conections, $username_my_conections, $password_my_conections) or trigger_error(mysql_error(),E_USER_ERROR); 
?>