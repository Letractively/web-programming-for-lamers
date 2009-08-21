<?php include('header.php'); ?>
<?php include('includes/clases/busqueda.class.php'); ?>
<?php include('includes/clases/empresa.class.php'); ?>
<?php include('includes/clases/e_aviso.class.php'); ?>
<?php include('includes/clases/usuario.class.php'); ?>

<?php
$error_busqueda = '';
$buClase = '';
$buDe = '';
$buCriterio = '';

$esta_busqueda = new busqueda();
if(isset($_GET['buDe'])){
	$buDe = $_GET['buDe'];
	if($buDe == ''){
	$error_busqueda = 'FALTA_DE';	
	}
}
else{
	$error_busqueda = 'FALTA_DE';
}
if(isset($_GET['buClase'])){
	$buClase = $_GET['buClase'];
	if($buClase == ''){
	$error_busqueda = 'FALTA_CLASE';	
	}
}
else{
	$error_busqueda = 'FALTA_CLASE';
}
if(isset($_GET['buCriterio']) && $error_busqueda == ''){
	$esta_busqueda->criterio = $_GET['buCriterio'];
		if($esta_busqueda->criterio == ''){
	$error_busqueda = 'FALTA_CRITERIO';	
	}
	switch ($buDe) {
	case 'Ofertas Laborales':
		$esta_busqueda->buscarAvisos();
        break;
	case 'Profesionales':
		$esta_busqueda->buscarProfesionales();
        break;
	case 'Empresas':
		$esta_busqueda->buscarEmpresas();
        break;
	default:
		break;
	}
	echo $esta_busqueda->ultimo_error;
}else{

}
echo $error_busqueda;
?>

<div class="col-izquierda">
	<div class="col-busqueda-izquierda">
		<p>col-busqueda-izquierda</p>
	</div>
</div>

<div class="col-central">
	<div class="col-busqueda-centro">
		<div class="col-busqueda-cabecera">
			<img class="icono" src="imagenes/icono-busqueda-laboral.png"/>
		</div>
		<div class="col-busqueda-solapas">
			<div class="solapa3">
			<h2>Empresas</h2>
			</div>
			<div class="solapa2">
			<h2>Profesionales</h2>
			</div>
			<div class="solapa1">
			<h2>Laborales</h2>
			</div>
		</div>
		<div class="col-busqueda-form">
		<p>col-busqueda-form</p>
		</div>
		<div class="col-busqueda-contenido">
			<?php 
			if($error_busqueda != ''){ 
			echo '<p class="parrafo3" style="color: #ff0000">Debe llenar correctamente los campos de busqueda!!</p>';
			}
			elseif(	$buDe == 'Ofertas Laborales'){
				$i = 0;
				for($i == 0;$i<$esta_busqueda->ult_filas_afectadas ;$i++){
					include('contenido/casilla/central/busqueda/un-aviso-clasificado.php');
				}
			}
			elseif(	$buDe == 'Profesionales'){
				$i = 0;
				for($i == 0;$i<$esta_busqueda->ult_filas_afectadas ;$i++){
					include('contenido/casilla/central/busqueda/un-profesional.php');
				}
			}
			elseif(	$buDe == 'Empresas'){
				$i = 0;
				for($i == 0;$i<$esta_busqueda->ult_filas_afectadas ;$i++){
					include('contenido/casilla/central/busqueda/una-empresa.php');
				}
			}
			?>
		</div>
		<div class="col-busqueda-pie">
		</div>
		
	</div>
</div>

<div class="col-derecha">
	<div class="col-busqueda-derecha">
		<p>col-busqueda-derecha</p>
	</div>
</div>

<?php include('footer.php'); ?>