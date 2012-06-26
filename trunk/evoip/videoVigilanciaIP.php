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


<body>
	<?
		include "header.php"
	?>	
    <div id="bloque_general">
    	
        <div id="bloque_general_cntn">
        	
            <div id="gradient_light">
        		
                <span class="title">Productos</span>
                
                <ul id="link_list">
                	<li><a href="productosVoz.php">Voz</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Videovigilancia IP</h1>
                    
                    <p>Si hablamos de soluciones de videovigilancia, lógicamente el primer mercado objetivo que nos viene a la cabeza es el de empresas de seguridad. Pero no son las únicas que pueden sacar provecho de sus posibilidades.</p>

					<p>La experiencia de los fabricantes de este sector dictamina que gestionar recursos, realizar inventarios, analizar conductas de compradores, controlar procesos industriales, realizar prácticas de tiro a distancia e incluso para controlar y fotografiar las migraciones de la fauna de un parque natural sin tener que molestarla, son sólo algunos de los ejemplos, y reales, que pueden hacer un uso intensivo de estas herramientas. Es decir, que las posibilidades que ofrecen los productos de vídeo IP son múltiples, de manera que quizá sólo nuestra imaginación sea la limitación a su aplicación a diversos campos.</p>
                    
                </div>
                
                <div id="box_right">
                
                	<img src="img/videovigilancia.jpg" />
                    
                    <ul>
                    	<li>Capacidad multiusuario.</li>
                        <li>Vigilancia en tiempo real accesible por internet.</li>
                        <li>Funciones inteligentes de detección de movimiento.</li>
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