<?php
// Clase "postulacion".

// SE ARMO ENTERA SIN COTEJAR NADA!!!!
class postulacion {
	var $sql;			//OBJETO de Conexión a la DB.
	
	var $id_postulacion;	//variables en TABLE 'comentarios'
	var $id_usuario;
	var $id_aviso;
	var $fecha;
	var $objetivo_laboral;
	
	var $pos_id_postulacion = array();	//ARRAYs para SELECTs multiples rows;
	var $pos_id_usuario = array();
	var $pos_id_aviso = array();
	var $pos_fecha = array();
	var $pos_objetivo_laboral = array();
	
	var $ult_filas_afectadas;
	var $ultimo_error;

	function postulacion($id_postulacion = -1){
		$this->sql = new myquery;							//Instancia a la clase de conexion myquery
		if($id_postulacion == -1){
			$this->id_postulacion = -1;
			$this->id_ussuario = -1;
			$this->id_aviso = -1;
			$this->fecha = NULL;
			$this->objetivo_laboral = NULL;

			$this->ult_filas_afectadas = NULL;
			$this->ultimo_error = NULL;
		}
		else{
			if($id_postulacion > -1){
				$this->id_postulacion = -1;
				$this->id_ussuario = -1;
				$this->id_aviso = -1;
				$this->fecha = NULL;
				$this->objetivo_laboral = NULL;

				$this->ult_filas_afectadas = NULL;
				$this->ultimo_error = NULL;
			}
		}
	}

	
	
	function traerPostulacionesAviso($id_aviso){
		$this->id_aviso = $id_aviso;
		if($this->id_aviso > -1){
			// Traer postulacion de la DB;
			$filas = $this->sql->leer('*','postulaciones',"id_aviso = '$this->id_aviso'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar la/la(s) Postulacion(es)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->pos_id_postulacion[$i] = $fila['id_postulacion'];
				$this->pos_id_usuario[$i] = $fila['id_usuario'];
				$this->pos_id_aviso[$i] = $fila['id_aviso'];
				$this->pos_fecha[$i] = $fila['fecha'];
				$this->pos_objetivo_laboral[$i] = $fila['objetivo_laboral'];
				$i ++;
				}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}

	function traerPostulacionesUsuario($id_usuario){
		$this->id_usuario = $id_usuario;
		if($this->id_usuario > -1){
			// Traer postulacion de la DB;
			$filas = $this->sql->leer('*','postulaciones',"id_usuario = '$this->id_usuario'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar la/la(s) Postulacion(es)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->pos_id_postulacion[$i] = $fila['id_postulacion'];
				$this->pos_id_usuario[$i] = $fila['id_usuario'];
				$this->pos_id_aviso[$i] = $fila['id_aviso'];
				$this->pos_fecha[$i] = $fila['fecha'];
				$this->pos_objetivo_laboral[$i] = $fila['objetivo_laboral'];
				$i ++;
				}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}
	
	function guardarPostulacion(){
		if($this->id_aviso > -1){
			// Guardar aviso de la DB;
			$this->sql->insertar("id_usuario,
								id_aviso,
								objetivo_laboral", 'postulaciones', "'$this->id_usuario',
																	'$this->id_aviso',
																	'$this->objetivo_laboral'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al INSERTar la Postulacion!: ' . $this->sql->ultimo_error;
				return -1;
			}
			return 0;
		}
	return -1;
	}
	
	function borrarPostulacion($id_postulacion = -1){
		if($id_postulacion > -1){
			// Borrar aviso de la DB;
			$filas = $this->sql->borrar('postulaciones',"id_postulacion = '$id_postulacion'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar una UNICA Postulación!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}
	
	function verificarPostulacionExistente($id_usuario = -1, $id_aviso = -1){
		if(($id_aviso > -1) && ($id_usuario > -1)){
			// Traer amistad de la DB;
			$filas = $this->sql->leer('*','postulaciones',"id_usuario = '$id_usuario' AND id_aviso = '$id_aviso' LIMIT 0, 1");
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