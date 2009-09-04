<?php include('header.php'); ?>
<?php include('includes/clases/e_aviso.class.php'); ?>
<?php include('includes/clases/empresa.class.php'); ?>
<?php include('includes/clases/postulacion.class.php'); ?>
<?php include('includes/clases/usuario.class.php'); ?>

<?php
$aviso_visitado = new aviso();
$id_verif = $aviso_visitado->cargarUnAviso($_GET['mostrar_aviso_id']);
echo $aviso_visitado->ultimo_error;
$empresa_propietaria = new empresa($aviso_visitado->id_empresa);
echo $empresa_propietaria->ultimo_error;

$postulados = new postulacion();
$postulados->traerPostulacionesAviso($_GET['mostrar_aviso_id']);
echo $postulados->ultimo_error;

if($id_verif != 0){						//Si verifica que el aviso no existe lo manda a una pagina expecífica
	header("Location: " . URL_BASE . ARCH_PAG_NO_EXISTE);
	include('footer.php');
	exit -1;
}
//Preparacion de la variable "indicadora" de los permisos del visitante....
$visitante_es = '';
if(isset($_SESSION['id_empresa'])){
	if($aviso_visitado->id_empresa == $_SESSION['id_empresa']){
		$visitante_es = 'empresa_administrador';
	}
	else{
		$visitante_es = 'empresa_visitante';
	}
}
if(isset($_SESSION['id_usuario'])){
	$visitante_es = 'usuario_visitante';
}
echo 'VISITANTE_ES: ' . $visitante_es;

//////////////////////////////////////////////////////////////////////////////
//ASIGNACIÓN DEL AVISO A UN USUARIO PASADO POR GET
//////////////////////////////////////////////////////////////////////////////
if(isset($_GET['id_usuario_contratar'])){
	if($visitante_es != 'empresa_administrador'){rebotar('no_administrador');}
	$aviso_visitado->asignarAviso($_GET['id_usuario_contratar']);
	echo $aviso_visitado->ultimo_error;
	$postulado_aceptado = new usuario($_GET['id_usuario_contratar']);
	echo $postulado_aceptado->ultimo_error;
	//Preparo y envio el mail de aceptación al profesional...
	$codigohtml = "<html><head><title>Ha sido aceptada tu postulación en el siguiente trabajo:</title></head><body><a href=\"" . $_SERVER['REQUEST_URI'] . "\">Ir a WebTaller</a></body>";
	$email = $postulado_aceptado->email;
	$asunto = 'Postulacion Aceptada!';
	$cabeceras = "From: bubblescomunidad@bubblescomunidad.com\r\nContent-type: text/html\r\n";
	mail($email,$asunto,$codigohtml,$cabeceras);
	//Preparo y envio el mail de aceptación a la Empresa...
	$codigohtml = "<html><head><title>Has aceptado postulación en el siguiente trabajo:</title></head><body><a href=\"" . $_SERVER['REQUEST_URI'] . "\">Ir a WebTaller</a></body>";
	$email = $empresa_propietaria->email_usuario;
	$asunto = 'Trabajo Asignado!';
	$cabeceras = "From: bubblescomunidad@bubblescomunidad.com\r\nContent-type: text/html\r\n";
	mail($email,$asunto,$codigohtml,$cabeceras);
	
}
echo $aviso_visitado->status;
?>

<div class="col-izquierda">
<?php include('contenido/usuarios-destacados-col.php'); ?>
</div>

