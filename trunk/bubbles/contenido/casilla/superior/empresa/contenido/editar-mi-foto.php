<?php
if($visitante_es != 'empresa_administrador'){rebotar('no_administrador');}
$error_renovando_foto = '';
if(isset($_POST['epRenovarFoto'])){
	if(isset($_POST['nueva'])){
		if(0 < $_FILES['img1']['size'] && $_FILES['img1']['size'] < PESO_MAXIMO_AVATAR){
		//si ya se hizo clic en submit
			$fotos=imgResample2("img1", DIR_FOTOS_EMPRESAS, $visitado->id_empresa, DIMENSION_FOTO_GRANDE, DIMENSION_FOTO_GRANDE, DIMENSION_FOTO_CHICA, DIMENSION_FOTO_CHICA); 
			$visitado->cargarRutaFoto($visitado->id_empresa . '.jpg');
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
		<h2><strong>Mi logo empresarial</strong></h2>
	</div>
	<div class="imagenes-portfolio">
		<p class="parrafo8" style="color: #ff0000;">
			<?php if($error_renovando_foto == 'RUTA_INCORRECTA'){echo 'La ruta del archivo a subir es incorrecta!';} ?>
			<?php if($error_renovando_foto == 'PESO_INCORRECTO'){echo 'La foto a subir es demasido pesada!';} ?>
		</p>
		<input name="img1" type="file" id="img1" size="40">
		<input type="submit" name="nueva" class="boton2" value="Subir" />
		<p class="parrafo8">Vista Previa:</p>
		<img src="<?php echo DIR_FOTOS_EMPRESAS . $visitado->ruta_foto . '?' . rand(); ?>" />
		</form>
	</div>
	<div class="recorrer-portfolio">
		<p class="parrafo3 al-medio boton2">
			<a href="empresa/<?php echo $_GET['entidad_visitada'] ?>">
			Aceptar
			</a>
		</p>
	</div>
</div>