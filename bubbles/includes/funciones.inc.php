<?php
define('EMPRESAS', 100);
define('USUARIOS', 101);


////////////////////////////////////////////////////
//Chekea el logueo ingresado en un FORM de LOGIN
////////////////////////////////////////////////////
function ckeckLogeo($tipoEntidad, $aliasEntidad, $contrasenia){
	if( $tipoEntidad == EMPRESAS){
		$sql = "SELECT id_empresa, contrasenia_usuario, status FROM empresas WHERE alias_usuario = '$aliasEntidad'";
		$result = mysql_query($sql);
		if(!(mysql_error() == '')){
			//echo 'cago -1';
			echo mysql_error();
			return  -1;
		}
		$numFilas = mysql_num_rows($result);
		if($numFilas != 1){	//Coteja SI y solo SI existe el usuario 'alias'
			//echo 'cago -2';
			return -2;
		}
		$fila = mysql_fetch_array($result, MYSQL_ASSOC);
		$contrasenia = md5($contrasenia);
		if(($fila['contrasenia_usuario'] != $contrasenia) || ($fila['status'] == 'NO_CONFIRMADO')){	//Compara la contrasenia dada 
			//echo 'cago -3';																			//con la del "row" extraido y
			return -3;																				// que el status no sea NO_CONFIRMADO
		}
	return $fila['id_empresa'];
	}
	if($tipoEntidad == USUARIOS){
		$sql = "SELECT id_usuario, contrasenia, status FROM usuarios WHERE alias = '$aliasEntidad'";
		$result = mysql_query($sql);
		if(!(mysql_error() == '')){
			//echo 'cago -1';
			echo mysql_error();
			return  -1;
		}
		$numFilas = mysql_num_rows($result);
		if($numFilas != 1){	//Coteja SI y solo SI existe el usuario 'alias'
			//echo 'cago -2';
			return -2;
		}
		$fila = mysql_fetch_array($result, MYSQL_ASSOC);
		$contrasenia = md5($contrasenia);
		if(($fila['contrasenia'] != $contrasenia) || ($fila['status'] == 'NO_CONFIRMADO')){	//Compara la contrasenia dada
			//echo 'cago -3';																//con la del "row" extraido y
			return -3;																		// que el status no sea NO_CONFIRMADO
		}
	return $fila['id_usuario'];
	}
}
	
function listarEntidades ( $tipoEntidad, $cantidad = 30){
	if($tipoEntidad == USUARIOS){
		$sql = "SELECT id_usuario, nombre ,apellido FROM usuarios ORDER BY apellido LIMIT 0, "."$cantidad";
		$result = mysql_query($sql);
		echo mysql_error();
		while ($fila = mysql_fetch_assoc($result, MYSQL_ASSOC)) {
			echo "<a href=usuario.php?id_usuario=" . $fila['id_usuario'] . "> ";
			echo $fila['nombre'] . " ";
			echo $fila['apellido']. "</a>";
			echo "<br />";
		}
	}
	if($tipoEntidad == EMPRESAS){
		$sql = "SELECT id_empresa, razon_social FROM empresas ORDER BY razon_social LIMIT 0, "."$cantidad";
		$result = mysql_query($sql);
		echo mysql_error();
		while ($fila = mysql_fetch_assoc($result, MYSQL_ASSOC)) {
			echo "<a href=empresa.php?id_empresa=" . $fila['id_empresa'] . "> ";
			echo $fila['razon_social']. "</a>";
			echo "<br />";
		}
	}
}

function genera_password($longitud,$tipo="alfanumerico")
{
	if ($tipo=="alfanumerico")
	 {
		$exp_reg="[^A-Z0-9]";
	 } 
	elseif ($tipo=="numerico")
	{
		$exp_reg="[^0-9]";
	}
return substr(eregi_replace($exp_reg, "", md5(time())) .
eregi_replace($exp_reg, "", md5(time())) .
eregi_replace($exp_reg, "", md5(time())),0, $longitud);
}

function genera_capcha($longitud,$tipo="alfanumerico")
{
	if ($tipo=="alfanumerico")
	 {
		$exp_reg="[^A-Z0-9]";
	 } 
	elseif ($tipo=="numerico")
	{
		$exp_reg="[^0-9]";
	}
return substr(eregi_replace($exp_reg, "", md5(time()*2)) .
eregi_replace($exp_reg, "", md5(time())) .
eregi_replace($exp_reg, "", md5(time()*3)),0, $longitud);
}

// LOS TRES METODOS SIGUIENTES SE INCLUYERON DENTRO DE myquery.class.php,
// NO UTILIZARLAS DESDE AQUI, BORRARLAS CUANDO SE PUEDA!!

////////////////////////////////////////////////////
//Convierte fecha de mysql a normal
////////////////////////////////////////////////////
function cambiaf_a_normal($fecha){
    ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);
    $lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];
    return $lafecha;
}

