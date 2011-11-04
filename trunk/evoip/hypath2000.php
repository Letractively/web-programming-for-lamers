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
                	
                    <h1>Hi Path 2000</h1>
                    
                    <p>Para la movilidad de voz y datos, existen opciones para desplegar tecnología WLAN.</p>

					<p>HiPath 2000 permite realizar una red corporativa como red integrada para voz y datos. Las infraestructuras existentes pueden actualizarse para el soporte de comunicaciones IP en tiempo real, como la voz, con lo que incluso en pequeñas redes LAN, pueden aprovecharse las ventajas de la Telefonía IP</p>															<p>El nuevo sistema permite flexibilidad y movilidad en las comunicaciones de oficina. Por medio de software integrado para cifrado, puede disponerse de una Red Privada Virtual (VPN), con lo que los teletrabajadores y usuarios en "oficinas satélite" pueden conectarse de forma segura a la red de la compañía. Así el personal que trabaja en modo remoto a travéz de DSL, puede también utilizar el teléfono como si se encontrara en la oficina.</p>															<p>En este sentido HiPath 2000 soporta los puntosde acceso de Siemens, por medio de los cuales se puede tener transmisión de voz sobre la WLAN. también integra función de Voice-Mail, con la que se puede disponer de hasta 24 buzones para mensajes. Para la comunicación telefónica, Siemens dispone de una variedad de teléfonos IP, teléfonos software y terminales WLAN.</p>
                    <p id="pdf"><a href="docs/Hipath_3000.pdf">Descargar documentación de este producto<img src="img/descargar_pdf.gif"></a></p>                   
                </div>
                
                <div id="box_right">
                
                	<img src="img/Hypat2000.png" />
                    
                    <ul>
                    	<li>Gateway interfaz hacia red pública con enlaces RDSI.</li>
                        <li>Firewall integrado.</li>
                        <li>Conexiones LAN/WAN para ISP de Internet.</li>
                        <li>Basado en SIP, sistema abierto a servicios de operadores y proveedores.</li>												<li>Switch LAN para redes de PC.</li>
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
