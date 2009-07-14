<?php include('header.php'); ?>
<?php include('includes/clases/usuario.class.php');?>

<?php
////////////////////////////////////////PASO 1
if(isset($_GET['estudios'])){
	//Levantar los datos a travez de un objeto usuario (usuario->traerEstudios();)
	$usuarioCv = new usuario($_SESSION['id_usuario']);
	//Traigo los datos hacia mi objeto:
	$usuarioCv->traerEstudios();
	// Trato los datos para utilizarlos hacia el FORM, pero dentro del include...
	include('contenido/editar-estudios.php');
	}
if(isset($_POST['fuGuardarEstudios'])){
	// Guardo los datos que vienen por POST, primero instancio mi objeto usuario:
	$usuarioCv = new usuario($_SESSION['id_usuario']);
	// Ahora nodifico los atributos del objeto con las variables del POST (y acomodo las que tengo que acomodar para la DB):
	// NINGUNO de los campos se toma como obligatorio, asi que deben verificarse si estan seteados...
	if(isset($_POST['fuNivelEstudio'])){
		$usuarioCv->nivel_estudio = $_POST['fuNivelEstudio'];
	}
	if(isset($_POST['fuAreaEstudio'])){
		$usuarioCv->area_estudio = $_POST['fuAreaEstudio'];
	}
	if(isset($_POST['fuInstitucionEstudio'])){
		$usuarioCv->institucion_estudio = $_POST['fuInstitucionEstudio'];
	}
	if(isset($_POST['fuPaisEstudio'])){
		$usuarioCv->pais_estudio = $_POST['fuPaisEstudio'];
	}
	if(isset($_POST['fuInicioEstudio'])){
	$usuarioCv->inicio_estudio = cambiaf_a_mysql($_POST['fuInicioEstudio']);
	}
	if(isset($_POST['fuFinEstudio'])){
		$usuarioCv->fin_estudio = cambiaf_a_mysql($_POST['fuFinEstudio']);
	}
	if(isset($_POST['fuEstudiaAun'])){		// Un usuario que AUN estudia EVIDENTEMENTE no tiene fecha de finalizacion de estudios.
		$usuarioCv->estudia_aun = 1;
		$usuarioCv->fin_estudio = '0000-00-00';
	}
	else{
		$usuarioCv->estudia_aun = 0;
	}
	if(isset($_POST['fuIdioma1'])){
		$usuarioCv->idioma_1 = $_POST['fuIdioma1'];
	}
	if(isset($_POST['fuIdioma2'])){
		$usuarioCv->idioma_2 = $_POST['fuIdioma2'];
	}
	if(isset($_POST['fuIdioma3'])){
		$usuarioCv->idioma_3 = $_POST['fuIdioma3'];
	}
	if(isset($_POST['fuIdioma4'])){
		$usuarioCv->idioma_4 = $_POST['fuIdioma4'];
	}
	if(isset($_POST['fuNivelIdioma1'])){
		$usuarioCv->nivel_idioma_1 = $_POST['fuNivelIdioma1'];
	}
	if(isset($_POST['fuNivelIdioma2'])){
		$usuarioCv->nivel_idioma_2 = $_POST['fuNivelIdioma2'];
	}
	if(isset($_POST['fuNivelIdioma3'])){
		$usuarioCv->nivel_idioma_3 = $_POST['fuNivelIdioma3'];
	}
	if(isset($_POST['fuNivelIdioma4'])){
		$usuarioCv->nivel_idioma_4 = $_POST['fuNivelIdioma4'];
	}
	if(isset($_POST['fuOtrosConocimientos'])){
		$usuarioCv->otros_conocimientos = cambiat_a_mysql($_POST['fuOtrosConocimientos']);
	}
	if(isset($_POST['fuObjetivosLaborales'])){
		$usuarioCv->objetivos_laborales = cambiat_a_mysql($_POST['fuObjetivosLaborales']);	//addcslashes($_POST['fuObjetivosLaborales'],'/n');
	} //echo preg_replace("(\r\n)", "", $_POST['fuObjetivosLaborales']);
	echo '<br />-------';
	
	// Por último, guardo en la DB todos los atributos del método guardarEstudios:
	$usuarioCv->guardarEstudios();
	echo $usuarioCv->ultimo_error;
	//...vuelvo a cargar las variables..
	$usuarioCv->traerEstudios();
	//...y vuelvo a mostrar la página:
	include('contenido/editar-estudios.php');
	}
	
////////////////////////////////////////PASO 2
if(isset($_GET['experiencias'])){
	$usuarioCv = new usuario($_SESSION['id_usuario']);
	mostrar_experiencias($usuarioCv);
	include('contenido/editar-experiencias.php');
}
if(isset($_POST['fuGuardarExperiencias'])){
	// instancio a un OBJETO usuario, y luego a un OBJETO experiencia dentro de El:
	$usuarioCv = new usuario($_SESSION['id_usuario']);
	$usuarioCv->experiencia = new u_experiencia();
	//$usuarioCv->experiencia = new u_experiencia();
	// Completamos al OBJETO experiencia filtrando los datos que vienen del POST:
	// NINGUNO de los campos se toma como obligatorio, asi que deben verificarse si estan seteados...
	if(isset($_POST['fuContratista'])){
		$usuarioCv->experiencia->contratista = $_POST['fuContratista'];
	}
	if(isset($_POST['fuRadicacion'])){
		$usuarioCv->experiencia->radicacion = $_POST['fuRadicacion'];
	}
	if(isset($_POST['fuRamo'])){
		$usuarioCv->experiencia->ramo = $_POST['fuRamo'];
	}
	if(isset($_POST['fuPuesto'])){
		$usuarioCv->experiencia->puesto = $_POST['fuPuesto'];
	}
	if(isset($_POST['fuEspecialidadEjercida'])){
		$usuarioCv->experiencia->especialidad_ejercida = $_POST['fuEspecialidadEjercida'];
	}
	if(isset($_POST['fuNombreJerarquia'])){
		$usuarioCv->experiencia->nombre_jerarquia = $_POST['fuNombreJerarquia'];
	}
	if(isset($_POST['fuIngreso'])){
		$usuarioCv->experiencia->ingreso = cambiaf_a_mysql($_POST['fuIngreso']);
	}
	if(isset($_POST['fuEgreso'])){
		$usuarioCv->experiencia->egreso = cambiaf_a_mysql($_POST['fuEgreso']);
	}
	if(isset($_POST['fuTareasEjercidas'])){
		$usuarioCv->experiencia->tareas_ejercidas = $_POST['fuTareasEjercidas'];
	}
	// Guardamos la experiencia actual en la DB:
	$usuarioCv->guardarExperiencia();
	echo $usuarioCv->ultimo_error;
	// Traigo todas las experiencias del usuario actual para presentarlas:
	$usuarioCv->traerExperiencias();
	echo $usuarioCv->ultimo_error;
	include('contenido/editar-experiencias.php');
}
?>

<?php include('footer.php'); ?>