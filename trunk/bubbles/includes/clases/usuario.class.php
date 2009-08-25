<?php
// Clase padre "usuario".

class usuario {
	var $sql;			//sera OBJETO de Conexión a la DB.
	var $experiencia;	//sera OBJETO de la clase u_experiencia.
	var $comentario;	//sera OBJETO de la clase comentario.

	var $id_usuario;	//variables en TABLE 'usuarios' e inicializadas por $this->nuevoUsuario(...)
	var $alias;
	var $contrasenia;
	var $email;
	var $nacimiento;
	var $ruta_foto;
	var $pregunta_secreta;
	var $respuesta_secreta;
	var $nombres;
	var $apellidos;
	var $empresa;
	var	$sexo;
	var $pais_residencia;
	var $profesion_1;
	var	$profesion_2;
	var $profesion_3;
	var $nivel_profesion;
	var $desea_news;
	var $desea_laborales;
	var $desea_profesionales;
	var $miembro_desde;
	var $status;

	var $us_id_usuario = array();	//ARRAYs para la seleccion de muchos usuarios
	var $us_alias = array();
	var $us_nombres = array();
	var $us_apellidos = array();
	var $us_nacimiento = array();
	var $us_miembro_desde = array();
	var $us_ruta_foto = array();
	var $us_sexo = array();
	var $us_pais_residencia = array();
	var $us_empresa = array();
	var $us_edad = array();
	var $us_profesion_1 = array();
	var $us_profesion_2 = array();
	var $us_profesion_3 = array();
	var $us_nivel_profesion = array();
	
	var $edad;			//Variables calculadas a partir de la TABLE 'usuarios'
	var $ultimo_error;			//Contiene el "string" que define el ultimo error provocado en esta clase.
	
	function usuario($id_usuario = -1, $alias = '') {	//Constructor - Cotejar si se paso un ID o ALIAS, para ser utilizado por el objeto, o si se llamo para cargar un nuevo usuario.
	$this->sql = new myquery;							//Instancia a la clase de conexion myquery
	if(($id_usuario == -1) && ($alias == '')){
			$this->id_usuario = -1;	//variables en TABLE 'usuarios' e inicializadas por $this->nuevoUsuario(...)
			$this->alias = NULL;
			$this->contrasenia = NULL;
			$this->email = NULL;
			$this->nacimiento = NULL;
			$this->ruta_foto = NULL;
			$this->pregunta_secreta = NULL;
			$this->respuesta_secreta = NULL;
			$this->nombres = NULL;
			$this->apellidos = NULL;
			$this->empresa = NULL;
			$this->sexo = NULL;
			$this->pais_residencia = NULL;
			$this->profesion_1 = NULL;
			$this->profesion_2 = NULL;
			$this->profesion_3 = NULL;
			$this->nivel_profesion = NULL;
			$this->desea_news = NULL;
			$this->desea_laborales = NULL;
			$this->desea_profesionales = NULL;
			$this->miembro_desde = NULL;
			$this->status = NULL;

			$this->edad = NULL;
			$this->ultimo_error = NULL;
		}
		else{
			if($id_usuario > -1){
				//Verificar que el ID exista en la DB para poder trabajar con el ID.
				$sql = "SELECT * FROM usuarios WHERE id_usuario = '$id_usuario'";
				$result = mysql_query($sql);
				if(!(mysql_error() == '')){
					$this->ultimo_error = 'No existe el usuario, o Query incorrecto a Mysql - ';
					echo mysql_error();
					return  -1; // => Error al consultar a la DB!
				}
				$n_result = mysql_num_rows($result);
				if($n_result != 1){
					$this->ultimo_error = 'Hay un numero de IDs encontrados distinto de uno!';
					return -2;	// => Hay un numero de ID's encontrados distinto de uno!
				}
				$fila = mysql_fetch_array($result, MYSQL_ASSOC);
				$this->id_usuario = $fila['id_usuario'];
				$this->alias = $fila['alias'];
				$this->contrasenia = $fila['contrasenia'];
				$this->nombres = $fila['nombres'];
				$this->apellidos = $fila['apellidos'];
				$this->email = $fila['email'];
				$this->empresa = $fila['empresa'];
				$this->nacimiento = $fila['nacimiento'];
				$this->status = $fila['status'];
				$this->miembro_desde = $fila['miembro_desde'];
				$this->ruta_foto = $fila['ruta_foto'];
				$this->profesion_1 = $fila['profesion_1'];
				$this->nivel_profesion = $fila['nivel_profesion'];
				$this->pais_residencia = $fila['pais_residencia'];
				return 0;		// => ID encontrado y datos básicos cargados en el Objeto
			}
			if($alias != ''){
				//Buscar "si existe" el ID correspondiente al ALIAS para poder trabajar con el ID.
				//Verificar que el ID exista en la DB para poder trabajar con el ID.
				$sql = "SELECT id_usuario FROM usuarios WHERE alias = '$alias'";
				$result = mysql_query($sql);
				if(!(mysql_error() == '')){
					echo mysql_error();
					return  -3;	// => Error al conectar a la DB!
				}
				$nfilas = mysql_num_rows($result);
				if($nfilas != 1){
					return -4;	// => Hay un Numero de USUARIO encontrado distinto de uno!
				}
				$fila = mysql_fetch_array($result, MYSQL_ASSOC);
				$this->id_usuario = $fila['id_usuario'];
				return 0;	// => USUARIO encontrado e ID escrito en el Objeto
			}
		}
	}

		
	
