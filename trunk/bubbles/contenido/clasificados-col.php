<?php
$error_publicar_aviso = '';
$oferta_laboral = new aviso();

$oferta_laboral->traerAvisosCriterio(0, 5);
echo $oferta_laboral->ultimo_error;
?>

<div class="clasificados-col">
	<div class="cabecera">
	</div>
		<div class="superior">
	</div>
	<div class="contenido">
	<?php
	$i = 0;
	while ($i < $oferta_laboral->ult_filas_afectadas) {
		include('contenido/casilla/derecha/general/un-aviso-clasificado.php');
		$i++;
	}
	?>
	</div>
	<div class="inferior">
	</div>
</div>