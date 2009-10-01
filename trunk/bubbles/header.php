<?php
ob_implicit_flush(0);
ob_start();
session_start();


// INCUDES:
include("includes/includes.php");

//SEGURIDAD--->
//Primero rescatamos la página donde nos encontramos, para poder redireccionarnos luego del logueo o deslogueo,
//las páginas listadas aqui NO UPDATEan la URI rescatada:
if((!strstr($_SERVER['REQUEST_URI'],"logeo-form.php"))
	&& (!strstr($_SERVER['REQUEST_URI'],"logeo.php"))
	&& (!strstr($_SERVER['REQUEST_URI'],"logout.php"))
	&& (!strstr($_SERVER['REQUEST_URI'],"error-login.php"))
	&& (!strstr($_SERVER['REQUEST_URI'],"logout-form.php"))){
		$_SESSION['php_rescatado'] = $_SERVER['PHP_SELF'];
		$_SESSION['query_rescatado'] = $_SERVER['QUERY_STRING'];
		$_SESSION['uri_rescatada'] = $_SERVER['REQUEST_URI'];
}

// Luego; Si el cliente requiere alguna de las paginas que no estan en esta lista;
// debera estar logueado para acceder:
if((!strstr($_SERVER['PHP_SELF'],"index.php"))	//uso $_SERVER['PHP_SELF']; porque el $_SERVER['REQUEST_URI'] SOLO aparece la RAIZ (/) debido al ModRewrite, y no hace mencion al "index.php"
	//&& (strcmp($_SERVER['REQUEST_URI'],('/' . DIR_BUBBLES)))	//Si la URI pedida es EXACTAMENTE la RAIZ del sitio, no pide logueo.
	&& (!strstr($_SERVER['REQUEST_URI'],"no-existe.php")) 
	&& (!strstr($_SERVER['REQUEST_URI'],"registrar"))
	&& (!strstr($_SERVER['REQUEST_URI'],"logeo-form.php"))
	&& (!strstr($_SERVER['REQUEST_URI'],"error-login.php"))
	&& (!strstr($_SERVER['PHP_SELF'],"u-galeria.php"))
	&& (!strstr($_SERVER['PHP_SELF'],"e-galeria.php"))
	&& (!strstr($_SERVER['PHP_SELF'],"busqueda.php"))
	//&& ((isset($_SESSION['logeado']))&& (isset($_GET['entidad_visitada'])))	//Habilita visitantes en perfiles.
	){	//En este ultimo, tambien puede el cliente entrar sin logueo a paginas con $_GET['entidad-visitada']
		include("includes/seguridad.php");
}

//Regenero en cada refresco el id_consulta y el captcha, SIEMPRE...
$_SESSION['id_consulta'] = genera_password(8);
$_SESSION['capcha'] = genera_capcha(8);

//MATO cualquier variable $_SESSION[] siempre y en cualquier página,
//el TIMEOUT es INDEPENDIENTE del tipo de ENTIDAD que este (o no)
//logueada. De otra forma acumularia BASURA en memoria:
if(isset($_SESSION['hora'])){
	if (($_SESSION['hora']+1000) < time()){
		$uri = $_SESSION['uri_rescatada'];
		session_unset();
		session_destroy();
		//Las páginas a continuación listadas NO SON REDIRECCIONADAS a la pantalla de logueo
		//luego del timeout:
		if((!strstr($_SERVER['PHP_SELF'],"index.php"))
			&& (!strstr($_SERVER['REQUEST_URI'],"registrar"))
			&& (!strstr($_SERVER['REQUEST_URI'],"logeo-form.php"))
			&& (!strstr($_SERVER['REQUEST_URI'],"error-login.php"))
			){
			header('Location: ' . URL_BASE . 'error-login.php?error=tiempo_agotado&uri_rescatada=' . urlencode($uri));
			exit;
		}
	}
	// Le damos un tiempo al CLIENTE para que CONSERVE su posible SESSION en el sitio sin actividad:
	$_SESSION['hora']=time();
}

// Si el cliente requiere una pagina "registrar*.php" habro una sesion de registro...
$desabilitar_login = ''; //Habilitamos los input de logeo por default! ((PROXIMAMENTE OBSOLETO))
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
			if(!isset($_GET['entidad_visitada'])){		//SI la pagina actual permite VISITANTES, destruye la sesion anterior pero no va al index
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
	<script src="js/jquery-ui-1.7.2.custom.min.js"></script>
	<script type="text/javascript" src="js/jquery-plugins/jquery.validate.js"></script>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
	<title>Comunidad Bubbles</title>
    <link href="style.css" rel="stylesheet" type="text/css"></link>
</head>
<body>
<div class="header">
	<a href="<?php echo URL_BASE; ?>">
	<div class="img">
	<!--DEBUGS COMENTADOS-->
	<!--
	<pre>
	<?php
	if(isset($_SESSION['logeado'])){
		if(isset($_SESSION['id_usuario'])){
//			echo "El id de la entidad logueada es " . $_SESSION['id_usuario'] . '<br />';
		}
		if(isset($_SESSION['id_empresa'])){
//			echo "El id de la entidad logueada es " . $_SESSION['id_empresa'] . ' -- ';
		}
//		echo "Su tiempo de Logueo se renovo a " . $_SESSION['hora'] . " -- ";
//		echo "El tipo de entidad logueada es : ";
		if(isset($_SESSION['usuario'])){
//			echo 'USUARIO' . '<br />';
		}
		if(isset($_SESSION['empresa'])){
//			echo 'EMPRESA' . '<br />';
		}
	}
	else{
//		echo "Entidad Visitante NO Logueada.";
	}
	if(isset($_SESSION['registro'])){
//		echo "Ud es una entidad en tramite de registro";
	}
	else
//		echo "Ud no esta en tramite de registro";
	?>
	</pre>
-->
	</div>
	</a>
	<div class="titulos">
		<p class="parrafo10 izquierda">Bienvenido a Bubbles Comunidad</p>
		<p class="parrafo10 derecha"><a class="parrafo10" href="<?php echo URL_BASE ?>">Home</a></p>
	</div>
	
		<div class="menu">
			<div class="div-1">
					<h2><strong>Buscar</strong></h2>
			</div>
			<div class="buscador">
					<p><?php include('contenido/form-buscador.php')?></p>
			</div>
			<div class="div-1">
				<?php 
				if(isset($_SESSION['logeado'])){
					include('link-mi-perfil.php');
				}
				?>
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