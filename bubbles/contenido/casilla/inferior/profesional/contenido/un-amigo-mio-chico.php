<?php 
$amigo = new usuario($este_amigo->am_id_amigo[$i]);
$amigo->traerRutaFoto($este_amigo->am_id_amigo[$i]);
echo $amigo->ultimo_error;
?>

<div class="borde-amigo-chico">
	<div class="foto-comentario">
		<a href="profesional/<?php echo $amigo->alias; ?>">
			<img src="<?php echo DIR_FOTOS_PROFESIONALES_CHICAS . $amigo->ruta_foto; ?>" />
		</a>
	</div>
	<div class="pie-amigo-chico">
		<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
			<?php echo usuario::id2alias($este_amigo->am_id_amigo[$i]); ?>
		</p>
	</div>
</div>