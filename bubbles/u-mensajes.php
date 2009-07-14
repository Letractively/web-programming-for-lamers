<?php
include('header.php'); // Obtengo el ID de la entidad ORIGEN por el metodo $_SESSION
include('includes/clases/usuario.class.php');

// Obtengo el ID de la entidad DESTINO por el metodo $_GET
if(isset($_GET['id_usuario'])){
	$id = '?id_usuario=';
	$para_usuario = 'TRUE';
	$id_para = $_GET['id_usuario'];
}
if(isset($_GET['id_empresa'])){
	$id = '?id_empresa=';
	$para_usuario = 'FALSE';
	$id_para = $_GET['id_empresa'];
}

if(isset($_POST["enviar"])){
	echo 'implementacion de la clase usuario->nuevoMensajePublico'; 
	$us = new usuario($_SESSION['id_usuario']);
	$us->nuevoMensajePublico($desde_usuario, $para_usuario, $id_desde, $id_para, '2009-05-07', $_POST['fComentario'], $_POST['fComentario']);
	echo 'Su mensaje ha sido enviado';
}
?>

<html>
<body>

<form action="<?php echo $_SERVER['PHP_SELF']. $id . $id_para ?>" method="post" onSubmit="return validarForm();">
Comentario:<input type="Text" name="fComentario"></input><br />
<input type="submit" name="enviar" value="Enviar comentario"></input>
</form>

</body>
</html>