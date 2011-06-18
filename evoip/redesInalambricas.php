<?
	
	//Link activo en header
	$active = "servicios";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?
		include "header.php"
	?>	
    <div id="bloque_general">
    	
        <div id="bloque_general_cntn">
        	
            <div id="gradient_light">        		                <span class="title">Servicios</span>                                <ul id="link_list">                	<li><a href="serviciosDatos.php" class="active">Datos</a></li>                    <li><a href="serviciosSoluciones.php">Soluciones</a></li>                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Redes Inalámbricas</h1>
                    
                    <p>La red inalámbrica que E-VoIP ofrece a sus clientes permite a cualquier empresa la transmisión de datos de manera flexible y segura sin la necesidad de ceñirse al cableado instalado. Nuestra red inalámbrica envía todos los datos necesarios a través de ondas de radio cifradas, lo que elimina la posibilidad de interceptación e interferencias en la señal. Gracias a esta tecnología se puede llegar hasta donde no el cable no llega, o este es demasiado costoso o complicado de instalar.</p>

					<p>También proporciona una plataforma para la interconexión en red local de equipos en constante movimiento, portátiles o en instalaciones meramente temporales (para salas de exposiciones, congresos, naves, etc.).E-VoIP ofrece a sus clientes dos modalidades de red inalámbrica. La WaveLAN (local) y el enlace punto a punto. WaveLAN Red local inalámbrica La red inalámbrica local es un perfecto sustitutivo del cableado tradicional para montar una red local.</p>															<p>En sólo unos minutos, la red local inalámbrica estará lista para funcionar, transmitiendo fiablemente la información gracias a las antenas emisoras / receptoras y tarjetas decodificadoras para cada equipo. Esto permite la perfecta movilidad de los equipos en red dentro del radio de cobertura de la red inalámbrica, radio que se extiende en las tres dimensiones y que es fácilmente ampliable con las antenas adecuadas.</p>
                    <p>Las ondas de la red inalámbrica no se bloquean ni se distorsionan por objetos sólidos, por lo que pasan fácilmente a través de puertas, tabiques, suelos y techos, y su señal cifrada y de frecuencia modificable por el usuario permite la total ausencia de interferencias, con una velocidad de transmisión de 10 megabytes por segundo. Esto hace a nuestra red inalámbrica la solución perfecta para ampliación de redes locales cableadas. Despliegue de redes locales para picos de trabajo o instalaciones de obra.</p>
                </div>
                
                <div id="box_right">
                
                	<img src="img/redesinalambricas.png" style="margin-left: 16px; margin-top: 0px;"/>
                    
                    <ul>
                    	<li>Cobertura papra puntos de dificil alcance.</li>
                        <li>Acceso a la red local para PCs portátiles.</li>
                        <li>WaveAN Local y/o enlace punto-a-punto.</li>
                        <li>Configuración variable en tiempo nulo.</li>						
                    </ul>
                
                </div>
            
            </div>
                        
    	</div>
    
    </div>
    
<?

	include "footer.php";

?>
</body>
</html>
