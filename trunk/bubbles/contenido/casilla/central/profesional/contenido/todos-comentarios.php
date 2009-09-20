<?php if($visitante_es == 'no_identificado'){rebotar('no_identificado');} ?>

<?php
$error_insertando_comentario = '';
$alias_comentador = '';
$este_comentario = new comentario();

if(isset($_POST['nuevo_comentario'])){
	if($_POST['contenido_comentario'] != ''){
		if(isset($_SESSION['id_usuario'])){
			$este_comentario->desde_entidad = 'PROFESIONAL';
			$este_comentario->id_desde = $_SESSION['id_usuario'];
			// Levanto los datos básicos de la amistad agregada para saber a quien envio el comentario:
			$este_comentador_datos = new usuario($este_comentario->id_desde);
			$este_comentador_alias = $este_comentador_datos->alias;
		}elseif(isset($_SESSION['id_empresa'])){
			$este_comentario->desde_entidad = 'EMPRESA';
			$este_comentario->id_desde = $_SESSION['id_empresa'];
			// Levanto los datos básicos de la amistad agregada para saber a quien envio el comentario:
			$este_comentador_datos = new empresa($este_comentario->id_desde);
			$este_comentador_alias = $este_comentador_datos->alias_usuario;
		}
		$este_comentario->para_entidad = 'PROFESIONAL';
		$este_comentario->id_para = $visitado->id_usuario;
		$este_comentario->detalle = myquery::cambiaTaMysql($_POST['contenido_comentario']);
		$este_comentario->guardarComentario();
		echo $este_comentario->ultimo_error;
		
		// Avisar a "$este_visitado" de que le ha dejado un comentario otra entidad....
		$codigohtml = $este_comentador_alias . ' te ha dejado un comentario:<br />';
		$codigohtml .= "<html><head><title></title></head><body><a href=\"" . URL_BASE . "u-galeria.php?entidad_visitada=" . $visitado->alias . "&casilla_central=todos_comentarios&contenido_central=todos_comentarios\">Haz click aqui para ver el comentario</a><br />";
		$codigohtml .= '</html></body>';
		$email = $visitado->email;
		$asunto = 'Tienes un nuevo comentario';
		$cabeceras = "From: bubblescomunidad@bubblescomunidad.com\r\nContent-type: text/html\r\n";
		mail($email,$asunto,$codigohtml,$cabeceras);
	}else{
		$error_insertando_comentario = 'CONTENIDO_VACIO';
	}	
}
$este_comentario->traerComentarios($visitado->id_usuario, 'PROFESIONAL');
echo $este_comentario->ultimo_error;
?>

	<div class="col-comentarios-centro">
		<div class="col-comentarios-cabecera">
			<img class="icono" src="imagenes/icono-todos-comentarios.png"/>
		</div>
		<!--<div class="col-comentarios-solapas">
			<div class="solapa3">
			<h2>Empresas</h2>
			</div>
			<div class="solapa2">
			<h2>Profesionales</h2>
			</div>
			<div class="solapa1">
			<h2>Laborales</h2>
			</div>
		</div>-->
		<!--<div class="col-comentarios-form">
		<p>col-busqueda-form</p>
		</div>-->
		<div class="col-comentarios-contenido">
			<div class="borde-comentario">
				<div class="dejar-comentario">
					<form id="myform" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
					<p>Dejá tu comentario</p>
					<!--<div style="clear: both;">
					</div>-->
					<textarea name="contenido_comentario"></textarea>
					<input type="hidden" name="nuevo_comentario" value="nuevo_comentario"/>
					<input type="submit" name="enviar_comentario" value="Comentar" class="parrafo3 boton1" />
					</form>
				</div>
			</div>
			<?php
			$i = 0;
			while($i < $este_comentario->ult_filas_afectadas){
				include('contenido/casilla/central/profesional/contenido/un-comentario-mio-completo.php');
				$i++;
			}
			 ?>
		</div>
		<div class="col-comentarios-pie">
		</div>		
		
	</div>