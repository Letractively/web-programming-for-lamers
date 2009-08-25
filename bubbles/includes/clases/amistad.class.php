<?php
// Clase "amistad" en "amistad.class.php".

class amistad {
	var $sql;			//OBJETO de Conexión a la DB.
	
	var $id_amistad;	//variables en TABLE 'avisos'
	var $id_usuario;
	var $id_amigo;
	var $fecha_amistad;
	var $status;
		
	var $am_id_amistad = array();	//ARRAYs para SELECTs multiples rows;
	var $am_id_usuario = array();
	var $am_id_amigo = array();
	var $am_fecha_amistad = array();
	var $am_status = array();
	
	var $ult_filas_afectadas;
	var $ultimo_error;

	function amistad($id_aviso = -1){
		$this->sql = new myquery;							//Instancia a la clase de conexion myquery
		if($id_aviso == -1){
			$this->id_amistad = -1;
			$this->id_usuario = -1;
			$this->id_amigo = -1;
			$this->fecha_amistad = NULL;
			$this->status = NULL;
	
			$this->ult_filas_afectadas = NULL;
			$this->ultimo_error = NULL;
		}
		else{
			if($id_aviso > -1){
				$this->id_amistad = -1;
				$this->id_usuario = -1;
				$this->id_amigo = -1;
				$this->fecha_amistad = NULL;
				$this->status = NULL;
			
				$this->ult_filas_afectadas = NULL;
				$this->ultimo_error = NULL;
			}
		}
	}

	function traerAmistades($id_usuario = -1, $limite = 'LIMIT 0, 30'){
		if($id_usuario > -1){
			// Traer avisos de la DB;
			$filas = $this->sql->leer('*','amistades',"id_usuario = '$id_usuario' ORDER BY id_amistad DESC $limite");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar la(s) Amistad(es)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->am_id_amistad[$i] = $fila['id_amistad'];
				$this->am_id_usuario[$i] = $fila['id_usuario'];
				$this->am_id_amigo[$i] = $fila['id_amigo'];
				$this->am_fecha_amistad[$i] = $fila['fecha_amistad'];
				$this->am_status[$i] = $fila['status'];
				$i ++;
				}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}
	
	function guardarAmistad(){
		if($this->id_usuario > -1){
			// Guardar amistad de la DB;
			$this->sql->insertar("id_usuario,
									id_amigo,
									status", 'amistades', "'$this->id_usuario',
																	'$this->id_amigo',
																	'$this->status'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al INSERTar la(s) Amistad(es)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			return 0;
		}
	return -1;
	}

	function borrarAmistad($id_amistad = -1){
	$this->id_amistad = $id_amistad;
		if($this->id_amistad > -1){
			// Borrar amistad de la DB;
			$filas = $this->sql->borrar('amistades',"id_amistad = '$this->id_amistad'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar una UNICA Amistad!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}
	
	function traerAmistadesCriterio($comienzo, $cantidad){
		if(($comienzo >= 0) && ($cantidad>=0)){
			// Traer amistades de la DB;
			$filas = $this->sql->leer('*','amistades',"id_usuario = '$this->id_usuario' ORDER BY id_amistad DESC LIMIT $comienzo, $cantidad");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar la(s) Amistad(es)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->am_id_amistad[$i] = $fila['id_amistad'];
				$this->am_id_usuario[$i] = $fila['id_usuario'];
				$this->am_id_amigo[$i] = $fila['id_amigo'];
				$this->am_fecha_amistad[$i] = $fila['fecha_amistad'];
				$this->am_status[$i] = $fila['status'];
				$i ++;
				}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}

	function verificarAmistadExistente($id_usuario = -1, $id_amigo = -1){
		if(($id_amigo > -1) && ($id_usuario > -1)){
			// Traer amistad de la DB;
			$filas = $this->sql->leer('*','amistades',"id_usuario = '$id_usuario' AND id_amigo = '$id_amigo' LIMIT 0, 1");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar la Amistad!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}
	
}