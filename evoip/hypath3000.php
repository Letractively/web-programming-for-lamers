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
                	<li><a href="productosVoz.php" class="active">Voz</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Hi Path 3000</h1>
                    
                    <p>Una plataforma flexible de comunicaciones para pequeñas y medianas empresas que se amplia hasta 500 usuarios.</p>

					<p>HiPath 3000 es una plataforma modular de comunicaciones que ofrece un conjunto de funciones lider en la industria para pequeñas y medianas empresas de hasta 500 usuarios. Además, con soporte para cualquier combinación de teléfonos TDM, analógicos e IP, clientes PC y teléfonos inalámbricos, es ideal para entornos heterogéneos.</p>
                    
                </div>
                
                <div id="box_right">
                
                	<img src="img/Hypat3000.png" />
                    
                    <ul>
                    	<li>ISDN2e y líneas analógicas.</li>
                        <li>Interfaz CSTA.</li>
                        <li>Administración vía TCP/IP.</li>
                        <li>Mantenimiento Remoto (vía ISDN o análogo).</li>
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