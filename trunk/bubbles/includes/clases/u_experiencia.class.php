<?php
// Clase "u-experiencia".

class u_experiencia {
	var $sql;			//OBJETO de Conexión a la DB.
	
	var $id_experiencia;	//variables en TABLE 'u-experiencias'
	var $id_usuario;
	var $contratista;
	var $radicacion;
	var $ramo;
	var $puesto;
	var $especialidad_ejercida;
	var $nombre_jerarquia;
	var $ingreso;
	var $egreso;
	var $tareas_ejercidas;
	var $ult_filas_afectadas;
	
	var $exp_id_experiencia = array();	//variables en TABLE 'u-experiencias'
	var $exp_contratista = array();
	var $exp_radicacion = array();
	var $exp_ramo = array();
	var $exp_puesto = array();
	var $exp_especialidad_ejercida = array();
	var $exp_nombre_jerarquia = array();
	var $exp_ingreso = array();
	var $exp_egreso = array();
	var $exp_tareas_ejercidas = array();
	
	var $ultimo_error;

	function u_experiencia($id_experiencia = -1){
		$this->sql = new myquery;							//Instancia a la clase de conexion myquery
		if($id_experiencia == -1){
			$this->id_experiencia = -1;
			$this->id_usuario = -1;
			$this->contratista = NULL;
			$this->radicacion = NULL;
			$this->ramo = NULL;
			$this->puesto = NULL;
			$this->especialidad_ejercida = NULL;
			$this->nombre_jerarquia = NULL;
			$this->ingreso = NULL;
			$this->egreso = NULL;
			$this->tareas_ejercidas = NULL;

			$ultimo_error = NULL;
		}
		else{
			if($id_usuario > -1){
			$this->id_experiencia = -1;
			$this->id_usuario = -1;
			$this->contratista = NULL;
			$this->radicacion = NULL;
			$this->ramo = NULL;
			$this->puesto = NULL;
			$this->especialidad_ejercida = NULL;
			$this->nombre_jerarquia = NULL;
			$this->ingreso = NULL;
			$this->egreso = NULL;
			$this->tareas_ejercidas = NULL;		
			}
		}
	}

	
	
	function traerExperiencias($id_usuario){
		$this->id_usuario = $id_usuario;
		if($this->id_usuario > -1){
			// Traer experiencia de la DB;
			$filas = $this->sql->leer('*','u_experiencias',"id_usuario = '$this->id_usuario'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar la(s) Experiencia(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->exp_id_experiencia[$i] = $fila['id_experiencia'];
				$this->exp_contratista[$i] = $fila['contratista'];
				$this->exp_radicacion[$i] = $fila['radicacion'];
				$this->exp_ramo[$i] = $fila['ramo'];
				$this->exp_puesto[$i] = $fila['puesto'];
				$this->exp_especialidad_ejercida[$i] = $fila['especialidad_ejercida'];
				$this->exp_nombre_jerarquia[$i] = $fila['nombre_jerarquia'];
				$this->exp_ingreso[$i] = $fila['ingreso'];
				$this->exp_egreso[$i] = $fila['egreso'];
				$this->exp_tareas_ejercidas[$i] = $fila['tareas_ejercidas'];
				$i ++;				
				}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}
		
	function guardarExperiencia($id_usuario){
		$this->id_usuario = $id_usuario;
		if($this->id_usuario > -1){
			// Guardar experiencia de la DB;
			// echo $this->contratista;
			$this->sql->insertar("id_usuario, 
								contratista, 
								radicacion,
								ramo,
								puesto,
								especialidad_ejercida,
								nombre_jerarquia,
								ingreso,
								egreso,
								tareas_ejercidas", 'u_experiencias', "'$this->id_usuario',
																	'$this->contratista',
																	'$this->radicacion',
																	'$this->ramo',
																	'$this->puesto',
																	'$this->especialidad_ejercida',
																	'$this->nombre_jerarquia',
																	'$this->ingreso',
																	'$this->egreso',
																	'$this->tareas_ejercidas'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al INSERTar la Experiencia!: ' . $this->sql->ultimo_error;
				return -1;
			}
			return 0;
		}
	return -1;
	}

	
}

