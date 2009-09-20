<?php if($visitante_es == 'no_identificado'){rebotar('no_identificado');} ?>

<?php
$error_insertando_amistad = '';
$esta_amistad = new amistad();

if(isset($_GET ['id_amigo_agregar'])){
	//Antes verifico si la amistad ya existe para este Profesional:
	$esta_amistad->verificarAmistadExistente($visitado->id_usuario, $_GET ['id_amigo_agregar']);
	//si existe NO LA agrego:
	$esta_amistad->ultimo_error;
	echo $esta_amistad->ult_filas_afectadas;
	if($esta_amistad->ult_filas_afectadas){
		$error_insertando_amistad = 'AMISTAD_EXISTENTE';
	}else{
		$esta_amistad->id_usuario = $visitado->id_usuario;
		$esta_amistad->id_amigo = $_GET ['id_amigo_agregar'];
		$esta_amistad->guardarAmistad();
		echo $esta_amistad->ultimo_error;
	
		// Levanto los datos básicos de la amistad agregada para saber a quien envio el mail:
		$esta_amistad_datos = new usuario($esta_amistad->id_amigo);

		// Avisar a "$esta_amistad" de que lo ha elegido como amigo la entidad "$_SESSION['id_usuario']", o bien "$visitado->id_usuario"....
		$codigohtml = $visitado->alias . ' te ha agregado como amigo:<br />';
		$codigohtml .= "<html><head><title></title></head><body><a href=\"" . SITIOS_PROFESIONAL . $visitado->alias . "\">Haz click aqui para ver su portfolio</a><br />";
		$codigohtml .= '</html></body>';
		$email = $esta_amistad_datos->email;
		$asunto = 'Tienes una nueva amistad!';
		$cabeceras = "From: bubblescomunidad@bubblescomunidad.com\r\nContent-type: text/html\r\n";
		mail($email,$asunto,$codigohtml,$cabeceras);
	}
}elseif(isset($_GET ['id_amigo_eliminar'])){
	$esta_amistad->borrarAmistad($_GET ['id_amigo_eliminar']);
}

$esta_amistad->traerAmistades($visitado->id_usuario);
echo $esta_amistad->ultimo_error;
?>

	<div class="col-comentarios-centro">
		<div class="col-comentarios-cabecera">
			<img class="icono" src="imagenes/icono-todos-amigos.png"/>
		</div>
		<!--<div class="col-busqueda-solapas">
			<div class="solapa3">
			<h2>Empresas</h2>
			</div>
			<div class="solapa2">
			<h2>Profesionales</h2>
			</div>
			<div class="solapa1">
			<h2>Laborales</h2>
			</div>
		</div>
		<div class="col-busqueda-form">
		<p>col-busqueda-form</p>
		</div>-->
		<div class="col-comentarios-contenido">
			<?php 
			if($error_insertando_amistad == 'AMISTAD_EXISTENTE'){
				echo '<p class="parrafo8" style="color: #ff0000;">El profesional que esta tratando de ingresar ya se encuentra en su lista de amigos!<p>';
			}
			?>
			<?php
			$i = 0;
			while($i < $esta_amistad->ult_filas_afectadas){
				include('contenido/casilla/central/profesional/contenido/un-amigo-mio.php');
				$i++;
			}
			?>
		</div>
		<div class="col-comentarios-pie">
		</div>		
		
	</div>