	//////////////////////////////////////////////////////////////////
	// METODOS PARA OBJETOS CONSTRUIDOS SOBRE USUARIOS INSTANCIADOS y REGISTRADOS....
	
	function idUsuario(){	//Retorna IDUSUARIO del OBJETO actual. Solo lectura. el IDUSUARIO se inserta SOLO mediante el metodo this->nuevoUsuario.
		if($this->id_usuario > -1){
			//Leer de la DB??
			return $this->id_usuario;
		}
		else{
			return -1;
		}
	}

	function alias(){											//Retorna ALIAS del OBJETO actual. Solo lectura. el ALIAS Se inserta SOLO mediante el metodo this->nuevoUsuario.
		if($this->idUsuario() > -1){							//$this->idUsuario debe retornar > -1	//AUN NO HA SIDO PROBADA
			$filas = $this->sql->leer('alias', 'usuarios', "id_usuario = '$this->id_usuario'");
			$this->alias = $filas['alias'];
			return $this->alias;
		}
	return FALSE;
	}

	function contrasenia($contrasenia = NULL){ //Convierte el string dado a MD5, o bien retorna el MD5 del usuario para cotejar
		if($this->idUsuario() > -1){
			if($contrasenia != NULL){
				//convertirla a md5
				//Insertar en la DB
				$contrasenia = md5($contrasenia);
				return $this->contrasenia;
			}
			else{
				//Leer de la DB . RECORDAR que retornara el hash MD5 de 32 caracteres.
				$filas = $this->sql->leer('contrasenia', 'usuarios', "id_usuario = '$this->id_usuario'");
				$this->contrasenia = $filas['contrasenia'];
				return $this->contrasenia;
			}
		}
	return FALSE;
	}

	function nombres($nombres = NULL){
		echo 1;
		if($this->idUsuario() > -1){
			echo 2;
			if($nombres != NULL){
				echo 3;
				//Insertar en la DB
				$this->nombres = $nombres;
				return $this->nombres;
			}
			else{
				//Leer de la DB
				$filas = $this->sql->leer('nombres', 'usuarios', "id_usuario = '$this->id_usuario'");
				$this->nombres = $filas['nombres'];
				return $this->nombres;
			}
		}
	return FALSE;
	}

