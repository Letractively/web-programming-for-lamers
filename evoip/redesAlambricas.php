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
        		
                <span class="title">Servicios</span>
                
                <ul id="link_list">
					<li><a href="productosDatos.php" class="active">Datos</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Redes Alámbricas</h1>
                    
                    <p>Cableado Estructurado: Proporcionamos un servicio completo cumpliendo con todas las etapas necesarias para el desarrollo de un sistema de cableado estructurado; Redes de Voz, Datos (Cat. 3, 5 y 6), Aplicaciones de Telefonía, Video, CTV y Energía. Realizamos diseños de redes de principio a fin, lo que nos permite tener una visión completa y no aislada sobre sus necesidades.</p>

					<p>Servicios de Cableado Estructurado: • Reinstalaciones de cableado.• Cambios, movimientos y ampliaciones. • Actualización de sistemas de cableado obsoletos a tecnologías recientes.• Integración de equipo activo para redes (switch, ruteadores, bridges, gateways, multiplexores, etc.).• Análisis de desempeño de redes y documentación.• Scaneo y certificación de cableado.• Prueba y monitoreo de los componentes de su red.• Programa de servicios en sitio (Outsourcing).• BackBone de Cobre.</p>
                    
                </div>
                
                <div id="box_right">
                
                	<img src="img/redesalambricas.png" style="margin-left: 16px;"/>
                    
                    <ul>
                    	<li>Cableado Estructurado.</li>
                        <li>Fibra Óptica.</li>
                        <li>Integración de equipo activo para redes.</li>
                        <li>Conferencia / Grupo de conferencia.</li>
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