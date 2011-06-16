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
                	<li><a href="serviciosDatos.php">Datos</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Soluciones de Call Center</h1>
                    
                    <p>La mayoría de los negocios funcionan actualmente, en cierta medida, como centros de atención al cliente. Desde departamentos más informales, hasta avanzados centros de proceso de ventas o servicios de gestión de cuentas. Samsung ha desarrollado una aplicación global para dar solución a todo el flujo de llamadas de la empresa.</p>

					<p>Los principales componentes son:<br/>• Enrutamiento Inteligente.<br/>• Aplicación Agente.<br/>• Aplicación Supervisor.<br/>• Panel de Información (Wallboard).<br/>• Informes de Gestión.<br/>• Respuesta de Voz Interactiva (IVR).<br/>• Dispositivo de Reproducción de Grabación (RAD).</p>
                </div>
                
                <div id="box_right">
                
                	<img src="img/soluciones-callcenter.jpg" style="margin-left: 16px;"/>
                    
                    <ul>
                    	<li>Comunicación interna con el resto del equipo.</li>
                        <li>Tiempo de gestión entre llamadas y códigos de gestión completada.</li>
                        <li>Interacción con programas externos (ej. Outlook).</li>
                        <li>Visibilidad en tiempo real de la actividad y cola de llamadas.</li>
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