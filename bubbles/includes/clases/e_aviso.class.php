<?php
// Clase "aviso" en "e_aviso.class.php".

class aviso {
	var $sql;			//OBJETO de Conexión a la DB.
	var $empresa;		//OBJETO empresa, propietaria del aviso.
	
	var $id_aviso;	//variables en TABLE 'avisos'
	var $id_empresa;
	var $fecha;
	var $profesion_requerida;
	var $modalidad;
	var $pago;
	var $detalle;
	var $nivel;
	var $capacidad;
	var $fecha_entrega;
	var $status;
	var $id_usuario_asignado;
		
	var $av_id_aviso = array();	//ARRAYs para SELECTs multiples rows;
	var $av_id_empresa = array();
	var $av_fecha = array();
	var $av_profesion_requerida = array();
	var $av_modalidad = array();
	var $av_pago = array();
	var $av_detalle = array();
	var $av_nivel = array();
	var $av_capacidad = array();
	var $av_fecha_entrega = array();
	var $av_status = array();
	var $av_id_usuario_asignado = array();
	
	var $ult_filas_afectadas;
	var $ultimo_error;

	function aviso($id_aviso = -1){
		$this->sql = new myquery;							//Instancia a la clase de conexion myquery
		if($id_aviso == -1){
			$this->id_aviso = -1;
			$this->id_empresa = -1;
			$this->fecha = NULL;
			$this->profesion_requerida = NULL;
			$this->modalidad = NULL;
			$this->pago = NULL;
			$this->detalle = NULL;
			$this->nivel = NULL;
			$this->capacidad = NULL;
			$this->fecha_entrega = NULL;
			$this->status = NULL;
			$this->id_usuario_asignado = -1;
	
			$this->ult_filas_afectadas = NULL;
			$this->ultimo_error = NULL;
		}
		else{
			if($id_aviso > -1){
				$this->id_aviso = -1;
				$this->id_empresa = -1;
				$this->fecha = NULL;
				$this->profesion_requerida = NULL;
				$this->modalidad = NULL;
				$this->pago = NULL;
				$this->detalle = NULL;
				$this->nivel = NULL;
				$this->capacidad = NULL;
				$this->fecha_entrega = NULL;
				$this->status = NULL;
				$this->id_usuario_asignado = -1;
			
				$this->ult_filas_afectadas = NULL;
				$this->ultimo_error = NULL;
			}
		}
	}

	function cargarUnAviso($id_aviso){
		$this->id_aviso = $id_aviso;
		if($this->id_aviso > -1){
			// Traer avisos de la DB;
			$filas = $this->sql->leer('*','avisos',"id_aviso = '$this->id_aviso'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar un UNICO Aviso!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$this->id_aviso = $filas[0]['id_aviso'];
			$this->id_empresa = $filas[0]['id_empresa'];
			$this->fecha = $filas[0]['fecha'];
			$this->titulo = $filas[0]['titulo'];
			$this->horarios = $filas[0]['horarios'];
			$this->pago = $filas[0]['pago'];
			$this->detalle = $filas[0]['detalle'];
			$this->puesto = $filas[0]['puesto'];
			$this->status = $filas[0]['status'];
			$this->id_usuario_asignado = $filas[0]['id_usuario_asignado'];
			
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}
	
	
	function traerAvisos($id_empresa){
		$this->id_empresa = $id_empresa;
		if($this->id_empresa > -1){
			// Traer avisos de la DB;
			$filas = $this->sql->leer('*','avisos',"id_empresa = '$this->id_empresa'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar el/lo(s) Aviso(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->av_id_aviso[$i] = $fila['id_aviso'];
				$this->av_id_empresa[$i] = $fila['id_empresa'];
				$this->av_fecha[$i] = $fila['fecha'];
				$this->av_profesion_requerida[$i] = $fila['profesion_requerida'];
				$this->av_modalidad[$i] = $fila['modalidad'];
				$this->av_pago[$i] = $fila['pago'];
				$this->av_detalle[$i] = $fila['detalle'];
				$this->av_nivel[$i] = $fila['nivel'];
				$this->av_capacidad[$i] = $fila['capacidad'];
				$this->av_fecha_entrega[$i] = $fila['fecha_entrega'];
				$this->av_status[$i] = $fila['status'];
				$this->av_id_usuario_asignado[$i] = $fila['id_usuario_asignado'];				
				$i ++;
				}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}
	
	function guardarAviso(){
		if($this->id_empresa > -1){
			// Guardar aviso de la DB;
			$this->sql->insertar("id_empresa,
									profesion_requerida,
									modalidad,
									pago,
									detalle,
									nivel,
									capacidad,
									fecha_entrega,
									status,
									id_usuario_asignado", 'avisos', "'$this->id_empresa',
																	'$this->profesion_requerida',
																	'$this->modalidad',
																	'$this->pago',
																	'$this->detalle',
																	'$this->nivel',
																	'$this->capacidad',
																	'$this->fecha_entrega',
																	'$this->status',
																	'$this->id_usuario_asignado'");		// (-1) por constructor-default
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al INSERTar el Aviso!: ' . $this->sql->ultimo_error;
				return -1;
			}
			return 0;
		}
	return -1;
	}

	function borrarAviso($id_aviso = -1){
	$this->id_aviso = $id_aviso;
		if($this->id_aviso > -1){
			// Borrar aviso de la DB;
			$filas = $this->sql->borrar('avisos',"id_aviso = '$this->id_aviso'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar un UNICO Aviso!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}
	
	function guardarPostulacion(){
		$this->postulacion->guardarPostulacion($this->id_aviso);
		if($this->postulacion->ultimo_error != ''){
			$this->ultimo_error = $this->postulacion->ultimo_error;
			return -1;
		}
	return 0;
	}
	
	function traerPostulaciones(){
		$this->postulacion->traerPostulaciones($this->id_aviso);
		if($this->postulacion->ultimo_error != ''){
			$this->ultimo_error = $this->postulacion->ultimo_error;
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
	
	function asignarAviso($id_usuario_asignado){
	
	}

	function traerAvisosSegunCriterio(){		//Traigo todos los avisos sin filtro: INCOMPLETA!
			// Traer avisos de la DB;
			$filas = $this->sql->leer('*','avisos',"true");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar el/lo(s) Aviso(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->av_id_aviso[$i] = $fila['id_aviso'];
				$this->av_id_empresa[$i] = $fila['id_empresa'];
				$this->av_fecha[$i] = $fila['fecha'];
				$this->av_titulo[$i] = $fila['titulo'];
				$this->av_horarios[$i] = $fila['horarios'];
				$this->av_pago[$i] = $fila['pago'];
				$this->av_detalle[$i] = $fila['detalle'];
				$this->av_puesto[$i] = $fila['puesto'];
				$this->av_status[$i] = $fila['status'];
				$this->av_id_usuario_asignado[$i] = $fila['id_usuario_asignado'];
				$i ++;
				}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
	}
	
}
