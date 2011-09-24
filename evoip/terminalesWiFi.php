<?
	
	//Link activo en header
	$active = "productos";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Evoip - Soluciones Tecnológicas</title>
<link href="css/style.css" rel="stylesheet" type="text/css"><script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-25920886-1']);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</head>

<body>
	<?
		include "header.php"
	?>	
    <div id="bloque_general">
    	
        <div id="bloque_general_cntn">
        	
            <div id="gradient_light">
        		
                <span class="title">Productos</span>
                
                <ul id="link_list">
					<li><a href="productosDatos.php">Datos</a></li>					<li><a href="productosVoz.php" class="active">Voz</a></li>                    <li><a href="productosImagen.php">Imagen</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Terminales WiFi</h1>
                    
                    <p>El nuevo OfficeServ Wireless opera en una estructura convergente con y sin hilos para mejorar la movilidad y productividad de los empleados. OfficeServ Wireless proporciona una gran cantidad de prestaciones con total integración en las plataformas IP Samsung. Samsung OfficeServ Wireless ofrece una mayor calidad de voz a través de los Puntos de Acceso LAN.</p>

					<p>Los paquetes de voz se transmiten con mayor prioridad que los de datos, por lo que no afecta la saturación que pueda existir en la red, el servicio de voz está siempre garantizado. Los mismos terminales telefónicos y puntos de acceso pueden ser utilizados en todas las centrales IP de Samsung. Si el cliente necesita ampliar su sistema, no tendrá necesidad de sustituirlos.</p>

					<p>Este avanzado sistema de comunicaciones es compatible con toda la Serie 7000 de Samsung. Dependiendo del sistema usado, puede soprotar hasta 240 terminales inalámbricos.</p>
                    <p id="pdf"><a href="docs/IP_Terminales_OS_7000.pdf">Descargar documentación de Terminales<img src="img/descargar_pdf.gif"></a></p>
                </div>
                
                <div id="box_right">
                
                	<img src="img/phone_WiFi.png" />
                    
                    <ul>
                    	<li>Punto de acceso de doble banda, IEEE 802.11 WLAN</li>
                        <li>wireless VoIP con protocolo SIP y extensión propietario</li>
                        <li>Voz y datos inalámbricos</li>
                        <li>Prioridad de paquetes de voz sobre datos</li>												<li>Compatibilidad total con centrales IP Samsung</li>												<li>Flexibilidad para administrar voz y datos por separados</li>												<li>Fácil instalación y operatividad</li>
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
