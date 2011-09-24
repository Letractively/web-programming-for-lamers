<?
	
	//Link activo en header
	$active = "productos";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Evoip - Soluciones Tecnológicas</title>
<link href="css/style.css" rel="stylesheet" type="text/css">		<link rel="stylesheet" href="treeview/jquery.treeview.css" />	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.2.6/jquery.min.js"></script>	<script src="treeview/lib/jquery.cookie.js" type="text/javascript"></script>	<script src="treeview/jquery.treeview.js" type="text/javascript"></script>	<script src="treeview/demo/demo.js" type="text/javascript"></script><script>$(document).ready(function() {	//move the image in pixel	var move = -50;		//zoom percentage, 1.2 =120%	var zoom = 1.8;	//On mouse over those thumbnail	$('.zitem').hover(function() {				//Set the width and height according to the zoom percentage		width = $('.zitem').width() * zoom;		height = $('.zitem').height() * zoom;				//Move and zoom the image		// SIN ZOOM: $(this).find('img').stop(false,true).animate({'width':width, 'height':height, 'top':move, 'left':move}, {duration:500});				//Display the caption		$(this).find('div.caption').stop(false,true).fadeIn(500);	},	function() {		//Reset the image		// SIN ZOOM: $(this).find('img').stop(false,true).animate({'width':$('.zitem').width(), 'height':$('.zitem').height(), 'top':'0', 'left':'0'}, {duration:1000});			//Hide the caption		$(this).find('div.caption').stop(false,true).fadeOut(400);	});});</script><style>.zitem {	width:160px;	height:185px;	border:0;	margin:0;		/* required to hide the image after resized */	overflow:hidden;		/* for child absolute position */	position:relative;		/* display div in line */	float:left;}.zitem .caption {	width:160px;	height:60px;	background:#000;	color:#fff;	font-weight:bold;			/* fix it at the bottom */	position:absolute;	bottom:-1px; /* fix IE issue */	left:0;	/* hide it by default */	display:none;	/* opacity setting */	filter:alpha(opacity=70);    /* ie  */	-moz-opacity:0.7;    /* old mozilla browser like netscape  */	-khtml-opacity: 0.7;    /* for really really old safari */  	opacity: 0.7;    /* css standard, currently it works in most modern browsers like firefox,  */}.zitem .caption a {	text-decoration:none;	color:#fff;	font-size:12px;			/* add spacing and make the whole row clickable*/	padding:5px;	display:block;}.zitem img {	border:0;		/* allow javascript moves the img position*/	position:absolute;}.clear {	clear:both;	}</style><script type="text/javascript">  var _gaq = _gaq || [];  _gaq.push(['_setAccount', 'UA-25920886-1']);  _gaq.push(['_trackPageview']);  (function() {    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);  })();</script>
</head>

<body>
	<?
		include "header.php"
	?>	
    <div id="bloque_general">
    	
        <div id="bloque_general_cntn">
        	
            <div id="gradient_light">
        		
                <span class="title">Productos</span>
                
                <ul id="link_list">					<li><a href="productosDatos.php">Datos</a></li>					
                	<li><a href="productosVoz.php">Voz</a></li>                    <li><a href="productosImagen.php">Imagen</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                    <h1>Recorra nuestro catálogo</h1>										<div id="menu_datos">						<ul>							<li><a href="#"><h1>Datos</h1></a></li>							<li><a href="#"><h1>Voz</h1></a></li>							<li><a href="#"><h1>Imagen</h1></a></li>						</ul>					</div>										<div id="icon_producto">												<div class="zitem">							<a href="productosDatos.php"><img src="img/productos_datos_1.png" alt="Datos" title=""/></a>								<div class="caption">									<a href="">Transmisión de datos de manera flexible y segura</a>								</div>						</div><!--												<div id="img_cont">							<a href="#"><img src="img/productos_datos_1.png" /></a>						</div>-->					</div>					<div id="icon_producto">												<div class="zitem">							<a href="productosVoz.php"><img src="img/productos_voz_1.png" alt="Voz" title=""/></a>								<div class="caption">									<a href="">Soluciones de telefonía en numerosas integraciones</a>								</div>						</div><!--												<div id="img_cont">							<a href="#"><img src="img/productos_voz_1.png" /></a>						</div>-->					</div>					<div id="icon_producto">						<div class="zitem">							<a href="productosImagen.php"><img src="img/productos_imagen_1.png" alt="Imagen" title=""/></a>								<div class="caption">									<a href="">Expansión de las comunicaciones visuales rápida y fácilmente</a>								</div>						</div><!--											<div id="img_cont">							<a href="#"><img src="img/productos_imagen_1.png" /></a>						</div>-->					</div>					                </div>
                
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
