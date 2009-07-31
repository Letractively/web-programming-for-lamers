<?php include('header.php'); ?>
<?php include('includes/clases/usuario.class.php'); ?>
<?php include('includes/clases/u_experiencia.class.php'); ?>
<?php include('includes/clases/comentario.class.php'); ?>


<?php 
$visitado = new usuario(usuario::alias2id($_GET['entidad_visitada']));
$id_verif = $visitado->idUsuario();
if($id_verif == -1){							//Si verifica que el usuario no existe lo manda a una pagina expecífica
	echo "<p>La página " . $_SERVER['PHP_SELF'] . " no existe</p>";
//	header("Location: " . ARCH_PAG_NO_EXISTE);
}
?>

<div class="col-izquierda">
<?php include('contenido/col-profesional.php'); ?>
</div>

<div class="col-profesional-centro">
<?php	//SWHITCH del CONTENIDO de la pagina (columna-central). Proximanente en AJAX!
// Defino las variables de peticion que si solo si se que existen:
$casilla_superior = '';

// Las guardo con las variables llegadas por GET si es que existen
if(isset($_GET['casilla_superior'])){
$casilla_superior = $_GET['casilla_superior'];
}

//las switcheo para ver que pantalla tengo que incluir...
if($casilla_superior == 'mensajes'){
	include('contenido/casilla-superior-profesional-mensajes.php');
}
if($casilla_superior == 'portfolio'){
	include('contenido/casilla-superior-profesional-portfolio.php');
}
//Si no nubo peticiones para NINGUNA de las páginas anteriores....
else{
	include('contenido/casilla-superior-profesional-portfolio.php');
}
?>
<?php include('contenido/casilla-inferior-profesional.php') ?>
</div>

<?php include('contenido/col-profesional-derecha.php'); ?>



<!--HASTA AQUI FUE ACTUALIZADO-->
<div>
<h2> Galeria de : <?php echo $visitado->alias; ?></h2>
<p><?php echo $visitado->apellidos; ?>, <?php echo $visitado->nombres; ?>. <?php echo $visitado->edad(); ?> años.</p>

email:  <?php echo $visitado->email; ?><br />
dni: <?php echo $visitado->n_documento; ?><br />
</div>

<div>
	<h2>Experiencias Laborales:</h2>
	<?php mostrar_experiencias($visitado); ?>
</div>

<div>
<?php
//Mostrar Postulaciones realizadas...
?>
</div>

<?php
if((isset($_SESSION['logeado'])) && (!isset($_GET['postear_comentario']))){
	if((isset($_SESSION['usuario']) && ($_SESSION['id_usuario'] != $visitado->id_usuario))
	|| (isset($_SESSION['empresa']))){
		include('contenido/agregar-comentario.php');
	}
}
if((isset($_SESSION['logeado'])) && (isset($_GET['postear_comentario']))){
	if(((isset($_SESSION['usuario'])) && ($_SESSION['id_usuario'] != $visitado->id_usuario))
	|| (isset($_SESSION['empresa']))){
		include('contenido/mostrar-form-comentario.php');
	}
}
?>
<?php
//$visitado->comentario
?>

<?php
//Si se envio el FORM con EL comentario, procede...
if(isset($_POST['fComentarioEnviado'])){
	//INSTANCIA a un objeto comentario desde el objeto usuario creado:
	$visitado->comentario = new comentario();
	//LLENA las propiedades del objeto comentario conforme a que la entidad visitada es USUARIO:
	$visitado->comentario->para_usuario = 1;
	$visitado->comentario->id_para = $visitado->id_usuario;
	$visitado->comentario->detalle = cambiat_a_mysql($_POST['fComentario']);
	//Procede a INSERTar el comentario si el visitante es usuario != del usuario visitado...
	if((isset($_SESSION['usuario'])) && ($_SESSION['id_usuario'] != $visitado->id_usuario)){
			$visitado->comentario->desde_usuario = 1;
			$visitado->comentario->id_desde = $_SESSION['id_usuario'];
			postear_comentario($visitado);
		}
	//...o bien procede a INSERTar en comentario si el visitante es una empresa.
	if(isset($_SESSION['empresa'])){
			$visitado->comentario->desde_usuario = 0;
			$visitado->comentario->id_desde = $_SESSION['id_empresa'];
			postear_comentario($visitado);
		}
}
?>

<div>
	<h2>Comentarios para <?php echo $visitado->alias; ?></h2>
	<?php mostrar_comentarios($visitado) ?>
</div>

<?php include('footer.php'); ?>