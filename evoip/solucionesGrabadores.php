<?
	
	//Link activo en header
	$active = "servicios";

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
        		
                <span class="title">Servicios</span>
                
                <ul id="link_list">
                	<li><a href="serviciosDatos.php">Datos</a></li>                    <li><a href="serviciosSoluciones.php" class="active">Soluciones</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Grabadores</h1>
                    
                    <p>La grabación de llamadas en empresas y call centers es cada vez más imprescindible para mejorar la atención telefónica y el servicio al cliente, y en la actualidad todo tipo de organización hace uso de esta herramienta por motivos de calidad, auditoría interna, formación de personal, supervisión, etc.<br/>E-Records es una familia de grabadores de llamadas diseñada para responder a las necesidades de un mercado cada vez más exigente en cuanto a la calidad del servicio al cliente y la atención telefónica.</p>
					<p>Los diferentes versiones disponibles permiten grabar llamadas internas y externas, grabar sobre extensiones o líneas, y grabar de forma permanente o bajo demanda.</p>										<p>E-Records CTI: Una solución diseñada para poder grabar todas las llamadas entrantes y salientes en las extensiones propietarias de una centralita. Las grabaciones pueden ser realizadas bajo la demanda de un supervisor o el propio usuario, de forma permanente o de forma selectiva.</p>										<p>E-Records RDSI: Una solución "Plug & Play" diseñada para grabar todas las llamadas realizadas mediante enlaces RDSI (Accesos Básicos).</p>										<p>E-Records Analógico: Una solución "Plug & Play" diseñada para grabar todas las llamadas realizadas mediante enlaces o extensiones analógicos.</p>										<p>E-Records E1: Una solución "Plug & Play" diseñada para grabar todas las llamadas realizadas mediante un enlace E1 (Primario).</p>										<p>Todas las versiones de E-Records utilizan el mismo software para la búsqueda de los ficheros de audio y la gestión de copias de seguridad etc. Los ficheros de audio se almacenan en una base de datos SQL server en formato wav o mp3, y ambos formatos pueden ser encriptados. </p>
                </div>
                
                <div id="box_right">
                
                	<img src="img/soluciones-grabadores.jpg" style="margin-left: 16px;"/>
                    
                    <ul>
                    	<li>Grabación según necesidades específicas.</li>
                        <li>Sistema escalable.</li>
                        <li>Llamadas internas y externas.</li>						
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
