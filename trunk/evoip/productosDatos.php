<?
	
	//Link activo en header
	$active = "productos";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Evoip - Soluciones Tecnológicas</title>
<link href="css/style.css" rel="stylesheet" type="text/css">		<link rel="stylesheet" href="treeview/jquery.treeview.css" />	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>	<script src="treeview/lib/jquery.cookie.js" type="text/javascript"></script>	<script src="treeview/jquery.treeview.js" type="text/javascript"></script>	<script src="treeview/demo/demo.js" type="text/javascript"></script><script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-25920886-1']);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</head>

<body>
	<?
		include "header.php"
	?>	
    <div id="bloque_general">
    	
        <div id="bloque_general_cntn">
        	
            <div id="gradient_light">
        		
                <span class="title">Productos</span>
                
                <ul id="link_list">										<li><a href="productosDatos.php" class="active">Datos</a></li>					
                	<li><a href="productosVoz.php">Voz</a></li>                    <li><a href="productosImagen.php">Imagen</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                <div id="box_left">								<h1>Recorra nuestro catálogo</h1>									<div id="lista_producto">												<div id="img_cont" style="height: 150px;"><img src="img/productos_datos.png"/></div>												<ul>							<li><a href="redesAlambricas.php">Redes Alámbricas</a></li>							<li><a href="redesInalambricas.php">Redes Inalámbricas</a></li>						</ul>										</div>
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
