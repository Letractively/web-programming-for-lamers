<?php
if($visitante_es != 'usuario_administrador'){rebotar('no_administrador');}
$error_postulando = '';
$postulacion = new postulacion();

if(isset($_GET['id_postularme_aviso'])){
	//Antes verifico si la postulación ya existe para este Profesional:
	$postulacion->verificarPostulacionExistente($visitado->id_usuario, $_GET['id_postularme_aviso']);
	//si existe NO LA agrego:
	$postulacion->ultimo_error;
	if($postulacion->ult_filas_afectadas){
		$error_postulando = 'POSTULACION_EXISTENTE';
	}else{
	$postulacion->id_aviso = $_GET['id_postularme_aviso'];
	$postulacion->id_usuario = $_SESSION['id_usuario'];
	$postulacion->guardarPostulacion();
	echo $postulacion->ultimo_error;
	}
}

if(isset($_GET['id_desvincularme_aviso'])){
	$postulacion->borrarPostulacion($_GET['id_desvincularme_aviso']);
	echo $postulacion->ultimo_error;
}

$postulacion->traerPostulacionesUsuario($visitado->id_usuario);
echo $postulacion->ultimo_error;
?>


<div class="contenido-laborales">
	<div class="cabecera-oferta">
	<h2>Mis Postulaciones</h2>
	</div>
	<div class="ver-mis-ofertas">
	<?php
	if($error_postulando == 'POSTULACION_EXISTENTE'){
		echo '<p style="color: #ff0000;" class="parrafo8">Ud. ya se ha postulado para este trabajo!</p>';
	}
	$i = 0;
	while ($i < $postulacion->ult_filas_afectadas) {
		include('contenido/casilla/superior/profesional/contenido/una-postulacion-mia.php');
		$i++;
	}
	?>	
	</div>
	<div class="cabecera-oferta">
		<!--<a href="e-galeria.php?entidad_visitada=<?php //echo $_GET['entidad_visitada'] ?>&solapa_superior=laborales&botonera_superior=subir_oferta&contenido_superior=subir_oferta">
			<p class="parrafo7" style="margin-top: 7px; margin-left: 300px;">Publicar oferta laboral</p>
		</a>-->
	</div>
</div>