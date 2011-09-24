<?
	
	//Link activo en header
	$active = "productos";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Evoip - Soluciones Tecnológicas</title>
<link href="css/style.css" rel="stylesheet" type="text/css"><script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-25920886-1']);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
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
                	
                    <h1>Hi Path 3000</h1>
                    
                    <p>Una plataforma flexible de comunicaciones para pequeñas y medianas empresas que se amplia hasta 500 usuarios.</p>

					<p>HiPath 3000 es una plataforma modular de comunicaciones que ofrece un conjunto de funciones lider en la industria para pequeñas y medianas empresas de hasta 500 usuarios. Además, con soporte para cualquier combinación de teléfonos TDM, analógicos e IP, clientes PC y teléfonos inalámbricos, es ideal para entornos heterogéneos.</p>															<p>La conexión en red de varios sitios permite a las empresas con sitios remotos operarlo como un solo sistema. Reducción de costos de llamadas al usar telefonía IP entre sitios o Internet. acceso a funciones de telefonía líderes de la industria en entornos TDM o IP</p>															<p>Además de desplegar una amplia variedad de opciones de conectividad y plataforma, HiPath 3000 también ofrece varios módulos que mejoran significativamente la capacidad de comunicaciones de la solución: Diseñado especificamente para pequeñas y medianas empresas, OpenScape Office ayuda a las organizaciones a trabajar de manera más productiva, mejorar el servicio al cliente y ahorrar dinero.</p>															<p>Xpressions Compact mejora la mensajería genérica de voz de la telefonía en la oficina al proporcionar un buzón de correo de voz unificado para los teléfonos móviles y fijos de los usuarios, permitirles recibir mensajes de correo de voz por correo electrónico, registrar llamadas y mucho más.</p>															<p>HG1500 Gateway Card para comunicaciones IP y conectividad de banda ancha.</p>
                    
                </div>
                
                <div id="box_right">
                
                	<img src="img/Hypat3000.png" />
                    
                    <ul>
                    	<li>ISDN2e y líneas analógicas.</li>
                        <li>Interfaz CSTA.</li>
                        <li>Administración vía TCP/IP.</li>
                        <li>Mantenimiento Remoto (vía ISDN o análogo).</li>												<li>Establecimiento de Red IP (tarjeta opcional HG1500).</li>												<li>Microteléfonos IP (tarjeta opcional HG1500).</li>
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
