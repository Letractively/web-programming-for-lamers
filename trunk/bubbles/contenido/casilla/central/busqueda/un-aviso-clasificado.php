<?php
$este_aviso = new aviso();
$este_aviso->cargarUnAviso($esta_busqueda->bu_id_aviso[$i]);
echo $este_aviso->ultimo_error;
$empresa_propietaria = new empresa($este_aviso->id_empresa);
echo $empresa_propietaria->ultimo_error;
?>
	
	<div class="titulo-oferta-busqueda">
		<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;"><?php echo $este_aviso->profesion_requerida; ?></p>
		<p class="parrafo8" style="float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;"><?php echo myquery::cambiaFaNormal($este_aviso->fecha); ?></p>
	</div>
	<div class="borde-empresa-oferta-completa">
		<div class="foto-oferta-laboral">
		<img src="<?php echo DIR_FOTOS_EMPRESAS_CHICAS . $empresa_propietaria->ruta_foto; ?>">
		</div>
		<div class="descripcion-empresa">
		<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">Descripción de la actividad:</p>
			<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;"><?php echo $este_aviso->detalle; ?></p>
		<div style="clear: both">
		</div>
		<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">Inversión máxima:</p>
			<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;">$<?php echo $este_aviso->pago; ?> (pesos argentinos)</p>
		<div style="clear: both">
		</div>
		<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">Cualidades requeridas:</p>
			<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;"><?php echo $este_aviso->capacidad; ?></p>
		<div style="clear: both">
		</div>
		<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">Tipo de trabajo:</p>
			<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;"><?php echo $este_aviso->modalidad; ?></p>
		<div style="clear: both">
		</div>
		</div>
	</div>
	<div class="pie-oferta-busqueda">
	<a href="e-aviso.php?mostrar_aviso_id=<?php echo $este_aviso->id_aviso; ?>">
		<p class="parrafo8" style="color: #999999; float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;">Ver mas</p>
	</a>
	</div>