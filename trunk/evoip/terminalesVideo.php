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
					<li><a href="productosDatos.php">Datos</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Video-Teléfono</h1>
                    
                    <p>OfficeServ ofrece la cazpacidad de transmitir Voz, Datos, Internet, Voz sobre IP, y ahora también Video</p>
                    <p id="pdf"><a href="docs/IP_Terminales_OS_7000.pdf">Descargar documentación de Terminales<img src="img/descargar_pdf.gif"></a></p>
                </div>
                
                <div id="box_right">
                
                	<img src="img/phone_video.png" />
                    
                    <ul>
                    	<li>Teclas Programables</li>
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