<?php
session_start();

// INCUDES:
include("includes/includes.php");

//SEGURIDAD--->
//Primero rescatamos la p�gina donde nos encontramos, para poder redireccionarnos luego del tramite de logueo o deslogueo:
if((!strstr($_SERVER['REQUEST_URI'],"logeo-form.php")) 
	&& (!strstr($_SERVER['REQUEST_URI'],"logeo.php"))
	&& (!strstr($_SERVER['REQUEST_URI'],"logout.php"))
	&& (!strstr($_SERVER['REQUEST_URI'],"logout-form.php"))){
	$_SESSION['php_rescatado'] = $_SERVER['PHP_SELF'];
	$_SESSION['query_rescatado'] = $_SERVER['QUERY_STRING'];
	$_SESSION['uri_rescatada'] = $_SERVER['REQUEST_URI'];
}

// Si el cliente requiere alguna de las paginas que no estan en esta lista; debera estar logueado para acceder:
if((!strstr($_SERVER['REQUEST_URI'],"index.php"))
	&& (!strstr($_SERVER['REQUEST_URI'],"no-existe.php")) 
	&& (!strstr($_SERVER['REQUEST_URI'],"registrar"))
	&& (!strstr($_SERVER['REQUEST_URI'],"logeo-form.php"))
	&& ((isset($_SESSION['logeado']))&& (isset($_GET['entidad_visitada'])))
	){	//Tambien puede el cliente entrar sin logueo a paginas con $_GET['entidad-visitada']
		include("includes/seguridad.php");
}
$desabilitar_login = ''; //Habilitamos los input de logeo por default!

// Si el cliente requiere una pagina "registrar*.php" habro una sesion de registro...
if((strstr($_SERVER['REQUEST_URI'],"registrar"))){
	$desabilitar_login = 'disabled="TRUE"';	//Desabilitamos los input de logueo en una sesion de registro!  
	if(isset($_SESSION['logeado'])){
		destruir_sesion_logeado();
	}
	if(!isset($_SESSION['registro'])){
	$_SESSION['registro'] = 1;
	}
	else{
		if (($_SESSION['hora']+1000) < time()){
		session_unset();
		session_destroy();
		if(!isset($_GET['entidad_visita'])){		//SI la pagina actual permite VISITANTES, destruye la sesion anterior pero no va al index
			header("Location: index.php?error=2"); //Error2: 'timeout' de 20 minutos superado
		}
		return 0;
		}
	}
// Le damos un tiempo mas a la entidad para que se quede en el sitio sin actividad:
$_SESSION['hora']=time();

}// ... si no requiere esas paginas, destruyo la sesion de registro:
else{
	if(isset($_SESSION['registro'])){
		destruir_sesion_registro();
	}
}
//<--SEGURIDAD
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
<head>
	<base href="<?php echo URL_BASE; ?>"></base>
	<!--<script src="js/funciones.js" language="javascript" type="text/javascript"></script>-->
	<script src="js/jquery.js"></script>
	<script type="text/javascript" src="js/jquery-plugins/jquery.validate.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
	<title>Comunidad Bubbles</title>
    <link href="style.css" rel="stylesheet" type="text/css"></link>
</head>
<body>
<div class="header">
	<div class="img">

	<?php
	if(isset($_SESSION['logeado'])){
		echo "<pre>Ud. es la Entidad Logueada.</pre>";
		if(isset($_SESSION['id_usuario'])){
			echo "<pre>El id de la entidad logueada es " . $_SESSION['id_usuario'] . ' -- ';
		}
		if(isset($_SESSION['id_empresa'])){
			echo "El id de la entidad logueada es " . $_SESSION['id_empresa'] . ' -- ';
		}
		echo "Su tiempo de Logueo se renovo a " . $_SESSION['hora'] . " -- ";
		echo "El tipo de entidad logueada es : ";
		if(isset($_SESSION['usuario'])){
			echo 'USUARIO' . " -- ";
		}
		if(isset($_SESSION['empresa'])){
			echo 'EMPRESA' . " -- ";
		}
	}
	else{
		echo "<pre>Entidad Visitante NO Logueada.</pre>";
	}
	if(isset($_SESSION['registro'])){
		echo "<pre>Ud es una entidad en tramite de registro</pre>";
	}
	else
		echo "<pre>Ud no esta en tramite de registro</pre>";
	?>

<?php
//echo "<pre>";
//print_r($_SERVER);
//echo "</pre>";
?>
	</div>
	
		<div class="menu">
			<div class="div-1">
					<h2><strong>Buscar</strong></h2>
			</div>
			<div class="buscador">
					<p><?php include('contenido/form-buscador.php')?></p>
			</div>
			<div class="div-2">
						<p><strong><?php if(isset($_SESSION['logeado'])){
									include("logout.php");
								}
								else{
									include('login.php');
								}
								?></strong></p>
			</div>	
			<div class="div-2">
					<p><strong>ayuda</strong></p>
			</div>
		</div>
	
</div>

<div style="clear: both;"></div>

<div class="contenido">