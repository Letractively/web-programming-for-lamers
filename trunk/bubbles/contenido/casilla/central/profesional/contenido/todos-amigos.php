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
	}
}elseif(isset($_GET ['id_amigo_eliminar'])){
	$esta_amistad->borrarAmistad($_GET ['id_amigo_eliminar']);
}

$esta_amistad->traerAmistades($visitado->id_usuario);
echo $esta_amistad->ultimo_error;
?>

	<div class="col-busqueda-centro">
		<div class="col-busqueda-cabecera">
			<img class="icono" src="imagenes/icono-busqueda-laboral.png"/>
		</div>
		<div class="col-busqueda-solapas">
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
		</div>
		<div class="col-busqueda-contenido">
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
		<div class="col-busqueda-pie">
		</div>		
		
	</div>