////////////////////////////////////////////////////
//Convierte fecha de normal a mysql
////////////////////////////////////////////////////

function cambiaf_a_mysql($fecha){
if(strlen($fecha)==10){
    ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha);
    $lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
    return $lafecha;
	}
else{
	return '0000-00-00';
	}
}

////////////////////////////////////////////////////
//Cambia un Texto para mysql:
////////////////////////////////////////////////////
function cambiat_a_mysql($texto){
	$texto = mysql_real_escape_string($texto);
	return $texto;
}

////////////////////////////////////////////////////
//Destruye completamente la sesion corriente:
////////////////////////////////////////////////////
function destruir_sesion(){
	//session_start(); 
	$_SESSION = array(); 
	session_destroy();
	//$redireccion = 'Location: ' . $_SERVER['PHP_SELF'];
	//header ($redireccion);
}

////////////////////////////////////////////////////
//Cambia un Texto para js (C slashes):
////////////////////////////////////////////////////
function cambiat_a_js($texto){
	$texto = addslashes($texto);
	$texto = preg_replace("(\r\n)", "\\n", $texto);
	return $texto;
}

////////////////////////////////////////////////////
//Muestra las Experiencias Laborales de un Usuario:
////////////////////////////////////////////////////
function mostrar_experiencias($usuario){
	$usuarioCv = $usuario;
	$usuarioCv->experiencia = new u_experiencia();
	$usuarioCv->traerExperiencias();
	include('contenido/mostrar-experiencias.php');	
}

////////////////////////////////////////////////////
//Ofrece postear comentario a una entidad:
////////////////////////////////////////////////////
function mostrar_comentario(){
	include('contenido/mostrar-comentario.php');
}

////////////////////////////////////////////////////
//Muestra los comentarios propietarios de una entidad:
////////////////////////////////////////////////////
function mostrar_comentarios($entidad){
	$entidad->comentario = new comentario();
	$entidad->traerComentarios();
	echo $entidad->ultimo_error;
	include('contenido/mostrar-comentarios.php');
}

////////////////////////////////////////////////////
//Guarda los comentario propietarios de una entidad:
////////////////////////////////////////////////////
function postear_comentario($entidad){
	$entidad->guardarComentario();
	echo $entidad->ultimo_error;
}

////////////////////////////////////////////////////
//Muestra el perfil de una empresa:
////////////////////////////////////////////////////
function mostrar_perfil_empresa($empresa){
	include('contenido/mostrar-perfil-empresa.php');
}

////////////////////////////////////////////////////
//Muestra los avisos propietarios de una empresa:
////////////////////////////////////////////////////
function mostrar_avisos($empresa){
	$empresa->aviso = new aviso();
	$empresa->traerAvisos();
	echo $empresa->ultimo_error;
	include('contenido/mostrar-avisos.php');
}

////////////////////////////////////////////////////
//Guarda un aviso formulado por una empresa:
////////////////////////////////////////////////////
function postear_aviso($empresa){
	$empresa->guardarAviso();
	echo $empresa->ultimo_error;
}

////////////////////////////////////////////////////
//Destruye la sesion de una entidad en 'logeado'
//, redireccionando hacia donde se encontraba
// el usuario:
////////////////////////////////////////////////////
function destruir_sesion_logeado(){
	//session_start();
	$uri = $_SESSION['uri_rescatada'];
	while(isset($_SESSION['logeado'])){
		$_SESSION = array();
		session_unset();
		session_destroy();
	}
header('Location: ' . $uri);
}

////////////////////////////////////////////////////
//Destruye la sesion de una entidad en 'registro'
//, redireccionando hacia donde se encontraba
// el usuario:
////////////////////////////////////////////////////
function destruir_sesion_registro(){
	//session_start();
	$uri = $_SESSION['uri_rescatada'];
	while(isset($_SESSION['registro'])){
		$_SESSION = array();
		session_unset();
		session_destroy();
	}
header('Location: ' . $uri);
}

////////////////////////////////////////////////////
//Muestra los avisos resultados de una busqueda:
////////////////////////////////////////////////////
function mostrar_avisos_busqueda($busqueda){
	$busqueda->aviso = new aviso();
	$busqueda->traerAvisosSegunCriterio();
	echo $busqueda->ultimo_error;
	include('contenido/mostrar-avisos-busqueda.php');
}

////////////////////////////////////////////////////
//Muestra las postulaciones de un aviso especifico:
////////////////////////////////////////////////////
function mostrar_postulaciones($aviso){
	$aviso->postulacion = new postulacion();
	$aviso->traerPostulaciones();
	echo $aviso->ultimo_error;
	include('contenido/mostrar-postulaciones.php');
}

////////////////////////////////////////////////////
//Guarda una postulacion en un aviso especifico:
////////////////////////////////////////////////////
function postear_postulacion($aviso){
	$aviso->guardarPostulacion();
	echo $aviso->ultimo_error;
}

?>