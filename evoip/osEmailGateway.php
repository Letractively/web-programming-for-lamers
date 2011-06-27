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
                	
                    <h1>OS Email Gateway</h1>
                    
                    <p>UMS plataforma permita la integración de la mensajería de la empresa a travez de un sistema único.</p>

					<p>Integrado en los sistemas de correo de voz, permite soluciones avanzadas para la gestión integrada de todos los mensajes corporativos. El usuario dispone de una plataforma completa para la gestión de correo de voz, fax y e-mail que convergen en un punto de acceso único y personalizable según las necesidades.</p>
										<p>En detalle, el usuario puede recibir directamente en su PC vía correo electrónico (directamente desde el cliente de correo), e-mail con mensaje de voz (que se adjunta en WAW) o mensaje de fax (Archivo en TIF) a la izquierda en buzón de voz. El usuario de correo de vóz es capaz de almacenar y gestionar sus comunicaciones de una manera muy simple y más conveniente.</p>					

                </div>
                
                <div id="box_right">
                
                	<img src="img/os_emailGateway.png" />
                    
                    <ul>
                    	<li>Integración completa de la mensajería ,empresarial.</li>
                        <li>Gestión de correo de voz, email y fax.</li>
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
