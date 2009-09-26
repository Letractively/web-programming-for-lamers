<?php include('header.php')?>

<div class="col-izquierda">
	<?php include('contenido/form-login-usuario.php'); ?>
	<?php include('contenido/form-login-empresa.php'); ?>
</div>

<div class="col-central">
<?php
//Variables que guardaran las llegadas de GET...
$error = '';
$uri_rescatada = '';

//Asignacion de las llegadas de GET a las variables correspondientes...
if(isset($_GET['error'])){
	$error = $_GET['error'];
}else{
	$error = 'desconocido';
}

if(isset($_GET['uri_rescatada'])){
	$uri_rescatada = urldecode($_GET['uri_rescatada']);
	$_SESSION['uri_rescatada'] = $uri_rescatada;
}else{
	$uri_rescatada = DIR_BUBBLES;
	$_SESSION['uri_rescatada'] = $uri_rescatada;
}


//"SWITCHEO" de las variables guardadas de GET, para cargar sus páginas correspondientes...
if($error == 'ingresos_incorrectos'){
	include('contenido/datos-login-incorrectos.php');
	echo '<p class="parrafo8 al-medio">* El usuario o la clave que introdujo son incorrectas, intentelo nuevamente...</p>';
	}
if($error == 'tiempo_agotado'){
	include('contenido/debe-loguearse.php');
	echo '<p class="parrafo8 al-medio">* Paso demasiado tiempo sin que Ud. realizara alguna actividad dentro de Bubbles. Por seguridad, debe volver a loguearse.</p>';
	}
if($error == 'debe_loguearse'){
	include('contenido/debe-loguearse.php');
	echo '<p class="parrafo8 al-medio">* Debe estar logueado para poder acceder a este contenido.</p>';
	}
if($error == 'no_administrador'){
	include('contenido/debe-loguearse.php');
	echo '<p class="parrafo8 al-medio">* Debe estar logueado como Administrador de esta página si desea acceder a ella, de lo contrario carece de permisos.</p>';	
}
if($error == 'no_identificado'){
	include('contenido/debe-loguearse.php');
	echo '<p class="parrafo8 al-medio">* Ud no esta identificado como usuario de Bubbles, logueese en su casilla correspondiente.</p>';
}
if($error == 'primer_logueo'){
	include('contenido/debe-loguearse.php');
	echo '<h2 class="al-medio">Felicitaciones!. Has confirmado tu membresia correctamente; solo debes introducir ahora tu usuario y tu contraseña en tu casilla correspondiente para acceder a tu sitio...</h2>';
}
if($error == 'desconocido'){
	include('contenido/error-desconocido.php');
		echo '<p class="parrafo8 al-medio">* Error desconocido; intente nuevamente el procedimiento o bien pongase en contacto con nuestro soporte técnico</p>';
}
?>

<!--<h2>Error Identificado como: <?php //echo $error?></h2>-->

</div>

<div class="col-derecha" >
	<img src="imagenes/relleno1.jpg" />
</div>

<?php include('footer.php')?>