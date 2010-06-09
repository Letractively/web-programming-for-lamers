/*SCRIPT desarrollado para rotar imagenes de la intro*/

function cambiarImagen1() {
	var img_numero = '1';
	var $img_activa = $('.foto_intro_' + img_numero + ' IMG.imgs_intro_1');

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
		//Tiempo en que cambia cada imágen de la intro
		//alert("1");
		setTimeout( "cambiarImagen1()", 1000 );
		setTimeout( "cambiarImagen2()", 2000 );
		setTimeout( "cambiarImagen3()", 3000 );
		setTimeout( "cambiarImagen4()", 4000 );
});