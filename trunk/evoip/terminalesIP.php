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
					<li><a href="productosDatos.php">Datos</a></li>					<li><a href="productosVoz.php" class="active">Voz</a></li>                    <li><a href="productosImagen.php">Imagen</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Terminales IP</h1>
                    
                    <p>Los teléfonos digitales Samsung de la serie 5000 son el complemento perfecto para lograr un alto desempeño en las comunicaciones de los sistemas <a href="#">OfficeServ OS100</a> / <a href="#">OS500</a> y toda la familia <a href="#">OS 7000</a>.

					<p>Los teléfonos han sido diseñados de manera ergonómica, por lo que le permiten acceder a todas las facilidades del sistema de una forma rápida y eficiente. Todos cuentan con un display LCD de 2 líneas y 24 caracteres para desplegar información asociada a las llamadas y al estado del teléfono</p>
										<p>Así mismo tienen alto parlantes y micrófono para permitirle hablar sin necesidad de utilizar sus manos. Los teléfonos digitales de la serie 5000 cuentan con teclas programables para adecuar el teléfono a sus necesidades, así como teclas interactivas que van cambiando su funcionamiento dependiendo del tipo y estado de la llamada que esté cursando.</p>					
					<p>Dependiendo del modelo elegido podrá contar con un navegador digital para facilitar el uso de los directorios y facilidades de su sistema de comunicaciones.</p>
                    
                </div>
                
                <div id="box_right">
                
                	<img src="img/phone_IP.png" style="margin-left: 0px;"/>
                    
                    <ul>
                    	<li>10 teclas interactivas programables (hasta 8 líneas)</li>
                        <li>6 teclas fijas (Volumen, Rediscado, Conferencia, Transferencia, Retención, Altoparlante)</li>
                        <li>Altoparlante Bidireccional</li>
                        <li>Switch interno</li>												<li>VLAN</li>
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
