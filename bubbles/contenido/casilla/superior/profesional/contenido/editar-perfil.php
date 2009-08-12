<?php
////////////////////////////////////////PASO 1
if(isset($_POST['euSalvar'])){
	//$tmp = unserialize($_POST["tmp"]);
	// El form fue procesado por js. Que Dios nos ayude...
	$visitado->email = myquery::cambiaTaMysql($_POST['euEmail']);
	$visitado->nacimiento = myquery::cambiaFaMysql($_POST['euNacimiento']);
	$visitado->nombres = myquery::cambiaTaMysql($_POST['euNombres']);
	$visitado->apellidos = myquery::cambiaTaMysql($_POST['euApellidos']);
	$visitado->empresa = myquery::cambiaTaMysql($_POST['euEmpresa']);
	$visitado->sexo = $_POST['euSexo'];
	$visitado->pais_residencia = myquery::cambiaTaMysql($_POST['euPaisResidencia']);
	$visitado->profesion_1 = $_POST['euProfesion1'];
	$visitado->profesion_2 = $_POST['euProfesion2'];
	$visitado->profesion_3 = $_POST['euProfesion3'];
	$visitado->nivel_profesion = $_POST['euNivelProfesion'];
	
	$resultadoQuery = $visitado->guardarDatosPerfil();												

	if(!($resultadoQuery > 0)){
		$actualizar_datos = 'error';
		echo $visitado->ultimo_error;
	}
	else{
		$actualizar_datos = 'ok';
	}
}

$visitado->cargarDatosPerfil();
?>


<div class="contenido-editar-perfil" >
	<form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post" class="registro" id="registrarForm">
		<div class="salvar-perfil">
			<h2>Mi Perfil</h2>
			<input type="hidden" name="euSalvar" value="euSalvar" />
			<input type="submit" name="Guardar" value="Guardar" class="boton3"/>
		</div>
		<div class="form-editar-perfil">
		<table class="tabla1">
		<tr>
			<td colspan=4><p class="parrafo5"><strong>DATOS PERSONALES:</strong></p></td>
		</tr>
		<tr>
			<td><p>Nombre</p></td>
			<td><p>Apellido</p></td>
			<td><p>Fecha de Nac.</p></td>
			<td style="width: 60px;"></td>
		</tr>
		<tr>
			<td><input type="text" name="euNombres" id="euNombres" class="euNombres" value="<?php echo $visitado->nombres;?>"/></td>
			<td><input type="text" name="euApellidos" id="euApellidos" class="euApellidos" value="<?php echo $visitado->apellidos;?>"/></td>
			<td><input type="text" name="euNacimiento" id="euNacimiento" class="euNacimiento" value="<?php echo myquery::cambiaFaNormal($visitado->nacimiento);?>"/></td>
			<td style="width: 60px;"></td>
		</tr>
		</table>
		<table class="tabla2">
		<tr>
			<td colspan=4><p class="parrafo5"><strong>DATOS DE CONTACTO:</strong></p></td>
		</tr>
		<tr>
			<td><p>Email</p></td>
			<td><p>Sexo</p></td>
			<td><p>Pais</p></td>
			<td style="width: 60px;"></td>
		</tr>
		<tr>
			<td><input type="text" name="euEmail" id="euEmail" class="euEmail" value="<?php echo $visitado->email;?>"/></td>
			<td><select name="euSexo" id="euSexo" >
						<?php listar_options($OPCIONES_SEXO, $visitado->sexo);?>
						</select></td>
			<td><input type="text" name="euPaisResidencia" id="euPaisResidencia" class="euPaisResidencia" value="<?php echo $visitado->pais_residencia;?>"/></td>
			<td style="width: 60px;"></td>
		</tr>
		<tr>
			<td><p>Empresa: <input type="text" name="euEmpresa" id="euEmpresa" class="euEmpresa" value="<?php echo $visitado->empresa;?>"/></p></td>
			<td><p></p></td>
			<td><p></p></td>
			<td style="width: 60px;"></td>
		</tr>
		</table>
		<table class="tabla3">
		<tr>
			<td colspan=4><p class="parrafo5"><strong>DATOS PROFESIONALES:</strong></p></td>
		</tr>
		<tr>
			<td><p>Profesion 1</p></td>
			<td><p>Profesion 2</p></td>
			<td><p>Profesion 3</p></td>
			<td style="width: 60px;"></td>
		</tr>
		<tr>
			<td><select name="euProfesion1" id="euProfesion1" class="euProfesion">
						<?php listar_options($OPCIONES_PROFESIONES, $visitado->profesion_1);?>
						</select></td>
			<td><select name="euProfesion2" id="euProfesion2" class="euProfesion">
						<?php listar_options($OPCIONES_PROFESIONES, $visitado->profesion_2);?>
						</select></td>
			<td><select name="euProfesion3" id="euProfesion3" class="euProfesion">
						<?php listar_options($OPCIONES_PROFESIONES, $visitado->profesion_3);?>
						</select></td>
			<td style="width: 60px;"></td>
		</tr>
		<tr>
			<td><p>Nivel: <select name="euNivelProfesion" id="euNivelProfesion" class="euNivelProfesion">
						<?php listar_options($OPCIONES_NIVEL_PROFESION, $visitado->nivel_profesion);?>
						</select></p></td>
			<td><p></p></td>
			<td><p></p></td>
			<td style="width: 60px;"></td>
		</tr>
		</table>
		</div>
	</form>
</div>