	function apellidos($apellidos = NULL){
		if($this->idUsuario() > -1){
			if($apellidos != NULL){
				//Insertar en la DB
				$this->apellidos = $apellidos;
				return $this->apellidos;
			}
			else{
				//Leer de la DB
				$filas = $this->sql->leer('apellidos', 'usuarios', "id_usuario = '$this->id_usuario'");
				$this->apellidos = $filas['apellidos'];
				return $this->apellidos;
			}
		}
	return FALSE;
	}

	function email($email = NULL){
		if($this->idUsuario() > -1){
			if($email != NULL){
				//Insertar en la DB
				$this->email = $email;
				return $this->email;
			}
			else{
				//Leer de la DB
				$filas = $this->sql->leer('email', 'usuarios', "id_usuario = '$this->id_usuario'");
				$this->email = $filas['email'];
				return $this->email;
			}
		}
	return FALSE;
	}

	function nDocumento($n_documento = NULL){
		if($this->idUsuario() > -1){
			if($n_documento != NULL){
				//Insertar en la DB
				$this->n_documento = $n_documento;
				return $this->n_documento;
			}
			else{
				//Leer de la DB
				$filas = $this->sql->leer('n_documento', 'usuarios', "id_usuario = '$this->id_usuario'");
				$this->n_documento = $filas['n_documento'];
				return $this->n_documento;
			}
		}
	return FALSE;
	}

	function nacimiento($nacimiento = NULL){
		if($this->idUsuario() > -1){
			if($nacimiento != NULL){
				//Insertar en la DB
				$this->nacimiento = $nacimiento;
				return $this->nacimiento;
			}
			else{
				$filas = $this->sql->leer('nacimiento', 'usuarios', "id_usuario = '$this->id_usuario'");
				$this->nacimiento = $filas['nacimiento'];
				return $this->nacimiento;
			}
		}
	return FALSE;
	}
	
	function especializacion($especializacion = NULL){
		if($this->idUsuario() > -1){		
			if($especializacion != NULL){
				//Insertar en la DB
				$this->especializacion = $especializacion;
				return $this->especializacion;
			}
			else{
			$filas = $this->sql->leer('especializacion', 'usuarios', "id_usuario = '$this->id_usuario'");
			$this->especializacion = $filas['especializacion'];
				return $this->especializacion;
			}
		}
	return FALSE;
	}

	function status($status = NULL){
		if($this->idUsuario() > -1){
			if($status != NULL){
				//Insertar en la DB
				$filas = $this->sql->cambiar("status = '$status'", 'usuarios', "id_usuario = '$this->id_usuario'");
				if($this->sql->ultimo_error != ''){
					$this->ultimo_error = 'Error al UPDATEar el STATUS!: ' . $this->sql->ultimo_error;
					return -1;
				}
				$this->status = $status;
				return $this->status;
			}
			else{
				//Leer de la DB
				$filas = $this->sql->leer('status', 'usuarios', "id_usuario = '$this->id_usuario'");
				$this->status = $filas['status'];
				return $this->status;
			}
		}
	return FALSE;
	}

////////////////////////////////////////////////////////////////////////////////////////////////
//Metodos que calculan propiedades de esta clase, a partir de otras propiedades ya ingresadas-->
////////////////////////////////////////////////////////////////////////////////////////////////

	function edad(){	//'edad' es una cantidad calculada sobre la DB, por lo tanto no puede ser INSERTada!
		if($this->id_usuario > -1 ){
			$sql = "SELECT nacimiento, CURRENT_DATE, (YEAR(CURRENT_DATE) - YEAR(nacimiento)) 
			- (RIGHT(CURRENT_DATE,5) < RIGHT(nacimiento,5)) AS edad FROM usuarios WHERE id_usuario = " . $this->id_usuario;
			$result = mysql_query($sql);
			if(!(mysql_error() == '')){
				echo mysql_error();
				return  -1;
			}
		$fila = mysql_fetch_array($result, MYSQL_ASSOC);
		$this->edad = $fila['edad'];
		return $this->edad;
		}
	return -1;
	}
			
//////
//<--
//////

