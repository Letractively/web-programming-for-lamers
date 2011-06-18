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
                	<li><a href="serviciosDatos.php" class="active">Datos</a></li>                    <li><a href="serviciosSoluciones.php">Soluciones</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Redes Alámbricas</h1>
                    
                    <p>Cableado Estructurado: Proporcionamos un servicio completo cumpliendo con todas las etapas necesarias para el desarrollo de un sistema de cableado estructurado; Redes de Voz, Datos (Cat. 3, 5 y 6), Aplicaciones de Telefonía, Video, CTV y Energía. Realizamos diseños de redes de principio a fin, lo que nos permite tener una visión completa y no aislada sobre sus necesidades.</p>

					<p>Servicios de Cableado Estructurado: • Reinstalaciones de cableado.• Cambios, movimientos y ampliaciones. • Actualización de sistemas de cableado obsoletos a tecnologías recientes.• Integración de equipo activo para redes (switch, ruteadores, bridges, gateways, multiplexores, etc.).• Análisis de desempeño de redes y documentación.• Scaneo y certificación de cableado.• Prueba y monitoreo de los componentes de su red.• Programa de servicios en sitio (Outsourcing).• BackBone de Cobre.</p>
                    					<p>Fibra Óptica: La fibra óptica es un medio excelente para transmitir información sobre todo en la implementación de BackBone de Voz y Datos debido a su gran ancho de banda, baja atenuación de la señal, integridad e inmunidad a interferencias electromagnéticas y larga duración. Es por ello que hemos invertido en la formación de nuesto personal en este campo, así como en equipamiento para realizar y certificar instalaciones bajo los estándares actuales del mercado, tanto las normas EIA/TIA e ISO.</p>															<p>Instalamos y conectorizamos todo tipo de fibras ópticas; multimodo, monomodo e híbrida. Sistemas de Cómputos; diseño, instalación, capacitación y mantenimiento a Sistemas de Cómputo y Periféricos, así como los servicios de venta de Hardware y Software en general, de acuerdo a la solución que más le convenga</p>					
                </div>
                
                <div id="box_right">
                
                	<img src="img/redesalambricas.png" style="margin-left: 16px;"/>
                    
                    <ul>
                    	<li>Cableado Estructurado.</li>
                        <li>Fibra Óptica.</li>
                        <li>Integración de equipo activo para redes.</li>
                        <li>Conferencia / Grupo de conferencia.</li>												<li>Intalación/Mantenimiento de sistema de cómputos.</li>						
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
