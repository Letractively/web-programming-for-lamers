<?php
// Clase "muestra" en "muestra.class.php".

class muestra {
	var $sql;			//OBJETO de Conexión a la DB.
	var $usuario;		//OBJETO usuario, propietario del portfolio.
	
	var $id_muestra;	//variables en TABLE 'mustras'
	var $id_usuario;
	var $ruta_thumb;
	var $ruta_imagen;
	var $titulo;
	var $comentario;
	var $fecha;
	var $categoria;
	var $status;
		
	var $mu_id_muestra = array();	//ARRAYs para SELECTs multiples rows;
	var $mu_id_usuario = array();
	var $mu_ruta_thumb = array();
	var $mu_ruta_imagen = array();
	var $mu_titulo = array();
	var $mu_comentario = array();
	var $mu_fecha = array();
	var $mu_categoria = array();
	var $mu_status = array();
	
	var $ult_filas_afectadas;
	var $ultimo_error;

	function muestra($id_muestra = -1){
		$this->sql = new myquery;							//Instancia a la clase de conexion myquery
		if($id_muestra == -1){
			$this->id_muestra = -1;
			$this->id_usuario = -1;
			$this->ruta_thumb = NULL;
			$this->ruta_imagen = NULL;
			$this->titulo = NULL;
			$this->comentario = NULL;
			$this->fecha = NULL;
			$this->categoria = NULL;
			$this->status = NULL;
	
			$this->ult_filas_afectadas = NULL;
			$this->ultimo_error = NULL;
		}
		else{
			if($id_muestra > -1){
				$this->id_muestra = -1;
				$this->id_usuario = -1;
				$this->ruta_thumb = NULL;
				$this->ruta_imagen = NULL;
				$this->titulo = NULL;
				$this->comentario = NULL;
				$this->fecha = NULL;
				$this->categoria = NULL;
				$this->status = NULL;
			
				$this->ult_filas_afectadas = NULL;
				$this->ultimo_error = NULL;
			}
		}
	}

	function cargarUnaMuestra($id_muestra){
		$this->id_muestra = $id_muestra;
		if($this->id_muestra > -1){
			// Traer muestra de la DB;
			$filas = $this->sql->leer('*','muestras',"id_muestra = '$this->id_muestra'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar una UNICA Muestra!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$this->id_muestra = $filas[0]['id_muestra'];
			$this->id_usuario = $filas[0]['id_usuario'];
			$this->ruta_thumb = $filas[0]['ruta_thumb'];
			$this->ruta_imagen = $filas[0]['ruta_imagen'];
			$this->titulo = $filas[0]['titulo'];
			$this->comentario = $filas[0]['comentario'];
			$this->fecha = $filas[0]['fecha'];
			$this->categoria = $filas[0]['categoria'];
			$this->status = $filas[0]['status'];
			
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}
	
	
	function traerMuestras($id_usuario){
		$this->id_usuario = $id_usuario;
		if($this->id_usuario > -1){
			// Traer muestras de la DB;
			$filas = $this->sql->leer('*','muestras',"id_usuario = '$this->id_usuario' ORDER BY id_aviso DESC");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar la(s) Muestra(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->mu_id_muestra[$i] = $fila['id_muestra'];
				$this->mu_id_usuario[$i] = $fila['id_usuario'];
				$this->mu_ruta_thumb[$i] = $fila['ruta_thumb'];
				$this->mu_ruta_imagen[$i] = $fila['ruta_imagen'];
				$this->mu_titulo[$i] = $fila['titulo'];
				$this->mu_comentario[$i] = $fila['comentario'];
				$this->mu_fecha[$i] = $fila['fecha'];
				$this->mu_categoria[$i] = $fila['categoria'];
				$this->mu_status[$i] = $fila['status'];
				$i ++;
				}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}

	function cargarRutaImagen($ruta_imagen = 'default'){
		if($this->id_muestra > -1){
			//Leer de la DB
			$filas = $this->sql->cambiar("ruta_imagen = '$ruta_imagen'", 'muestras', "id_muestra = '$this->id_muestra'");
				if($this->sql->ultimo_error != ''){
					$this->ultimo_error = 'Error al cargar la Muestra de este Profesional en la DB!: ' . $this->sql->ultimo_error;
					return -1;
				}
			$this->ruta_imagen = $ruta_imagen;
			return 0;
		}
	return -1;
	}
	
	function guardarMuestra(){
		if($this->id_usuario > -1){
			// Guardar muestra en la DB;
			$this->sql->insertar("id_usuario,
								ruta_thumb,
								ruta_imagen,
								titulo,
								comentario,
								categoria,
								status", 'muestras', "'$this->id_usuario',
													'$this->ruta_thumb',
													'$this->ruta_imagen',
													'$this->titulo',
													'$this->comentario',
													'$this->categoria',
													'$this->status'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al INSERTar la Muestra!: ' . $this->sql->ultimo_error;
				return -1;
			}
			return 0;
		}
	return -1;
	}

	function traerMuestrasCriterio($comienzo = -1, $cantidad = -1, $id_usuario = -1){
		if(($comienzo >= 0) && ($cantidad>=0) &&($id_usuario>=0)){
			// Traer muestras de la DB;
			$filas = $this->sql->leer('*','muestras',"id_usuario = '$id_usuario' ORDER BY id_muestra DESC LIMIT $comienzo, $cantidad");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al SELECTionar la(s) Muestras(s)!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$i=0;
			foreach ($filas as $fila) {
				$this->mu_id_muestra[$i] = $fila['id_muestra'];
				$this->mu_id_usuario[$i] = $fila['id_usuario'];
				$this->mu_ruta_thumb[$i] = $fila['ruta_thumb'];
				$this->mu_ruta_imagen[$i] = $fila['ruta_imagen'];
				$this->mu_titulo[$i] = $fila['titulo'];
				$this->mu_comentario[$i] = $fila['comentario'];
				$this->mu_fecha[$i] = $fila['fecha'];
				$this->mu_categoria[$i] = $fila['categoria'];
				$this->mu_status[$i] = $fila['status'];
				$i ++;
				}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}

	function borrarMuestra($id_muestra = -1){
		if($id_muestra > -1){
			// Borrar aviso de la DB;
			$filas = $this->sql->borrar('muestras',"id_muestra = '$id_muestra'");
			if($this->sql->ultimo_error != ''){
				$this->ultimo_error = 'Error al borrar un UNICA Muestra!: ' . $this->sql->ultimo_error;
				return -1;
			}
			$this->ult_filas_afectadas = $this->sql->ult_filas_afectadas;
			return 0;
		}
	return -1;
	}
	
	
/////////////////////////////////////////////////////UPDATEADO HASTA AQUI//////////////////////////////


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

	function traerMuestrasSegunCriterio(){		//Traigo todos los avisos sin filtro: INCOMPLETA!
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