	function traerEstudios(){
		if($this->idUsuario() > -1){
			//Leer de la DB
			$filas = $this->sql->leer('*', 'usuarios', "id_usuario = '$this->id_usuario'");
				if($this->sql->ultimo_error != ''){
					$this->ultimo_error = 'Error al traer los Estudios de la DB!: ' . $this->sql->ultimo_error;
					return -1;
				}
			$this->nivel_estudio = $filas['nivel_estudio'];
			$this->area_estudio = $filas['area_estudio'];
			$this->institucion_estudio = $filas['institucion_estudio'];
			$this->pais_estudio = $filas['pais_estudio'];
			$this->inicio_estudio = $filas['inicio_estudio'];
			$this->fin_estudio = $filas['fin_estudio'];
			$this->estudia_aun = $filas['estudia_aun'];
			$this->idioma_1 = $filas['idioma_1'];
			$this->idioma_2 = $filas['idioma_2'];
			$this->idioma_3 = $filas['idioma_3'];
			$this->idioma_4 = $filas['idioma_4'];
			$this->nivel_idioma_1 = $filas['nivel_idioma_1'];
			$this->nivel_idioma_2 = $filas['nivel_idioma_2'];
			$this->nivel_idioma_3 = $filas['nivel_idioma_3'];
			$this->nivel_idioma_4 = $filas['nivel_idioma_4'];
			$this->otros_conocientos = $filas['otros_conocimientos'];
			$this->objetivos_laborales = $filas['objetivos_laborales'];
			return 0;
		}
	return -1;
	}

	function guardarEstudios(){
		if($this->idUsuario() > -1){
			//Insertar en la DB
			$filas = $this->sql->cambiar("nivel_estudio = '$this->nivel_estudio',
										area_estudio = '$this->area_estudio',
										institucion_estudio = '$this->institucion_estudio',
										pais_estudio = '$this->pais_estudio',
										inicio_estudio = '$this->inicio_estudio',
										fin_estudio = '$this->fin_estudio',
										estudia_aun = '$this->estudia_aun',
										idioma_1 = '$this->idioma_1',
										idioma_2 = '$this->idioma_2',
										idioma_3 = '$this->idioma_3',
										idioma_4 = '$this->idioma_4',
										nivel_idioma_1 = '$this->nivel_idioma_1',
										nivel_idioma_2 = '$this->nivel_idioma_2',
										nivel_idioma_3 = '$this->nivel_idioma_3',
										nivel_idioma_4 = '$this->nivel_idioma_4',
										otros_conocimientos = '$this->otros_conocimientos',
										objetivos_laborales = '$this->objetivos_laborales'"
										, 'usuarios', "id_usuario = '$this->id_usuario'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al UPDATEar el STATUS!: ' . $this->sql->ultimo_error;
				return -1;
			}
			return 0;
		}
	return -1;
	}

	function guardarExperiencia(){
		$this->experiencia->guardarExperiencia($this->id_usuario);
		if($this->experiencia->ultimo_error != ''){
			$this->ultimo_error = $this->experiencia->ultimo_error;
			return -1;
		}
	return 0;
	}
	
	function traerExperiencias(){
		$this->experiencia->traerExperiencias($this->id_usuario);
		if($this->experiencia->ultimo_error != ''){
			$this->ultimo_error = $this->experiencia->ultimo_error;
			return -1;
		}
		return 0;
	}

	function guardarComentario(){
		$this->comentario->guardarComentario($this->id_usuario);
		if($this->comentario->ultimo_error != ''){
			$this->ultimo_error = $this->comentario->ultimo_error;
			return -1;
		}
	return 0;
	}
	
