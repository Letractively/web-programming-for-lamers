<?php
$este_comentario = new comentario();

if(isset($_POST['ecComentar'])){
	if($_POST['ecDetalle'] != ''){
		if(isset($_SESSION['id_usuario'])){
			$este_comentario->desde_entidad = 'PROFESIONAL';
			$este_comentario->id_desde = $_SESSION['id_usuario'];
		}elseif(isset($_SESSION['id_empresa'])){
			$este_comentario->desde_entidad = 'EMPRESA';
			$este_comentario->id_desde = $_SESSION['id_empresa'];
		}
		$este_comentario->para_entidad = 'EMPRESA';
		$este_comentario->id_para = $visitado->id_empresa;
		$este_comentario->detalle = myquery::cambiaTaMysql($_POST['ecDetalle']);
		$este_comentario->guardarComentario();
		echo $este_comentario->ultimo_error;
	}else{
		$error_insertando_comentario = 'CONTENIDO_VACIO';
	}	
}

$este_comentario->traerComentarios($visitado->id_empresa, 'EMPRESA', 'LIMIT 0, 2');
echo $este_comentario->ultimo_error;
?>

<div class="casilla-inferior">
	<div class="extremo-izq">
	</div>
	<div class="borde-contenido">
		<div class="superior-comentarios">
			<img src="imagenes/icono-comentarios.png" style="position: absolute; margin-top: 15px; margin-left: 10px;" />
			<p><strong>Comentarios para <?php echo $visitado->razon_social ?><a href="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&casilla_central=todos_comentarios&contenido_central=todos_comentarios">
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
		</div>
		<div class="inferior-comentarios">
			<form id="myform" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
			<div class="buscar-amigos">
				<div class="buscar-amigos-izq">
				</div>
				<div class="buscar-amigos-cont">
				<textarea class="comentario-a-empresa" name="ecDetalle"></textarea>
				</div>
				<div class="buscar-amigos-der">
				</div>
				<div class="agregar-comentario">
					<input type="hidden" name="ecComentar" value="ecComentar"/>
					<input type="submit" value="Comentar" class="parrafo3 boton1" />
			</div>

			</div>
		</div>
	
	</div>
	<div class="extremo-der">
	</div>
</div>