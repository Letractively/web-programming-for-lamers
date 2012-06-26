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
                	<li><a href="productosVoz.php" class="active">Voz</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>OfficeServ 7070</h1>
                    
                    <p>La agilidad y el tiempo de respuesta de los pequeños negocios son una gran ventaja competitiva. Pero la tecnología y el apoyo profesional para colaborar de forma eficiente, tienen muchas veces precios que exceden lo razonable o no son viables para las compañias más pequeñas. A partir de ahora, incluso las empresas de menor tamaño podrán permitirse los mismos sofisticados sistemas de comunicación, que normalmente sólo podían disfrutar las grandes compañias.</p>
                    <p id="pdf"><a href="docs/Serie7000_castellano.pdf">Descargar documentación de productos OfficeServ<img src="img/descargar_pdf.gif"></a></p>
                </div>
                
                <div id="box_right">
                
                	<img src="img/OfficeServ7070.png" />
                    
                    <ul>
                    	<li>Correo de Voz con inptegración de e-mail.</li>
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