	function traerComentarios(){
		$this->comentario->traerComentarios($this->id_usuario, 1);
		if($this->comentario->ultimo_error != ''){
			$this->ultimo_error = $this->comentario->ultimo_error;
			return -1;
		}
		// presentación en pantalla:
		//echo $this->comentario->ult_filas_afectadas . ' columnas afectadas<br />';
		//$i = 0;
		//while ($i < $this->comentario->ult_filas_afectadas) {
		//		echo $this->comentario->com_id_comentario[$i] . ' -- ';
		//		echo $this->comentario->com_desde_usuario[$i] . ' -- ';
		//		echo $this->comentario->com_para_usuario[$i] . ' -- ';
		//		echo $this->comentario->com_id_desde[$i] . ' -- ';
		//		echo $this->comentario->com_id_para[$i] . ' -- ';
		//		echo $this->comentario->com_fecha[$i] . ' -- ';
		//		echo $this->comentario->com_detalle[$i] . ' -- ';
		//		echo $this->comentario->com_status[$i] . ' -- ';
		//		echo '<br />';
		//		$i ++;				
		//	}
		return 0;
	}

	function cargarRutaFoto($ruta_foto = 'default'){
		if($this->idUsuario() > -1){
			//Leer de la DB
			$filas = $this->sql->cambiar("ruta_foto = '$ruta_foto'", 'usuarios', "id_usuario = '$this->id_usuario'");
				if($this->sql->ultimo_error != ''){
					$this->ultimo_error = 'Error al caargar la FOto de este Profesional de la DB!: ' . $this->sql->ultimo_error;
					return -1;
				}
			$this->ruta_foto = $ruta_foto;
			return 0;
		}
	return -1;
	}

	function traerRutaFoto($id_usuario = -1){
		if($id_usuario > -1){
			//Leer de la DB
			$filas = $this->sql->leer('ruta_foto', 'usuarios', "id_usuario = '$id_usuario'");
				if($this->sql->ultimo_error != ''){
					$this->ultimo_error = 'Error al traer los Datos de este Profesional de la DB!: ' . $this->sql->ultimo_error;
					return -1;
				}
			$this->ruta_foto = $filas[0]['ruta_foto'];
			return 0;
		}
	return -1;
	}
	
	function cargarDatosPerfil(){
		if($this->idUsuario() > -1){
			//Leer de la DB
			$filas = $this->sql->leer('*', 'usuarios', "id_usuario = '$this->id_usuario'");
				if($this->sql->ultimo_error != ''){
					$this->ultimo_error = 'Error al traer los Datos de este Profesional de la DB!: ' . $this->sql->ultimo_error;
					return -1;
				}
			$this->nombres = $filas[0]['nombres'];
			$this->apellidos = $filas[0]['apellidos'];
			$this->nacimiento = $filas[0]['nacimiento'];
			$this->miembro_desde = $filas[0]['miembro_desde'];
			$this->ruta_foto = $filas[0]['ruta_foto'];
			$this->sexo = $filas[0]['sexo'];
			$this->pais_residencia = $filas[0]['pais_residencia'];
			$this->empresa = $filas[0]['empresa'];
			$this->edad();
			$this->profesion_1 = $filas[0]['profesion_1'];
			$this->profesion_2 = $filas[0]['profesion_2'];
			$this->profesion_3 = $filas[0]['profesion_3'];
			$this->nivel_profesion = $filas[0]['nivel_profesion'];
			return 0;
		}
	return -1;
	}

	function guardarDatosPerfil(){
		if($this->idUsuario() > -1){
			//Insertar en la DB
			$filas = $this->sql->cambiar("email = '$this->email',
										nacimiento = '$this->nacimiento',
										nombres = '$this->nombres',
										apellidos = '$this->apellidos',
										empresa = '$this->empresa',
										sexo = '$this->sexo',
										pais_residencia = '$this->pais_residencia',
										profesion_1 = '$this->profesion_1',
										profesion_2 = '$this->profesion_2',
										profesion_3 = '$this->profesion_3',
										nivel_profesion = '$this->nivel_profesion'"
										, 'usuarios', "id_usuario = '$this->id_usuario'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al UPDATEar el PERFIL!: ' . $this->sql->ultimo_error;
				return -1;
			}
			return 0;
		}
	return -1;
	}
	
