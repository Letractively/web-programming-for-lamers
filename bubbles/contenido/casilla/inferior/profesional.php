<?php
$error_insertando_comentario = '';
$este_comentario = new comentario();
$este_comentario->traerComentarios($visitado->id_usuario, 'PROFESIONAL', 'LIMIT 0, 2');
echo $este_comentario->ultimo_error;
?>

<div class="casilla-inferior">
	<div class="extremo-izq">
	</div>
	<div class="borde-contenido">
		<div class="superior-comentarios">
			<img src="imagenes/icono-comentarios.png" style="position: absolute; margin-top: 15px; margin-left: 10px;" />
			<p><strong>Comentarios</strong></p>
		</div>
		<div class="superior-amigos">
			<img src="imagenes/uritorco-mis-amigos.png" style="position: absolute; margin-top: 0px; margin-left: 15px;" />
			<p><strong>Amigos</strong></p>
		</div>
		<div class="contenido-comentarios">
			<div class="listar-comentarios">
				<?php
				$i=0;
				for($i==0; $i<2; $i++){
					include('contenido/casilla/inferior/profesional/contenido/un-comentario-mio-chico.php');
				}
				?>
			</div>
			<div style="clear: both"></div>
			<div class="agregar-comentario">
				<a href="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&casilla_central=todos_comentarios&contenido_central=todos_comentarios">
					<p class="parrafo3 boton1">Comentar</p>
				</a>
			</div>
		</div>
		<div class="contenido-amigos">
			<p>contenido amigos</p>
		</div>
		<div class="inferior-comentarios">
			<div class="buscar-amigos">
				<div class="buscar-amigos-izq">
				</div>
				<div class="buscar-amigos-cont">
				</div>
				<div class="buscar-amigos-der">
				</div>
			</div>
		</div>
		<div class="inferior-amigos">
			<p>inferior amigos</p>
			<p>NO IRÁ "SUGERENCIAS DE AMISTAD"!</p>
		</div>
	
	
	</div>
	<div class="extremo-der">
	</div>
</div>