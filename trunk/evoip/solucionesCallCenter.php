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
        		
                <span class="title">Servicios</span>
                
                <ul id="link_list">
                	<li><a href="serviciosDatos.php">Datos</a></li>                    <li><a href="serviciosSoluciones.php" class="active">Soluciones</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Soluciones de Call Center</h1>
                    
                    <p>La mayoría de los negocios funcionan actualmente, en cierta medida, como centros de atención al cliente. Desde departamentos más informales, hasta avanzados centros de proceso de ventas o servicios de gestión de cuentas. Samsung ha desarrollado una aplicación global para dar solución a todo el flujo de llamadas de la empresa.   Una Elección FlexibleLa solución Samsung OfficeServ ACD, es una aplicación basada en servidor que se integra en la gama de servidores de comunicación Samsung OfficeServ 7000. Su estructura escalable y modular, significa que usted elige los componentes necesarios según sus necesidades operativas y su disponibilidad presupuestaria. De esta forma, podrá implementar su sistema con nuevos módulos a medida de sus necesidades futuras.</p>

					<p>Los principales componentes son:• Enrutamiento Inteligente. • Aplicación Agente. • Aplicación Supervisor. • Panel de Información (Wallboard). • Informes de Gestión. • Respuesta de Voz Interactiva (IVR). • Dispositivo de Reproducción de Grabación (RAD).En muchos casos, esto genera un pérdida de tiempo y un gasto de implementación constante de sistemas, que no acaban de proporcionar todos los recursos y procesos necesarios para ofrecer un servicio óptimo en la gestión de las llamadas. De todas formas, cualquiera que sea la naturaleza del servicio, la gestión eficaz de las llamadas entrantes es un requisito previo esencial para cualquier negocio. Si los clientes son innecesariamente reenviados de un lugar a otro de la compañía, o no son atendidos de la forma en que ellos esperan, lo más probable es que la reputación de la compañía se resienta y los clientes acaben en la competencia. Una gestión efectiva, no sólo evitará las quejas de los clientes, sino que además se convertirá en una importante herramienta de ventasSimplicidad de  GestiónLos agentes de Call Center, cuentan con una barra de tareas en su ordenador en la que, con un simple click, pueden desarrollar las tareas esenciales de telefonía y acceder a la información necesaria. La funciones principales son: • Visibilidad en tiempo real de la actividad y cola de llamadas. • Tiempo de gestión entre llamadas y códigos de gestión completada. • Interacción con otros programas externos como el Outlook. • Comunicación interna con el resto del equipo.</p>					
                </div>
                
                <div id="box_right">
                
                	<img src="img/solucionescallcenter.png" style="margin-left: 16px;"/>
                    
                    <ul>
                    	<li>Enrutamiento inteligente.</li>
                        <li>Aplicación agente.</li>
                        <li>Aplicación supervisor.</li>
                        <li>Panel de información (Wallboard).</li>												<li>Informes de gestión.</li>												<li>Respuesta de voz interactiva (IVR).</li>												<li>Dispositivo de reproducción de grabación (RAD).</li>						
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
