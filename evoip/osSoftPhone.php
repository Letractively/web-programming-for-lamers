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
                	
                    <h1>OS SoftPhone</h1>
                    
					<p>Transforme su computador en un teléfono IP de alto desempeño.</p>
										<p>El OfficeServ SoftPhone de Samsung es una aplicación de telefonía IP que le permite a los usuarios de los sistemas OfficeServ 500, OfficeServ 100 y la familia <a href="#">OfficeServ 7000</a> utilizar sus redes de datos para realizar sus comunicaciones telefónicas. es ideal para trabajadores remotos y para aquellos que requieren una movilidad total.</p>					
					<p>OfficeServ SoftPhone es una aplicación de software basada en Windows que permite a los usuarios acceder a sus sistemas de comunicaciones desde cualquier parte del mundo, simplemente conectándose a internet.</p>
                    
                </div>
                
                <div id="box_right">
                
                	<img src="img/os_softPhone.png" />
                    
                    <ul>
                    	<li>Hacer y recibir llamadas.</li>
                        <li>Correo de voz.</li>
                        <li>Sistema de notificación de mensajes.</li>
                        <li>Conferencia / Grupos de conferencia.</li>												<li>Transferencia / Retención / Desvío.</li>												<li>Importación y exportación de contactos desde Outlook.</li>
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
