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
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Hi Path 2000</h1>
                    
                    <p>Para la movilidad de voz y datos, existen opciones para desplegar tecnología WLAN.</p>

					<p>HiPath 2000 permite realizar una red corporativa como red integrada para voz y datos. Las infraestructuras existentes pueden actualizarse para el soporte de comunicaciones IP en tiempo real, como la voz, con lo que incluso en pequeñas redes LAN, pueden aprovecharse las ventajas de la Telefonía IP</p>
                    
                </div>
                
                <div id="box_right">
                
                	<img src="img/Hypat2000.png" />
                    
                    <ul>
                    	<li>Gateway interfaz hacia red pública con enlaces RDSI.</li>
                        <li>Firewall integrado.</li>
                        <li>Conexiones LAN/WAN para ISP de Internet.</li>
                        <li>Basado en SIP, sistema abierto a servicios de operadores y proveedores.</li>
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