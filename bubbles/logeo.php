<?php
include("includes/config.inc.php");
include("includes/funciones.inc.php");
require("includes/conectar_db.php");

//Pasar por SESSION las variables del id de la empresa o usuario y crear checkLogeo...
if(isset($_POST['usuario'])){
	if(($id_usuario = ckeckLogeo( USUARIOS, $_POST['fAlias'], $_POST['fContrasenia'])) > -1 ) {
		session_start();
		$uri = $_SESSION['uri_rescatada'];
		destruir_sesion_logeado();
		session_start();
		//session_register('logeado');	//Obsoleta
		$_SESSION['hora'] = time();
		$_SESSION['logeado'] = 1;
		$_SESSION['usuario'] = 1;
		//$_SESSION['empresa'] = 0;
		$_SESSION['id_usuario'] = $id_usuario;
		//echo 'Ud se logueo como usuario <br />';
		header('Location:' . $uri);
		exit;
	}
	else{
		header("Location: error-login.php?entidad=profesional&error=ingresos_incorrectos");
		exit;
	}
}

if(isset($_POST['empresa'])){
	if(($id_empresa = ckeckLogeo( EMPRESAS, $_POST['fAlias'], $_POST['fContrasenia'])) > -1 ) {
		session_start();
		$uri = $_SESSION['uri_rescatada'];
		destruir_sesion_logeado();
		session_start();
		//session_register('logeado');	//Obsoleta
		$_SESSION['hora'] = time();
		$_SESSION['logeado'] = 1;
		$_SESSION['empresa'] = 1;
		//$_SESSION['usuario'] = 0;
		$_SESSION['id_empresa'] = $id_empresa;
		//echo 'Ud se logueo como empresa <br />';
		header('Location:' . $uri);
		exit;
	}
	else{
		header("Location: error-login.php?entidad=empresa&error=ingresos_incorrectos");
		exit;
	}
}
?>