	function traerColUsuariosDestacados($comienzo, $cantidad){
		if(($comienzo >= 0) && ($cantidad>=0)){
			// Traer usuarios de la DB;
			$filas = $this->sql->leer('*','usuarios',"1 ORDER BY id_usuario ASC LIMIT $comienzo, $cantidad");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar lo(s) Usuarios(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->us_id_usuario[$i] = $fila['id_usuario'];
				$this->us_alias[$i] = $fila['alias'];
				$this->us_nombres[$i] = $fila['nombres'];
				$this->us_apellidos[$i] = $fila['apellidos'];
				$this->us_miembro_desde[$i] = $fila['miembro_desde'];
				$this->us_ruta_foto[$i] = $fila['ruta_foto'];
				$this->us_pais_residencia[$i] = $fila['pais_residencia'];
				$this->id_usuario = $fila['id_usuario'];	//Variable preparada para calcular la edad a continuacion..
				$this->us_edad[$i] = $this->edad();
				$this->us_profesion_1[$i] = $fila['profesion_1'];
				$this->us_nivel_profesion[$i] = $fila['nivel_profesion'];
				$i ++;
				}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}
	
	function ultimoError(){
		return $this->ultimo_error;
	}
	
	function id2alias($idUsuario = -1){								//Retorna ALIAS del IDUSUARIO dado. Solo lectura. el ALIAS Se inserta SOLO mediante el metodo this->nuevoUsuario.
		if($idUsuario > -1){										//$idUsuario debe ser > -1
			$sql = "SELECT alias FROM usuarios WHERE id_usuario = " . $idUsuario;
			$result = mysql_query($sql);
			if(!(mysql_error() == '')){
				echo mysql_error();
				return  -1;
			}
			$fila = mysql_fetch_array($result, MYSQL_ASSOC);
			return $fila['alias'];
		}
	return -1;
	}
	
	function alias2id($alias = ''){								//Retorna IDUSUARIO del ALIAS dado. Solo lectura. el IDUSUARIO Se inserta SOLO mediante el metodo this->nuevoUsuario.
		if($alias != ''){										//$this->alias debe ser != ''
			$sql = "SELECT id_usuario FROM usuarios WHERE alias = '$alias'";
			$result = mysql_query($sql);
			if(!(mysql_error() == '')){
				echo mysql_error();
				return  -1;
			}
			$fila = mysql_fetch_array($result, MYSQL_ASSOC);
			return $fila['id_usuario'];
		}
	return -1;
	}
	
	
	/////////////////////////////////////////////////////////////////////
	// METODOS PARA CLASE SOBRE USUARIOS AUN NO REGISTRADOS
	/////////////////////////////////////////////////////////////////////
	function nuevoUsuario($alias = '',
							$contrasenia = '',
							$email = '',
							$nacimiento = '',
							$ruta_foto = '',
							$pregunta_secreta = '',
							$respuesta_secreta = '',
							$nombres = '',
							$apellidos = '',
							$empresa = '',
							$sexo =  '',
							$pais_residencia = '',
							$profesion_1 = '',
							$profesion_2 = '',
							$profesion_3 = '',
							$nivel_profesion = '',
							$desea_news = '',
							$desea_laborales = '',
							$desea_profesionales = '',
							$status = ''){
	
		global $db;
	
	// Los datos se presuponen validados en JS.

	// CHECKEAMOS que el 'alias' no se repita:
		$sql = "SELECT id_usuario FROM usuarios WHERE alias = '$alias'";
		$result = mysql_query($sql);
		if(!(mysql_error() == '')){
			echo mysql_error();
			return  -1;
		}
		$result = mysql_num_rows($result);
		if($result != 0){
			return -2;
		}
	// Convertimos la contraseña a MD5...
		$contrasenia = md5($contrasenia);
	// Datos a la DB
		$sql = "INSERT INTO usuarios (alias,
										contrasenia,
										email,
										nacimiento,
										ruta_foto,
										pregunta_secreta,
										respuesta_secreta,
										nombres,
										apellidos,
										empresa,
										sexo,
										pais_residencia,
										profesion_1,
										profesion_2,
										profesion_3,
										nivel_profesion,
										desea_news,
										desea_laborales,
										desea_profesionales,
										status)
									VALUES ('$alias',
										'$contrasenia',
										'$email',
										'$nacimiento',
										'$ruta_foto',
										'$pregunta_secreta',
										'$respuesta_secreta',
										'$nombres',
										'$apellidos',
										'$empresa',
										'$sexo',
										'$pais_residencia',
										'$profesion_1',
										'$profesion_2',
										'$profesion_3',
										'$nivel_profesion',
										'$desea_news',
										'$desea_laborales',
										'$desea_profesionales',
										'$status')";
		$result = mysql_query($sql);
		if(!(mysql_error() == '')){
			echo mysql_error();
			return  -1;
		}
		
	// Completar todos los datos de este ($this) objeto usuario
		$sql = "SELECT * FROM usuarios WHERE alias = '$alias'";
		$result = mysql_query($sql);
		if(!(mysql_error() == '')){
			echo mysql_error();
			return  -1;
		}
		$fila = mysql_fetch_array($result, MYSQL_ASSOC);
		
		//$this->id_usuario = $fila["id_usuario"];		// NO Puedo usar $this si llamo a la funcion sin Instanciar!!!
		//$this->alias($fila["alias"]);
		//$this->contrasenia($fila["contrasenia"]);
		//$this->nombres($fila["nombres"]);
		//$this->apellidos($fila["apellidos"]);
		//$this->email($fila["email"]);
		//$this->n_documento($fila["n_documento"]);
		//$this->nacimiento($fila["nacimiento"]);
		//$this->especializacion($fila["especializacion"]);
		//$this->cv($fila["cv"]);
		//$this->detalle($fila["detalle"]);
		//$this->status($fila["status"]);
		
		echo "Usuario insertado Exitosamente <br />";
		mysql_free_result($result);
		
		//return $this->idUsuario();				// NO Puedo usar $this si llamo a la funcion sin Instanciar!!!
		return $fila['id_usuario'];
	}
	

