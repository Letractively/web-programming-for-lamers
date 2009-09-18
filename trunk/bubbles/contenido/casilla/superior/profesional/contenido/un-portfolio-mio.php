<?php

?>

<div class="un-portfolio-mio">
	<div class="imagen-portfolio">
		<a class="muestra" rel="group" title="<?php echo myquery::cambiaTaNormal($mi_portfolio->mu_comentario[$i]); ?>" href="<?php echo DIR_PORTFOLIOS_PROFESIONALES . $mi_portfolio->mu_ruta_imagen[$i] . '?' . rand();?>">
			<img src="<?php echo DIR_PORTFOLIOS_PROFESIONALES_CHICOS . $mi_portfolio->mu_ruta_imagen[$i] . '?' . rand();?>" />
		</a>
	</div>
	<div class="pie-portfolio">
		<p style="font-size:7px; margin-bottom:0; margin-top:0;"><?php echo myquery::cambiaTaNormal($mi_portfolio->mu_titulo[$i]); ?></p>
		<p style="float:left; font-size:7px; margin-bottom:0; margin-top:0;"><?php echo myquery::cambiaFaNormal($mi_portfolio->mu_fecha[$i]); ?></p>
		<p class="parrafo4" style="float:right; font-size:7px; margin-bottom:0; margin-top:0;">
			<a class="parrafo4" style="font-size:7px;" href="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada']; ?>&solapa_superior=portfolio&botonera_superior=ver_portfolio&contenido_superior=ver_portfolio&eliminar_muestra_id=<?php echo $mi_portfolio->mu_id_muestra[$i] ?>">
			Eliminar
			</a>
		</p>
	</div>
</div>