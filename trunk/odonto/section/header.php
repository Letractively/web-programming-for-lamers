<?php 
	if (!$included) die();
?>

<!doctype html public "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
    
	    <base href="<?=ROOT?>" />

        <title>Odonto</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Title" content="Odonto">
        <meta name="Author" content="">
        <meta name="Subject" content="Odonto">
        <meta name="Description" content="Odonto">
        <meta name="Keywords" content="Odonto">
        <meta name="Language" content="es">
        <meta name="Robots" content="All">
        

        <link rel=stylesheet href="css/style.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/slider.css" type="text/css" media="all">        
		<!-- <link rel="stylesheet" href="css/galleriffic.css" type="text/css" media="all"> -->
		<!-- <link rel="stylesheet" href="jquery.jscrollpane.css" type="text/css" media="all">                -->


        <script src="js/jquery.js" type="text/javascript"></script>
		<script src="js/easySlider1.7.js" type="text/javascript"></script>        

		<script src="js/script.js" type="text/javascript"></script>         

<!--
        <script src="js/jquery.galleriffic.js" type="text/javascript"></script>        
        <script src="js/jquery.opacityrollover.js" type="text/javascript"></script>        
        
		<script src="js/jquery.jscrollpane.min.js" type="text/javascript"></script>

        <script src="js/jquery.mwheelIntent.js" type="text/javascript"></script>
        <script src="js/jquery.mousewheel.js" type="text/javascript"></script>                

        <script src="js/jquery.color.js" type="text/javascript"></script>
		<script src="js/jquery.preload.js" type="text/javascript"></script>
		<script src="js/jquery.fadebutton.js" type="text/javascript"></script>        
        <script src="js/jquery.maxlength.js" type="text/javascript"></script>
        <script src="js/jquery.twitter.js" type="text/javascript"></script>
                
-->
        
        
           
        <!--[if lte IE 6]>
        <script type="text/javascript" src="js/supersleight.js"></script>
        <![endif]-->        
        
             
          
	</head>
	<body>
    
    	<div id="top">
        	<div style="float:left; margin:30px 0 0 16px;">
               	<img src="img/logo.png">
            </div>
        	<div id="menu">
            	<a <?php echo($section == 'home') ? 'class="current"' : '';?> style="margin:0 25px 0 0;" href="home/">Home</a>
                
                <!--
            	<a id="subcatalogo_menu" 
					<?php echo($section == 'catalogo_danza' || $section == 'catalogo_natacion' || $section == 'catalogo_misc') ? 'class="current"' : '';?> 
                	style="margin:0 16px 0 0;" href="catalogo_danza/">Catalogo</a>
                    -->
                    
            	<a <?php echo($section == 'nosotros') ? 'class="current"' : '';?> style="margin:0 25px 0 0;" href="nosotros/">Nosotros</a>
            	<a <?php echo($section == 'servicios') ? 'class="current"' : '';?> style="margin:0 25px 0 0;" href="servicios/">Servicios</a>
            	<a <?php echo($section == 'avances') ? 'class="current"' : '';?> style="margin:0 25px 0 0;" href="avances/">Ultimos Avances</a>
            	<a <?php echo($section == 'contacto') ? 'class="current"' : '';?> style="margin:0 3px 0 0;" href="contacto/">Contacto</a>                

                
                <div id="subcatalogo" style="position:absolute; display:none; margin:0 0 0 65px; z-index:10;">
                    <a <?php echo($section == 'catalogo_danza') ? 'class="current"' : '';?> style="margin:0 16px 0 0;" href="catalogo_danza/">· Danza</a><br />
                    <a <?php echo($section == 'catalogo_natacion') ? 'class="current"' : '';?> style="margin:0 16px 0 0;" href="catalogo_natacion/">· Natación</a><br />
                    <a <?php echo($section == 'catalogo_misc') ? 'class="current"' : '';?> style="margin:0 16px 0 0;" href="catalogo_misc/">· Playa</a><br />
                </div>                
            </div>

        </div>
        
        <div id="inside">    


