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
                	<li><a href="#" class="active">Telefon&iacute;a</a></li>
                    <li><a href="#">Datos</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Terminales analógicas</h1>
                    
                    <p>Los teléfonos analógicos...</p>
                    
                </div>
                
                <div id="box_right">
                
                	<img src="img/phone_analog.png" />
                    
                    <ul>
                    	<li>Memoria del último número</li>
                        <li>Flash</li>
                        <li>Cerrado micrófono <br/>(mute-privacidad)</li>
                        <li>3 niveles de timbrado <br/>(bajo-medio-alto)</li>												<li>Amurable en pared</li>												<li>Lámpara de mensaje <br/>(timbrado)</li>												<li>Marcado sin uso de auricular</li>
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
