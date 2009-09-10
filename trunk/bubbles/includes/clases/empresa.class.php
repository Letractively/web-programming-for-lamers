<?php
// Clase padre "empresa".

class empresa{
	var $sql;			//OBJETO de Conexión a la DB.
	var $comentario;	//OBJETO de la clase comentario que guarda relacion con esta empresa.
	var $aviso;			////OBJETO de la clase aviso que guarda relacion con esta empresa.
	
	var $id_empresa;	//variables en TABLE 'empresas' e inicializadas por $this->nuevaEmpresa(...)
	var $razon_social;
	var $contrasenia_usuario;
	var $pregunta_secreta_usuario;
	var $respuesta_secreta_usuario;
	var $email_usuario;
	var $alias_usuario;
	var $calle;
	var $altura;
	var $piso;
	var $oficina;
	var $nacimiento_usuario;
	var $sexo_usuario;
	var $pais;
	var $ciudad;
	var $puesto_usuario;
	var $tel_usuario;
	var $ruta_foto;
	var $desea_news;
	var $desea_laborales;
	var $desea_profesionales;
	var $status;
	var $miembro_desde_usuario;

	var $em_id_empresa = array();	//ARRAYs para selecciones multiples
	var $em_razon_social = array();
	var $em_contrasenia_usuario = array();
	var $em_pregunta_secreta_usuario = array();
	var $em_respuesta_secreta_usuario = array();
	var $em_email_usuario = array();
	var $em_alias_usuario = array();
	var $em_calle = array();
	var $em_altura = array();
	var $em_piso = array();
	var $em_oficina = array();
	var $em_nacimiento_usuario = array();
	var $em_sexo_usuario = array();
	var $em_pais = array();
	var $em_ciudad = array();
	var $em_puesto_usuario = array();
	var $em_tel_usuario = array();
	var $em_ruta_foto = array();
	var $em_desea_news = array();
	var $em_desea_laborales = array();
	var $em_desea_profesionales = array();
	var $em_status = array();
	var $em_miembro_desde_usuario = array();
	
	var $edad_contacto;			//Variables calculadas a partir de la TABLE 'empresas'
	var $ultimo_error;			//Contiene el "string" que define el ultimo error provocado en esta clase.
	
