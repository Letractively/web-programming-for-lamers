<?php

	if ($_SERVER['SERVER_NAME']=='localhost') {
		
		define('ROOT', 'localhost/');	
		define('CONTACT_EMAIL', 'elpota92@hotmail.com');		
	
		include("include/db.class.php");
		$db = new DB("foplep", "localhost", "root", "root");
		global $db;		
	
	} else {
		
		define('ROOT', 'http://www.foplep.com/');	
		define('CONTACT_EMAIL', 'elpota92@hotmail.com');		
	
		//include("include/db.class.php");
		//$db = new DB("ctl", "localhost", "root", "root");
		//global $db;
		
	}
	
	include('include/include.php');
?>