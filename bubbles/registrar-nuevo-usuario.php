<?php include('header.php'); ?>

<div class="col-izquierda">
	<?php include('contenido/form-login-usuario.php'); ?>
	<?php include('contenido/form-login-empresa.php'); ?>
</div>

<div class="col-central">
<?php

// Los primeros BUCLES (IF) analizan los POST , para saber A QUE PAGINA VAMOS.
// Los segundos BUCLES (IF) analizan los pasos en los $_SESSION[] , para saber EN QUE PAGINA ESTAMOS.

////////////////////////////////////////PASO 0
if(!(isset($_GET['reg'])) && !(isset($_POST["paso1"])) && !(isset($_POST["paso2"])) && !(isset($_POST["paso3"])) && !(isset($_POST["paso4"]))){
	//DEL INDEX llegaran los primeros datos para el form. Los siguientes pasos cotejaran, pues, los "values" iniciales correspondientes:
	//Setear las variables conocidas a '', pues el HTML las requerirá de todas formas:
	$fiAlias = '';
	$fiContrasenia = '';
	$fiEmail = '';
	if(isset($_POST['fiAlias'])){
		$fiAlias = $_POST['fiAlias'];
	}
	if(isset($_POST['fiContrasenia'])){
		$fiContrasenia = $_POST['fiContrasenia'];
	}
	if(isset($_POST['fiEmail'])){
		$fiEmail = $_POST['fiEmail'];
	}
	include('contenido/registrar-usuario.php');
	// Guardo el capcha para cotejarlo antes de inscribir, por si el Cliente no me tomo el JavaScript:
	$_SESSION['captcha_guardado'] = $_SESSION['capcha'];
}

////////////////////////////////////////PASO 1
if(isset($_POST["paso1"])){
	if(!isset($_SESSION['paso2'])){	//No POSTEAMOS al paso2, CREAMOS las variables de SESION
	
	}
	//$tmp = unserialize($_POST["tmp"]);
	// El form fue procesado por js
	// De todas formas cotejamos tres variable esceciales de registro...
	if(($_POST['fuSeguridad'] != $_SESSION['captcha_guardado'])
		||(!es_cadena_permitida( $_POST['fuAlias']))
		||(!es_cadena_permitida( $_POST['fuContrasenia'] ))
		){
		echo 'Sus datos estan incorrectos!; realice otra vez su trámite de registro!';
		include('footer.php');
		exit;
	}
	$_SESSION['fuAlias'] = myquery::cambiaTaMysql($_POST['fuAlias']);
	$_SESSION['fuContrasenia'] = $_POST['fuContrasenia'];
	$_SESSION['fuEmail'] = myquery::cambiaTaMysql($_POST['fuEmail']);
	$_SESSION['fuNacimiento'] = myquery::cambiaFaMysql($_POST['fuNacimiento']);
	$_SESSION['fuPreguntaSecreta'] = myquery::cambiaTaMysql($_POST['fuPreguntaSecreta']);
	$_SESSION['fuRespuestaSecreta'] = myquery::cambiaTaMysql($_POST['fuRespuestaSecreta']);
	$_SESSION['fuNombres'] = myquery::cambiaTaMysql($_POST['fuNombres']);
	$_SESSION['fuApellidos'] = myquery::cambiaTaMysql($_POST['fuApellidos']);
	$_SESSION['fuEmpresa'] = myquery::cambiaTaMysql($_POST['fuEmpresa']);
	$_SESSION['fuSexo'] = $_POST['fuSexo'];
	$_SESSION['fuPaisResidencia'] = myquery::cambiaTaMysql($_POST['fuPaisResidencia']);
	$_SESSION['fuProfesion1'] = $_POST['fuProfesion1'];
	$_SESSION['fuProfesion2'] = $_POST['fuProfesion2'];
	$_SESSION['fuProfesion3'] = $_POST['fuProfesion3'];
	$_SESSION['fuNivelProfesion'] = $_POST['fuNivelProfesion'];
	$_SESSION['fuRutaFoto'] = 'default.jpg';
	if (isset($_POST['fuDeseaNews'])){
		$_SESSION['fuDeseaNews'] = 1;
	} 
	else{
		$_SESSION['fuDeseaNews'] = 0;
	}
	if (isset($_POST['fuDeseaLaborales'])){
		$_SESSION['fuDeseaLaborales'] = 1;
	} 
	else{
		$_SESSION['fuDeseaLaborales'] = 0;
	}
	if (isset($_POST['fuDeseaProfesionales'])){
		$_SESSION['fuDeseaProfesionales'] = 1;
	}
	else{
		$_SESSION['fuDeseaProfesionales'] = 0;
	}
	
	$resultadoQuery = usuario::nuevoUsuario($_SESSION['fuAlias'],
												$_SESSION['fuContrasenia'],
												$_SESSION['fuEmail'],
												$_SESSION['fuNacimiento'],
												$_SESSION['fuRutaFoto'],
												$_SESSION['fuPreguntaSecreta'],
												$_SESSION['fuRespuestaSecreta'],
												$_SESSION['fuNombres'],
												$_SESSION['fuApellidos'],
												$_SESSION['fuEmpresa'],
												$_SESSION['fuSexo'],
												$_SESSION['fuPaisResidencia'],
												$_SESSION['fuProfesion1'],
												$_SESSION['fuProfesion2'],
												$_SESSION['fuProfesion3'],
												$_SESSION['fuNivelProfesion'],
												$_SESSION['fuDeseaNews'],
												$_SESSION['fuDeseaLaborales'],
												$_SESSION['fuDeseaProfesionales'],
												'NO_CONFIRMADO');
												
	//echo 'El resultado del ingreso del usuario es: ' . $resultadoQuery;
	if($resultadoQuery > 0){
		$nuevoReg = new usuario($resultadoQuery);
		include('contenido/registrar-verificar-usuario.php');	// Verificacion a Mail -->
	}
	else{
		include('contenido/registrar-error.php');
	}
}

