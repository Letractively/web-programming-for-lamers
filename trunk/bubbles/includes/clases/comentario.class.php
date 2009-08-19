<?php
// Clase "comentario".

class comentario {
	var $sql;			//OBJETO de Conexión a la DB.
	
	var $id_comentario;	//variables en TABLE 'comentarios'
	var $desde_entidad;
	var $para_entidad;
	var $id_desde;
	var $id_para;
	var $fecha;
	var $detalle;
	var $status;
	var $respuesta_a_id_comentario;
	
	var $com_id_comentario = array();	//ARRAYs para SELECTs multiples rows;
	var $com_desde_entidad = array();
	var $com_para_entidad = array();
	var $com_id_desde = array();
	var $com_id_para = array();
	var $com_fecha = array();
	var $com_detalle = array();
	var $com_status = array();	
	var $com_respuesta_a_id_comentario = array();
	
	var $ult_filas_afectadas;
	var $ultimo_error;

	function comentario($id_comentario = -1){
		$this->sql = new myquery;							//Instancia a la clase de conexion myquery
		if($id_comentario == -1){
			$this->id_comentario = -1;
			$this->desde_entidad = NULL;
			$this->para_entidad = NULL;
			$this->id_desde = -1;
			$this->id_para = -1;
			$this->fecha = NULL;
			$this->detalle = NULL;
			$this->status = NULL;
			$this->respuesta_a_id_comentario = -1;

			$this->ult_filas_afectadas = NULL;
			$this->ultimo_error = NULL;
		}
		else{
			if($id_usuario > -1){
				$this->id_comentario = -1;
				$this->desde_entidad = NULL;
				$this->para_entidad = NULL;
				$this->id_desde = NULL;
				$this->id_para = NULL;
				$this->fecha = NULL;
				$this->detalle = NULL;
				$this->status = NULL;
				$this->respuesta_a_id_comentario = -1;
				
				$this->ult_filas_afectadas = NULL;
				$this->ultimo_error = NULL;
			}
		}
	}

	
	
	function traerComentarios($id_para, $para_entidad, $limite = 'LIMIT 0, 30'){
		if($id_para > -1){
			// Traer experiencia de la DB;
			$filas = $this->sql->leer('*','comentarios',"id_para = '$id_para' AND para_entidad = '$para_entidad' ORDER BY id_comentario DESC $limite");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar la/lo(s) Comentarios(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->com_id_comentario[$i] = $fila['id_comentario'];
				$this->com_desde_entidad[$i] = $fila['desde_entidad'];
				$this->com_para_entidad[$i] = $fila['para_entidad'];
				$this->com_id_desde[$i] = $fila['id_desde'];
				$this->com_id_para[$i] = $fila['id_para'];
				$this->com_fecha[$i] = $fila['fecha'];
				$this->com_detalle[$i] = $fila['detalle'];
				$this->com_status[$i] = $fila['status'];
				$this->com_respuesta_a_id_comentario[$i] = $fila['respuesta_a_id_comentario'];
				$i ++;
				}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}
		
	function guardarComentario(){
		if($this->id_para > -1 && $this->id_desde > -1){
			// Guardar experiencia de la DB;
			// echo $this->contratista;
			$this->sql->insertar("desde_entidad,
								para_entidad,
								id_desde,
								id_para,
								detalle,
								status,
								respuesta_a_id_comentario", 'comentarios', "'$this->desde_entidad',
																			'$this->para_entidad',
																			'$this->id_desde',
																			'$this->id_para',
																			'$this->detalle',
																			'$this->status',
																			'$this->respuesta_a_id_comentario'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al INSERTar el Comentario!: ' . $this->sql->ultimo_error;
				return -1;
			}
			return 0;
		}
	return -1;
	}

	
}
