<?php
// Configuración de DB...
define( 'USUARIO_SQL', 'bubbles');
define( 'PASS_SQL', '45511385');
define('SQL_DB', 'bubbles');

// Configuración de directorios...
define('HOST','http://127.0.0.1/');
define('DIR_BUBBLES','bubbles/');
define('URL_BASE',HOST . DIR_BUBBLES );
define('DIR_JS','js/');
define('DIR_INCLUDES','includes/');
define('DIR_CLASES','includes/clases/');
define('DIR_CONTENT','content/');
define('ARCH_PAG_NO_EXISTE', DIR_BUBBLES . 'no-existe.php');
//define('DIR_FUENTES', 'C:\\WINDOWS\\Fonts\\'); // "/home/sito/public_html/fonts/" para LINUX
define('DIR_FUENTES', '../fuentes/'); // Ruta RELATIVA! (solo sirve para el php que genera el captcha.)
define('DIR_FOTOS_PROFESIONALES', 'contenido/profesionales/fotos/');
define('DIMENSION_FOTO_GRANDE','160');
define('DIMENSION_FOTO_CHICA','60');

// Tiempo de Sesion por usuario en segundos...
define('TIEMPO_SESION', 1000);

// Constantes predefinidas...
// define('PARA_USUARIO', 1);
// define('PARA_EMPRESA', 0);
// define('DESDE_USUARIO', 1);
// define('DESDE_EMPRESA', 0);
?>