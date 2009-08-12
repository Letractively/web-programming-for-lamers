<?php
// myquery.class.php : por esta clase pasan todas las consultas a la MySQL DB...
	
class myquery {
	var $n_filas = -1;
	var $filas = '';
	
	var $ult_filas_afectadas;
	var $ultimo_error = '';
	
	function myquery(){
	
	}
	////////////////////////////////////////////////////////////////////////////////////
	//MÉTODOS INTERNOS:
	////////////////////////////////////////////////////////////////////////////////////
	//				|TABLAS|					|COLUMNAS|				|VALORES|
	//INSERT INTO nombre_de_la_tabla (Columna1, columna 2, ... )VALUES (Valor1, valor2, ...);
	function insertar($columnas = '', $tablas = '', $valores = ''){
		$sql = "INSERT INTO $tablas ($columnas) VALUES ($valores)";
		$result = mysql_query($sql);
		if(!(mysql_error() == '')){
			$this->ultimo_error = mysql_error();
			return  -1;
		}
		return 0;
	}

	//				|TABLAS|		|CONDICIONES|
	//DELETE FROM refranero WHERE LIKE "%amor%";
	function borrar($tablas = '', $condiciones = ''){
		$sql = "DELETE FROM $tablas WHERE $condiciones";
		$result = mysql_query($sql);
		if(!(mysql_error() == '')){
			$this->ultimo_error = mysql_error();
			return  -1;
		}
		$this->filas = mysql_fetch_array($result, MYSQL_ASSOC);
		mysql_free_result($result);
		return $this->filas;
	}

	//				|COLUMNAS|					|TABLAS|				|CONDICIONES|
	//SELECT employee.name, info.salary FROM employee, info WHERE employee.name = info.name;
	//Retorna el ARRAY_MYSQL con los datos:
	function leer($columnas = '', $tablas = '', $condiciones = ''){
		$sql = "SELECT $columnas FROM $tablas WHERE $condiciones";
		$result = mysql_query($sql);
		if(!(mysql_error() == '')){
			$this->ultimo_error = mysql_error();
			return  -1;
		}
		$this->ult_filas_afectadas = mysql_affected_rows();
		$i=0;		// Indice de cada fila
		while ($this->filas[$i] = mysql_fetch_array($result, MYSQL_ASSOC)){
			$i ++;
		}
		mysql_free_result($result);
		return $this->filas;
	}

	//		|TABLAS|		|COLUMNAS_VALOR|		|CONDICIONES|
	//UPDATE refranero SET fecha="2003-06-01" WHERE ID=1;
	function cambiar($columnas_valor = '', $tablas = '', $condiciones = ''){
		$sql = "UPDATE $tablas SET $columnas_valor WHERE $condiciones";
		$result = mysql_query($sql);
		if(!(mysql_error() == '')){
			$this->ultimo_error = mysql_error();
			return  -1;
		}
		return 0;
	}
	
	
	
	////////////////////////////////////////////////////////////////////////////////////
	//MÉTODOS INTERNOS y EXTERNOS:
	////////////////////////////////////////////////////////////////////////////////////
	
	////////////////////////////////////////////////////
	//Convierte fecha de mysql a normal
	////////////////////////////////////////////////////
	function cambiaFaNormal($fecha){
		ereg( "([0-9]{2,4})-([0-9]{1,2})-([0-9]{1,2})", $fecha, $mifecha);
		$lafecha=$mifecha[3]."/".$mifecha[2]."/".$mifecha[1];
		return $lafecha;
	}
	
	////////////////////////////////////////////////////
	//Convierte fecha de normal a mysql
	////////////////////////////////////////////////////

	function cambiaFaMysql($fecha){
	if(strlen($fecha)==10){
		ereg( "([0-9]{1,2})/([0-9]{1,2})/([0-9]{2,4})", $fecha, $mifecha);
		$lafecha=$mifecha[3]."-".$mifecha[2]."-".$mifecha[1];
		return $lafecha;
		}
	else{
		return '0000-00-00';
		}
	}

	////////////////////////////////////////////////////
	//Cambia un Texto para mysql:
	////////////////////////////////////////////////////
	function cambiaTaMysql($texto){
		$texto = mysql_real_escape_string($texto);
		return $texto;
	}

}
?>