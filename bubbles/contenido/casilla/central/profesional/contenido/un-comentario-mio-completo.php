<?php 
$comentador = new usuario();
$comentador->traerRutaFoto($este_comentario->com_id_desde[$i]);
echo $comentador->ultimo_error;
?>

<div class="borde-comentario">
	<div class="foto-comentario">
		<img src="<?php echo DIR_FOTOS_PROFESIONALES_CHICAS . $comentador->ruta_foto; ?>" />
	</div>
	<div class="titulo-comentario">
		<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
			Escrito por <?php echo usuario::id2alias($este_comentario->com_id_desde[$i]); ?>
		</p>
		<p class="parrafo8" style="float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;">
			<?php echo myquery::cambiaFaNormal($este_comentario->com_fecha[$i]); ?>
		</p>
	</div>
	<div class="descripcion-comentario">
	<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
		<?php echo $este_comentario->com_detalle[$i]; ?>
	</p>
	</div>
	<div class="pie-comentario">
	</div>
</div>