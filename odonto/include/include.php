<?php 

	session_start();
	
	ini_set("memory_limit","20M");

	include("defs.php");
	include("arrays.php");	

	include("dbelement.class.php");	
	include("user.class.php");
	include("work.class.php");	
	include("login.class.php");	
	include("page.class.php");	
	include("image.class.php");	
	include("mail.php");
	

		
	
	$register = new user();
	
	$login = new login();
		
?>