<?php
// Clase "mensaje".

class mensaje {
	var $sql;			//OBJETO de Conexión a la DB.
	
	var $id_mensaje;	//variables en TABLE 'mensajes'
	var $desde_entidad;
	var $para_entidad;
	var $id_desde;
	var $id_para;
	var $detalle;
	var $status;
	var $fecha;
	var $titulo;
	var $id_respuesta_a;
	
	var $men_id_mensaje = array();	//ARRAYs para SELECTs multiples rows;
	var $men_desde_entidad = array();
	var $men_para_entidad = array();
	var $men_id_desde = array();
	var $men_id_para = array();
	var $men_detalle = array();
	var $men_status = array();	
	var $men_fecha = array();
	var $men_titulo = array();
	var $men_id_respuesta_a = array();
	
	var $ult_filas_afectadas;
	var $ultimo_error;

	function mensaje($id_mensaje = -1){
		$this->sql = new myquery;							//Instancia a la clase de conexion myquery
		if($id_mensaje == -1){
			$this->id_mensaje = -1;
			$this->desde_entidad =NULL;
			$this->para_entidad = NULL;
			$this->id_desde = -1;
			$this->id_para = -1;
			$this->detalle = NULL;
			$this->status = NULL;
			$this->fecha = NULL;
			$this->titulo = NULL;
			$this->id_respuesta_a = -1;
			

			$this->ult_filas_afectadas = NULL;
			$this->ultimo_error = NULL;
		}
		else{
			if($id_mensaje > -1){
				$this->id_mensaje = -1;
				$this->desde_entidad = NULL;
				$this->para_entidad = NULL;
				$this->id_desde = -1;
				$this->id_para = -1;
				$this->detalle = NULL;
				$this->status = NULL;
				$this->fecha = NULL;
				$this->titulo = NULL;
				$this->id_respuesta_a = -1;
			
				$this->ult_filas_afectadas = NULL;
				$this->ultimo_error = NULL;
			}
		}
	}

	
	
	function traerMensajes($id_para, $para_entidad){
		$this->id_para = $id_para;
		if($this->id_para > -1){
			// Traer mensajes de la DB;
			$filas = $this->sql->leer('*','mensajes',"id_para = '$this->id_para' AND para_entidad = '$para_entidad'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar el/lo(s) Mensajes(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->men_id_mensaje[$i] = $fila['id_mensaje'];
				$this->men_desde_entidad[$i] = $fila['desde_entidad'];
				$this->men_para_entidad[$i] = $fila['para_entidad'];
				$this->men_id_desde[$i] = $fila['id_desde'];
				$this->men_id_para[$i] = $fila['id_para'];
				$this->men_detalle[$i] = $fila['detalle'];
				$this->men_status[$i] = $fila['status'];
				$this->men_fecha[$i] = $fila['fecha'];
				$this->men_titulo[$i] = $fila['titulo'];
				$this->men_id_respuesta_a[$i] = $fila['id_respuesta_a'];
				$i ++;
				}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}

	function traerMensaje($id_mensaje = -1){
		$this->id_mensaje = $id_mensaje;
		if($this->id_mensaje > -1){
			// Traer mensajes de la DB;
			$fila = $this->sql->leer('*','mensajes',"id_mensaje = '$this->id_mensaje'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar el/lo(s) Mensajes(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			if($this->ult_filas_afectadas = $this->sql->ult_filas_afectadas != 1){
				$this->ultimo_error = 'El mensaje seleccionado no existe, o tiene ID duplicado!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$this->id_mensaje = $fila[0]['id_mensaje'];
			$this->desde_entidad = $fila[0]['desde_entidad'];
			$this->para_entidad = $fila[0]['para_entidad'];
			$this->id_desde = $fila[0]['id_desde'];
			$this->id_para = $fila[0]['id_para'];
			$this->detalle = $fila[0]['detalle'];
			$this->status = $fila[0]['status'];
			$this->fecha = $fila[0]['fecha'];
			$this->titulo = $fila[0]['titulo'];
			$this->id_respuesta_a = $fila[0]['id_respuesta_a'];
			return 0;
		}
	return -1;
	}
	
	function guardarMensaje(){
		if(($this->id_desde > -1) && ($this->id_para > -1)){
			// Guardar mensaje de la DB;
			$this->sql->insertar("desde_entidad,
								para_entidad,
								id_desde,
								id_para,
								detalle,
								status,
								titulo,
								id_respuesta_a", 'mensajes', "'$this->desde_entidad',
																	'$this->para_entidad',
																	'$this->id_desde',
																	'$this->id_para',
																	'$this->detalle',
																	'$this->status',
																	'$this->titulo',
																	'$this->id_respuesta_a'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al INSERTar el Mensaje!: ' . $this->sql->ultimo_error;
				return -1;
			}
			return 0;
		}
	return -1;
	}
	
	function traerRemitente($desde_entidad = '', $id_desde = -1){
		if(($desde_entidad == 'PROFESIONAL') && ($id_desde != -1)){
			$de = usuario::id2alias($id_desde);
		}
		elseif(($desde_entidad == 'EMPRESA') && ($id_desde != -1)){
			$de = empresa::id2aliasUsuario($id_desde);
		}
		else{
			echo 'error al levantar los mensajes!';
			return -1;
		}
		return $de;
	}
}
