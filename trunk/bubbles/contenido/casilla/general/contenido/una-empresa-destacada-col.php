<div class="borde-comentario-chico">
	<div class="foto-comentario">
		<a href="empresa/<?php echo $empresa_destacada->em_alias_usuario[$i]; ?>">
			<img src="<?php echo DIR_FOTOS_EMPRESAS_CHICAS . $empresa_destacada->em_ruta_foto[$i]; ?>" />
		</a>
	</div>
	<div class="descripcion-empresa">
	<p class="parrafo3" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
		Contacto: <?php echo $empresa_destacada->em_alias_usuario[$i]; ?>
	</p>
	<div style="clear: both;"></div>
	<p class="parrafo3" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
		EMPRESA:
	</p>
	<div style="clear: both;"></div>
	<p class="parrafo3" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
		<?php echo $empresa_destacada->em_razon_social[$i]; ?>
	</p>
	</div>
	<div class="pie-empresa">
	</div>
</div>