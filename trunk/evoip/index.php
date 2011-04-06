<?
	
	//Link activo en header
	$active = "home";

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
        		<span class="title">Nuestro negocio es ayudarlo</span>
        	</div>
            
            <div id="box_index_grey_container">
                
                <div class="box_index_grey">
                    <a href="#">Datos</a>
                    <a href="#"><img src="img/box_index_grey_datos.png" style="margin:81px 0 0 0;" /></a>
                </div>
                
                <div class="box_index_grey" id="center_left">
                    <a href="productosVoz.php">Voz</a>	
                    <a href="productosVoz.php"><img src="img/box_index_grey_voz.png" style="margin:58px 0 0 0;" /></a>
                </div>
                
                <div class="box_index_grey" id="center_right">
                    <a href="productosImagen.php">Imagen</a>
                    <a href="productosImagen.php"><img src="img/box_index_grey_imagen.png" style="margin:37px 0 0 0;" /></a>
                </div>
                
                <div class="box_index_grey">
                    <a href="#">Soluciones</a>
                    <a href="#"><img src="img/box_index_grey_soluciones.png" style="margin:38px 0 0 0;" /></a>
                </div>
            
            </div>
            
            <div id="text_box">
            	
                <p>Somos una empresa lider en el mercado de la consultoria y soluciones en telecomunicaciones. Ofrecemos proyectos integrales con la garantia de mayor eficiencia y productividad a traves de un equipo de ingenieros especialistas.</p>
				<p>Morbi condimentum augue ut nulla suscipit fringilla. Phasellus condimentum metus quis nisi blandit ac molestie turpis tincidunt. Curabitur viverra egestas nibh vel tempus. <a href="#">Mauris</a> adipiscing volutpat posuere. Curabitur sed libero a enim consectetur ultricies ut sed augue.</p>
				<p>Cras rhoncus, metus vitae venenatis rutrum, felis dolor volutpat lorem, vitae <a href="#">pellentesque</a> purus dolor quis felis. Sed vel massa ut leo elementum varius. Curabitur nulla risus, malesuada in dictum ut, fermentum non enim. Fusce ultrices dui et enim posuere ornare. Nullam id ipsum quis lacus tempus viverra. Aliquam pretium, enim in consectetur varius, nunc dolor <a href="#">faucibus</a> eros, eget imperdiet erat purus in nibh. Cras turpis arcu, sagittis id lobortis non, posuere in nibh. Etiam volutpat odio sit amet tellus hendrerit ac posuere sapien sagittis.</p>
            
            </div>
            
    	</div>
    
    </div>
    
<?

	include "footer.php";

?>

</body>
</html>
