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
                	
                    <h1>Soluciones Hoteleras</h1>
                    
                    <p>Pensando en las exigencias que la administración hotelera requiere, le ofrecemos una gama de soluciones integrales que incluyen no solo el planning de habitaciones y el manejo de reservas, sino la administración total de su hotel, comprendiendo sectores como restaurant y el monitoreo de servicios de complejo control como la tarifación telefónica.</p>

					<p>- Administración total de habitaciones y carga de gastos a las mismas.<br />- Posibilidad de reasignar cuartos (mudar huéspedes a otras habitaciones y traspasar allí sus gastos).<br />- Estadía por día y hora (alojamiento).<br />- Cambio de precios por temporada / turno horario (matutino, vespertino, noche completa, etc).<br />- Visualización gráfica del estado de ocupación del hotel al momento actual, y proyecciones a futuro.<br />- Categorice habitaciones, indicando tarifas diferenciales.<br />- El software de gestión para hoteles le brinda el monitoreo completo del estado de mantenimiento de la habitación.<br />- controle mucamas y servicio doméstico responsable, mudas de ropa de cay baño, insumos (bebidas, jabones, etc) asignados, si los mismos son facturables al final de la estadía, etc. Planeamient de horarios de limpieza, checking del estado de los cuartos.<br />- ingreso de elementos especiales(camas adicionales para niños, etc) y modificación de la tarifa sobre dicha habitación a medida del cliente.<br />- Control y manejo de turnos de otros servicios que se pueden cargar al consumo del huesped (o bien forman parte de un paquete turístico que los incluye): SPA, uso de instalaciones adicionales (gimnasios, business center, etc), servicios personales, etc. Este módulo adicional permite indicar responsables, servicios efectuados, dispolnibilidad de instalaciones, etc.<br />- Manejo de convenios con agencias de turismo.</p>					
                </div>
                
                <div id="box_right">
                
                	<img src="img/solucioneshoteleras.png" style="margin-left: 16px;"/>
                    
                    <ul>
                    	<li>Administración total de habitaciones.</li>
                        <li>Interfaz gráfica sencilla.</li>
                        <li>Historial de clientes.</li>
                        <li>Manejo de cuentas personales/empresariales.</li>												<li>Tarifador telefónico.</li>												<li>Software de gestión comercial integrado.</li>												<li>Gestión de restaurant.</li>						
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
