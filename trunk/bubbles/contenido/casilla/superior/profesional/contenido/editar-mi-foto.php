

<?php
$error_renovando_foto = '';
if(isset($_POST['renovar_foto'])){
	if(isset($_POST['nueva'])){
		if(0 < $_FILES['img1']['size'] && $_FILES['img1']['size'] < PESO_MAXIMO_AVATAR){
		//si ya se hizo clic en submit
			$fotos=imgResample2("img1", DIR_FOTOS_PROFESIONALES, $_SESSION['id_usuario'], DIMENSION_FOTO_GRANDE, DIMENSION_FOTO_GRANDE, DIMENSION_FOTO_CHICA, DIMENSION_FOTO_CHICA); 
			//echo '<p>' . $fotos[0] . '</p>';
			//echo '<p>' . $fotos[1] . '</p>';
			//echo '<p> Vista preeliminar, foto completa: </p>';
			//echo '<p>' . $fotos[2] . '</p>';
			//echo '<p> Vista preeliminar, foto en miniatura:';
			//echo '<p>' .$fotos[3]. '<br>';
			$visitado->cargarRutaFoto($_SESSION['id_usuario'] . '.jpg');
		}
		elseif(0 == $_FILES['img1']['size']){
		$error_renovando_foto = 'RUTA_INCORRECTA';
		}
		else{
		$error_renovando_foto = 'PESO_INCORRECTO';
		}
	}
	if(isset($_POST['eliminar'])){
		$visitado->cargarRutaFoto('default.jpg');
	}
}
?>

<div class="contenido-portfolio">
	<div class="cabecera-portfolio">
		<h2><strong>Mi foto personal</strong></h2>
	</div>
	<div class="imagenes-portfolio">
		<p class="parrafo8" style="color: #ff0000;">
			<?php if($error_renovando_foto == 'RUTA_INCORRECTA'){echo 'La ruta del archivo a subir es incorrecta!';} ?>
			<?php if($error_renovando_foto == 'PESO_INCORRECTO'){echo 'La foto a subir es demasido pesada!';} ?>
		</p>
		<input name="img1" type="file" id="img1" size="40">
		<input type="submit" name="nueva" class="boton2" value="Subir" />
		<p class="parrafo8">Vista Previa:</p>
		<img src="<?php echo DIR_FOTOS_PROFESIONALES . $visitado->ruta_foto . '?' . rand(); ?>" />
		<a href="profesional/<?php echo $_GET['entidad_visitada'] ?>">
			<input type="button" name="aceptar" class="boton2" value="Aceptar" />
		</a>
		</form>
	</div>
	<div class="recorrer-portfolio">
	</div>
</div>