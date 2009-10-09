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
	while ($i < $oferta_laboral->ult_filas_afectadas){
		include('contenido/casilla/derecha/general/un-aviso-clasificado.php');
		$i++;
	}
	?>
	</div>
	<div class="relleno-oferta-col">
		<p style="color: rgb(153, 153, 153); float: right; margin-right: 10px; margin-top: 20px; margin-bottom: 0px;" class="parrafo8"><a style="color: rgb(153, 153, 153)" class="vinculobubbles parrafo8" href="busqueda.php?buCriterio=&buDe=Ofertas+Laborales&buClase=buSimple&buscar=Buscar"> Ver todas las ofertas laborales...</a></p>
	</div>
	<div class="inferior">
	</div>
</div>