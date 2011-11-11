<!doctype html public "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>

        <title>FOPLEP</title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="Title" content="FOPLEP">
        <meta name="Author" content="sumacero.com">
        <meta name="Subject" content="Foro de Presidentes de Legislaturas Provinciales">
        <meta name="Description" content="Foro de Presidentes de Legislaturas Provinciales">
        <meta name="Keywords" content="<?=$keywords?>">
        <meta name="Language" content="es">
        <meta name="Robots" content="<?=$robots?>">
        

        <link rel="stylesheet" href="style.css" type="text/css" media="screen">
		<link rel="stylesheet" href="jquery.twitter.css" type="text/css" media="all">        
		<link rel="stylesheet" href="jquery.jscrollpane.css" type="text/css" media="all">
		<link rel="stylesheet" href="js/ceebox/css/ceebox.css" type="text/css" media="screen" />             

		<!-- Simplemodal Contact Form CSS files -->
		<link type='text/css' href='css/contact.css' rel='stylesheet' media='screen' />

        <script src="js/jquery.js" type="text/javascript"></script>
        

        <script src="js/jquery.flash.js" type="text/javascript"></script>        
        <script src="js/jquery.jscrollpane.min.js" type="text/javascript"></script>
        <script src="js/jquery.mwheelIntent.js" type="text/javascript"></script>
        <script src="js/jquery.mousewheel.js" type="text/javascript"></script>                
        
        <script src="js/jquery.color.js" type="text/javascript"></script>
		<script src="js/jquery.preload.js" type="text/javascript"></script>
		<script src="js/jquery.fadebutton.js" type="text/javascript"></script>        
        <script src="js/jquery.maxlength.js" type="text/javascript"></script>
        <script src="js/jquery.twitter.js" type="text/javascript"></script>
        
		<script type='text/javascript' src='js/ceebox/js/jquery.swfobject.js' ></script>        
	    <script type='text/javascript' src='js/ceebox/js/jquery.ceebox.js'></script>           
                
		<script src="js/script.js" type="text/javascript"></script>
		
		<!-- Simplemodal Contact Form JS files -->
		<script type='text/javascript' src='js/jquery.simplemodal.js'></script>
		<script type='text/javascript' src='js/contact.js'></script>
        
        <!--[if lte IE 6]>
        <script type="text/javascript" src="js/supersleight.js"></script>
        <![endif]-->        
        
        
	</head>
	<body <?php echo($section!='home') ? 'class="small"' : ''; ?>>
    
		<div id="menu">
        	<div style="float:left;">
	        	<img style="margin:0 20px 0 -7px;" src="img/logo.jpg" />        
            </div>
            <div style="float:left">
            	<div class="login">
	                <a href="#">Help</a>
					<a href="#">Log In</a>
					<a href="#">Sign Up</a>                    
                </div>
	            <div class="buttons">
                	<a href="?s=home">
	                    <img src="img/menu/home_<?php echo($section=="home") ? "on" : "off"; ?>.jpg" border="0"/> </a>
                	<a href="?s=institucional">                        
                	    <img src="img/menu/institucional_<?php echo($section=="institucional") ? "on" : "off"; ?>.jpg" border="0"/> </a>
                	<a href="?s=presidencia">                    
            	        <img src="img/menu/presidencia_<?php echo($section=="presidencia") ? "on" : "off"; ?>.jpg" border="0"/> </a>
                	<a href="?s=comisiones">                    
        	            <img src="img/menu/comisiones_<?php echo($section=="comisiones") ? "on" : "off"; ?>.jpg" border="0"/> </a>
                	<a href="?s=consejo">                    
    	                <img src="img/menu/consejo_<?php echo($section=="consejo") ? "on" : "off"; ?>.jpg" border="0"/> </a>
                	<a href="?s=contacto">                    
	                    <img src="img/menu/contacto_<?php echo($section=="contacto") ? "on" : "off"; ?>.jpg" border="0"/> </a>         
                 </div>
            </div>
            
        </div>
        
        <div style="clear:both;"> </div> 
                 
        <div id="inside">    
        
			<div class="sky">  
            	<?php if ($section=='home') { ?>
				
				<script type="text/javascript">

				/*** 
				Simple jQuery Slideshow Script
				Released by Jon Raasch (jonraasch.com) under FreeBSD license: free to use or modify, not responsible for anything, etc.  Please link out to me if you like it :)
				***/

				function slideSwitch() {
					var $active = $('#slideshow IMG.active');

					if ( $active.length == 0 ) $active = $('#slideshow IMG:last');

					// use this to pull the images in the order they appear in the markup
					var $next =  $active.next().length ? $active.next()
						: $('#slideshow IMG:first');

					// uncomment the 3 lines below to pull the images in random order
    
					// var $sibs  = $active.siblings();
					// var rndNum = Math.floor(Math.random() * $sibs.length );
					// var $next  = $( $sibs[ rndNum ] );


					$active.addClass('last-active');

					$next.css({opacity: 0.0})
						.addClass('active')
						.animate({opacity: 1.0}, 1000, function() {
							$active.removeClass('active last-active');
					});
				}

				$(function() {
					setInterval( "slideSwitch()", 5000 );
				});

				</script>

				<style type="text/css">

				/*** set the width and height to match your images **/

				#slideshow {
				position:relative;
				height:298px;
				}

				#slideshow IMG {
				position:absolute;
				top:0;
				left:0;
				z-index:8;
				opacity:0.0;
				}

				#slideshow IMG.active {
				z-index:10;
				opacity:1.0;
				}

				#slideshow IMG.last-active {
				z-index:9;
				}

				</style>
				
	    	        	<!--<img src="img/sky.jpg">-->
						<div id="slideshow">
							<img src="img/LBa_2.jpg" alt="Slideshow Image 1" class="active" />
							<img src="img/LCaba_2.jpg" alt="Slideshow Image 2" />
							<img src="img/Lchub_2.jpg" alt="Slideshow Image 3" />
							<img src="img/LStaFe_2.jpg" alt="Slideshow Image 4" />
						</div>
                <?php } else { ?>
		            	<img src="img/skysmall.jpg">                           
                <?php } ?>
	        </div>                



