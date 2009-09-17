<?php
include("includes/config.inc.php");
include("includes/funciones.inc.php");
require("includes/conectar_db.php");

//Pasar por SESSION las variables del id de la empresa o usuario y crear checkLogeo...
if(isset($_POST['usuario'])){
	if(($id_usuario = ckeckLogeo( USUARIOS, $_POST['fAlias'], $_POST['fContrasenia'])) > -1 ) {
		session_start();
		
		//echo 'rescatada: ' . $_SESSION['uri_rescatada'] . '</br>';
		
		//print_r($_SESSION) . '</br>';
		
		if(isset($_SESSION['uri_rescatada'])){
			$uri = $_SESSION['uri_rescatada'];
		}else{
			$uri = URL_BASE;
		}
		//destruir_sesion_logeado();
		
		$_SESSION = array();
		session_unset();
		session_destroy();
		
		session_start();
		//session_register('logeado');	//Obsoleta
		$_SESSION['hora'] = time();
		$_SESSION['logeado'] = 1;
		$_SESSION['usuario'] = 1;
		//$_SESSION['empresa'] = 0;
		$_SESSION['id_usuario'] = $id_usuario;
		//echo 'Ud se logueo como usuario <br />';
		
		//echo '--' . $uri;
		
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
		if(isset($_SESSION['uri_rescatada'])){
			$uri = $_SESSION['uri_rescatada'];
		}else{
			$uri = URL_BASE;
		}
		//destruir_sesion_logeado();
		
		$_SESSION = array();
		session_unset();
		session_destroy();
		
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