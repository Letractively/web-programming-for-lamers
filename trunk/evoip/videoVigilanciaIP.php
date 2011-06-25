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
                	
                    <h1>Videovigilancia IP</h1>
                    
                    <p>Si hablamos de soluciones de videovigilancia, lógicamente el primer mercado objetivo que nos viene a la cabeza es el de empresas de seguridad. Pero no son las únicas que pueden sacar provecho de sus posibilidades.</p>

					<p>La experiencia de los fabricantes de este sector dictamina que gestionar recursos, realizar inventarios, analizar conductas de compradores, controlar procesos industriales, realizar prácticas de tiro a distancia e incluso para controlar y fotografiar las migraciones de la fauna de un parque natural sin tener que molestarla, son sólo algunos de los ejemplos, y reales, que pueden hacer un uso intensivo de estas herramientas. Es decir, que las posibilidades que ofrecen los productos de vídeo IP son múltiples, de manera que quizá sólo nuestra imaginación sea la limitación a su aplicación a diversos campos.</p>															<p>Como en toda tecnología, hay sectores que parecen más interesados y son más proclives a la adopción e incorporación de dichas herramientas. Por citar sólo algunos, podemos pensar en la educación (para la detección y análisis de conductas delictivas o control de asistencias), el comercio minorista (conteo de personas, control de stocks, análisis de conductas de compradores, control del manejo de las cajas), industria (control de procesos) y transporte (acciones delictivas, prevención de actos terroristas), sin pasar por alto las Administraciones Públicas (protección de edificios públicos y del Patrimonio y por el control de tráfico).</p>															<p>Cualquier empresa que quiera proteger a sus clientes, empleados o bienes frente a posibles amenazas a la seguridad puede apostar por este tipo de soluciones, teniendo en cuenta que, en función del tipo de empresa que sea, las amenazas a las que tendrá que hacer frente serán diferentes. Y es que suele ser raro que una empresa o negocio no esté expuesta a amenazas a la seguridad, aunque éstas sean de diferente naturaleza, por lo que prácticamente cualquiera puede beneficiarse de la implantación y uso de un sistema de videovigilancia.</p>
                    
                </div>
                
                <div id="box_right">
                
                	<img src="img/videovigilancia.jpg" />
                    
                    <ul>
                    	<li>Capacidad multiusuario.</li>
                        <li>Vigilancia en tiempo real accesible por internet.</li>
                        <li>Funciones inteligentes de detección de movimiento.</li>						<li>Sistema digital más rentable que el analógico.</li>												<li>Conexión con teléfonos celulares 3G.</li>												
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