	function empresa($id_empresa = -1, $alias_usuario = '') {	//Constructor - Cotejar si se paso un ID o ALIAS, para ser utilizado por el objeto, o si se llamo para cargar un nuevo usuario.
	$this->sql = new myquery;							//Instancia a la clase de conexion myquery
	if(($id_empresa == -1) && ($alias_usuario == '')){
			$this->id_empresa = -1;
			$this->razon_social = NULL;
			$this->contrasenia_usuario = NULL;
			$this->pregunta_secreta_usuario = NULL;
			$this->respuesta_secreta_usuario = NULL;
			$this->email_usuario = NULL;
			$this->alias_usuario = NULL;
			$this->calle = NULL;
			$this->altura = NULL;
			$this->piso = NULL;
			$this->oficina = NULL;
			$this->nacimiento_usuario = NULL;
			$this->sexo_usuario = NULL;
			$this->pais = NULL;
			$this->ciudad = NULL;
			$this->puesto_usuario = NULL;
			$this->tel_usuario = NULL;
			$this->ruta_foto = NULL;
			$this->desea_news = NULL;
			$this->desea_laborales = NULL;
			$this->desea_profesionales = NULL;
			$this->status = NULL;
			$this->miembro_desde_usuario = NULL;
	
			$this->edad_contacto = NULL;
			$this->ultimo_error = NULL;
		}
		else{
			if($id_empresa > -1){
				//Verificar que el ID exista en la DB para poder trabajar con el ID.
				$sql = "SELECT * FROM empresas WHERE id_empresa = '$id_empresa'";
				$result = mysql_query($sql);
				if(!(mysql_error() == '')){
					$this->ultimo_error = 'No existe La empresa, o Query incorrecto a Mysql - ';
					echo mysql_error();
					return  -1; // => Error al consultar a la DB!
				}
				$n_result = mysql_num_rows($result);
				if($n_result != 1){
					$this->ultimo_error = 'Hay un numero de IDs encontrados distinto de uno!';
					return -2;	// => Hay un numero de ID's encontrados distinto de uno!
				}
				//Si el ID de la Empresa pasado es correcto; se cargan todas las PROPIEDADES del objeto EMPRESA instanciado:
				$fila = mysql_fetch_array($result, MYSQL_ASSOC);
				$this->id_empresa = $fila['id_empresa'];
				$this->razon_social = $fila['razon_social'];
				$this->contrasenia_usuario = $fila['contrasenia_usuario'];
				$this->pregunta_secreta_usuario = $fila['pregunta_secreta_usuario'];
				$this->respuesta_secreta_usuario = $fila['respuesta_secreta_usuario'];
				$this->email_usuario = $fila['email_usuario'];
				$this->alias_usuario = $fila['alias_usuario'];
				$this->calle = $fila['calle'];
				$this->altura = $fila['altura'];
				$this->piso = $fila['piso'];
				$this->oficina = $fila['oficina'];
				$this->nacimiento_usuario = $fila['piso'];
				$this->sexo_usuario = $fila['piso'];
				$this->pais = $fila['pais'];
				$this->ciudad = $fila['ciudad'];
				$this->puesto_usuario = $fila['puesto_usuario'];
				$this->tel_usuario = $fila['tel_usuario'];
				$this->ruta_foto = $fila['ruta_foto'];
				$this->desea_news = $fila['desea_news'];
				$this->desea_laborales = $fila['desea_laborales'];
				$this->desea_profesionales = $fila['desea_profesionales'];
				$this->status = $fila['status'];
				$this->miembro_desde_usuario = $fila['miembro_desde_usuario'];
				
				return 0;		// => ID encontrado y escrito en el Objeto
			}
			if($alias_usuario != ''){
				//Buscar "si existe" el ID correspondiente al ALIAS_USUARIO para poder trabajar con el ID.
				//Verificar que el ID exista en la DB para poder trabajar con el ID.
				$sql = "SELECT id_empresa FROM empresas WHERE alias_usuario = '$alias_usuario'";
				$result = mysql_query($sql);
				if(!(mysql_error() == '')){
					echo mysql_error();
					return  -3;	// => Error al conectar a la DB!
				}
				$nfilas = mysql_num_rows($result);
				if($nfilas != 1){
				return -4;	// => Hay un Numero de ALIAS_USUARIO encontrado distinto de uno!
				}
				$fila = mysql_fetch_array($result, MYSQL_ASSOC);
				$this->id_empresa = $fila['id_empresa'];
				return 0;	// => ALIAS_USUARIO encontrado e ID escrito en el Objeto
			}
		}
	}

		
	
	//////////////////////////////////////////////////////////////////
	// METODOS PARA OBJETOS CONSTRUIDOS SOBRE EMPRESAS REGISTRADAS....
	
	function idEmpresa(){	//Retorna IDUSUARIO del OBJETO actual. Solo lectura. el IDUSUARIO se inserta SOLO mediante el metodo this->nuevoUsuario.
		if($this->id_empresa > -1){
			//Leer de la DB??
			return $this->id_empresa;
		}
		else{
			return -1;
		}
	}

	function aliasUsuario(){											//Retorna ALIAS del OBJETO actual. Solo lectura. el ALIAS Se inserta SOLO mediante el metodo this->nuevoUsuario.
		if($this->idEmpresa() > -1){							//$this->idUsuario debe retornar > -1	//AUN NO HA SIDO PROBADA
			$filas = $this->sql->leer('alias_usuario', 'empresas', "id_empresa = '$this->id_empresa'");
			$this->alias_usuario = $filas['alias_usuario'];
			return $this->alias_usuario;
		}
	return FALSE;
	}

	function contraseniaUsuario($contrasenia = NULL){ //Convierte el string dado a MD5, o bien retorna el MD5 del usuario para cotejar
		if($this->idEmpresa() > -1){
			if($contrasenia != NULL){
				//convertirla a md5
				//Insertar en la DB
				$contrasenia_usuario = md5($contrasenia_usuario);
				return $this->contrasenia_usuario;
			}
			else{
				//Leer de la DB . RECORDAR que retornara el hash MD5 de 32 caracteres.
				$filas = $this->sql->leer('contrasenia_usuario', 'empresas', "id_empresa = '$this->id_empresa'");
				$this->contrasenia_usuario = $filas['contrasenia_usuario'];
				return $this->contrasenia_usuario;
			}
		}
	return FALSE;
	}

