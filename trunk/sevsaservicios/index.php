<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>SEVSA SERVICIOS</title>
	<link href="styles.css" rel="stylesheet" type="text/css" />

	<script type="text/javascript" src="js/jquery/jquery-1.3.2.js"></script>

<script type="text/javascript">

/*** 
    Simple jQuery Slideshow Script
    Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
***/

function cambiarImagen1() {

	var img_numero = '1';
	var $img_activa = $('.foto_intro_' + img_numero + ' IMG.imgs_intro_1');

	if ( $img_activa.length == 0 ){ 
		$img_activa = $('.foto_intro_1 IMG:last');
	}
	
	var $next =  $img_activa.next().length ? $img_activa.next() : $('.foto_intro_1 IMG:first');
	
	
	$img_activa.animate({"opacity": 0.0}, 1000);
	//$img_activa.animate({"opacity": 1.0}, 1000);
}

function cambiarImagen2() {
	var img_numero = '2';
	var $img_activa = $('.foto_intro_' + img_numero + ' IMG.imgs_intro_1');
	
	$img_activa.animate({"opacity": 0.0}, 1000);
	//$img_activa.animate({"opacity": 1.0}, 1000);
}

function cambiarImagen3() {
	var img_numero = '3';
	var $img_activa = $('.foto_intro_' + img_numero + ' IMG.imgs_intro_1');
	
	$img_activa.animate({"opacity": 0.0}, 1000);
	//$img_activa.animate({"opacity": 1.0}, 1000);
}

function cambiarImagen4() {
	var img_numero = '4';
	var $img_activa = $('.foto_intro_' + img_numero + ' IMG.imgs_intro_1');
	
	$img_activa.animate({"opacity": 0.0}, 1000);
	//$img_activa.animate({"opacity": 1.0}, 1000);
}

$(function() {
		setTimeout( "cambiarImagen1()", 3000 );
		setTimeout( "cambiarImagen2()", 6000 );
		setTimeout( "cambiarImagen3()", 9000 );
		setTimeout( "cambiarImagen4()", 12000 );
});
</script>

</head>

<body>

<div id="wrap">
	
	<div id="main-container">

		<img id="logo-intro" src="images/logo_sevsa.png" />
	
		<div class="foto_intro_1">
			<img src="images/thumb_1.jpg" class="imgs_intro_1" />
			<img src="images/thumb_1_2.jpg" class="imgs_intro_2" />
		</div>

		<div class="foto_intro_2">
			<img src="images/thumb_2.jpg" class="imgs_intro_1" />
			<img src="images/thumb_2_2.jpg" class="imgs_intro_2" />
		</div>

		<div class="foto_intro_3">
			<img src="images/thumb_3.jpg" class="imgs_intro_1" />
			<img src="images/thumb_3_2.jpg" class="imgs_intro_2" />
		</div>

		<div class="foto_intro_4">
			<img src="images/thumb_4.jpg" class="imgs_intro_1" />
			<img src="images/thumb_4_2.jpg" class="imgs_intro_2" />
		</div>

	</div>
	
</div>

</body>

</html>