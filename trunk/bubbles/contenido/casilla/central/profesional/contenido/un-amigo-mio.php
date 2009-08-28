<?php if($visitante_es == 'no_identificado'){rebotar('no_identificado');} ?>

<?php
$amigo = new usuario($esta_amistad->am_id_amigo[$i]);
?>

<div class="borde-comentario">
	<div class="foto-comentario">
		<img src="<?php echo DIR_FOTOS_PROFESIONALES_CHICAS . $amigo->ruta_foto; ?>" />
	</div>
	<div class="titulo-comentario">
		<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
			<?php echo $amigo->alias; ?>
		</p>
		<p class="parrafo8" style="float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;">
			Agregado el: <?php echo myquery::cambiaFaNormal($esta_amistad->am_fecha_amistad[$i]); ?>
		</p>
	</div>
	<div class="descripcion-comentario">
	<a href="profesional/<?php echo $amigo->alias; ?>">
		<p class="parrafo8" style="color: #ff0000; float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">VER PORTFOLIO</p>
	</a>
	<a href="u-galeria.php?entidad_visitada=<?php echo $visitado->alias; ?>&casilla_central=todos_amigos&contenido_central=todos_amigos&id_amigo_eliminar=<?php echo $esta_amistad->am_id_amistad[$i]; ?>">
		<p class="parrafo8" style="color: #ff0000; float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;">ELIMINAR</p>
	</a>
	</div>
	<div class="pie-comentario">
	</div>
</div>