<?php
$uri = $_SESSION['uri_rescatada'];
if(!isset($_SESSION['logeado'])) {
	session_unset();
	session_destroy();
	//if(!isset($_GET['entidad_visitada'])){		//SI la pagina actual permite VISITANTES, destruye la sesion anterior pero no va al index
		header('Location: ' . $uri);				 //Error1: Nombre o Alias incorrectos
	//}
	return 0;
}
if (($_SESSION['hora']+1000) < time()){
	session_unset();
	session_destroy();
	//if(!isset($_GET['entidad_visitada'])){		//SI la pagina actual permite VISITANTES, destruye la sesion anterior pero no va al index
	header('Location: ' . $uri);					 //Error2: 'timeout' de 20 minutos superado
	//}
	return 0;
}
// Filtros de sesion superados....

// Le damos un tiempo a la entidad para que se quede en el sitio sin actividad:
$_SESSION['hora']=time();

if(isset($_SESSION['usuario'])){
	$desde_usuario = 'TRUE';
	$id_desde = $_SESSION['id_usuario'];
}
if(isset($_SESSION['empresa'])){
	$desde_usuario = 'FALSE';
	$id_desde = $_SESSION['id_empresa'];
}
?>