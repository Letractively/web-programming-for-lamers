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
                	<li><a href="productosVoz.php" class="active">Voz</a></li>                    <li><a href="productosImagen.php">Imagen</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>OfficeServ 7100</h1>
                    
                    <p>La nueva plataforma 7100 está especialmente diseñada para pequeñas y medianas empresas, soportando hasta 32 extensiones y 30 lineas, con conexiones tanto digitales como analógicas. Es altamente configurable y puede confeccionarse dependiendo de sus necesidades, por lo que no tendrá que pagar por prestaciones que no necesita. De la misma forma, la OfficeServ 7100 puede ampliarse fácilmente si su negocio así lo requiere. Es totalmente compatible con las unidades de la serie 7000.</p>

					<p>La OfficeServ 7100 Media Gateway está integrada en el procesador principal, por lo que puede ser usada como unidad independiente en soluciones VoIP y terminales IP. Como solución VoIP, la 7100 puede soportar enlaces SIP, por lo que es un sistema ideal para esta funcionalidad. El Servidor de mensajería está también integrado en el procesador central.</p>										<p>Al igual que en las funcionalidades estándar del Voicemail, los usuarios pueden redireccionar llamadas con diferentes mensajes, así como desvíos de llamada en base a días, horas, días de semana, CLI y DDI. Esto significa que los mensajes son personalizables por usuario, grupo, etc.</p>
                    										<p>La Auto Atención puede responder a varias llamadas simultaneamente, usando diferentes mensajes para cada departamento. Las llamadas entrantes son redireccionadas sin necesidad de que la operadora conteste al teléfono.</p>					
                </div>
                
                <div id="box_right">
                
                	<img src="img/OfficeServ7100.png" style="margin-left: 0px;"/>
                    
                    <ul>
                    	<li>Voicemail de 1 a 4 puertos controlados por licencia.</li>
                        <li>MGI de 1 a 8 canales controlados por licencia.</li>
                        <li>Total compatibilidad con OS7200 y OS7400</li>
                        <li>Enlaces SIP de origen.</li>												<li>Voicemail, autoatención, y grupos de usuarios UCD.</li>						                    </ul>
                
                </div>
            
            </div>
                        
    	</div>
    
    </div>
    
<?

	include "footer.php";

?>
</body>
</html>
