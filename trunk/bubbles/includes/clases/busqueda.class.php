<?php //include('includes/clases/myquery.class.php'); ?>
<?php //include('includes/clases/e_aviso.class.php'); ?>

<?php
// Clase "busqueda" en "busqueda.class.php".

class busqueda {
	var $sql;			//OBJETO de Conexión a la DB.

	var $criterio;	//CLITERIO de busqueda a rastrear en la DB
	var $id_aviso;
	var $id_usuario;
	var $id_empresa;
	
	var $bu_id_aviso = array();
	var $bu_id_usuario = array();
	var $bu_id_empresa = array();
	
	var $ult_filas_afectadas;
	var $ultimo_error;
		
	function busqueda(){
		$this->sql = new myquery;							//Instancia a la clase de conexion myquery
			
			$this->criterio = NULL;
			$this->id_aviso = -1;
			$this->id_usuario = -1;
			$this->id_empresa = -1;
			
			$this->ult_filas_afectadas = NULL;
			$this->ultimo_error = NULL;
	}

	
	function buscarAvisos(){
		if($this->criterio != NULL){
			// Traer avisos de la DB;
			$filas = $this->sql->leer('*','avisos',"profesion_requerida LIKE '%$this->criterio%'
													OR detalle LIKE '%$this->criterio%'
													OR capacidad LIKE '%$this->criterio%'
													ORDER BY id_aviso DESC");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar el/lo(s) Aviso(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->bu_id_aviso[$i] = $fila['id_aviso'];
				$i ++;
			}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}

	function buscarProfesionales(){
		if($this->criterio != NULL){
			// Traer usuarios de la DB;
			$filas = $this->sql->leer('*','usuarios',"alias LIKE '%$this->criterio%'
													OR nombres LIKE '%$this->criterio%'
													OR apellidos LIKE '%$this->criterio%'
													OR profesion_1 LIKE '%$this->criterio%'
													OR profesion_2 LIKE '%$this->criterio%'
													OR profesion_3 LIKE '%$this->criterio%'
													ORDER BY id_usuario DESC");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar el/lo(s) Profesional(es)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->bu_id_usuario[$i] = $fila['id_usuario'];
				$i ++;
			}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}

	function buscarEmpresas(){
		if($this->criterio != NULL){
			// Traer empresas de la DB;
			$filas = $this->sql->leer('*','empresas',"razon_social LIKE '%$this->criterio%'
													OR alias_usuario LIKE '%$this->criterio%'
													ORDER BY id_empresa DESC");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar la(s) Empresa(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->bu_id_empresa[$i] = $fila['id_empresa'];
				$i ++;
			}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}

	function buscarAvisosFulltext(){
		if($this->criterio != NULL){
			// Traer avisos de la DB;
			$filas = $this->sql->leer('*','avisos',"MATCH (profesion_requerida ,detalle, capacidad) AGAINST ('%$this->criterio%')
													ORDER BY id_aviso DESC");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar el/lo(s) Aviso(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->bu_id_aviso[$i] = $fila['id_aviso'];
				$i ++;
			}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}

	function buscarProfesionalesFulltext(){
		if($this->criterio != NULL){
			// Traer usuarios de la DB;
			$filas = $this->sql->leer('*','usuarios',"MATCH (alias, nombres, apellidos, profesion_1, profesion_2, profesion_3) AGAINST ('%$this->criterio%')
													ORDER BY id_usuario DESC");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar el/lo(s) Profesional(es)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->bu_id_usuario[$i] = $fila['id_usuario'];
				$i ++;
			}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}

	function buscarEmpresasFulltext(){
		if($this->criterio != NULL){
			// Traer empresas de la DB;
			$filas = $this->sql->leer('*','empresas',"MATCH (razon_social, alias_usuario) AGAINST ('%$this->criterio%')
													ORDER BY id_empresa DESC");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar la(s) Empresa(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->bu_id_empresa[$i] = $fila['id_empresa'];
				$i ++;
			}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}

	//////////////////////////////////////////////////////////////
	//Trae LOS 50 ULTIMOS AVISOS insertados en la DB
	//////////////////////////////////////////////////////////////
	function buscarTodosAvisos(){
			// Traer TODOS LOS avisos de la DB;
			$filas = $this->sql->leer('*','avisos',"1 ORDER BY id_aviso DESC LIMIT 0, 50");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar el/lo(s) Aviso(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->bu_id_aviso[$i] = $fila['id_aviso'];
				$i ++;
			}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
	//return -1;
	}

	//////////////////////////////////////////////////////////////
	//Trae LAS 50 ULTIMAS EMPRESAS insertadas en la DB
	//////////////////////////////////////////////////////////////
	function buscarTodasEmpresas(){
			// Traer TODOS LOS avisos de la DB;
			$filas = $this->sql->leer('*','empresas',"1 ORDER BY id_empresa DESC LIMIT 0, 50");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar el/la(s) Empresa(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->bu_id_empresa[$i] = $fila['id_empresa'];
				$i ++;
			}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
	//return -1;
	}

	//////////////////////////////////////////////////////////////
	//Trae LOS 50 ULTIMOS USUARIOS insertados en la DB
	//////////////////////////////////////////////////////////////
	function buscarTodosProfesionales(){
			// Traer TODOS LOS avisos de la DB;
			$filas = $this->sql->leer('*','usuarios',"1 ORDER BY id_usuario DESC LIMIT 0, 50");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar el/lo(s) Usuario(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->bu_id_usuario[$i] = $fila['id_usuario'];
				$i ++;
			}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
	//return -1;
	}
	
}
?>