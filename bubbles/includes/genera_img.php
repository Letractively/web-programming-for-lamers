<?php
// Iniciamos uso de sesiones ...
session_start();
// Incluimos....
include("config.inc.php");

//recogemos el texto por el URL que enviamos a generar desde el link de imagen del HTML de nuestro formulario
$codigo=$_SESSION['id_consulta'];

//nombres tipografías a usar (sin extensión .ttf)
$tipografias = array("arial","comic","times");

//directorio donde estén las fuentes (ruta absoluta) importante el último /
$tipografias_ruta = DIR_FUENTES;

//inicializa eje X desde donde se empezará a dibujar el código (referente al tamaño de la caja)
$espacio = 0;

//tamaño fuente.
$tamano_fuente = 15;

//profundidad caracteres/digitos del código a generar (password).
$profundidad_codigo = 8; // (alfanuméricos)

//cálculo Ancho automático de la caja

$x=$profundidad_codigo*$tamano_fuente;
$y=$tamano_fuente;

// Iniciar la generación de la imagen. Se define una caja de $x por $y pixels.
$im = imagecreate($x, $y);

//definición Colores. Expresados en valores R G B (respectivamente).
$color_fondo = imagecolorallocate($im, 255, 255, 255); // Blanco
$color_texto = imagecolorallocate($im, 0, 0, 0); // Negro

for($caracter=0; $caracter<$profundidad_codigo; $caracter++){
  //seleccion de una tipografía aleatoria.
  $indice_aleatorio=array_rand($tipografias);
  $tipografia=$tipografias_ruta.$tipografias[$indice_aleatorio].'.ttf';

  //generar el caracter gráfico.
  imagettftext($im, $tamano_fuente, 0, $espacio, $tamano_fuente, $color_texto, $tipografia , $codigo{$caracter});
  //separación entre caracteres
  $espacio +=$tamano_fuente;
}

//cabecera HTTP la cual indica al navegador que la imagen que estamos generando es .PNG
header('Content-type: image/png');

//genera un png dinámico
imagepng($im);
//destruye la imagen del servidor
imagedestroy($im);
?>