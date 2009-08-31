<div class="borde-comentario-chico">
	<div class="foto-comentario">
		<img src="<?php echo DIR_FOTOS_PROFESIONALES_CHICAS . $usuario_destacado->us_ruta_foto[$i]; ?>" />
	</div>
	<div class="descripcion-usuario">
	<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
		<?php echo $usuario_destacado->us_alias[$i]; ?>
	</p>
	<div style="clear: both;"></div>
	<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
		<?php echo myquery::cambiaTaNormal($usuario_destacado->us_nombres[$i]); ?>
	</p>
	<div style="clear: both;"></div>
	<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
		<?php echo $usuario_destacado->us_profesion_1[$i]; ?>
	</p>
	</div>
	<div class="pie-usuario">
	</div>
</div>