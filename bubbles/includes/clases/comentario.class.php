<?php
// Clase "comentario".

class comentario {
	var $sql;			//OBJETO de Conexión a la DB.
	
	var $id_comentario;	//variables en TABLE 'comentarios'
	var $desde_usuario;
	var $para_usuario;
	var $id_desde;
	var $id_para;
	var $fecha;
	var $detalle;
	var $status;
	
	var $com_id_comentario = array();	//ARRAYs para SELECTs multiples rows;
	var $com_desde_usuario = array();
	var $com_para_usuario = array();
	var $com_id_desde = array();
	var $com_id_para = array();
	var $com_fecha = array();
	var $com_detalle = array();
	var $com_status = array();	
	
	var $ult_filas_afectadas;
	var $ultimo_error;

	function comentario($id_comentario = -1){
		$this->sql = new myquery;							//Instancia a la clase de conexion myquery
		if($id_comentario == -1){
			$this->id_comentario = -1;
			$this->desde_usuario = 0;
			$this->para_usuario = 0;
			$this->id_desde = NULL;
			$this->id_para = NULL;
			$this->fecha = NULL;
			$this->detalle = NULL;
			$this->status = NULL;

			$this->ult_filas_afectadas = NULL;
			$this->ultimo_error = NULL;
		}
		else{
			if($id_usuario > -1){
				$this->id_comentario = -1;
				$this->desde_usuario = 0;
				$this->para_usuario = 0;
				$this->id_desde = NULL;
				$this->id_para = NULL;
				$this->fecha = NULL;
				$this->detalle = NULL;
				$this->status = NULL;

				$this->ult_filas_afectadas = NULL;
				$this->ultimo_error = NULL;
			}
		}
	}

	
	
	function traerComentarios($id_usuario, $para_usuario){
		$this->id_usuario = $id_usuario;
		if($this->id_usuario > -1){
			// Traer experiencia de la DB;
			$filas = $this->sql->leer('*','comentarios',"id_para = '$this->id_usuario' AND para_usuario = '$para_usuario'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar la/lo(s) Comentarios(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->com_id_comentario[$i] = $fila['id_comentario'];
				$this->com_desde_usuario[$i] = $fila['desde_usuario'];
				$this->com_para_usuario[$i] = $fila['para_usuario'];
				$this->com_id_desde[$i] = $fila['id_desde'];
				$this->com_id_para[$i] = $fila['id_para'];
				$this->com_fecha[$i] = $fila['fecha'];
				$this->com_detalle[$i] = $fila['detalle'];
				$this->com_status[$i] = $fila['status'];
				$i ++;
				}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}
		
	function guardarComentario($id_usuario){
		$this->id_usuario = $id_usuario;
		if($this->id_usuario > -1){
			// Guardar experiencia de la DB;
			// echo $this->contratista;
			$this->sql->insertar("desde_usuario,
								para_usuario,
								id_desde,
								id_para,
								detalle,
								status", 'comentarios', "'$this->desde_usuario',
																	'$this->para_usuario',
																	'$this->id_desde',
																	'$this->id_para',
																	'$this->detalle',
																	'$this->status'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al INSERTar el Comentario!: ' . $this->sql->ultimo_error;
				return -1;
			}
			return 0;
		}
	return -1;
	}

	
}
