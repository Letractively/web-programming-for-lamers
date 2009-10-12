<?php 
$postulado = new usuario($postulados->pos_id_usuario[$i]);
echo $postulado->ultimo_error;
?>

<div class="borde-comentario">
	<div class="foto-comentario">
		<a href="profesional/<?php echo $postulado->alias ?>">
			<img src="<?php echo DIR_FOTOS_PROFESIONALES_CHICAS . $postulado->ruta_foto; ?>" />
		</a>
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
	<?php
	if($visitante_es == 'empresa_administrador' && $aviso_visitado->status == 'NO_ASIGNADO'){
		echo '<a href="e-aviso.php?mostrar_aviso_id=' . $aviso_visitado->id_aviso . '&id_usuario_contratar=' . $postulado->id_usuario . '">';
		echo '<p class="parrafo8" style="color: #ff0000; float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;">' . 'CONTRATAR' . '</p>';
		echo '</a>';
	}
	?>
	</div>
	<div class="pie-comentario">
	</div>
</div>