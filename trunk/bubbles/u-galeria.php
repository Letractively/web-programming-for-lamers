<?php include('header.php'); ?>
<?php include('includes/clases/usuario.class.php'); ?>
<?php include('includes/clases/empresa.class.php'); ?>
<?php include('includes/clases/u_experiencia.class.php'); ?>
<?php include('includes/clases/comentario.class.php'); ?>
<?php include('includes/clases/mensaje.class.php'); ?>
<?php include('includes/clases/e_aviso.class.php'); ?>
<?php include('includes/clases/muestra.class.php'); ?>
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
$visitante_es = '';
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
?>


<div class="col-profesional-centro">
	<div class="casilla-superior">
<?php
//include('contenido/casilla-superior-profesional-portfolio.php');
//las switcheo para ver que solapas tengo que incluir...
switch ($solapa_superior) {
    case 'mensajes':
        include('contenido/casilla/superior/profesional/solapas/mensajes.php');
        break;
    case 'portfolio':
        include('contenido/casilla/superior/profesional/solapas/portfolio.php');
        break;
	case 'editar_perfil':
		include('contenido/casilla/superior/profesional/solapas/ninguna-activa.php');
        break;
	case 'ninguna_activa':
		include('contenido/casilla/superior/profesional/solapas/ninguna-activa.php');
        break;
    default:
        include('contenido/casilla/superior/profesional/solapas/portfolio.php');
        break;
}
?>

<?php
//las switcheo para ver que botonera tengo que incluir...
switch ($botonera_superior) {
    case 'nuevo_mensaje':
        include('contenido/casilla/superior/profesional/botones/nuevo-mensaje.php');
        break;
    case 'ver_portfolio':
        include('contenido/casilla/superior/profesional/botones/ver-portfolio.php');
        break;
	case 'editar_perfil':
		include('contenido/casilla/superior/profesional/botones/sin-botonera.php');
		break;
	case 'editar_mi_foto':
		include('contenido/casilla/superior/profesional/botones/editar-mi-foto.php');
		break;
	default:
        include('contenido/casilla/superior/profesional/botones/ver-portfolio.php');
        break;
}
?>

<?php
//las switcheo para ver que contenido tengo que incluir...
switch ($contenido_superior) {
    case 'nuevo_mensaje':
        include('contenido/casilla/superior/profesional/contenido/nuevo-mensaje.php');
        break;
    case 'casilla_entrada':
        include('contenido/casilla/superior/profesional/contenido/casilla-entrada.php');
        break;
	case 'ver_portfolio':
        include('contenido/casilla/superior/profesional/contenido/ver-portfolio.php');
        break;
	case 'abrir_mensaje':
		include('contenido/casilla/superior/profesional/contenido/abrir-mensaje.php');
		break;
	case 'editar_perfil':
		include('contenido/casilla/superior/profesional/contenido/editar-perfil.php');
		break;
	case 'editar_mi_foto':
		include('contenido/casilla/superior/profesional/contenido/editar-mi-foto.php');
		break;
	case 'subir_un_portfolio':
		include('contenido/casilla/superior/profesional/contenido/subir-un-portfolio.php');
		break;
    default:
        include('contenido/casilla/superior/profesional/contenido/ver-portfolio.php');
        break;
}
?>
		<div class="borde-derecho">
		</div>
	</div>


<?php include('contenido/casilla/inferior/profesional.php') ?>
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