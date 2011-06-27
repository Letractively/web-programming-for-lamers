<?
	
	//Link activo en header
	$active = "productos";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Evoip - Soluciones Tecnológicas</title>
<link href="css/style.css" rel="stylesheet" type="text/css">		<link rel="stylesheet" href="treeview/jquery.treeview.css" />	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>	<script src="treeview/lib/jquery.cookie.js" type="text/javascript"></script>	<script src="treeview/jquery.treeview.js" type="text/javascript"></script>	<script src="treeview/demo/demo.js" type="text/javascript"></script>
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
                	<li><a href="productosVoz.php" >Voz</a></li>                    <li><a href="productosImagen.php" class="active">Imagen</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Recorra nuestro catálogo</h1>															<p>Los productos de Imagen de Evoip permiten ...</p>
<ul id="red" class="treeview-red">	<li><span>Voz</span>	<ul>		<li><span>Samsung</span>			<ul>				<li><span>OfficeServ</span>					<ul>						<li><span><a href="officeServ7030.php">7030</a></span></li>						<li><span><a href="officeServ7070.php">7070</a></span></li>						<li><span><a href="officeServ7100.php">7100</a></span></li>						<li><span><a href="officeServ7200.php">7200</a></span></li>						<li><span><a href="officeServ7400.php">7400</a></span></li>					</ul>				</li>				<li><span>Terminales</span>					<ul>						<li><span><a href="terminalesAnalogicas.php">Analógicos</a></span></li>						<li><span><a href="terminalesDigitales.php">Digitales</a></span></li>						<li><span><a href="terminalesIP.php">IP</a></span></li>						<li><span><a href="terminalesVideo.php">Video Teléfono</a></span></li>						<li><span><a href="terminalesWiFi.php">Wi-Fi</a></span></li>					</ul>				</li>				<li><span>Aplicativos</span>					<ul>						<li><span><a href="osOperator.php">OS Operator</a></span></li>						<li><span><a href="osSoftPhone">OS Softphone</a></span></li>						<li><span><a href="osCall.php">OS Call</a></span></li>						<li><span><a href="osDataView.php">OS Data View</a></span></li>						<li><span><a href="osEmailGateway.php">OS Email Gateway</a></span></li>					</ul>				</li>			</ul>		</li>		<li><span>Siemens</span>			<ul>				<li><span><a href="hypath1120.php">HiPath 1120</a></span></li>				<li><span><a href="hypath1150.php">HiPath 1150</a></span></li>				<li><span><a href="hypath1190.php">HiPath 1190</a></span></li>				<li><span><a href="hypath2000.php">HiPath 2000</a></span></li>				<li><span><a href="hypath3000.php">HiPath 3000</a></span></li>			</ul>		</li>		<li><span>NEC</span>			<ul>				<li><span><a href="productosTelefTopaz.php">Topaz</a></span></li>			</ul>		</li>	</ul>	</li>	<li class="open"><span>Imagen</span>		<ul>			<li><span><a href="videoVigilanciaIP.php">Videovigilancia IP</a></span></li>			<li><span><a href="videoConferencia.php">Videoconferencia</a></span></li>		</ul>	</li></ul>
                </div>
                
                <div id="box_right">					<h1 class="medium">Contacto Rápido</h1>                					<p>Evoip Soluciones<br/>Pico 4738, Buenos Aires, Argentina</p>										<p><img src="img/tel.gif" style="margin: 0; padding: 0"/> (+54 11) 4541-7200<br/><img src="img/email.gif" style="margin: 0; padding: 0"/> info@evoipsoluciones.com.ar</p>
                </div>
            
            </div>
                        
    	</div>
    
    </div>
    
<?

	include "footer.php";

?>
</body>
</html>
