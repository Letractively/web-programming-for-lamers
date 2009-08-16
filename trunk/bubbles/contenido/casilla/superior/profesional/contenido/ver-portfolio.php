<?php
$mi_portfolio = new muestra();
$error_eliminando_portfolio = '';
$mi_portfolio_offset = 0;
$mi_portfolio_boton_siguiente = 'DESABILITADO';
$mi_portfolio_boton_anterior = 'DESABILITADO';
if(isset($_GET['eliminar_muestra_id']) && ((file_exists(DIR_PORTFOLIOS_PROFESIONALES_CHICOS . $_GET['eliminar_muestra_id'] . '.jpg')))
	&& (file_exists(DIR_PORTFOLIOS_PROFESIONALES . $_GET['eliminar_muestra_id'] . '.jpg'))){
	if ((!unlink(DIR_PORTFOLIOS_PROFESIONALES_CHICOS . $_GET['eliminar_muestra_id'] . '.jpg'))
		|| (!unlink(DIR_PORTFOLIOS_PROFESIONALES . $_GET['eliminar_muestra_id'] . '.jpg'))){
		$error_eliminando_portfolio = 'NO_SE_BORRARON_ARCHIVOS';
	}
	$mi_portfolio->borrarMuestra($_GET['eliminar_muestra_id']); //BORRAR el ROW correspondiente!!
	echo $mi_portfolio->ultimo_error;
}
if(isset($_GET['mi_portfolio_offset']))
{
	$mi_portfolio_offset = $_GET['mi_portfolio_offset'];
}
$mi_portfolio->traerMuestrasCriterio($mi_portfolio_offset, 7, $visitado->id_usuario);
echo $mi_portfolio->ultimo_error;
?>

<script type="text/javascript" src="jquery-fancybox/js/jquery.fancybox-1.2.1.js"></script>
<link rel="stylesheet" href="jquery-fancybox/fancybox.css" type="text/css" media="screen">
<script type="text/javascript">
	$(document).ready(function() {
		$("a.muestra").fancybox();
	});
</script>

<div class="contenido-portfolio">
	<div class="cabecera-portfolio">
		<h2><strong>Mi portfolio</strong></h2>
		<p class="parrafo8" style="color: #ff0000;">
			<?php if ($error_eliminando_portfolio == 'NO_SE_BORRARON_ARCHIVOS'){ echo 'no se pudieron eliminar los archivos!';} ?>
			<?php if ($error_eliminando_portfolio == 'ARCHIVO_YA_ELIMINADO'){ echo 'el archivo ya ha sido eliminado!';} ?>
		</p>
	</div>
	<div class="imagenes-portfolio">
	<?php
	$i=0;
	if($mi_portfolio->ult_filas_afectadas > 6){
		$mi_portfolio_boton_siguiente = 'HABILITADO';
	}
	if($mi_portfolio_offset != 0){
		$mi_portfolio_boton_anterior = 'HABILITADO';
	}
	for($i==0; $i<($mi_portfolio->ult_filas_afectadas); $i++){
		include('contenido/casilla/superior/profesional/contenido/un-portfolio-mio.php');
	}
	?>
	</div>
	<div class="recorrer-portfolio">
		<a href="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada']; ?>&solapa_superior=portfolio&botonera_superior=ver_portfolio&contenido_superior=ver_portfolio&mi_portfolio_offset=<?php echo ($mi_portfolio_offset - 6); ?>">
			<input type="button" <?php if($mi_portfolio_boton_anterior != 'HABILITADO'){ echo 'disabled = "TRUE"';}?> class="boton3" name="upSiguiente" value="Atras" />
		</a>
		<a href="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada']; ?>&solapa_superior=portfolio&botonera_superior=ver_portfolio&contenido_superior=ver_portfolio&mi_portfolio_offset=<?php echo ($mi_portfolio_offset + 6); ?>">
			<input type="button" <?php if($mi_portfolio_boton_siguiente != 'HABILITADO'){ echo 'disabled = "TRUE"';}?> class="boton3" name="upSiguiente" value="Seguir" />
		</a>
	</div>
</div>