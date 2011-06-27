<?
	
	//Link activo en header
	$active = "servicios";

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
        		
                <span class="title">Servicios</span>
                
                 <ul id="link_list">                	<li><a href="serviciosDatos.php" class="active">Datos</a></li>                    <li><a href="serviciosSoluciones.php">Soluciones</a></li>                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Recorra nuestros servicios</h1>															<p>Evoip cuenta con una gran cantidad de servicios para ofrecer.</p>
<ul id="red" class="treeview-red">	<li class="open"><span>Datos</span>	<ul>		<li><span><a href="redesAlambricas.php">Redes Alámbricas</a></span></li>		<li><span><a href="redesInalambricas.php">Redes Inalámbricas</a></span></li>	</ul>	</li>	<li><span>Soluciones</span>	<ul>		<li><span><a href="solucionesHoteleras.php">Hoteleras</a></span></li>		<li><span><a href="solucionesCallCenter.php">Call Center</a></span></li>		<li><span><a href="#">Grabadores</a></span></li>		<li><span><a href="#">Conversores Líneas CE</a></span></li>		<li><span><a href="#">Tarifadores</a></span></li>	</ul>	</li></ul>
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
