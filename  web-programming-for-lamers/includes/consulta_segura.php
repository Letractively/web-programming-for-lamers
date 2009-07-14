<?php
session_start();
// Consulta_segura.php: contiene funciones accedidas desde el cliente sensibles a la seguridad y a la base de datos.
// Por tal caso se implementara el requerimiento de un id ALEATORIO y valido que sera pasado por get (gralmente por AJAX)
// Junto a la consulta a realizar: EJ: <consulta_segura.php?consulta=zaraza&var=zaraza&id=4786352>
//
// Características:
// - toma un 'id' de 8 caracteres y lo compara con el último 'id_consulta' generado.
// - ¡¡devuelve todas las variables para ser utilizadas como JSON!!
// - si el id es incorrecto interrumpe su ejecucion
// - en cualquiera de los casos VUELVE A GENERAR $_SESSION['id_consulta'] para una proxima consulta; Esta
//	última disposicio obedece a cuestiones de seguridad.- FALSO!!!! Probar con la renovacion por php

include("config.inc.php");
include("funciones.inc.php");
include("conectar_db.php");
include("clases/usuario.class.php");
include("clases/empresa.class.php");

// Cotejo la validez dei ID de la consulta...
if(isset($_GET['id'])){
	if($_GET['id'] != $_SESSION['id_consulta']){
		echo "var respuesta = 'id_consulta_incorrecto';";		// => ID ALEATORIO DE SEGURIDAD INCORRECTO!
		return;
	}
}
else{
	echo "var respuesta = 'id_consulta_incorrecto';";
	return;
}

// Consulta sobre la DISPONIBILIDAD del ALIAS de un usuario:
if(isset($_GET['fuAlias'])){
	// Consulta sobre Alias disponible...
	if(usuario::aliasOcupado($_GET['fuAlias'])){
		echo "false"; // => El ALIAS NO ESTA disponible.
	}
	else{
		echo "true";	// => ALIAS disponible;
	}
}

// Consulta sobre la DISPONIBILIDAD del ALIAS de un usuariom de una EMPRESA:
if(isset($_GET['feAliasUsuario'])){
	// Consulta sobre Alias disponible...
	if(empresa::aliasUsuarioOcupado($_GET['feAliasUsuario'])){
		echo "false"; // => El ALIAS NO ESTA disponible.
	}
	else{
		echo "true";	// => ALIAS disponible;
	}
}

// Regenaracion del id_consulta por seguridad:
//$_SESSION['id_consulta'] = genera_password(8);

?>