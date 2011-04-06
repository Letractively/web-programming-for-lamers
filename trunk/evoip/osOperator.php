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
                	<li><a href="productosVoz.php" class="active">Voz</a></li>                    <li><a href="productosImagen.php">Imagen</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>OS Operator</h1>
                    
                    <p>OfficeServ Operator permite a los usuarios encontrar y redireccionar llamadas a cualquier extensión de forma rápida y eficiente, con un solo click. Una fácil e intuitiva forma de uso con: Estado de la Extensión, Marcado por Nombre, Marcado Rápido e Identificación de Llamada Entrante. Esta aplicación se integra en los sistemas OfficeServ.</p>

					<p>OfficeServ puede estar totalmente integrada con la infraestructura de voz y datos, por lo que maximiza el uso de la información. Con la simplicidad de hacer click sobre un ícono, arrastrándolo y soltándolo, es lo único necesario para manejar la aplicación. Asimismo permite utilizar las teclas de función del computador.</p>
                    
                </div>
                
                <div id="box_right">
                
                	<img src="img/os_operator.png" />
                    
                    <ul>
                    	<li>Configuración simple: Instalación facil y rápida.</li>
                        <li>información de extensiones: Detalles sobre destino y envio.</li>
                        <li>Grupos de usuarios: Agrupación de extensiones.</li>
                        <li>Conferencia / Grupo de conferencia.</li>												<li>Retención de llamadas.</li>												<li>Información de contacto: Nombre / número de llamador</li>
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
