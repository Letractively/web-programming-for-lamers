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
                	
                    <h1>OfficeServ 7400</h1>
                    
                    <p>La officeServ 7400 es una solución integrada donde convergen funciones de router de datos y LAN, con una fiabilidad del 99,999% en procesamiento de voz TDM. La plataforma IP OfficeServ 7400 soporta el estándar Voz sobre IP (VoIP) así como la más robusta Telefonía sobre IP (ToIP)</p>

					<p>Los Gigabit Data Modules integrados proporcionan una garn potencia a las capacidades de accesos LAN/WAN, dando como resultado una completa red de datos para su empresa. La seguridad de su sitio está garan,tizada con la presencia de Firewall y sistemas de Detección de Intrusos. Asimismo, dispone de Red Privada Virtual (VPN) y funciones de Switch, como VLAN y QoS (Quality on Service).</p>
                    
                </div>
                
                <div id="box_right">
                
                	<img src="img/OfficeServ7400.png" />
                    
                    <ul>
                    	<li>Voicemail de 1 a 4 puertos controlados por licencia.</li>
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