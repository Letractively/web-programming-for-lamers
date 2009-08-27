<?php
if($visitante_es != 'usuario_administrador'){rebotar('no_administrador');}
$error_subiendo_portfolio = '';
$nueva_muestra = new muestra();
if(isset($_POST['subir_portfolio'])){
	if(isset($_POST['nuevo'])){
		if(0 < $_FILES['img1']['size'] && $_FILES['img1']['size'] < PESO_MAXIMO_PORTFOLIO && $_POST['titulo_portfolio'] != '' ){
			//si ya se hizo clic en submit
			$nueva_muestra->id_usuario = $visitado->id_usuario;
			$nueva_muestra->titulo = myquery::cambiaTaMysql($_POST['titulo_portfolio']);
			$nueva_muestra->comentario = myquery::cambiaTaMysql($_POST['comentario_portfolio']);
			$nueva_muestra->guardarMuestra();
			echo $nueva_muestra->ultimo_error;
			$nueva_muestra->traerMuestrasCriterio(0, 1, $visitado->id_usuario);	//Busca la ULTIMA ENTRADA de este usuario para nombrar la foto:
			echo $nueva_muestra->ultimo_error;
			$nueva_muestra->id_muestra = $nueva_muestra->mu_id_muestra[0];
			$fotos=imgResample2("img1", DIR_PORTFOLIOS_PROFESIONALES, $nueva_muestra->id_muestra , DIMENSION_PORTFOLIO_GRANDE, DIMENSION_PORTFOLIO_GRANDE, DIMENSION_PORTFOLIO_CHICO, DIMENSION_PORTFOLIO_CHICO);
			$nueva_muestra->cargarRutaImagen($nueva_muestra->id_muestra . '.jpg');
			echo $nueva_muestra->ultimo_error;
		}
		elseif(0 == $_FILES['img1']['size']){
		$error_subiendo_portfolio = 'RUTA_INCORRECTA';
		}
		elseif($_POST['titulo_portfolio'] == ''){
		$error_subiendo_portfolio = 'FALTA_TITULO';
		}
		else{
		$error_subiendo_portfolio = 'PESO_INCORRECTO';
		}
	}
	if(isset($_POST['eliminar'])){
		$nueva_muestra->cargarRutaImagen('default.jpg'); //BORRAR el ROW correspondiente!!
	}
}
?>

<div class="contenido-portfolio">
	<div class="cabecera-portfolio">
		<h2><strong>Subir un nuevo trabajo</strong></h2>
	</div>
	<div class="imagenes-portfolio">
	<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="POST" enctype="multipart/form-data" name="editpage" id="editpage">
		<p class="parrafo8" style="color: #ff0000;">
			<?php if($error_subiendo_portfolio == 'RUTA_INCORRECTA'){echo 'La ruta del archivo a subir es incorrecta!';} ?>
			<?php if($error_subiendo_portfolio == 'PESO_INCORRECTO'){echo 'La foto a subir es demasido pesada!';} ?>
			<?php if($error_subiendo_portfolio == 'FALTA_TITULO'){echo 'Debe poner un titulo al trabajo!';} ?>
		</p>
		<p class="parrafo8">Título:<input type="text" name="titulo_portfolio" /></p>
				<p class="parrafo8">Breve Descripción:<input type="text" name="comentario_portfolio" /></p>
		<input name="img1" type="file" id="img1" size="40">
		<input type="hidden" name="subir_portfolio" value="subir_portfolio" />
		<input type="submit" name="nuevo" class="boton2" value="Subir" />
		<p class="parrafo8">Vista Previa:</p>
		<img src="<?php echo DIR_PORTFOLIOS_PROFESIONALES_CHICOS . $nueva_muestra->ruta_imagen . '?' . rand(); ?>" />
	</form>
	</div>
	<div class="recorrer-portfolio">
		<p class="parrafo3 al-medio boton2">
			<a href="profesional/<?php echo $_GET['entidad_visitada'] ?>">
			Aceptar
			</a>
		</p>
	</div>
</div>