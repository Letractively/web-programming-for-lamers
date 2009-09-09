<?php include('header.php'); ?>
<?php include('includes/clases/u_experiencia.class.php'); ?>
<?php include('includes/clases/comentario.class.php'); ?>
<?php include('includes/clases/mensaje.class.php'); ?>
<?php include('includes/clases/e_aviso.class.php'); ?>
<?php include('includes/clases/muestra.class.php'); ?>
<?php include('includes/clases/amistad.class.php'); ?>
<?php include('includes/clases/postulacion.class.php'); ?>
<?php include("includes/tratar_imagenes.php"); ?>


<?php
$visitado = new usuario(usuario::alias2id($_GET['entidad_visitada']));
$id_verif = $visitado->idUsuario();
if($id_verif == -1){							//Si verifica que el usuario no existe lo manda a una pagina expecífica
	header("Location: " . URL_BASE . ARCH_PAG_NO_EXISTE);
	include('footer.php');
	exit -1;
}
//Preparacion de la variable "indicadora" de los permisos del visitante....
$visitante_es = 'no_identificado';
if(isset($_SESSION['id_usuario'])){
	if($visitado->id_usuario == $_SESSION['id_usuario']){
		$visitante_es = 'usuario_administrador';
	}
	else{
		$visitante_es = 'usuario_visitante';
	}
}
if(isset($_SESSION['id_empresa'])){
	$visitante_es = 'empresa_visitante';
}
echo 'VISITANTE_ES: ' . $visitante_es;
?>



<?php include('contenido/col-profesional.php'); ?>


<?php	//SWHITCH del CONTENIDO de la pagina (columna-central). Proximanente en AJAX!
// Defino las variables de peticion que si solo si se que existen:
$casilla_superior = '';
$solapa_superior = '';
$botonera_superior = '';
$contenido_superior = '';
$casilla_central = '';
$contenido_central = '';
// Las guardo con las variables llegadas por GET si es que existen
if(isset($_GET['solapa_superior'])){
	$solapa_superior = $_GET['solapa_superior'];
}
if(isset($_GET['botonera_superior'])){
	$botonera_superior = $_GET['botonera_superior'];
}
if(isset($_GET['contenido_superior'])){
	$contenido_superior = $_GET['contenido_superior'];
}
//
if(isset($_GET['casilla_central'])){
	$casilla_central = $_GET['casilla_central'];
}
if(isset($_GET['contenido_central'])){
	$contenido_central = $_GET['contenido_central'];
}
?>


<div class="col-profesional-centro">
<?php if($casilla_central == ''){
	include('contenido/switchear-2-casillas-profesional.php');
}
else{
	include('contenido/switchear-1-casilla-profesional.php');
}
?>
</div>

<?php include('contenido/col-profesional-derecha.php'); ?>

<?php include('footer.php'); ?>