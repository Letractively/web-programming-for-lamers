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
if($id_verif == -1){							//Si verifica que el usuario no existe lo manda a una pagina expecÌfica
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


<?php //ACTUALIZADO HASA AQUI!!!!! ?>




<div>
<h2> Perfil de : <?php echo $visitado->alias_usuario; ?>, de <?php echo $visitado->nombre; ?></h2>

<h2>Datos del contacto:</h2>
<p><?php echo $visitado->apellidos_contacto; ?>, <?php echo $visitado->nombres_contacto; ?>. <?php echo $visitado->edadContacto(); ?> a√±os.</p>
email:  <?php echo $visitado->email_contacto; ?><br />
CUIT-CUIL: <?php echo $visitado->cuit_cuil; ?><br />
</div>

<div>
	<h2>Perfil de la Empresa:</h2>
	<?php mostrar_perfil_empresa($visitado); ?>
</div>

<div>
<?php 
// Mostrar Avisos Publicados
?>
</div>

<?php
// Link y FORM para agregar un COMENTARIO
if((isset($_SESSION['logeado'])) && (!isset($_GET['postear_comentario']))){
	if((isset($_SESSION['empresa']) && ($_SESSION['id_empresa'] != $visitado->id_empresa))
	|| (isset($_SESSION['usuario']))){
		include('contenido/agregar-comentario.php');
	}
}
if((isset($_SESSION['logeado'])) && (isset($_GET['postear_comentario']))){
	if(((isset($_SESSION['empresa'])) && ($_SESSION['id_empresa'] != $visitado->id_empresa))
	|| (isset($_SESSION['usuario']))){
		include('contenido/mostrar-form-comentario.php');
	}
}
?>

<?php
// Link y FORM para agregar un AVISO
	if((isset($_SESSION['empresa']) && ($_SESSION['id_empresa'] == $visitado->id_empresa))){
		if((isset($_SESSION['logeado'])) && (!isset($_GET['postear_aviso']))){
			include('contenido/agregar-aviso.php');
		}
		if((isset($_SESSION['logeado'])) && (isset($_GET['postear_aviso']))){
		include('contenido/mostrar-form-aviso.php');
		}
	}
?>

<?php //INSTANCIAR a un objeto comentarios y Presentar comentarios 
//$visitado->comentario
?>

<?php
//INSTANCIAR a un objeto comentarios y Presentar comentarios 
//Si se envio el FORM con EL comentario, procede...
if(isset($_POST['fComentarioEnviado'])){
	//INSTANCIA a un objeto comentario desde el objeto usuario creado:
	$visitado->comentario = new comentario();
	//LLENA las propiedades del objeto comentario conforme a que la entidad visitada es EMPRESA:
	$visitado->comentario->para_usuario = 0;
	$visitado->comentario->id_para = $visitado->id_empresa;
	$visitado->comentario->detalle = cambiat_a_mysql($_POST['fComentario']);
	//Procede a INSERTar el comentario si el visitante es empresa != de la empresa visitada...
	if((isset($_SESSION['empresa'])) && ($_SESSION['id_empresa'] != $visitado->id_empresa)){
			$visitado->comentario->desde_usuario = 0;
			$visitado->comentario->id_desde = $_SESSION['id_empresa'];
			postear_comentario($visitado);
		}
	//...o bien procede a INSERTar en comentario si el visitante es un usuario.
	if(isset($_SESSION['usuario'])){
			$visitado->comentario->desde_usuario = 1;
			$visitado->comentario->id_desde = $_SESSION['id_usuario'];
			postear_comentario($visitado);
		}
}
?>

<div>
	<h2>Comentarios para <?php echo $visitado->alias_usuario; ?> , de <?php echo $visitado->nombre; ?></h2>
	<?php mostrar_comentarios($visitado); ?>
</div>


<?php
//INSTANCIAR a un objeto aviso y Presentar avisos 
//Si se envio el FORM-POST con EL nuevo aviso, procede...
if(isset($_POST['fAvisoEnviado'])){
	//INSTANCIA a un objeto aviso desde el objeto empresa creado:
	$visitado->aviso = new aviso();
	//LLENA las propiedades del objeto aviso conforme a lo que la entidad LOGUEADA y VISITADA requiso:
	$visitado->aviso->titulo = cambiat_a_mysql($_POST['fTitulo']);
	$visitado->aviso->horarios = cambiat_a_mysql($_POST['fHorarios']);
	$visitado->aviso->pago = cambiat_a_mysql($_POST['fPago']);
	$visitado->aviso->detalle = cambiat_a_mysql($_POST['fDetalle']);
	$visitado->aviso->puesto = cambiat_a_mysql($_POST['fPuesto']);
	//Procede a INSERTar el AVISO...
	postear_aviso($visitado);
}
?>

<div>
	<h2>Avisos de <?php echo $visitado->alias_usuario; ?> , de <?php echo $visitado->nombre; ?></h2>
	<?php mostrar_avisos($visitado); ?>
</div>

<?php include('footer.php'); ?>