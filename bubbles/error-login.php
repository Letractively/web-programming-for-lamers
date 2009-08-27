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
}
else{
	$error = 'desconocido';
}
if(isset($_GET['uri_rescatada'])){
	$uri_rescatada = urldecode($_GET['uri_rescatada']);
	$_SESSION['uri_rescatada'] = $uri_rescatada;
}
else{
	$uri_rescatada = DIR_BUBBLES;
}

//"SWITCHEO" de las variables guardadas de GET, para cargar sus páginas correspondientes...
if($error == 'ingresos_incorrectos'){
	include('contenido/datos-login-incorrectos.php');
	}
if($error == 'tiempo_agotado'){
	include('contenido/debe-loguearse.php');
	}
if($error == 'debe_loguearse'){
	include('contenido/debe-loguearse.php');
	}
if($error == 'no_administrador'){
	include('contenido/debe-loguearse.php');
}
if($error == 'desconocido'){
	include('contenido/error-desconocido.php');
}
?>
</div>

<div class="col-derecha" >
	<img src="imagenes/relleno1.jpg" />
</div>

<?php include('footer.php')?>