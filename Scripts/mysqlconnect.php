<?php
	$host = 'localhost';
	$user = 'root';
	$pw = '';
	$db = 'Cell4th';
	$error_message = 'Couldn\'t Connect to Database';
	$conn=mysql_connect($host,$user,$pw);
	if($conn&&mysql_select_db($db))
		echo "done";
	else 
		die($error_message);
?>