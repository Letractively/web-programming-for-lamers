<?php
if($visitante_es != 'usuario_administrador'){rebotar('no_administrador');}
$error_renovando_cv = '';
if(isset($_POST['renovar_cv'])){
	if(isset($_POST['nueva'])){
		if(0 < $_FILES['doc1']['size'] && $_FILES['doc1']['size'] < PESO_MAXIMO_CV){
		//si ya se hizo clic en submit
			$fotos=subirDocumento("doc1", DIR_CV_PROFESIONALES, $visitado->id_usuario);
			if($_FILES['doc1']['type'] == "application/pdf"){
				$visitado->cargarRutaCV($visitado->id_usuario . '.pdf');
			}
			if($_FILES['doc1']['type'] == "application/msword"){
				$visitado->cargarRutaCV($visitado->id_usuario . '.doc');
			}
			if($_FILES['doc1']['type'] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document"){
				$visitado->cargarRutaCV($visitado->id_usuario . '.docx');
			}
		}
		elseif(0 == $_FILES['doc1']['size']){
		$error_renovando_cv = 'RUTA_INCORRECTA';
		}
		else{
		$error_renovando_cv = 'PESO_INCORRECTO';
		}
	}
	if(isset($_POST['eliminar'])){
		$visitado->cargarRutaCV('');
	}
}
?>

<div class="contenido-portfolio">
	<div class="cabecera-portfolio">
		<h2><strong>Mi Curriculum Vitae</strong></h2>
	</div>
	<div class="imagenes-portfolio">
		<p class="parrafo8" style="color: #ff0000;">
			<?php if($error_renovando_cv == 'RUTA_INCORRECTA'){echo 'La ruta del archivo a subir es incorrecta!';} ?>
			<?php if($error_renovando_cv == 'PESO_INCORRECTO'){echo 'La foto a subir es demasido pesada!';} ?>
		</p>
		<input name="doc1" type="file" id="doc1" size="40">
		<input type="submit" name="nueva" class="boton2" value="Subir" />
		<!--<p class="parrafo8">Vista Previa:</p>-->
		<a href="<?php echo DIR_CV_PROFESIONALES . $visitado->ruta_cv; ?>">Ver mi CV</a>
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