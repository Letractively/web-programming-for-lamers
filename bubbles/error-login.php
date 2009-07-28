<?php include('header.php')?>

<?php
if(!isset($_GET['error'])){
	echo 'error desconocido';
	exit;
	}
if($_GET['error'] == 'ingresos_incorrectos'){
	include('contenido/datos-login-incorrectos.php');
	}

?>

<?php include('footer.php')?>