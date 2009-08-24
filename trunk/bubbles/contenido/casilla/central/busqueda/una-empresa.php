<?php
$esta_empresa = new empresa($esta_busqueda->bu_id_empresa[$i]);
echo $esta_empresa->ultimo_error;
?>
	
	<div class="titulo-oferta-busqueda">
		<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
			<?php echo $esta_empresa->alias_usuario; ?>, de <?php echo $esta_empresa->razon_social; ?>
		</p>
		<p class="parrafo8" style="float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;">
			Miembro desde: <?php echo myquery::cambiaFaNormal($esta_empresa->miembro_desde_usuario); ?>
		</p>
	</div>
	<div class="borde-empresa-oferta-completa">
		<div class="foto-oferta-laboral">
		<img src="<?php echo DIR_FOTOS_EMPRESAS_CHICAS . $esta_empresa->ruta_foto; ?>"
		</div>
		<div class="descripcion-empresa">
		<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;">Pais: <?php echo $esta_empresa->pais; ?></p>
		<div style="clear: both">
		</div>
		<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;">Ciudad: <?php echo $esta_empresa->ciudad; ?></p>
		<div style="clear: both">
		</div>
		</div>
	</div>
	<div class="pie-oferta-busqueda">
	<a href="empresa/<?php echo $esta_empresa->alias_usuario; ?>">
		<p class="parrafo8" style="color: #ff0000; float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;">VISITAR SITIO</p>
	</a>
	</div>