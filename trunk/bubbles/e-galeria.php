<?php include('header.php'); ?>
<?php include('includes/clases/empresa.class.php'); ?>
<?php include('includes/clases/usuario.class.php'); ?>
<?php include('includes/clases/comentario.class.php'); ?>
<?php include('includes/clases/e_aviso.class.php'); ?>
<?php include('includes/clases/mensaje.class.php'); ?>
<?php include("includes/tratar_imagenes.php"); ?>

<?php
$visitado = new empresa(empresa::aliasUsuario2id($_GET['entidad_visitada']));
$id_verif = $visitado->idEmpresa();
if($id_verif == -1){							//Si verifica que el usuario no existe lo manda a una pagina expecífica
	header("Location: " . URL_BASE . ARCH_PAG_NO_EXISTE);
	include('footer.php');
	exit -1;
}
//Preparacion de la variable "indicadora" de los permisos del visitante....
$visitante_es = 'no_identificado';
if(isset($_SESSION['id_empresa'])){
	if($visitado->id_empresa == $_SESSION['id_empresa']){
		$visitante_es = 'empresa_administrador';
	}
	else{
		$visitante_es = 'empresa_visitante';
	}
}
if(isset($_SESSION['id_usuario'])){
	$visitante_es = 'usuario_visitante';
}
echo 'VISITANTE_ES: ' . $visitante_es;
?>

<?php include('contenido/col-empresa.php'); ?>

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

<div class="col-empresa-centro">
	<div class="casilla-superior">
<?php
//include('contenido/casilla-superior-profesional-portfolio.php');
//las switcheo para ver que solapas tengo que incluir...
switch ($solapa_superior) {
    case 'mensajes':
        include('contenido/casilla/superior/empresa/solapas/mensajes.php');
        break;
    case 'laborales':
        include('contenido/casilla/superior/empresa/solapas/laborales.php');
        break;
    case 'ninguna_activa':
		include('contenido/casilla/superior/empresa/solapas/laborales.php');
        break;
    default:
        include('contenido/casilla/superior/empresa/solapas/laborales.php');
        break;
}
?>

<?php
//las switcheo para ver que botonera tengo que incluir...
switch ($botonera_superior) {
    case 'nuevo_mensaje':
        include('contenido/casilla/superior/empresa/botones/nuevo-mensaje.php');
        break;
    case 'ver_laborales':
        include('contenido/casilla/superior/empresa/botones/ver-laborales.php');
        break;
    case 'abrir_mensaje':
        include('contenido/casilla/superior/empresa/botones/abrir-mensaje.php');
        break;
	case 'editar_mi_foto':
        include('contenido/casilla/superior/empresa/botones/editar-mi-foto.php');
        break;
    default:
        include('contenido/casilla/superior/empresa/botones/ver-laborales.php');
        break;
}
?>

<?php
//las switcheo para ver que contenido tengo que incluir...
switch ($contenido_superior) {
    case 'nuevo_mensaje':
        include('contenido/casilla/superior/empresa/contenido/nuevo-mensaje.php');
        break;
    case 'casilla_entrada':
        include('contenido/casilla/superior/empresa/contenido/casilla-entrada.php');
        break;
	case 'ver_laborales':
        include('contenido/casilla/superior/empresa/contenido/ver-laborales.php');
        break;
	case 'abrir_mensaje':
		include('contenido/casilla/superior/empresa/contenido/abrir-mensaje.php');
		break;
	case 'ver_mis_ofertas':
		include('contenido/casilla/superior/empresa/contenido/ver-ofertas.php');
		break;
		case 'editar_mi_foto':
		include('contenido/casilla/superior/empresa/contenido/editar-mi-foto.php');
		break;
    default:
        include('contenido/casilla/superior/empresa/contenido/ver-ofertas.php');
        break;
}
?>
		<div class="borde-derecho">
		</div>
	</div>

<?php include('contenido/casilla/inferior/empresa.php') ?>
</div>

<?php include('contenido/col-profesional-derecha.php'); ?>

<?php include('footer.php'); ?>