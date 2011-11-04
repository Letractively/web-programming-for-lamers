<?php 

	session_start();
	
	ini_set("memory_limit","20M");

	include("defs.php");
	include("arrays.php");	

	include("dbelement.class.php");	
	include("user.class.php");
	include("work.class.php");	
	include("login.class.php");	
	include("box.class.php");
	include("page.class.php");	
	include("image.class.php");	
	include("mail.php");		

	
    $whitebox = new contentBox();
		$whitebox->setBackground("#fff");
        $whitebox->setBaseSrc("img/box/");
        $whitebox->setCornerSrc("c1.png", "c2.png", "c3.png", "c4.png");
        $whitebox->setSideSrc("c5.png", "c5.png", "c5.png", "c5.png");
        $whitebox->setBorderSize(5, 5, 5, 5);
		$whitebox->setCss('filter:alpha(opacity=85); -moz-opacity:0.85; -khtml-opacity: 0.85; opacity: 0.85;');
		
	
	$register = new user();
	
	$login = new login();
		
?>