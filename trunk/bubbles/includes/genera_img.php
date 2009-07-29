<?php
// Iniciamos uso de sesiones ...
session_start();
// Incluimos....
include("config.inc.php");

//recogemos el texto por el URL que enviamos a generar desde el link de imagen del HTML de nuestro formulario
$codigo=$_SESSION['capcha'];

//nombres tipograf�as a usar (sin extensi�n .ttf)
$tipografias = array("arial","comic","times");

//directorio donde est�n las fuentes (ruta absoluta) importante el �ltimo /
$tipografias_ruta = DIR_FUENTES;

//inicializa eje X desde donde se empezar� a dibujar el c�digo (referente al tama�o de la caja)
$espacio = 0;

//tama�o fuente.
$tamano_fuente = 15;

//profundidad caracteres/digitos del c�digo a generar (password).
$profundidad_codigo = 8; // (alfanum�ricos)

//c�lculo Ancho autom�tico de la caja

$x=$profundidad_codigo*$tamano_fuente;
$y=$tamano_fuente;

// Iniciar la generaci�n de la imagen. Se define una caja de $x por $y pixels.
$im = imagecreate($x, $y);

//definici�n Colores. Expresados en valores R G B (respectivamente).
$color_fondo = imagecolorallocate($im, 255, 255, 255); // Blanco
$color_texto = imagecolorallocate($im, 0, 0, 0); // Negro

for($caracter=0; $caracter<$profundidad_codigo; $caracter++){
  //seleccion de una tipograf�a aleatoria.
  $indice_aleatorio=array_rand($tipografias);
  $tipografia=$tipografias_ruta.$tipografias[$indice_aleatorio].'.ttf';

  //generar el caracter gr�fico.
  imagettftext($im, $tamano_fuente, 0, $espacio, $tamano_fuente, $color_texto, $tipografia , $codigo{$caracter});
  //separaci�n entre caracteres
  $espacio +=$tamano_fuente;
}

//envio los headers HTTP para indicar el NO CACHEO de la img...
header("Expires: Sun, 1 Jan 2000 12:00:00 GMT");
header("Last-Modified: ".gmdate("D, d M Y H:i:s")."GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//cabecera HTTP la cual indica al navegador que la imagen que estamos generando es .PNG
header('Content-type: image/png');


//genera un png din�mico
imagepng($im);
//destruye la imagen del servidor
imagedestroy($im);
?>