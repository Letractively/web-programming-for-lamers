<?php
if($visitante_es != 'usuario_administrador'){rebotar('no_administrador');}
$mensaje = new mensaje();
if(isset($_GET['id_mensaje'])){
	$mensaje->traerMensaje($_GET['id_mensaje']);
}
?>

<div class="contenido-portfolio">
	<div class="cabecera-portfolio">
	</div>
	<div class="imagenes-portfolio">
		<p><strong>De: <?php echo mensaje::traerRemitente($mensaje->desde_entidad, $mensaje->id_desde); ?></strong></p>
		<p><strong>Fecha: <?php echo myquery::cambiaFaNormal($mensaje->fecha); ?></strong></p>
		<p><strong>Asunto: <?php echo myquery::cambiaTaNormal($mensaje->titulo); ?></strong></p>
		<br />
		<?php echo myquery::cambiaTaNormal($mensaje->detalle); ?>
	</div>
	<div class="recorrer-portfolio">
	</div>
</div>