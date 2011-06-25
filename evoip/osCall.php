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
                	
                    <h1>OS Call</h1>
                    
                    <p>OfficeServ Link es la base de la plataforma de integración de computación y telefonía (CTI) de los servidores de comunicaciones Samsung, permitiéndole expandir sus horizontes en cuanto a las posibilidades que ofrece para el manejo y administración de sus llamadas telefónicas</p>

					<p>OfficeServ link es una aplicación de sofware que enlaza los sistemas iDCS y OS con un servidor basado en Windows. Incluido con el OfficeServ Link se encuentra el OfficeServ EasySet. Este es una aplicación basada en web que le permite empoderar a cada uno de los usuarios finales para que administren la configuración de su propio teléfono en facilidades como: Desvío de llamadas, Teclas de automarcaje, Mensajes, etc. Realizando todo esto de una manera fácil, rápida e intuitiva.</p>
										<p>Las aplicaciones avanzadas de Samsung le permitirán incrementar la eficiencia de su empresa al incrementar las capacidades de su teléfono y su utilización por parte de su personal</p>					

                </div>
                
                <div id="box_right">
                
                	<img src="img/os_call.png" />
                    
                    <ul>
                    	<li>Integración Screen-pop con Microsoft Outlook</li>
                        <li>Registro de llamadas entrantes y salientes</li>
                        <li>Despliegue del estado de extensiones (DSS/BLF)</li>
                        <li>Caller ID y detalles del llamador.</li>												<li>Directorios telefónicos personales y en red.</li>												<li>Servicios programados.</li>												<li>Registro de llamadas.</li>
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
