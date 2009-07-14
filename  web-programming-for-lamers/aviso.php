<?php include('header.php'); ?>
<?php include('includes/clases/e_aviso.class.php'); ?>
<?php include('includes/clases/empresa.class.php'); ?>
<?php include('includes/clases/postulacion.class.php'); ?>

<?php
if(!isset($_GET['id_aviso'])){
	echo 'La página no existe';
	exit;
}
// Requerir datos de la OFERTA:
$aviso = new aviso();
$aviso->id_aviso = $_GET['id_aviso'];
$aviso->cargarUnAviso($_GET['id_aviso']);
echo $aviso->ultimo_error;
// Requerir datos de la EMPRESA:
$aviso->empresa = new empresa();
$aviso->empresa->cargarBasicosEmpresa($aviso->id_empresa);

?>

<div class="invitados">
<h2> Oferta laboral: <?php echo $aviso->titulo;?>, de: <?php echo $aviso->empresa->nombre; ?>, 
	posteado por: <?php echo $aviso->empresa->alias_usuario; ?> </h2>
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