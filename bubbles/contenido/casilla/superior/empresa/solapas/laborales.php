<?php
$contenido_superior_solapa_mensajes = 'casilla_entrada';
$leyenda_solapa_mensaje = 'Mensajes';
if(strstr($visitante_es,'_visitante')){
$contenido_superior_solapa_mensajes = 'nuevo_mensaje';
$leyenda_solapa_mensaje = 'Dejar msj.';
}
?>

	<div class="borde-solapas">
		<a href="e-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&solapa_superior=laborales&botonera_superior=subir_oferta&contenido_superior=subir_oferta">
		<div class="solapa-empresa">
				<img src="imagenes/icono-laborales-empresa.png" style="position: absolute; margin-top: 20px; margin-left: 5px; border: 0;" />
			<p class="parrafo3" style="position: absolute; margin-top: 60px; margin-left: 20px; border: 0;">Laborales</p>
		</div>
		</a>
		<a href="e-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&solapa_superior=mensajes&botonera_superior=nuevo_mensaje&contenido_superior=<?php echo $contenido_superior_solapa_mensajes ?>">
		<div class="solapa-empresa">
				<img src="imagenes/icono-mensajes.png" style="position: absolute; margin-top: 15px; margin-left: 20px; border: 0;" />
			
			<p class="parrafo3" style="position: absolute; margin-top: 60px; margin-left: 20px; border: 0;"><?php echo $leyenda_solapa_mensaje ?></p>
		</div>
		</a>
		<div class="solapa-empresa">
		
		</div>
		<div class="solapa-empresa">
		
		</div>
	</div>