<?php
$este_usuario = new usuario($esta_busqueda->bu_id_usuario[$i]);
echo $este_usuario->ultimo_error;
?>
	
	<div class="titulo-oferta-busqueda">
		<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
			<?php echo $este_usuario->alias; ?> (<?php echo $este_usuario->nombres; ?> <?php echo $este_usuario->apellidos; ?>)
		</p>
		<p class="parrafo8" style="float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;">
			Miembro desde: <?php echo myquery::cambiaFaNormal($este_usuario->miembro_desde); ?>
		</p>
	</div>
	<div class="borde-empresa-oferta-completa">
		<div class="foto-oferta-laboral">
		<img src="<?php echo DIR_FOTOS_PROFESIONALES_CHICAS . $este_usuario->ruta_foto; ?>"
		</div>
		<div class="descripcion-empresa">
		<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;"><?php echo $este_usuario->profesion_1; ?></p>
		<div style="clear: both">
		</div>
		<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;">Nivel: <?php echo $este_usuario->nivel_profesion; ?></p>
		<div style="clear: both">
		</div>
		<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;"><?php echo $este_usuario->pais_residencia; ?></p>
		<div style="clear: both">
		</div>
		</div>
	</div>
	<div class="pie-oferta-busqueda">
	<a href="profesional/<?php echo $este_usuario->alias; ?>">
		<p class="parrafo8" style="color: #ff0000; float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;">VER PORTFOLIO</p>
	</a>
	</div>