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
                	
                    <h1>OfficeServ 7200</h1>
                    
                    <p>La OfficeServ 7200 es una plataforma convergente que soporta tanto comunicaciones de voz como de datos, con una poderosa flexibilidad IP, con hilos o inalámbrica. Comunicaciones de voz tradicionales, voz sobre IP, datos basados en IP y soluciones WiFi a travéz de una LAN inalámbrica - La OfficeServ 7200 soporta todos estos servicios. De forma simultanea.</p>

					<p>El sistema gestiona llamadas de voz y datos usando una amplia variedad de interfaces 10/100 Base-T que pueden usarse para Redes de Area Local (LAN) y redes de Banda ancha (WAN). Esto proporciona una plataforma integrada, con o sin hilos, que soporta las aplicaciones VoIP Samsung, terminales inalámbricos, terminales tradicionales, PCs, servidores y cualquier otro tipo de periférico necesario para su negocio. voicemail, el SVMi-20E</p>
                    
                </div>
                
                <div id="box_right">
                
                	<img src="img/OfficeServ7200.png" />
                    
                    <ul>
                    	<li>Voicemail de 1 a 4 puertos controlados por licencia.</li>
                        <li>MGI de 1 a 8 canales controlados por licencia.</li>
                        <li>Total compatibilidad con OS7200 y OS7400.</li>
                        <li>Enlaces SIP de origen.</li>
                
                </div>
            
            </div>
                        
    	</div>
    
    </div>
    
<?

	include "footer.php";

?>
</body>
</html>