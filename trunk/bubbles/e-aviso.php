<?php include('header.php'); ?>
<?php include('includes/clases/e_aviso.class.php'); ?>
<?php include('includes/clases/empresa.class.php'); ?>
<?php include('includes/clases/postulacion.class.php'); ?>

<?php
$aviso_visitado = new aviso();
$id_verif = $aviso_visitado->cargarUnAviso($_GET['mostrar_aviso_id']);
echo $aviso_visitado->ultimo_error;
$empresa_propietaria = new empresa($aviso_visitado->id_empresa);
echo $empresa_propietaria->ultimo_error;

if($id_verif != 0){							//Si verifica que el aviso no existe lo manda a una pagina expecífica
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
?>

<div class="col-izquierda">
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
				Trabajo solicitado: <?php echo $aviso_visitado->profesion_requerida;?>
			</p>
			<div style="clear: both;"></div>
			<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				Perfil del profesional requerido: <?php echo $aviso_visitado->detalle;?>
			</p>
			<div style="clear: both;"></div>
			<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				Cualidades excuyentes: <?php echo $aviso_visitado->capacidad;?>
			</p>
			<div style="clear: both;"></div>
			<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				Nivel de experiencia: <?php echo $aviso_visitado->nivel;?>
			</p>
			<div style="clear: both;"></div>
			<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				Modalidad del Trabajo: <?php echo $aviso_visitado->modalidad;?>
			</p>
			<div style="clear: both;"></div>
			<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				Monto máximo a invertir: $<?php echo $aviso_visitado->pago;?> (pesos argentinos)
			</p>
			<div style="clear: both;"></div>
			<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
				Fecha de entrega: <?php echo $aviso_visitado->fecha_entrega;?>
			</p>
		</div>
		<div class="pie-oferta-completa">
			<p style="color: #ff0000; float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;" class="parrafo8">
				<a href="#">
				POSTULARME
				</a>
			</p>
		</div>
	</div>
</div>

<div class="col-derecha">
</div>

<!-- ACTUALIZADO HASTA AQUI! -->


<?php
// Esta el visitante logueado? como EMPRESA o como USUARIO?
// Si esta loguedo como usuario ofrecele una POSTULACION:
if((isset($_SESSION['logeado'])) && (!isset($_GET['postularme'])) && (isset($_SESSION['usuario']))){
	include('contenido/agregar-postulacion.php');
}
if((isset($_SESSION['logeado'])) && (isset($_GET['postularme'])) && (isset($_SESSION['usuario']))){
	include('contenido/mostrar-form-postulacion.php');
}
?>

<?php
//////////////////////////////////////////
// A PARTIR DE AQUI NO HAY NADA COTEJADO; ES UNA COPIA SIN CORREGIR DE AGREGAR COMENTARIOS......
// Requerir y mostrar postulaciones anteriores:
//Si se envio el FORM con LA postulacion, procede...
if(isset($_POST['fPostulacionEnviada'])){
	//INSTANCIA a un objeto postulacion desde el objeto aviso creado:
	$aviso->postulacion = new postulacion();
	//LLENA las propiedades del objeto comentario conforme a que la entidad visitada es USUARIO:
	$aviso->postulacion->id_usuario = $_SESSION['id_usuario'];
	$aviso->postulacion->id_aviso = $_GET['id_aviso'];
	$aviso->postulacion->objetivo_laboral = cambiat_a_mysql($_POST['fObjetivoLaboral']);
	//Procede a INSERTar LA postulacion...
	postear_postulacion($aviso);
	}
?>

<div class="invitados">
	<h2>Postulaciones para este aviso:</h2>
	<?php //mostrar_postulaciones($aviso) ?>
</div>


<?php include('footer.php'); ?>