////////////////////////////////////////VERIFICACION DE BIENVENIDA//Verificacion desde mail <----
if((isset($_GET['reg'])) && (isset($_GET['id']))){
	// Crear un objeto usuario con el id pasado:
	$confirmaReg = new usuario($_GET['id']);
	// Confirmo que exista ese usuario:
	if($confirmaReg->ultimo_error !=''){
		echo $confirmaReg->ultimo_error;
		echo '</div>';						// Cierro la columna  del medio!
		include('footer.php');
		exit;
	}
	// si el 'reg' pasado por GET no condice con el id, avisar al usuario la incoherencia.
	if($confirmaReg->contrasenia != $_GET['reg']){
		echo 'Su código de confirmacion es inválido';
		echo '</div>';
		include('footer.php');
		exit;
	}
	//si status != NO_CONFIRMADO, avisar al usuario que ya esta confirmado y se loguee.
	if($confirmaReg->status != 'NO_CONFIRMADO'){
		include('contenido/registrar-ya-confirmado.php');		//echo 'Su usuario ya está confirmado, por favor logeese';
		echo '</div>';
		include('footer.php');
		exit;
	}
	// Ya verificamos si el 'id', el 'reg' pasados por GET, y el status = NO_CONFIRMADO se condicen...
	// Si es asi, poner status = 'NO_ESPECIFICADO' e incluir el bienvenido...
	$confirmaReg->status('NO_ESPECIFICADO');
	// Parseo si hay error en la operación....
	if($confirmaReg->ultimo_error !=''){
		echo $confirmaReg->ultimo_error;
		include('footer.php');
		exit;
	}
	include('contenido/registrar-bienvenido-usuario.php');		//----> Link al cv paso1...
}


////////////////////////////////////////PASO 2
//if(isset($_POST["paso2"])){
//	$_SESSION["fCv"] = $_POST["fCv"];
//	include('contenido/registrar-cv-1.php');	//Laboral
	// El form fue procesado por js
//}

////////////////////////////////////////PASO 3
//if(isset($_POST["paso3"])){
//	include('contenido/registrar-cv-2.php');	//Nivel de estudio
//	}

////////////////////////////////////////PASO 4
//if(isset($_POST["paso4"])){
//	include('contenido/registrar-bienvenido.php');
//	// El form fue procesado por js
//	$_SESSION["fDetalle"] = $_POST["fDetalle"];
	
//	echo '<p>implementacion de la clase usuario->nuevoUsuario</p>';
//	echo '<p>Resultado desde la clase: ' . $resultadoQuery . '</p>';
//}
?>
</div>

<div class="col-derecha" >
	<a href="mailto:info@bubblescomunidad.com">
		<img src="imagenes/relleno1.jpg" />
	</a>
</div>

<?php include('footer.php'); ?>