<?php
if($visitante_es != 'empresa_administrador'){rebotar('no_administrador');}
$mensaje = new mensaje();
if(isset($_GET['id_mensaje'])){
	$mensaje->traerMensaje($_GET['id_mensaje']);
}
?>

<div class="contenido-mensajes">
	<div class="cabecera-portfolio">
	</div>
	<div class="lista-mensajes">
		<p><strong>De: <?php echo mensaje::traerRemitente($mensaje->desde_entidad, $mensaje->id_desde); ?></strong></p>
		<p><strong>Fecha: <?php echo myquery::cambiaFaNormal($mensaje->fecha); ?></strong></p>
		<p><strong>Asunto: <?php echo myquery::cambiaTaNormal($mensaje->titulo); ?></strong></p>
		<br />
		<?php echo myquery::cambiaTaNormal($mensaje->detalle); ?>
	</div>
	<input type="hidden" name="id_mensaje_anterior" value="<?php echo $mensaje->id_mensaje; ?>" />
	</form>
	<div class="recorrer-portfolio">
	</div>
</div>