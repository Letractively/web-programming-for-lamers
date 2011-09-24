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
                
                <ul id="link_list">					<li><a href="productosDatos.php">Datos</a></li>					
                	<li><a href="productosVoz.php" class="active">Voz</a></li>                    <li><a href="productosImagen.php">Imagen</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Hi Path 1120</h1>
                    
                    <p>Disfrute de una telefonía de alto rendimiento que ofrece HiPath 1100, diseñado para pequeñas a medianas empresas que tienen hasta 140 usuarios.</p>

					<p>¿Administra un estudio jurídico, un consultorio médico, un taller o una empresa de producción? ¿Quizás tiene una gran cantidad de clientes que sólo conoce por teléfono, está siempre de guardia para sus pacientes o está en contacto telefónico con sus proovedores?. Si este es el caso, necesita un sistema telefónico sólido que esté preparado para el futuro y pueda adaptarse a la perfección al tamaño de su empresa.</p>										<p>La solución que le ofrecemos es HyPath 1100, que es nuestra solución de telefonía de alto rendimiento para empresas con hasta 140 empleados. Compuesto de tres sistemas que admiten desde 16 hasta 140 usuarios con seis a 32 lineas, HiPath 1100 incluye una variedad de funciones integradas, como correo de voz, conferencias y amplias herramientas de administración.</p>
                    
                </div>
                
                <div id="box_right">
                
                	<img src="img/Hypat1120.png" />
                    
                    <ul>
                    	<li>Hasta 6 lineas y 16 extensiones.</li>
                        <li>tarjeta mixta para líneas y extensiones EB204.</li>
                        <li>Tarjetas para 2 o 4exts. Digitales Upo/E.</li>
                        <li>Correo de voz para 24 usuarios EVM.</li>												<li>4 puertos para teléfonos multilínea Profiset 3030</li>
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
