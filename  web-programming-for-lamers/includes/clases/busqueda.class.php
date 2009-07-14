<?php //include('includes/clases/myquery.class.php'); ?>
<?php include('includes/clases/e_aviso.class.php'); ?>

<?php
// Clase "busqueda" en "busqueda.class.php".

class busqueda {
	var $sql;			//OBJETO de Conexión a la DB.
	var $aviso;			//OBJETO de la clase aviso.
	
	var $ult_filas_afectadas;
	var $ultimo_error;
	
	function busqueda($id_aviso = -1){
		$this->sql = new myquery;							//Instancia a la clase de conexion myquery
			
			$this->aviso = NULL;
			$this->ult_filas_afectadas = NULL;
			$this->ultimo_error = NULL;
	}

	
	function traerAvisosSegunCriterio(){
		$this->aviso->traerAvisosSegunCriterio();
	}
	
}
?>