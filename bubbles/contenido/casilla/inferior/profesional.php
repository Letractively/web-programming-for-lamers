<?php
$este_comentario = new comentario();
$este_comentario->traerComentarios($visitado->id_usuario, 'PROFESIONAL', 'LIMIT 0, 2');
echo $este_comentario->ultimo_error;

$este_amigo = new amistad();
$este_amigo->traerAmistades($visitado->id_usuario, 'LIMIT 0, 9');
echo $este_amigo->ultimo_error;
?>

<div class="casilla-inferior">
	<div class="extremo-izq">
	</div>
	<div class="borde-contenido">
		<div class="superior-comentarios">
			<img src="imagenes/icono-comentarios.png" style="position: absolute; margin-top: 15px; margin-left: 10px;" />
			<p><strong>Comentarios <a href="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&casilla_central=todos_comentarios&contenido_central=todos_comentarios">
									Ver todos...</a>
			</strong></p>
		</div>
		<div class="superior-amigos">
			<img src="imagenes/uritorco-mis-amigos.png" style="position: absolute; margin-top: 0px; margin-left: 15px;" />
			<p><strong>Amigos <a href="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&casilla_central=todos_amigos&contenido_central=todos_amigos">
								Ver todos...</a>
			</strong></p>
		</div>
		<div class="contenido-comentarios">
			<div class="listar-comentarios">
				<?php
				$i=0;
				for($i==0; $i<2 && $i<$este_comentario->ult_filas_afectadas; $i++){
					include('contenido/casilla/inferior/profesional/contenido/un-comentario-mio-chico.php');
				}
				?>
			</div>
			<div style="clear: both"></div>
			<div class="agregar-comentario">
				<p class="parrafo3 boton1">
					<a href="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&casilla_central=todos_comentarios&contenido_central=todos_comentarios">
					Comentar
					</a>
				</p>
			</div>
		</div>
		<div class="contenido-amigos">
			<?php
				$i=0;
				for($i==0; $i<6 && $i<$este_amigo->ult_filas_afectadas; $i++){
					include('contenido/casilla/inferior/profesional/contenido/un-amigo-mio-chico.php');
				}
			?>
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
			<?php
				$i=6;
				for($i==6; $i<9 && $i<$este_amigo->ult_filas_afectadas; $i++){
					include('contenido/casilla/inferior/profesional/contenido/un-amigo-mio-chico.php');
				}
			?>
		</div>
	
	</div>
	<div class="extremo-der">
	</div>
</div>