<?php
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
	
} else if ($section == "catalogo_natacion" || $section == "catalogo_natacion/") {
	$section = "catalogo_natacion";

} else if ($section == "catalogo_misc" || $section == "catalogo_misc/") {
	$section = "catalogo_misc";
	
} else {
	$section = "home";
}




include("section/header.php");

include("section/".$section.".php");

include("section/footer.php");



?> 