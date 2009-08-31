<?php if($visitante_es == 'no_identificado'){rebotar('no_identificado');} ?>

<?php
//$error_insertando_comentario = '';
$este_comentario = new comentario();

//if(isset($_POST['nuevo_comentario'])){
//	if($_POST['contenido_comentario'] != ''){
//		if(isset($_SESSION['id_usuario'])){
//			$este_comentario->desde_entidad = 'PROFESIONAL';
//			$este_comentario->id_desde = $_SESSION['id_usuario'];
//		}elseif(isset($_SESSION['id_empresa'])){
//			$este_comentario->desde_entidad = 'EMPRESA';
//			$este_comentario->id_desde = $_SESSION['id_empresa'];
//		}
//		$este_comentario->para_entidad = 'PROFESIONAL';
//		$este_comentario->id_para = $visitado->id_usuario;
//		$este_comentario->detalle = myquery::cambiaTaMysql($_POST['contenido_comentario']);
//		$este_comentario->guardarComentario();
//		echo $este_comentario->ultimo_error;
//	}else{
//		$error_insertando_comentario = 'CONTENIDO_VACIO';
//	}	
//}
$este_comentario->traerComentarios($visitado->id_empresa, 'EMPRESA');
echo $este_comentario->ultimo_error;
?>

	<div class="col-busqueda-centro">
		<div class="col-busqueda-cabecera">
			<img class="icono" src="imagenes/icono-busqueda-laboral.png"/>
		</div>
		<div class="col-busqueda-solapas">
			<div class="solapa3">
			<h2>Empresas</h2>
			</div>
			<div class="solapa2">
			<h2>Profesionales</h2>
			</div>
			<div class="solapa1">
			<h2>Laborales</h2>
			</div>
		</div>
		<div class="col-busqueda-form">
		<p>col-busqueda-form</p>
		</div>
		<div class="col-busqueda-contenido">
<!--		<div class="borde-comentario">
				<div class="dejar-comentario">
					<form id="myform" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
					<p>Dejá tu comentario</p>
					<textarea name="contenido_comentario"></textarea>
					<input type="hidden" name="nuevo_comentario" value="nuevo_comentario"/>
					<input type="submit" name="enviar_comentario" value="Comentar" class="parrafo3 boton1" />
					</form>
				</div>
			</div>-->
			<?php
			$i = 0;
			while($i < $este_comentario->ult_filas_afectadas){
				include('contenido/casilla/central/empresa/contenido/un-comentario-mio-completo.php');
				$i++;
			}
			 ?>
		</div>
		<div class="col-busqueda-pie">
		</div>		
		
	</div>