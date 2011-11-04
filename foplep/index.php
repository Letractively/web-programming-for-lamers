<?php
include("CONFIG.php");


$section = $_GET['s'];
$keywords = "";
$robots = "all";

/*
if($_GET['l'] == 'en' || $_GET['l'] == 'es') {
	$_SESSION['clientLanguaje'] = $_GET['l'];
}


$urlParts = explode('.', $_SERVER['HTTP_HOST']);
if ($urlParts[0]=='es' || $urlParts[0]=='en') {
	$_SESSION['clientLanguaje'] = $urlParts[0];	
}

if ($_SESSION['clientLanguaje'] == '') {
	$_SESSION['clientLanguaje'] = 'en';
}

$languaje = $_SESSION['clientLanguaje'];
*/

if ($section == "registration") {
	/*
	if ($login->isLogged()) {
		header("location:?s=home");		
		die();
	}
	*/
	
} else if ($section == "institucional") {
} else if ($section == "presidencia") {
} else if ($section == "comisiones") {
} else if ($section == "consejo") {
} else if ($section == "contacto") {
	
} else {
	$section = "home";
}


include("section/"."header.php");

include("section/".$section.".php");

include("section/"."footer.php");




/*
if ($section != 'login') {
	$_SESSION['last_uri'] = $_SERVER['REQUEST_URI'];	
}
*/






?> 