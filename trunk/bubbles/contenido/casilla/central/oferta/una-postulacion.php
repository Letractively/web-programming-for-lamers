<?php 
$postulado = new usuario($postulados->pos_id_usuario[$i]);
echo $postulado->ultimo_error;
?>

<div class="borde-comentario">
	<div class="foto-comentario">
		<img src="<?php echo DIR_FOTOS_PROFESIONALES_CHICAS . $postulado->ruta_foto; ?>" />
	</div>
	<div class="titulo-comentario">
		<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
			<?php echo $postulado->alias; ?>
		</p>
		<p class="parrafo8" style="float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;">
			Postulado el: <?php echo myquery::cambiaFaNormal($postulados->pos_fecha[$i]); ?>
		</p>
	</div>
	<div class="descripcion-comentario">
	<a href="profesional/<?php echo $postulado->alias; ?>">
		<p class="parrafo8" style="color: #ff0000; float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">VER PORTFOLIO</p>
	</a>
	</div>
	<div class="pie-comentario">
	</div>
</div>