<div class="col-central">
	<div class="col-busqueda-centro">
		<div class="titulo-oferta-completa">
			<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
			</p>
			<p class="parrafo8" style="float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;">
				Fecha de Publicación: <?php echo myquery::cambiaFaNormal($aviso_visitado->fecha); ?>
			</p>
		</div>
		<div class="borde-empresa-oferta-completa">
			<p style="color: #ff0000; float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;" class="parrafo8">
				<?php
				if($aviso_visitado->status == 'TRABAJO_ASIGNADO'){
					echo 'TRABAJO YA ASIGNADO A UN PROFESIONAL';
				}elseif($aviso_visitado->status == 'CONTRATO_CERRADO'){
					echo'CONTRATO CERRADO';
				}elseif($aviso_visitado->status == 'TRABAJO_REALIZADO'){
					echo 'TRABAJO YA REALIZADO';
				}
				?>
			</p>
			<div class="foto-oferta-laboral">
				<img src="<?php echo DIR_FOTOS_EMPRESAS_CHICAS . $empresa_propietaria->ruta_foto; ?>" />
			</div>
			<div class="descripcion-empresa">
				<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				Datos de la Empresa
				</p>
				<div style="clear: both;"></div>
				<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				<?php echo $empresa_propietaria->razon_social;?>
				</p>
				<div style="clear: both;"></div>
				<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				Pais: <?php echo $empresa_propietaria->pais;?>
				</p>
				<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				Ciudad: <?php echo $empresa_propietaria->ciudad;?>
				</p>
				<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				Dirección: <?php echo $empresa_propietaria->calle;?> <?php echo $empresa_propietaria->altura;?>
				 <?php echo $empresa_propietaria->piso;?> <?php echo $empresa_propietaria->oficina;?>
				</p>
			</div>
		</div>
		<div class="contenido-oferta-completa">
			<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				Trabajo solicitado: <p class="parrafo3" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;"><?php echo $aviso_visitado->profesion_requerida;?></p>
			</p>
			<div style="clear: both;"></div>
			<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				Perfil del profesional requerido: <p class="parrafo3" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;"><?php echo $aviso_visitado->detalle;?></p>
			</p>
			<div style="clear: both;"></div>
			<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				Cualidades excuyentes: <p class="parrafo3" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;"><?php echo $aviso_visitado->capacidad;?></p>
			</p>
			<div style="clear: both;"></div>
			<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				Nivel de experiencia: <p class="parrafo3" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;"><?php echo $aviso_visitado->nivel;?></p>
			</p>
			<div style="clear: both;"></div>
			<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				Modalidad del Trabajo: <p class="parrafo3" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;"><?php echo $aviso_visitado->modalidad;?></p>
			</p>
			<div style="clear: both;"></div>
			<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				Monto máximo a invertir: <p class="parrafo3" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">$<?php echo $aviso_visitado->pago;?> (pesos argentinos)</p>
			</p>
			<div style="clear: both;"></div>
			<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				Fecha de entrega: <p class="parrafo3" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;"><?php echo $aviso_visitado->fecha_entrega;?></p>
			</p>
		</div>
		<div class="pie-oferta-completa">
			<p style="color: #ff0000; float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;" class="parrafo8">
				<a href="
				<?php
				if($visitante_es == 'usuario_visitante' && $aviso_visitado->status == 'NO_ASIGNADO'){
					echo 'u-galeria.php?entidad_visitada=' . usuario::id2alias($_SESSION['id_usuario']) . '&solapa_superior=ninguna_activa&botonera_superior=sin_botonera&contenido_superior=mis_postulaciones&id_postularme_aviso=' . $aviso_visitado->id_aviso;
				}
				elseif($visitante_es == 'empresa_administrador'){
					echo 'e-galeria.php?entidad_visitada=' . empresa::id2aliasUsuario($_SESSION['id_empresa']) . '&solapa_superior=ver_mis_ofertas&botonera_superior=ver_mis_ofertas&contenido_superior=ver_mis_ofertas';
				}
				?>
				">
				<?php
				if($visitante_es == 'usuario_visitante' && $aviso_visitado->status == 'NO_ASIGNADO'){
					echo 'POSTULARME';
				}
				elseif($visitante_es == 'empresa_administrador'){
					echo 'ADMINISTRAR MIS OFERTAS LABORALES';
				}
				?>
				</a>
			</p>
		</div>
		<div class="contenido-oferta-completa">
		<?php
		$i=0;
		while($i<$postulados->ult_filas_afectadas){
			include('contenido/casilla/central/oferta/una-postulacion.php');
		$i++;
		}
		?>
		</div>
	</div>
</div>

<div class="col-derecha">
<?php include('contenido/casilla/general/contenido/empresas-destacadas-col.php'); ?>
</div>

<?php include('footer.php'); ?>