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
                	
                    <h1>Tarifadores</h1>
                    
                    <p>Medin Tax para Windows es el nuevo y mejor software de tarifación del mercado. Permite llevar un completo control de la utilización del recurso telefónico, logrando obtener información de las extensiones, claves de usuarios, lineas, y centros de costos de la empresa.</p>

					<p>Además permite llevar un registro detallado de las llamadas entrantes y salientes en cualquier horario. Lo más importante, es que toda información ustéd la obtiene al instante. Esto se logra porque utiliza una base de datos relacional que hace que sea el software mas veloz del mercado. No requiere de un computador dedicado, es fácil de instalar y de usar.</p>					
                </div>
                
                <div id="box_right">
                
                	<img src="img/soluciones-tarifadores.png" style="margin-left: 16px;"/>
                    
                    <ul>
                    	<li>Información de extensiones, claves y centros de costos.</li>
                        <li>Registro de llamadas entrantes/salientes.</li>						
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
