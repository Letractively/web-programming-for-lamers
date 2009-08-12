</div>

<div style="clear: both;"></div>

<div class="footer">
	<p>----------------</p>
	<p>variables de sesion:</p>
	<p><?php print_r($_SESSION); ?></p>
	<p><?php print_r($_GET); ?></p>
	<p><?php print_r($_POST); ?></p>
	<h2>footer incluido</h2>
	<p>----------------</p>
</div>

<?php
echo "<pre>";
print_r($_SERVER);
echo "</pre>";
?>

<?php
echo "<pre>";
print_r($mensaje_post);
echo "</pre>";
?>
<?php
echo "<pre>";
print_r($mensajes_propietario);
echo "</pre>";
?>

<?php
echo "<pre>";
print_r($visitado);
echo "</pre>";
?>

<select>
<?php
listar_options($OPCIONES_PROFESIONES);
listar_options($OPCIONES_NIVEL_PROFESION);
listar_options($OPCIONES_SEXO);
?>
</select>

</body>
</html>