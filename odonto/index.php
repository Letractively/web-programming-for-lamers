<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
require('./wordpress/wp-blog-header.php');
include("CONFIG.php");


$section = $_GET['s'];
$id = $_GET['id'];
$included = true;



if ($section == "contacto" || $section == "contacto/") {
	$section = "contacto";	

} else if ($section == "home" || $section == "home/") {
	$section = "home";
	
} else if ($section == "servicios" || $section == "servicios/") {
	$section = "servicios";
	
	
} else if ($section == "servicios/ortodoncia" || $section == "servicios/ortodoncia/") {
	$section = "servicios/ortodoncia";	
	
	
	
} else if ($section == "nosotros" || $section == "nosotros/") {
	$section = "nosotros";	
	
} else if ($section == "contacto" || $section == "contacto/") {
	$section = "contacto";	
	
} else if ($section == "avances" || $section == "avances/") {
	$section = "avances";
	
} else {
	$section = "home";
}




include("section/header.php");

include("section/".$section.".php");

include("section/footer.php");
