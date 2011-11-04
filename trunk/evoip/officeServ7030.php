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
                	
                    <h1>OfficeServ 7030</h1>
                    
                    <p>La agilidad y el tiempo de respuesta de los pequeños negocios son una gran ventaja competitiva. Pero la tecnología y el apoyo profesional para colaborar de forma eficiente, tienen muchas veces precios que exceden lo razonable o no son viables para las compañias más pequeñas. A partir de ahora, incluso las empresas de menor tamaño podrán permitirse los mismos sofisticados sistemas de comunicación, que normalmente sólo podían disfrutar las grandes compañias.</p>

					<p>Alta tecnología desarrollada para proporcionar a las pequeñas empresas productividad y flexibilidad con un presupuesto limitado. Como parte de la familia de soluciones IP de última generación OfficeServ 7000, la OfficeServ 7030 Servidor de Comunicaciones Convergentes tiene exactamente el mismo nivel, mismas funcionalidades y utiliza los mismos terminales, pero está especialmente diseñada para pequeñas empresas que necesitan un sistema sofisticado de comunicaciones, que sea simple de operar y fácil de implementar.</p>
                    					<p>El diseño 'todo en uno' de la OffideServ 7030 ha sido desarrollado para proporcionar una plataforma IP, facil de usar, asequible y segura que unifica voz, datos y comunicaciones inalámbricas. con avanzadas funciones como Auto-Atención o Correo de Voz, también permite el trabajo en equipo y proporciona un considerable ahorro  en costes.</p>										<p id="pdf"><a href="docs/OfficeServ7030_Castellano_2.pdf">Descargar documentación de este producto<img src="img/descargar_pdf.gif"></a></p>										<p id="pdf"><a href="docs/Serie7000_castellano.pdf">Descargar documentación de productos OfficeServ<img src="img/descargar_pdf.gif"></a></p>
                </div>
                
                <div id="box_right">
                
                	<img src="img/OfficeServ7030.png" />
                    
                    <ul>
                    	<li>Correo de Voz con inptegración de e-mail.</li>
                        <li>Distribución uniforme de llamadas (UCD) y LLamadas Secuenciadas.</li>
                        <li>Conectividad IP/SIP.</li>
                        <li>Voz y datos WiFi.</li>												<li>Integración de Telefonía (CTI).</li>
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
