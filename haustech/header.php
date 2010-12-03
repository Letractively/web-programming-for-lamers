<?php
	$class = "class=\"current\"";
?>
        <div id="header_up"></div>
        
        <div id="header">
        	<div id="menu">
            	<ul id="menu_ul">
                	<li><a <?php if ($current==1) { echo $class; } ?> href="index.php">HOME</a></li>
                    <li><a <?php if ($current==2) { echo $class; } ?> href="que_hacemos.php">QUE HACEMOS?</a></li>
                    <li><a <?php if ($current==3) { echo $class; } ?> href="iluminacion.php">SOLUCIONES</a></li>
                    <li><a <?php if ($current==4) { echo $class; } ?> href="nosotros.php">NOSOTROS</a></li>
                    <li><a <?php if ($current==5) { echo $class; } ?> href="contacto.php">CONTACTO</a></li>
                </ul>
            </div>
            <div id="header_logo">
            	<a href="index.php"><img src="img/header.gif" alt="Haustech, casas inteligentes." /></a>
            </div>        
        </div>
        
