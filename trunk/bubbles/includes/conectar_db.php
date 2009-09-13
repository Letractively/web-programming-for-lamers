<?php
// Creando un link al server de la DB...
$link = mysql_connect('localhost', USUARIO_SQL, PASS_SQL);
if(!$link){
	echo 'No se puede conectar a la DB '. USUARIO_SQL;
	die('No se puede conectar a la Base de Datos: ' . mysql_error());
}
// Eligiendo la DB donde estan guardadas nuestras tablas...
$db = mysql_select_db(SQL_DB, $link);
if(!$db){
	echo 'No se puede conectar a la DB '. USUARIO_SQL;
	die('No se puede conectar a la Base de Datos: ' . mysql_error());
}
mysql_query("SET NAMES " . SQL_NAMES);	//Setea el IDIOMA POR DEFECTO entre el server y el cliente, por mas que este TODO en UTF8 hay que especificar la conexión
mysql_query('SET collation_connection = ' . SQL_COLLATION);
?>