	function nombresContacto($nombres_contacto = NULL){
		echo 1;
		if($this->idEmpresa() > -1){
			echo 2;
			if($nombres_contacto != NULL){
				echo 3;
				//Insertar en la DB
				$this->nombresContacto = $nombresContacto;
				return $this->nombresContacto;
			}
			else{
				//Leer de la DB
				$filas = $this->sql->leer('nombres_contacto', 'empresas', "id_empresa = '$this->id_empresa'");
				$this->nombres_contacto = $filas['nombres_contacto'];
				return $this->nombres_contacto;
			}
		}
	return FALSE;
	}

	function apellidosContacto($apellidos_contacto = NULL){
		if($this->idEmpresa() > -1){
			if($apellidos_contacto != NULL){
				//Insertar en la DB
				$this->apellidos_contacto = $apellidos_contacto;
				return $this->apellidos_contacto;
			}
			else{
				//Leer de la DB
				$filas = $this->sql->leer('apellidos_contacto', 'empresas', "id_empresa = '$this->id_empresa'");
				$this->apellidos_contacto = $filas['apellidos_contacto'];
				return $this->apellidos_contacto;
			}
		}
	return FALSE;
	}

	function cargarRutaFoto($ruta_foto = 'default'){
		if($this->idEmpresa() > -1){
			//Leer de la DB
			$filas = $this->sql->cambiar("ruta_foto = '$ruta_foto'", 'empresas', "id_empresa = '$this->id_empresa'");
				if($this->sql->ultimo_error != ''){
					$this->ultimo_error = 'Error al cargar la Foto de esta Empresa de la DB!: ' . $this->sql->ultimo_error;
					return -1;
				}
			$this->ruta_foto = $ruta_foto;
			return 0;
		}
	return -1;
	}

	function traerRutaFoto($id_empresa = -1){
		if($id_empresa > -1){
			//Leer de la DB
			$filas = $this->sql->leer('ruta_foto', 'empresas', "id_empresa = '$id_empresa'");
				if($this->sql->ultimo_error != ''){
					$this->ultimo_error = 'Error al traer la  Foto de esta Empresa!: ' . $this->sql->ultimo_error;
					return -1;
				}
			$this->ruta_foto = $filas[0]['ruta_foto'];
			return 0;
		}
	return -1;
	}

	function emailUsuario($email_usuario = NULL){
		if($this->idEmpresa() > -1){
			if($email_usuario != NULL){
				//Insertar en la DB
				$this->email_usuario = $email_usuario;
				return $this->email_usuario;
			}
			else{
				//Leer de la DB
				$filas = $this->sql->leer('email_usuario', 'empresas', "id_empresa = '$this->id_empresa'");
				$this->email_usuario = $filas['email_usuario'];
				return $this->email_usuario;
			}
		}
	return FALSE;
	}

	function cuitCuil($cuit_cuil = NULL){
		if($this->idEmpresa() > -1){
			if($cuit_cuil != NULL){
				//Insertar en la DB
				$this->cuit_cuil = $cuit_cuil;
				return $this->cuit_cuil;
			}
			else{
				//Leer de la DB
				$filas = $this->sql->leer('cuit_cuil', 'empresas', "id_empresa = '$this->id_empresa'");
				$this->cuit_cuil = $filas['cuit_cuil'];
				return $this->cuit_cuil;
			}
		}
	return FALSE;
	}

	function nacimientoContacto($nacimiento_contacto = NULL){
		if($this->idEmpresa() > -1){
			if($nacimiento_contacto != NULL){
				//Insertar en la DB
				$this->nacimiento_contacto = $nacimiento_contacto;
				return $this->nacimiento_contacto;
			}
			else{
				$filas = $this->sql->leer('nacimiento_contacto', 'empresas', "id_empresa = '$this->id_empresa'");
				$this->nacimiento_contacto = $filas['nacimiento_contacto'];
				return $this->nacimiento_contacto;
			}
		}
	return FALSE;
	}
	
	function ramo($ramo = NULL){
		if($this->idEmpresa() > -1){		
			if($ramo != NULL){
				//Insertar en la DB
				$this->ramo = $ramo;
				return $this->ramo;
			}
			else{
			$filas = $this->sql->leer('ramo', 'empresas', "id_empresa = '$this->id_empresa'");
			$this->ramo = $filas['ramo'];
				return $this->ramo;
			}
		}
	return FALSE;
	}

