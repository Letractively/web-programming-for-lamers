<?
	
	//Link activo en header
	$active = "productos";

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
        	
            <div id="gradient_light">
        		
                <span class="title">Productos</span>
                
                <ul id="link_list">
                	<li><a href="productosVoz.php" class="active">Voz</a></li>
                    <li><a href="productosImagen.php">Imagen</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Terminales WiFi</h1>
                    
                    <p>El nuevo OfficeServ Wireless opera en una estructura convergente con y sin hilos para mejorar la movilidad y productividad de los empleados. OfficeServ Wireless proporciona una gran cantidad de prestaciones con total integración en las plataformas IP Samsung. Samsung OfficeServ Wireless ofrece una mayor calidad de voz a través de los Puntos de Acceso LAN.</p>

					<p>Los paquetes de voz se transmiten con mayor prioridad que los de datos, por lo que no afecta la saturación que pueda existir en la red, el servicio de voz está siempre garantizado. Los mismos terminales telefónicos y puntos de acceso pueden ser utilizados en todas las centrales IP de Samsung. Si el cliente necesita ampliar su sistema, no tendrá necesidad de sustituirlos.</p>

					<p>Este avanzado sistema de comunicaciones es compatible con toda la Serie 7000 de Samsung. Dependiendo del sistema usado, puede soprotar hasta 240 terminales inalámbricos.</p>
                    
                </div>
                
                <div id="box_right">
                
                	<img src="img/phone_WiFi.png" />
                    
                    <ul>
                    	<li>Punto de acceso de doble banda, IEEE 802.11 WLAN</li>
                        <li>wireless VoIP con protocolo SIP y extensión propietario</li>
                        <li>Voz y datos inalámbricos</li>
                        <li>Prioridad de paquetes de voz sobre datos</li>
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