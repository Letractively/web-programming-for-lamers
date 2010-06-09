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

$(document).ready(function() {
		//Tiempo 0 en que se desplaza cada solapa...
		setTimeout( "desplazarMenu1()", 0000 );
		setTimeout( "desplazarMenu2()", 1000 );
		setTimeout( "desplazarMenu3()", 2000 );
		setTimeout( "desplazarMenu4()", 3000 );
		setTimeout( "desplazarMenu5()", 4000 );
		setTimeout( "desplazarMenu6()", 5000 );
});