	function status($status = NULL){
		if($this->idEmpresa() > -1){
			if($status != NULL){
				//Insertar en la DB
				$filas = $this->sql->cambiar("status = '$status'", 'empresas', "id_empresa = '$this->id_empresa'");
				if($this->sql->ultimo_error != ''){
					$this->ultimo_error = 'Error al UPDATEar el STATUS!: ' . $this->sql->ultimo_error;
					return -1;
				}
				$this->status = $status;
				return $this->status;
			}
			else{
				//Leer de la DB
				$filas = $this->sql->leer('status', 'empresas', "id_empresa = '$this->id_empresa'");
				$this->status = $filas['status'];
				return $this->status;
			}
		}
	return FALSE;
	}

	function edadContacto(){	//'edad' es una cantidad calculada sobre la DB, por lo tanto no puede ser INSERTada!
		if($this->idEmpresa() > -1){
			$sql = "SELECT nacimiento_contacto, CURRENT_DATE, (YEAR(CURRENT_DATE) - YEAR(nacimiento_contacto)) 
			- (RIGHT(CURRENT_DATE,5) < RIGHT(nacimiento_contacto,5)) AS edad_contacto FROM empresas WHERE id_empresa = " . $this->idEmpresa();
			$result = mysql_query($sql);
			if(!(mysql_error() == '')){
				echo mysql_error();
				return  -1;
			}
		$fila = mysql_fetch_array($result, MYSQL_ASSOC);
		$this->edad_contacto = $fila['edad_contacto'];
		return $this->edad_contacto;
		}
	return FALSE;
	}
	
	function guardarComentario(){
		$this->comentario->guardarComentario($this->id_empresa);
		if($this->comentario->ultimo_error != ''){
			$this->ultimo_error = $this->comentario->ultimo_error;
			return -1;
		}
	return 0;
	}
	
	function traerComentarios(){
		$this->comentario->traerComentarios($this->id_empresa, 0);
		if($this->comentario->ultimo_error != ''){
			$this->ultimo_error = $this->comentario->ultimo_error;
			return -1;
		}
		return 0;
	}	

	function guardarAviso(){
		$this->aviso->guardarAviso($this->id_empresa);
		if($this->aviso->ultimo_error != ''){
			$this->ultimo_error = $this->aviso->ultimo_error;
			return -1;
		}
	return 0;
	}
	
	function traerAvisos(){
		$this->aviso->traerAvisos($this->id_empresa);
		if($this->aviso->ultimo_error != ''){
			$this->ultimo_error = $this->aviso->ultimo_error;
			return -1;
		}
		return 0;
	}	

