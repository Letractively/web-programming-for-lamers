<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Haustech casas inteligentes</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
	// array inicial
	var images = new Array();
		images[0] = 'img/home-home.jpg';
		images[1] = 'img/home-iluminacion.jpg';
		images[2] = 'img/home-seguridad.jpg';
		images[3] = 'img/home-climatizacion.jpg';
		images[4] = 'img/home-audiovideo.jpg';
	// numero de imagenes
	var max = $(images).length;
	// se larga automaticamente el preload si hay al menos una imagen en el array
	if(max>0)
	{
		//se larga la primera imagen para cargar
		LoadImage(0,max);
	}
	

	
	//se activa funcion showimage con el index correspondiente y se le da clase al boton activado
		$("#slideshow_menu a").hover(
			function(){
				var index_boton = $(this).parent().attr('index');
				var index_imagen_activa = $('ul#slideshow li.active').attr('index');
				
				if ( index_imagen_activa==0 ) { 
					$('ul#slideshow li.active').hide();
				}
				
				if ( index_boton!=index_imagen_activa) { //solo hace showimage si la ultima imagen activa es distinta del boton relacionado
						ShowImage(index_boton,max);
				}
				
			},function(){
				ShowImage(0,max);
			}
		);

	// funcion LoadImage
	// parametros: (int) indice de la imagen en el array, (int) maximo de imagenes en array
	function LoadImage(index,max)
		{
			// si el index actual es menor que el maximo (max-1)
			if(index<max)
				{
					// creando la  LI, poniendo la clase loading
					var list = $('<li id="slideshow_list_'+index+'" index="'+index+'"></li>').attr('class','loading');
					// append a la UL
					$('#slideshow').append(list);
					// current LI
					var curr = $("ul#slideshow li#slideshow_list_"+index);
					// nuevo objeto image
			        var img = new Image();
					// image onload
			        $(img).load(function () {
			            $(curr).css('display','none'); // since .hide() failed in safari
			            $(curr).removeClass('loading').append(this);
						LoadImage(index+1,max);
						
			        }).error(function () {
						// si hay error se hace un remove de current
						$(curr).remove();
						// y se larga la otra imagen
						LoadImage(index+1,max);
			        }).attr('src', images[index]); //SE PONE EL SRC
				}else{	//cuando se llega al max se larga showimage
					ShowImage(0,max);
				}
		}
		
	// funcion ShowImage
	// parametros: (int) indice de la imagen del array a mostrar, (int) maximo de imagenes en array
	function ShowImage(index,max)
		{
			// si el index actual es menor que el maximo (max-1)
			if(index<max) {
				var active = $("ul#slideshow li#slideshow_list_"+index); // lista activa
				var todas = $("ul#slideshow li"); //todas las listas

					//se borra cualquier clase anterior
					$(todas).removeClass('active');
					$(todas).removeClass('last-active');
					// se cargan las clases de las listas respectivamente del index 
					$(todas).css('display','none');
					$(active).addClass('active');
					if ( index==0 ) { var vel = 600; }else{ var vel = 1000; }
					$(active).fadeIn(vel,function(){
											   
					});								
					
				}
		}

});

</script>
</head>
<body>
<?php	
	$current = 1;
	include "header.php";
?>
        
        <div id="principal">
        	<div id="contenido">
            	<div class="bloque_1">
                	<div id="img_container">
                    	<ul id="slideshow">
                        </ul>
                    	<div id="slideshow_menu">
                    		<ul>
                            	<li index="1"><a href="iluminacion.php">Iluminaci&oacute;n</a></li>
                            	<li index="2"><a href="seguridad.php">Seguridad</a></li>
                           	  	<li index="3"><a href="climatizacion.php">Climatizaci&oacute;n</a></li>
                            	<li index="4"><a href="audio_video.php">Audio y video</a></li>
                            </ul>
                    	</div>
                    </div>
                </div>
                <div class="bloque_2">
                	<div class="box1">
                    	<h1>Control desde su I-phone y su I-Pad</h1>
                        <p>El sistema de automatizaci&oacute;n del hogar Control4 le permite administrar f&aacute;cilmente su sistema de seguridad, luces, entretenimiento en el hogar y termostato desde su I-Phone y desde… su I-Pad! </p>
                        <p>Con la simple descarga de un aplicativo, su dispositivo m&oacute;vil inal&aacute;mbrico le permite comandar los sistemas electr&oacute;nicos de su hogar y mantenerse informado de lo que sucede desde donde se encuentre.</p>
                        <p>Cont&aacute;ctenos para adquirir una licencia de Control4 Mobile Navigator para permitir el acceso seguro a su sistema de Control4 por la red Wi-Fi dom&eacute;stica y tener acceso a las c&aacute;maras de v&iacute;deo IP y sistemas de seguridad de Internet, proporcionando mayor seguridad dom&eacute;stica; o para aprovechar las ventajas de ahorro de energ&iacute;a con termostatos programables y otros ajustes ecol&oacute;gicos.</p>
                        <a href="#"><img src="img/img_box1.jpg" alt="No mas interruptores, ver video" /></a>
                    </div>
                    <div class="box2">
                    	<h1>Innovaci&oacute;n en tecnolog&iacute;a para el hogar</h1>
                        <p>El mercado de automatizaci&oacute;n ha crecido hasta incorporarse como rubro b&aacute;sico en la planificaci&oacute;n del hogar. La tecnolog&iacute;a actual le asegura un espacio m&aacute;s confortable y seguro.</p>
						<p>Haustech despliega todo el potencial de la dom&oacute;tica a trav&eacute;s de los productos de Control4 - cuya soluci&oacute;n inal&aacute;mbrica es l&iacute;der en el mercado - poniendo a su alcance los &uacute;ltimos avances en automatizaci&oacute;n de hogares.</p>
						<p>Controle y programe la iluminaci&oacute;n, cortinados, audio/video y climatizaci&oacute;n de su hogar mediante un sistema f&aacute;cil de instalar y de sencilla operaci&oacute;n. Haustech le ofrece el m&aacute;ximo est&aacute;ndar mundial en tecnolog&iacute;a para el hogar, tanto en casas en construcci&oacute;n como en hogares establecidos, sin necesidad de remodelaciones.</p>
                    </div>
                </div>
            </div>
        </div>
        
<?php
	include "footer.php";
?>
   
</body>
</html>
