<?php if($visitante_es == 'no_identificado'){rebotar('no_identificado');} ?>

<?php
if($este_comentario->com_desde_entidad[$i] == 'EMPRESA'){
$comentador = new empresa($este_comentario->com_id_desde[$i]);
$dir_foto_comentador = DIR_FOTOS_EMPRESAS_CHICAS;
$sitio_comentador = SITIOS_EMPRESA . $comentador->alias_usuario;
$alias_comentador = empresa::id2aliasUsuario($este_comentario->com_id_desde[$i]);
}
elseif($este_comentario->com_desde_entidad[$i] == 'PROFESIONAL'){
$comentador = new usuario($este_comentario->com_id_desde[$i]);
$dir_foto_comentador = DIR_FOTOS_PROFESIONALES_CHICAS;
$sitio_comentador = SITIOS_PROFESIONAL . $comentador->alias;
$alias_comentador = usuario::id2alias($este_comentario->com_id_desde[$i]);
}
$comentador->traerRutaFoto($este_comentario->com_id_desde[$i]);
echo $comentador->ultimo_error;
?>

<div class="borde-comentario">
	<div class="foto-comentario">
		<a href="<?php echo $sitio_comentador; ?>">
			<img src="<?php echo $dir_foto_comentador . $comentador->ruta_foto; ?>" />
		</a>
	</div>
	<div class="titulo-comentario">
		<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
			Escrito por <?php echo $alias_comentador; ?>
		</p>
		<p class="parrafo8" style="float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;">
			<?php echo myquery::cambiaFaNormal($este_comentario->com_fecha[$i]); ?>
		</p>
	</div>
	<div class="descripcion-comentario">
	<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
		<?php echo myquery::cambiaTaNormal($este_comentario->com_detalle[$i]); ?>
	</p>
	</div>
	<div class="pie-comentario">
	</div>
</div>