<div style="clear: both;"></div>

<div class="col-centroizquierda">
	<div class="publicidad1"  id="flashcontent2">
		<!--<a href="mailto:info@bubblescomunidad.com"></a>-->
	</div>
	<script type="text/javascript">
		var sa = new SWFObject("sacatelaropabanner.swf", "mymovie", "770", "86", "8");
		sa.write("flashcontent2");
	</script>
</div>

<div class="col-derecha">
	<div class="publicidad1">
		<a href="http://www.ggimpresor.com.ar/" target="_blank">
			<img src="imagenes/publicidad-inferior2.gif"></img>
		</a>
	</div>
</div>

</div>

<div class="footer">
	<p class="izquierda">Bubbles Comunidad 2009</p>
	<p class="derecha">Términos y Condiciones</p>
	<p class="derecha">Ayuda</p>
	<p class="derecha">Trabajos</p>
	<p class="derecha">Proovedores</p>
	<p class="derecha">Publicitar</p>
	<p class="derecha">Sobre Nosotros</p>
	<p class="derecha">Ingresar</p>
</div>

<?php //DEBUG BEGIN ?>
	<?php //echo "<pre>"; ?>
	<p><?php //echo 'variables de sesion:'; ?></p>
	<p><?php //print_r($_SESSION); ?></p>
	<p><?php //echo 'GETs:'; ?></p>
	<p><?php //print_r($_GET); ?></p>
	<p><?php //echo 'POSTs:'; ?></p>
	<p><?php //print_r($_POST); ?></p>
	<?php //echo "</pre>"; ?>

<?php
//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";
?>

<?php
//echo "<pre>";
//print_r($mensaje_post);
//echo "</pre>";
?>
<?php
//echo "<pre>";
//print_r($mensajes_propietario);
//echo "</pre>";
?>

<?php
//echo "<pre>";
//print_r($visitado);
//echo "</pre>";
?>
<!--
<select>
<?php
//listar_options($OPCIONES_PROFESIONES);
//listar_options($OPCIONES_NIVEL_PROFESION);
//listar_options($OPCIONES_SEXO);
?>
</select>
-->

<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ?
"https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost +
"google-analytics.com/ga.js'
type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-10920713-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>

<?php ob_end_flush(); ?>