<?php

	if ($_SERVER['SERVER_NAME']=='localhost') {
		
		
		define('ROOT', 'http://localhost/odonto/');	
		define('CONTACT_EMAIL', 'pota@localhost');					

		
		//include("include/db.class.php");
		//$db = new DB("ctl", "localhost", "root", "root");
		//global $db;

	} elseif ($_SERVER['SERVER_NAME']=='localhost') {
		
		define('ROOT', 'http://127.0.0.1/odonto/');	
		define('CONTACT_EMAIL', 'pota@localhost');					

	} else {
		
		define('ROOT', 'http://www.sumacero.com/odonto/');	
		define('CONTACT_EMAIL', 'elpota92@hotmail.com');		
		
		//include("include/db.class.php");
		//$db = new DB("ctl", "localhost", "root", "root");
		//global $db;
	
	}
	
//	include('include/include.php');
?>