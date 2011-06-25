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
                
                <ul id="link_list">					<li><a href="productosDatos.php">Datos</a></li>								
                	<li><a href="productosVoz.php">Voz</a></li>                    <li><a href="productosImagen.php" class="active">Imagen</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Videoconferencia</h1>
                    
                    <p>La serie Polycom® HDX 7000™ provee video conferencia HD flexible, costeable, para comunicación de alta calidad a lo largo de los ambientes de trabajo principales. Al expandir la utilidad de las comunicaciones visuales rápida y fácilmente, la serie HDX 7000 es ideal para aplicaciones médicas, empresariales y colaboración sobre demanda.</p>

					<p>Interfaces intuitivas permiten a los usuarios adoptar y usar rápidamente los sistemas de la serie Polycom HDX 7000, mientras una variedad de opciones en paquete permiten que los sistemas de la serie Polycom HDX 7000 se monten en la pared, se coloquen en un soporte o se transporten mediante ruedas a cualquier ubicación para dar lugar a video conferencias en cualquier sala. Con sus capacidades de multipunto anidado y para compartir contenido, los sistemas de la serie Polycom HDX 7000 habilitan a los individuos para colaborar en contenidos tales como diagramas, planes arquitectónicos, presentaciones multimedia y más, en detalle HD.</p>															<p>Aprovechando la reconocida calidad de Polycom y diseñado bajo estándares de alta definición, los sistemas de la serie Polycom HDX 7000 utilizan características como por ejemplo la tecnología Polycom HD Voice™ para entregar un patentado audio cristalino, y el audio Polycom StereoSurround™ para separar los sonidos de la sala en canales de izquierda y derecha, que ofrecen una sensación física de espacialidad a los participantes en el sitio remoto.</p>					
                    <p>Para organizaciones que buscan incrementar significativamente la productividad y la calidad de la comunicación, el sistema de video conferencia de alta resolución Polycom QDX 6000 combina un desempeño sin precedente en anchos de banda bajos con una configuración sencilla y facilidad de uso. Polycom QDX 6000 acelera su ROI al reducir los viajes entre sitios geográficamente dispersos, mejora la comunicación de grupos e individuos y permite compartir información más rápidamente.</p>					
                </div>
                
                <div id="box_right">
                
                	<img src="img/videoconferencia.png" />
                    
                    <ul>
                    	<li>Flexibilidad y accesibilidad.</li>
                        <li>Video HD.</li>
                        <li>Audio con calidad de CD.</li>						<li>Interfaz sencilla (”point and click”).</li>												<li>Facilidad de instalación.</li>						
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