	function traerColEmpresasDestacadas($comienzo, $cantidad){
		if(($comienzo >= 0) && ($cantidad>=0)){
			// Traer empresas de la DB;
			$filas = $this->sql->leer('*','empresas',"1 ORDER BY id_empresa ASC LIMIT $comienzo, $cantidad");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar la(s) Empresas(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->em_id_empresa[$i] = $fila['id_empresa'];
				$this->em_miembro_desde_usuario[$i] = $fila['miembro_desde_usuario'];
				$this->em_alias_usuario[$i] = $fila['alias_usuario'];
				$this->em_razon_social[$i] = $fila['razon_social'];
				$this->em_pais[$i] = $fila['pais'];
				$this->em_ruta_foto[$i] = $fila['ruta_foto'];
				$this->em_ciudad[$i] = $fila['ciudad'];
				$i ++;
				}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}

	function cargarBasicosEmpresa(){
		if($this->id_empresa > -1){
			// Traer empresa de la DB;
			$filas = $this->sql->leer('*','empresas',"id_empresa = '$this->id_empresa'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar una UNICA Empresa!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$this->id_empresa = $filas[0]['id_empresa'];
			$this->miembro_desde_usuario = $filas[0]['miembro_desde_usuario'];
			$this->alias_usuario = $filas[0]['alias_usuario'];
			$this->razon_social = $filas[0]['razon_social'];
			$this->pais = $filas[0]['pais'];
			$this->ruta_foto = $filas[0]['ruta_foto'];
			$this->ciudad = $filas[0]['ciudad'];
			
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
		return -1;
	}
	
	function ultimoError(){
		return $this->ultimo_error;
	}
	
	function id2aliasUsuario($id_empresa = -1){								//Retorna ALIAS_USUARIO del ID_EMPRESA dado. Solo lectura. el ALIAS_USUARIO Se inserta SOLO mediante el metodo this->nuevaEmpresa.
		if($id_empresa > -1){										//$this->id_empresa debe retornar > -1	//AUN NO HA SIDO PROBADA
			$sql = "SELECT alias_usuario FROM empresas WHERE id_empresa = " . $id_empresa;
			$result = mysql_query($sql);
			if(!(mysql_error() == '')){
				echo mysql_error();
				return  -1;
			}
			$fila = mysql_fetch_array($result, MYSQL_ASSOC);
			return $fila['alias_usuario'];
		}
	return -1;
	}
	
	function aliasUsuario2id($alias_usuario = ''){								//Retorna ID_EMPRESA del ALIAS_USUARIO dado. Solo lectura. el ID_EMPRESA Se inserta SOLO mediante el metodo this->nuevaEmpresa.
		if($alias_usuario != ''){										//$this->alias_usuario debe ser != ''	//AUN NO HA SIDO PROBADA
			$sql = "SELECT id_empresa FROM empresas WHERE alias_usuario = '$alias_usuario'";
			$result = mysql_query($sql);
			if(!(mysql_error() == '')){
				echo mysql_error();
				return  -1;
			}
			$fila = mysql_fetch_array($result, MYSQL_ASSOC);
			return $fila['id_empresa'];
		}
	return -1;
	}
	
	
	/////////////////////////////////////////////////////////////////////
	// METODOS PARA OBJETOS CONSTRUIDOS SOBRE USUARIOS AUN NO REGISTRADOS
	function nuevaEmpresa($razon_social = '',
							$contrasenia_usuario = '',
							$pregunta_secreta_usuario = '',
							$respuesta_secreta_usuario = '',
							$email_usuario = '',
							$alias_usuario = '',
							$calle = '',
							$altura = '',
							$piso = '',
							$oficina = '',
							$nacimiento_usuario = '',
							$sexo_usuario = '',
							$pais = '',
							$ciudad = '',
							$puesto_usuario = '',
							$prefijo_usuario = '',
							$tel_usuario = '',
							$ruta_foto = '',
							$desea_news = '',
							$desea_laborales = '',
							$desea_profesionales = '',
							$status = ''){
								
		global $db;
	
	// Los datos se presuponen validados en JS.

	// CHECKEAMOS que el 'alias_usuario' no se repita:
		$sql = "SELECT id_empresa FROM empresas WHERE alias_usuario = '$alias_usuario'";
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
		$contrasenia_usuario = md5($contrasenia_usuario);
	// Datos a la DB
		$sql = "INSERT INTO empresas (razon_social,
									contrasenia_usuario,
									pregunta_secreta_usuario,
									respuesta_secreta_usuario,
									email_usuario,
									alias_usuario,
									calle,
									altura,
									piso,
									oficina,
									nacimiento_usuario,
									sexo_usuario,
									pais,
									ciudad,
									puesto_usuario,
									prefijo_usuario,
									tel_usuario,
									ruta_foto,
									desea_news,
									desea_laborales,
									desea_profesionales,
									status) 
							VALUES ('$razon_social',
									'$contrasenia_usuario',
									'$pregunta_secreta_usuario',
									'$respuesta_secreta_usuario',
									'$email_usuario',
									'$alias_usuario',
									'$calle',
									'$altura',
									'$piso',
									'$oficina',
									'$nacimiento_usuario',
									'$sexo_usuario',
									'$pais',
									'$ciudad',
									'$puesto_usuario',
									'$prefijo_usuario',
									'$tel_usuario',
									'$ruta_foto',
									'$desea_news',
									'$desea_laborales',
									'$desea_profesionales',
									'$status')";
		$result = mysql_query($sql);
		if(!(mysql_error() == '')){
			echo mysql_error();
			return  -1;
		}
		
	// Completar todos los datos de este ($this) objeto empresa
		$sql = "SELECT * FROM empresas WHERE alias_usuario = '$alias_usuario'";
		$result = mysql_query($sql);
		if(!(mysql_error() == '')){
			echo mysql_error();
			return  -1;
		}
		$fila = mysql_fetch_array($result, MYSQL_ASSOC);
		
		//$this->id_empresa = $fila["id_empresa"];
		
		echo "Empresa Insertada Exitosamente <br />";
		mysql_free_result($result);
		
		return $fila['id_empresa'];
		//return $this->idEmpresa();
	}

function aliasUsuarioOcupado($alias_usuario = ''){ 	//Devuelve FALSE (0) si el alias esta libre; !=FALSE por ERROR u OCUPACION;
		if($alias_usuario != ''){
			//Buscar "si existe" el ID correspondiente al ALIAS para poder trabajar con el ID.
			//Verificar que el ID exista en la DB para poder trabajar con el ID.
			$sql = "SELECT id_empresa FROM empresas WHERE alias_usuario = '$alias_usuario'";
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