<?php
$este_aviso = new aviso();
$este_aviso->cargarUnAviso($postulacion->pos_id_aviso[$i]);
?>

	<div class="titulo-mi-oferta">
		<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;"><?php echo $este_aviso->profesion_requerida; ?></p>
		<p class="parrafo8" style="float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;"><?php echo myquery::cambiaFaNormal($este_aviso->fecha); ?></p>
	</div>
	<div class="descripcion-mi-oferta">
	<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">Descripción de la actividad:</p>
		<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;"><?php echo myquery::cambiaTaNormal($este_aviso->detalle); ?></p>
	<div style="clear: both">
	</div>
	<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">Inversión máxima:</p>
		<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;">$<?php echo $este_aviso->pago; ?> (pesos argentinos)</p>
	<div style="clear: both">
	</div>
	<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">Cualidades requeridas:</p>
		<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;"><?php echo myquery::cambiaTaNormal($este_aviso->capacidad); ?></p>
	<div style="clear: both">
	</div>
	<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">Tipo de trabajo:</p>
		<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;"><?php echo $este_aviso->modalidad; ?></p>
	<div style="clear: both">
	</div>
	<a href="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada']; ?>&solapa_superior=ninguna_activa&botonera_superior=sin_botonera&contenido_superior=mis_postulaciones&id_desvincularme_aviso=<?php echo $postulacion->pos_id_postulacion[$i]; ?>">
		<p class="parrafo8" style="color: #ff0000; float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;">ELIMINAR POSTULACIÓN</p>
	</a>
	</div>