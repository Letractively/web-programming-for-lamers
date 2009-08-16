<?php include('header.php'); ?>
<?php include('includes/clases/e_aviso.class.php'); ?>
<?php include('includes/clases/empresa.class.php'); ?>
<?php include('includes/clases/postulacion.class.php'); ?>

<?php
$aviso_visitado = new aviso();
$id_verif = $aviso_visitado->cargarUnAviso($_GET['mostrar_aviso_id']);
echo $aviso_visitado->ultimo_error;
$empresa_propietaria = new empresa($aviso_visitado->id_empresa);
echo $empresa_propietaria->ultimo_error;

if($id_verif == -1){							//Si verifica que el usuario no existe lo manda a una pagina expecífica
	header("Location: " . URL_BASE . ARCH_PAG_NO_EXISTE);
	include('footer.php');
	exit -1;
}
//Preparacion de la variable "indicadora" de los permisos del visitante....
$visitante_es = '';
if(isset($_SESSION['id_empresa'])){
	if($aviso_visitado->id_empresa == $_SESSION['id_empresa']){
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

<div class="invitados">
<h2> Profesional Requerido: <?php echo $aviso_visitado->profesion_requerida;?>, por: <?php echo $empresa_propietaria->razon_social; ?>, 
	posteado por: <?php echo $empresa_propietaria->alias_usuario; ?> </h2>
<p> Ubicada en: <?php echo $aviso->empresa->pais; ?>, <?php echo $aviso->empresa->provincia; ?>, <?php echo $aviso->empresa->ciudad; ?> </p>
<h2> Puesto a Cubrir: <?php echo $aviso->puesto;?> - Carga Horaria: <?php echo $aviso->horarios;?> 
	- Paga: <?php echo $aviso->pago;?> - Fecha de Publicación: <?php echo $aviso->fecha;?> </h2>
</div>

<div class="invitados">
<h2> Descripción Completa:<h2>
<p><?php echo $aviso->detalle;?></p>
</div>

<?php
// Esta el visitante logueado? como EMPRESA o como USUARIO?
// Si esta loguedo como usuario ofrecele una POSTULACION:
if((isset($_SESSION['logeado'])) && (!isset($_GET['postularme'])) && (isset($_SESSION['usuario']))){
	include('contenido/agregar-postulacion.php');
}
if((isset($_SESSION['logeado'])) && (isset($_GET['postularme'])) && (isset($_SESSION['usuario']))){
	include('contenido/mostrar-form-postulacion.php');
}
?>

<?php
//////////////////////////////////////////
// A PARTIR DE AQUI NO HAY NADA COTEJADO; ES UNA COPIA SIN CORREGIR DE AGREGAR COMENTARIOS......
// Requerir y mostrar postulaciones anteriores:
//Si se envio el FORM con LA postulacion, procede...
if(isset($_POST['fPostulacionEnviada'])){
	//INSTANCIA a un objeto postulacion desde el objeto aviso creado:
	$aviso->postulacion = new postulacion();
	//LLENA las propiedades del objeto comentario conforme a que la entidad visitada es USUARIO:
	$aviso->postulacion->id_usuario = $_SESSION['id_usuario'];
	$aviso->postulacion->id_aviso = $_GET['id_aviso'];
	$aviso->postulacion->objetivo_laboral = cambiat_a_mysql($_POST['fObjetivoLaboral']);
	//Procede a INSERTar LA postulacion...
	postear_postulacion($aviso);
	}
?>

<div class="invitados">
	<h2>Postulaciones para este aviso:</h2>
	<?php mostrar_postulaciones($aviso) ?>
</div>


<?php include('footer.php'); ?>