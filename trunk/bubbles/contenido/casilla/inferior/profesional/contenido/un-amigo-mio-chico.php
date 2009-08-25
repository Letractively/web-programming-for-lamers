<?php 
$amigo = new usuario();
$amigo->traerRutaFoto($este_amigo->am_id_amigo[$i]);
echo $amigo->ultimo_error;
?>

<div class="borde-amigo-chico">
	<div class="foto-comentario">
		<img src="<?php echo DIR_FOTOS_PROFESIONALES_CHICAS . $amigo->ruta_foto; ?>" />
	</div>
	<div class="pie-amigo-chico">
		<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
			<?php echo usuario::id2alias($este_amigo->am_id_amigo[$i]); ?>
		</p>
	</div>
</div>