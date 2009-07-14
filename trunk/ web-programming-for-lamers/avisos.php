<?php include('header.php'); ?>
<?php include('includes/clases/busqueda.class.php'); ?>

<?php
$busqueda = new busqueda();
?>

<?php
//INSTANCIAR a un objeto aviso y Presentar avisos 
//Si se envio el FORM-POST con LA BUSQUEDA, procede...
//if(isset($_POST['fAvisoEnviado'])){
	//LLENA los criterios en el objeto busqueda: INCOMPLETO!
	
	//INSTANCIA a un objeto aviso desde el objeto busqueda creado:
	$busqueda->aviso = new aviso();
	//Trae los avisos de la DB segun la busqueda:
	$busqueda->aviso->traerAvisosSegunCriterio();
//}
?>

<div>
	<h2>Avisos que coinciden con su criterio de búsqueda:</h2>
	<?php mostrar_avisos_busqueda($busqueda); ?>
</div>

<?php include('footer.php'); ?>