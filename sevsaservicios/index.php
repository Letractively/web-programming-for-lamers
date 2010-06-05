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

function cambiarImagen() {

	var img_numero = '1';
	
	var $img_activa = $('.foto_intro_' + img_numero + ' IMG.imgs_intro_1');
	$img_activa.animate({"opacity": 0.0}, 1000);
	$img_activa.animate({"opacity": 1.0}, 1000);
}

$(function() {
		setInterval( "cambiarImagen()", 3000 );
});
</script>

</head>

<body>

<div id="wrap">
	
	<div id="main-container">

		<img id="logo-intro" src="images/logo_sevsa.png">
		</img>
	
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