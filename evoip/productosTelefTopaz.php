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
        		
                <span class="title">Productos</span>
                
                <ul id="link_list">
					<li><a href="productosDatos.php">Datos</a></li>					<li><a href="productosVoz.php" class="active">Voz</a></li>                    <li><a href="productosImagen.php">Imagen</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Topaz</h1>
                    
                    <p>Topaz es el nuevo sistema de telefonía de NEC que introduce VoIP con el objetivo de minimizar gastos de inversión de pequeñas empresas en crecimiento, que desean aprovechar las ventajas de utilizar VoIP en llamadas externas.</p>

					<p>Se destaca por su Escalabilidad para pequeñas y medianas empresas, presta servicios desde una configuración de 3x8 hasta un 27x72. Ademas, brinda la mejor relación costo beneficio del mercado.</p>															<p>Este nuevo sistema permite reutilizar terminales de la serie AK y además incorpora ventajas como Caller ID, VoIP, ISDN, Tramas E1 - R2, Uso de protocolo IP SIP Estándar, Preatención y Casilla de Mensajes, etc.</p>
                    
                </div>
                
                <div id="box_right">
                
                	<img src="img/productos-telef-Topaz.png" />
                    
                    <ul>
                    	<li>Caller ID, VoIP.</li>
                        <li>Escalabridad para PyMEs.</li>
                        <li>Minimiza gastos de inversión</li>
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
