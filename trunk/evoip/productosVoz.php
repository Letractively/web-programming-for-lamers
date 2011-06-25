<?
	
	//Link activo en header
	$active = "productos";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
                
                <ul id="link_list">										<li><a href="productosDatos.php">Datos</a></li>					
                	<li><a href="productosVoz.php" class="active">Voz</a></li>                    <li><a href="productosImagen.php">Imagen</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                <div id="box_left">								<h1>Recorra nuestro catálogo</h1>									<div id="lista_producto">												<div id="img_cont"><img src="img/productos_samsung.png" style="padding-top: 12px;"/></div>												<h2>Samsung</h2>												<ul>							<li>Officeserv</li>							<li><a href="officeServ7030.php">Officeserv 7030</a></li>							<li><a href="officeServ7070.php">Officeserv 7070</a></li>							<li><a href="officeServ7100.php">Officeserv 7100</a></li>							<li><a href="officeServ7200.php">Officeserv 7200</a></li>							<li><a href="officeServ7400.php">Officeserv 7400</a></li>						</ul>						<ul>							<li>Terminales</li>							<li><a href="terminalesAnalogicas.php">Analógicos</a></li>							<li><a href="terminalesDigitales.php">Digitales</a></li>							<li><a href="terminalesIP.php">IP</a></li>							<li><a href="terminalesVideo.php">Video Teléfono</a></li>							<li><a href="terminalesWiFi.php">Wi-Fi</a></li>						</ul>						<ul>							<li>Aplicativos</li>							<li><a href="osOperator.php">OS Operator</a></li>							<li><a href="osSoftPhone.php">OS Softphone</a></li>							<li><a href="osCall.php">OS Call</a></li>							<li><a href="osDataView.php">OS Data View</a></li>							<li><a href="osEmailGateway.php">OS Email Gateway</a></li>						</ul>											</div>										<div id="lista_producto">												<div id="img_cont"><img src="img/productos_siemens.png" style="padding-top: 33px;"/></div>						<h2>Siemens</h2>												<ul>							<li><a href="hypath1120.php">HiPath 1120</a></li>							<li><a href="hypath1150.php">HiPath 1150</a></li>							<li><a href="hypath1190.php">HiPath 1190</a></li>							<li><a href="hypath2000.php">HiPath 2000</a></li>							<li><a href="hypath3000.php">HiPath 3000</a></li>						</ul>																	</div>                						<div id="lista_producto">												<div id="img_cont"><img src="img/productos_nec.png" style="padding-top: 25px;"/></div>						<h2>NEC</h2>												<ul>							<li><a href="productosTelefTopaz.php">Topaz</a></li>						</ul>																	</div>                </div>
                
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
