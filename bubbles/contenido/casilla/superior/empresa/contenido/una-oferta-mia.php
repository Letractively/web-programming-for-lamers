	<div class="titulo-mi-oferta">
		<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;"><?php echo $oferta_laboral->av_profesion_requerida[$i]; ?></p>
		<p class="parrafo8" style="float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;"><?php echo myquery::cambiaFaNormal($oferta_laboral->av_fecha[$i]); ?></p>
	</div>
	<div class="descripcion-mi-oferta">
	<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">Descripción de la actividad:</p>
		<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;"><?php echo $oferta_laboral->av_detalle[$i] ?></p>
	<div style="clear: both">
	</div>
	<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">Inversión máxima:</p>
		<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;">$<?php echo $oferta_laboral->av_pago[$i] ?> (pesos argentinos)</p>
	<div style="clear: both">
	</div>
	<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">Cualidades requeridas:</p>
		<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;"><?php echo $oferta_laboral->av_capacidad[$i] ?></p>
	<div style="clear: both">
	</div>
	<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">Tipo de trabajo:</p>
		<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;"><?php echo $oferta_laboral->av_modalidad[$i] ?></p>
	<div style="clear: both">
	</div>
	<a href="e-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada']; ?>&solapa_superior=ver_mis_ofertas&botonera_superior=ver_mis_ofertas&contenido_superior=ver_mis_ofertas&id_aviso_eliminar=<?php echo$oferta_laboral->av_id_aviso[$i]; ?>">
		<p class="parrafo8" style="color: #ff0000; float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;">ELIMINAR</p>
	</a>
	</div>