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
                	<li><a href="#" class="active">Telefon&iacute;a</a></li>
                    <li><a href="#">Datos</a></li>
                </ul>
        	
            </div>
            
            <div id="box_productos">
                
                <div id="box_left">
                	
                    <h1>Terminales digitales</h1>
                    
                    <p>Los teléfonos digitales Samsung de la serie 5000 son el complemento perfecto para lograr un alto desempeño en las comunicaciones de los sistemas <a href="#">OfficeServ OS100</a> / <a href="#">OS500</a> y toda la familia <a href="#">OS 7000</a>. Los teléfonos han sido diseñados de manera ergonómica por lo que le permiten acceder a todas las facilidades del sistema de una forma rápida y eficiente.</p>

					<p>Todos cuentan con un display LCD de 2 líneas y 24 caracteres para desplegar información asociada a las llamadas y al estado del teléfono. Así mismo tienen altoparlantes y micrófono para permitirle habar sin necesidad de utilizar sus manos. Los teléfonos digitales de la serie 5000 cuentan con teclas programables para adecuar el teléfono a sus necesidades así como con teclas interactivas que van cambiando su funcionamiento dependiendo del tipo y estado de la llamada que esté cursando.</p>

					<p>Dependiendo del modelo elegido podrá contar con un navegador digital para facilitar el uso de los directorios y facilidades de su sistema de comunicaciones.</p>
                    
                </div>
                
                <div id="box_right">
                
                	<img src="img/phone.png" style="margin-left: 0px;"/>
                    
                    <ul>
                    	<li>Teclas Programables</li>
                        <li>Teclas Interactivas</li>
                        <li>Altoparlante Bidireccional</li>
                        <li>Panel Selector de Extensiones</li>
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