	function nuevoMensajePublico( $desde_usuario = 'FALSE', // Valores por default!
									$para_usuario = 'FALSE', 
									$id_desde = DESDE_USUARIO, 
									$id_para = PARA_USUARIO, 
									$fecha = '', 
									$asunto = '', 
									$contenido = '',
									$locacion_imagen = '',
									$locacion_video = '',
									$status = ''){
		global $db;
		$sql = "INSERT INTO mensajes (desde_usuario,para_usuario,id_desde,id_para,fecha,asunto,contenido,locacion_imagen,locacion_video,status) 
		VALUES ($desde_usuario,$para_usuario,'$id_desde','$id_para','$fecha','$asunto','$contenido','$locacion_imagen','$locacion_video','$status')";
		$result = mysql_query($sql);
		echo mysql_error();
	}
	
function aliasOcupado($alias = ''){ 	//Devuelve FALSE (0) si el alias esta libre; !=FALSE por ERROR u OCUPACION;
		if($alias != ''){
			//Buscar "si existe" el ID correspondiente al ALIAS para poder trabajar con el ID.
			//Verificar que el ID exista en la DB para poder trabajar con el ID.
			$sql = "SELECT id_usuario FROM usuarios WHERE alias = '$alias'";
			$result = mysql_query($sql);
			if(!(mysql_error() == '')){
				echo mysql_error();
				$this->ultimo_error = "Error al consultar a la DB!";
				return  -1;	// => Error al consultar a la DB!
			}
			$nfilas = mysql_num_rows($result);
			if($nfilas == 0){
				return 0;	// => No se ha encontrado un ALIAS coincidente
			}
			else{
				return 1;	// => ALIAS OCUPADO!
			}
		}
		else{
			return -2;		// => Debe pasarse un ALIAS correcto como parametro!
		}
	}
}
?>