<?
	
	//Link activo en header
	$active = "productos";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Evoip - Soluciones Tecnológicas</title>
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
                	
                    <h1>Video-Teléfono</h1>
                    
                    <p>OfficeServ ofrece la cazpacidad de transmitir Voz, Datos, Internet, Voz sobre IP, y ahora también Video</p>										<p>Por ser una plataforma nativa IP, la familia 7000 tiene la posibilidad de transmitir una gran variedad de señales que permiten mejorar la capacidad de comunicaciones de su empresa y con el mínimo costo asociado que representa el uso de este tipo de tecnología.</p>
                    
                </div>
                
                <div id="box_right">
                
                	<img src="img/phone_video.png" />
                    
                    <ul>
                    	<li>Teclas Programables</li>                        <li>Teclas Interactivas</li>                        <li>Altoparlante Bidireccional</li>                        <li>Panel Selector de Extensiones</li>
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
