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
                	
                    <h1>OS Data View</h1>
                    
                    <p>La solución de Samsung para monitoreo en tiempo real e histórico sobre el desempeño de los sistemas iDCS y OS. La aplicación OfficeServTM DataView provee información y estadísticas que ayudan a la toma de desiciones, para mejorar la eficiencia.</p>

					<p>OfficeServ DataView comprende tres componentes:</p>
										<p>- Data Collector: Recolecta y analiza los eventos del sistema telefónico.<br/>- Data Manager: Calcula y almacena estadísticas de los datos recolectados.<br/>- Scheduler: Provee la administración para la programación de los reportes.</p>					
					<p>La aplicación OfficeServ DataView permite contar con información clara y precisa para incrementar la productividád y reducir los costos.<br/>El almacemamiento de datos se realiza en Microsoft Access o formato SQL Server. Cuenta con alarmas automáticas de saturación y respaldo de datos con capacidad de reportería.</p>
                    					<p>Produce hasta 45 reportes estadísticos (Troncales, Extensiones, Correo de Voz(VM), Operadora automática(AA)); Así como grupos UCD y grupos de operadoras. Cuenta con 14 monitores en línea (Troncales, Extensiones, UCD, VM/AA).</p>					
                </div>
                
                <div id="box_right">
                
                	<img src="img/os_dataView.png" />
                    
                    <ul>
                    	<li>Cuentas de usuarios con niveles múltiples</li>
                        <li>Programación de reportes diarios, semanales y mensuales.</li>
                        <li>Reportes exportables a Microsoft Excel con un Click</li>
                        <li>Configuración Pizarra despliega hasta 22 estadísticas</li>												<li>Información de llamadas abandonadas</li>						<li>Soporte Multilingüe.</li>						
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
