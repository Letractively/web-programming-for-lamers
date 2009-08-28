<?php
$uri = $_SESSION['uri_rescatada'];
if(!isset($_SESSION['logeado'])) {
	session_unset();
	session_destroy();
	//if(!isset($_GET['entidad_visitada'])){		//SI la pagina actual permite VISITANTES, destruye la sesion anterior pero no va al index
		header('Location: ' . URL_BASE . 'error-login.php?error=debe_loguearse&uri_rescatada=' . urlencode($uri));	//Error1: No esta logueado, (Nombre o Alias incorrectos???)
		// urlencode codifica la url rescatada de forma que no se confunda con otros parámetros '&' de GET
	//}
	return 0;
}

if(isset($_SESSION['usuario'])){
	$desde_usuario = 'TRUE';
	$id_desde = $_SESSION['id_usuario'];
}
if(isset($_SESSION['empresa'])){
	$desde_usuario = 'FALSE';
	$id_desde = $_SESSION['id_empresa'];
}
?>