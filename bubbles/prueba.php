<?php include("header.php"); ?>
<?php include("includes/clases/usuario.class.php"); ?>
<?php include("includes/clases/empresa.class.php"); ?>
<?php include("includes/tratar_imagenes.php"); ?>

<?php
///////////////////////////////	
echo "<h2> PRUEBA: SUBIR UNA IMAGEN MEDIANTE EL SCRIPT tratar_imagenes.php</h2>";
?>

<form action="<?php $PHP_SELF;?>" method="POST" enctype="multipart/form-data" name="editpage" id="editpage">
<input name="img1" type="file" id="img1" size="40">
<input type="submit" name="Submit" value="Subir imagen">
</form>

<?php
if(isset($_POST['Submit'])){
	//si ya se hizo clic en submit 
$fotos=imgResample2("img1", DIR_FOTOS_PROFESIONALES, DIMENSION_FOTO_GRANDE, DIMENSION_FOTO_GRANDE, DIMENSION_FOTO_CHICA, DIMENSION_FOTO_CHICA); 
for($i=0;$i<sizeof($fotos);$i++){ 
	// esto imprime en pantalla el contenido del arreglo $fotos 
	//las dos primeras posiciones contienen el url de la foto relativo a raíz 
	//las dos últimas contienen la etiqueta <img> para mostrar la foto en pantalla 
	echo "Arreglo fotos, posición #$i: ".$fotos[$i]."<br>"; 
	}
}	//end for

echo '<pre>';
print_r($_FILES);
echo '</pre>';
?>

<?php
echo "<h2> PRUEBA: INSTANCIA DE UN OBJETO CLASE usuario()</h2>";
$pr = new usuario;

echo "SE HA INSTANCIADO UN OBJETO DE CLASE " . get_class($pr) . '<br />';
echo "METODOS DE LA CLASE: <br />";
echo '<pre>';
var_dump(get_class_methods(get_class($pr)));
echo '</pre>';

echo "PROPIEDADES DE LA CLASE <br />";
echo '<pre>';
var_dump(get_class_vars(get_class($pr)));
echo '</pre>';

echo "<h2> PRUEBA: INSTANCIA DE UN OBJETO CLASE usuario(NULL, Alias)</h2>";
$pr = new usuario(NULL, 'nagi');
echo "SE HA INSTANCIADO UN OBJETO DE CLASE " . get_class($pr) . '<br />';
echo "PRUEBA DE OBJETOS DE LA CLASE <br />";
echo '$pr->idUsuario() = ' . $pr->idUsuario() . "<br />";
echo '$pr->alias() = ' . $pr->alias() . "<br />";
echo '$pr->contrasenia() = ' . $pr->contrasenia() . "<br />";
echo '$pr->nombres() = ' . $pr->nombres() . "<br />";
echo '$pr->apellidos() = ' . $pr->apellidos() . "<br />";
echo '$pr->email() = ' . $pr->email() . "<br />";
echo '$pr->nDocumento() = ' . $pr->nDocumento() . "<br />";
echo '$pr->nacimiento() = ' . $pr->nacimiento() . "<br />";
echo '$pr->especializacion() = ' . $pr->especializacion() . "<br />";
echo '$pr->status() = ' . $pr->status() . "<br />";
echo '$pr->edad() = ' . $pr->edad() . "<br />";
echo 'usuario::id2alias(7) = ' . usuario::id2alias(7) . "<br />";
echo "usuario::alias2id('nagi') = " . usuario::alias2id('nagi') . "<br />";
echo '$pr->nuevoUsuario(\'nagi\',\'NULL\',\'NULL\',\'NULL\',\'NULL\',\'NULL\',\'NULL\',\'NULL\',\'NULL\',\'NULL\',\'NULL\') = ' . $pr->nuevoUsuario('nagi','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL') . "<br />";

echo "PROPIEDADES DE LA CLASE <br />";
echo '<pre>';
var_dump(get_object_vars($pr));
echo '</pre>';


///////////////////////////////
echo "<h2> PRUEBA: INSTANCIA DE UN OBJETO CLASE empresa()</h2>";
$pr = new empresa;

echo "SE HA INSTANCIADO UN OBJETO DE CLASE " . get_class($pr) . '<br />';
echo "METODOS DE LA CLASE: <br />";
echo '<pre>';
var_dump(get_class_methods(get_class($pr)));
echo '</pre>';

echo "PROPIEDADES DE LA CLASE <br />";
echo '<pre>';
var_dump(get_class_vars(get_class($pr)));
echo '</pre>';

echo "<h2> PRUEBA: INSTANCIA DE UN OBJETO CLASE usuario(NULL, Alias)</h2>";
$pr = new empresa(NULL, 'santiago');
echo "SE HA INSTANCIADO UN OBJETO DE CLASE " . get_class($pr) . '<br />';
echo "PRUEBA DE OBJETOS DE LA CLASE <br />";
echo '<pre>';
echo '$pr->idEmpresa() = ' . $pr->idEmpresa() . "<br />";
echo '$pr->aliasUsuario() = ' . $pr->aliasUsuario() . "<br />";
echo '$pr->contraseniaUsuario() = ' . $pr->contraseniaUsuario() . "<br />";
echo '$pr->nombresContacto() = ' . $pr->nombresContacto() . "<br />";
echo '$pr->apellidosContacto() = ' . $pr->apellidosContacto() . "<br />";
echo '$pr->emailUsuario() = ' . $pr->emailUsuario() . "<br />";
echo '$pr-> cuitCuil() = ' . $pr->cuitCuil() . "<br />";
echo '$pr->nacimientoContacto() = ' . $pr->nacimientoContacto() . "<br />";
echo '$pr->ramo() = ' . $pr->ramo() . "<br />";
echo '$pr->status() = ' . $pr->status() . "<br />";
echo '$pr->edadContacto() = ' . $pr->edadContacto() . "<br />";
echo 'empresa::id2aliasUsuario(1) = ' . empresa::id2aliasUsuario(1) . "<br />";
echo "empresa::aliasUsuario2id('santiago') = " . empresa::aliasUsuario2id('santiago') . "<br />";
echo '$pr->nuevaEmpresa(\'NULL\',\'NULL\',\'NULL\',\'NULL\',\'NULL\',\'NULL\',\'NULL\',\'NULL\',\'NULL\',\'NULL\',\'NULL\') = ' . $pr->nuevaEmpresa('NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL','NULL') . "<br />";
echo '</pre>';

echo "PROPIEDADES DE LA CLASE <br />";
echo '<pre>';
var_dump(get_object_vars($pr));
echo '</pre>';


///////////////////////////////
echo "<h2>Prueba: Enviando un mail HTML con mail(...)...</h2>";
$codigohtml = "<html><head><title>E-Mail HTML</title></head><body><a href=\"http://www.webtaller.com\">Ir a WebTaller</a></body>";
$email = 'david_ercoli@hotmail.com';
$asunto = 'E-Mail HTML';
$cabeceras = "From: direccion@email.dom\r\nContent-type: text/html\r\n";
mail($email,$asunto,$codigohtml,$cabeceras);
?>

<?php include("footer.php"); ?>