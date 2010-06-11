/* SCRIPT desarrollado para rotar efectos en la pag "contenido general" */

/* SCRIPT que desplaza las solapas --> */
function desplazarMenu1() {
	$solapa_animada = $('.menu_left_1');
	// margin-left: 30px; - (Las posición final de las solapas será 30px)
	$solapa_animada.animate({marginLeft: "30px", opacity: "0.5"}, {queue:false,duration:2000});
	$solapa_animada.animate({opacity: "1.0"}, {queue:false,duration:2000});
}	

function desplazarMenu2() {
	$solapa_animada = $('.menu_left_2');
	$solapa_animada.animate({marginLeft: "30px", opacity: "0.5"}, {queue:false,duration:2000});
	$solapa_animada.animate({opacity: "1.0"}, {queue:false,duration:2000});
}

function desplazarMenu3() {
	$solapa_animada = $('.menu_left_3');
	$solapa_animada.animate({marginLeft: "30px", opacity: "0.5"}, {queue:false,duration:2000});
	$solapa_animada.animate({opacity: "1.0"}, {queue:false,duration:2000});
}

function desplazarMenu4() {
	$solapa_animada = $('.menu_left_4');
	$solapa_animada.animate({marginLeft: "30px", opacity: "0.5"}, {queue:false,duration:2000});
	$solapa_animada.animate({opacity: "1.0"}, {queue:false,duration:2000});
}

function desplazarMenu5() {
	$solapa_animada = $('.menu_left_5');
	$solapa_animada.animate({marginLeft: "30px", opacity: "0.5"}, {queue:false,duration:2000});
	$solapa_animada.animate({opacity: "1.0"}, {queue:false,duration:2000});
}

function desplazarMenu6() {
	$solapa_animada = $('.menu_left_6');
	$solapa_animada.animate({marginLeft: "30px", opacity: "0.5"}, {queue:false,duration:2000});
	$solapa_animada.animate({opacity: "1.0"}, {queue:false,duration:2000});
}
/* <--SCRIPT que desplaza las solapas */

/* animaciÃ³n de Thumbs del Welcome -->*/
function cargarThumbWelcome(){
	$(".welcome_thumb_1, .welcome_thumb_2, .welcome_thumb_3").animate({opacity: "1.0"}, {queue:false,duration:6000});
}
/* <--animaciÃ³n de Thumbs del Welcome */

$(document).ready(function() {
	//Tiempo 0 en que se desplaza cada solapa...
	setTimeout( "desplazarMenu1()", 0000 );
	setTimeout( "desplazarMenu2()", 1000 );
	setTimeout( "desplazarMenu3()", 2000 );
	setTimeout( "desplazarMenu4()", 3000 );
	setTimeout( "desplazarMenu5()", 4000 );
	setTimeout( "desplazarMenu6()", 5000 );
	$(".ajax_content_div").load("content/welcome.php",{limit: 0}, function(){
		cargarThumbWelcome()
	});
	$(".a_empresa").click(function(enlace){
		//elimino el comportamiento por defecto del enlace...
		enlace.preventDefault();
		//animaciÃ³n los vÃ­nculos...
		$(".menu_left_1, .menu_left_2, .menu_left_3, .menu_left_4, .menu_left_5, .menu_left_6").animate({width: "200px"}, {queue:false,duration:1000});
		$(".menu_left_1 h1, .menu_left_2 h1, .menu_left_3 h1, .menu_left_4 h1, .menu_left_5 h1, .menu_left_6 h1").animate({opacity: "1.0"}, {queue:false,duration:1000});
		$(".menu_left_1 h1").animate({opacity: "0.0"}, {queue:false,duration:1000});
		$(".menu_left_1").animate({width: "70px"}, {queue:false,duration:1000});
		//Aquí pongo el código de la llamada a Ajax
		$(".ajax_content_div").load("content/empresa.php");
	});
	$(".a_equipamiento").click(function(enlace){
		enlace.preventDefault();
		$(".menu_left_1, .menu_left_2, .menu_left_3, .menu_left_4, .menu_left_5, .menu_left_6").animate({width: "200px"}, {queue:false,duration:1000});
		$(".menu_left_1 h1, .menu_left_2 h1, .menu_left_3 h1, .menu_left_4 h1, .menu_left_5 h1, .menu_left_6 h1").animate({opacity: "1.0"}, {queue:false,duration:1000});
		$(".menu_left_2 h1").animate({opacity: "0.0"}, {queue:false,duration:1000});
		$(".menu_left_2").animate({width: "70px"}, {queue:false,duration:1000});
		$(".ajax_content_div").load("content/equipamiento.php");
	});
	$(".a_servicios").click(function(enlace){
		enlace.preventDefault();
		$(".menu_left_1, .menu_left_2, .menu_left_3, .menu_left_4, .menu_left_5, .menu_left_6").animate({width: "200px"}, {queue:false,duration:1000});
		$(".menu_left_1 h1, .menu_left_2 h1, .menu_left_3 h1, .menu_left_4 h1, .menu_left_5 h1, .menu_left_6 h1").animate({opacity: "1.0"}, {queue:false,duration:1000});
		$(".menu_left_3 h1").animate({opacity: "0.0"}, {queue:false,duration:1000});
		$(".menu_left_3").animate({width: "70px"}, {queue:false,duration:1000});
		$(".ajax_content_div").load("content/servicios.php");
	});
	$(".a_obras").click(function(enlace){
		enlace.preventDefault();
		$(".menu_left_1, .menu_left_2, .menu_left_3, .menu_left_4, .menu_left_5, .menu_left_6").animate({width: "200px"}, {queue:false,duration:1000});
		$(".menu_left_1 h1, .menu_left_2 h1, .menu_left_3 h1, .menu_left_4 h1, .menu_left_5 h1, .menu_left_6 h1").animate({opacity: "1.0"}, {queue:false,duration:1000});
		$(".menu_left_4 h1").animate({opacity: "0.0"}, {queue:false,duration:1000});
		$(".menu_left_4").animate({width: "70px"}, {queue:false,duration:1000});
		$(".ajax_content_div").load("content/obras.php");
	});
	$(".a_clientes").click(function(enlace){
		enlace.preventDefault();
		$(".menu_left_1, .menu_left_2, .menu_left_3, .menu_left_4, .menu_left_5, .menu_left_6").animate({width: "200px"}, {queue:false,duration:1000});
		$(".menu_left_1 h1, .menu_left_2 h1, .menu_left_3 h1, .menu_left_4 h1, .menu_left_5 h1, .menu_left_6 h1").animate({opacity: "1.0"}, {queue:false,duration:1000});
		$(".menu_left_5 h1").animate({opacity: "0.0"}, {queue:false,duration:1000});
		$(".menu_left_5").animate({width: "70px"}, {queue:false,duration:1000});
		$(".ajax_content_div").load("content/clientes.php");
	});
	$(".a_contacto").click(function(enlace){
		enlace.preventDefault();
		$(".menu_left_1, .menu_left_2, .menu_left_3, .menu_left_4, .menu_left_5, .menu_left_6").animate({width: "200px"}, {queue:false,duration:1000});
		$(".menu_left_1 h1, .menu_left_2 h1, .menu_left_3 h1, .menu_left_4 h1, .menu_left_5 h1, .menu_left_6 h1").animate({opacity: "1.0"}, {queue:false,duration:1000});
		$(".menu_left_6 h1").animate({opacity: "0.0"}, {queue:false,duration:1000});
		$(".menu_left_6").animate({width: "70px"}, {queue:false,duration:1000});
		$(".ajax_content_div").load("content/contacto.php");
	});
});