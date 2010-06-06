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
		setTimeout( "cambiarImagen1()", 3000 );
		setTimeout( "cambiarImagen2()", 6000 );
		setTimeout( "cambiarImagen3()", 9000 );
		setTimeout( "cambiarImagen4()", 12000 );
});