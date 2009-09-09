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
if(!(isset($_GET['reg'])) && !(isset($_POST["paso1"])) && !(isset($_POST["paso2"]))){
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
	include('contenido/registrar-empresa.php');
	$_SESSION['captcha_guardado'] = $_SESSION['capcha'];
}

////////////////////////////////////////PASO 1
if(isset($_POST["paso1"])){
	//$tmp = unserialize($_POST["tmp"]);
	// El form fue procesado por js... pero me aseguro por PHP:
	if($_POST['feSeguridad'] != $_SESSION['captcha_guardado']){
		echo 'Sus datos estan incorrectos!; realice otra vez su trámite de registro!';
		include('footer.php');
		exit;
	}
	$_SESSION['feRazonSocial'] = myquery::cambiaTaMysql($_POST['feRazonSocial']);
	$_SESSION['feContraseniaUsuario'] = myquery::cambiaTaMysql($_POST['feContraseniaUsuario']);
	$_SESSION['fePreguntaSecretaUsuario'] = myquery::cambiaTaMysql($_POST['fePreguntaSecretaUsuario']);
	$_SESSION['feRespuestaSecretaUsuario'] = myquery::cambiaTaMysql($_POST['feRespuestaSecretaUsuario']);
	$_SESSION['feEmailUsuario'] = myquery::cambiaTaMysql($_POST['feEmailUsuario']);
	$_SESSION['feAliasUsuario'] = myquery::cambiaTaMysql($_POST['feAliasUsuario']);
	$_SESSION['feCalle'] = myquery::cambiaTaMysql($_POST['feCalle']);
	$_SESSION['feAltura'] = $_POST['feAltura'];
	$_SESSION['fePiso'] = $_POST['fePiso'];								//POST opcional!
	$_SESSION['feOficina'] = $_POST['feOficina'];						//POST opcional!
	$_SESSION['feNacimientoUsuario'] = cambiaf_a_mysql($_POST['feNacimientoUsuario']);
	$_SESSION['feSexoUsuario'] = $_POST['feSexoUsuario'];
	$_SESSION['fePais'] = myquery::cambiaTaMysql($_POST['fePais']);
	$_SESSION['feCiudad'] = myquery::cambiaTaMysql($_POST['feCiudad']);
	$_SESSION['fePuestoUsuario'] = myquery::cambiaTaMysql($_POST['fePuestoUsuario']);
	$_SESSION['fePrefijoUsuario'] = $_POST['fePrefijoUsuario'];
	$_SESSION['feTelUsuario'] = $_POST['feTelUsuario'];
	$_SESSION['feRutaFoto'] = 'default.jpg';//$_POST['feRutaFoto'];
	if (isset($_POST['feDeseaNews'])){
		$_SESSION['feDeseaNews'] = 1;
	} 
	else{
		$_SESSION['feDeseaNews'] = 0;
	}
	if (isset($_POST['feDeseaLaborales'])){
		$_SESSION['feDeseaLaborales'] = 1;
	} 
	else{
		$_SESSION['feDeseaLaborales'] = 0;
	}
	if (isset($_POST['feDeseaProfesionales'])){
		$_SESSION['feDeseaProfesionales'] = 1;
	} 
	else{
		$_SESSION['feDeseaProfesionales'] = 0;
	}
	$_SESSION['feStatus'] = 'NO_CONFIRMADO';//$_POST['feStatus'];	
	
	$resultadoQuery = empresa::nuevaEmpresa($_SESSION['feRazonSocial'],
											$_SESSION['feContraseniaUsuario'],
											$_SESSION['fePreguntaSecretaUsuario'],
											$_SESSION['feRespuestaSecretaUsuario'],
											$_SESSION['feEmailUsuario'],
											$_SESSION['feAliasUsuario'],
											$_SESSION['feCalle'],
											$_SESSION['feAltura'],
											$_SESSION['fePiso'],
											$_SESSION['feOficina'],
											$_SESSION['feNacimientoUsuario'],
											$_SESSION['feSexoUsuario'],
											$_SESSION['fePais'],
											$_SESSION['feCiudad'],
											$_SESSION['fePuestoUsuario'],
											$_SESSION['fePrefijoUsuario'],
											$_SESSION['feTelUsuario'],
											$_SESSION['feRutaFoto'],
											$_SESSION['feDeseaNews'],
											$_SESSION['feDeseaLaborales'],
											$_SESSION['feDeseaProfesionales'],
											$_SESSION['feStatus']);

	echo 'El resultado del ingreso de su Empresa es: ' . $resultadoQuery;
	if($resultadoQuery > 0){
		$nuevoReg = new empresa($resultadoQuery);
		include('contenido/registrar-verificar-empresa.php');	// Verificacion a Mail -->
	}
	else{
		include('contenido/registrar-error.php');
	}
}

////////////////////////////////////////VERIFICACION DE BIENVENIDA//Verificacion desde mail <----
if((isset($_GET['reg'])) && (isset($_GET['id']))){
	// Crear un objeto usuario con el id pasado:
	$confirmaReg = new empresa($_GET['id']);
	// Confirmo que exista ese usuario:
	if($confirmaReg->ultimo_error !=''){
		echo $confirmaReg->ultimo_error;
		include('footer.php');
		exit;
	}
	// si el 'reg' pasado por GET no condice con el id, avisar al usuario la incoherencia.
	if($confirmaReg->contrasenia_usuario != $_GET['reg']){
		echo 'Su código de confirmacion es inválido';
		include('footer.php');
		exit;
	}
	//si status != NO_CONFIRMADO, avisar al usuario que ya esta confirmado y se loguee.
	if($confirmaReg->status != 'NO_CONFIRMADO'){
		echo 'Su usuario ya está confirmado, por favor logeese';
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
	include('contenido/registrar-bienvenido-empresa.php');		//-->Link al perfil de la empresa.
}
?>
</div>

<div class="col-derecha" >
	<img src="imagenes/relleno1.jpg" />
</div>
	
<?php include('footer.php'); ?>