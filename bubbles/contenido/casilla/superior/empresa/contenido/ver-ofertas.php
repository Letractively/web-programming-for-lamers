<?php
$error_publicar_aviso = '';
$oferta_laboral = new aviso();

if(isset($_GET['id_aviso_eliminar'])){
	$oferta_laboral->borrarAviso($_GET['id_aviso_eliminar']);
	echo $oferta_laboral->ultimo_error;
}

if(isset($_POST['oePublicar'])){
	if(($_POST['oeProfesionRequerida'] != '') && ($_POST['oeDetalle'] != '') && ($_POST['oePago'] != '')){
		$oferta_laboral->id_empresa = $visitado->id_empresa;
		$oferta_laboral->profesion_requerida = myquery::cambiaTaMysql($_POST['oeProfesionRequerida']);
		$oferta_laboral->modalidad = myquery::cambiaTaMysql($_POST['oeModalidad']);
		$oferta_laboral->pago = myquery::cambiaTaMysql($_POST['oePago']);
		$oferta_laboral->detalle = myquery::cambiaTaMysql($_POST['oeDetalle']);
		$oferta_laboral->nivel = myquery::cambiaTaMysql($_POST['oeNivel']);
		$oferta_laboral->capacidad = myquery::cambiaTaMysql($_POST['oeCapacidad']);
		$oferta_laboral->fecha_entrega = myquery::cambiaTaMysql($_POST['oeFechaEntrega']);
		$oferta_laboral->status = 'NO_ASIGNADO';
		$oferta_laboral->id_usuario_asignado = -1;
	
		$oferta_laboral->guardarAviso();
		echo $oferta_laboral->ultimo_error;
	}
	else{
		$error_publicar_aviso = 'CAMPOS_INCOMPLETOS';
	}
	
}
$oferta_laboral->traerAvisos($visitado->id_empresa);
echo $oferta_laboral->ultimo_error;
?>


<div class="contenido-laborales">
	<div class="cabecera-oferta">
	<h2>Mis Ofertas Laborales</h2>
	</div>
	<div class="ver-mis-ofertas">
	<?php
	if($error_publicar_aviso == 'CAMPOS_INCOMPLETOS'){
		include('contenido/casilla/superior/empresa/mensajes/oferta-subida-erronea.php');
	}
	$i = 0;
	while ($i < $oferta_laboral->ult_filas_afectadas) {
		include('contenido/casilla/superior/empresa/contenido/una-oferta-mia.php');
		$i++;
	}
	?>	
	</div>
	<div class="enviar-oferta">
		<a href="e-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&solapa_superior=laborales&botonera_superior=subir_oferta&contenido_superior=subir_oferta">
			<p class="parrafo7" style="margin-top: 7px; margin-left: 300px;">Publicar oferta laboral</p>
		</a>
	</div>
</div>