<?php
// Configuración de DB...
define( 'USUARIO_SQL', 'bubbles');
define( 'PASS_SQL', '45511385');
define('SQL_DB', 'bubbles');
define('SQL_NAMES', 'utf8'); //Setea el IDIOMA POR DEFECTO entre el server y el cliente, por mas que este TODO en UTF8 hay que especificar la conexión

// Configuración de directorios y archivos...
define('HOST','http://127.0.0.1/');
define('DIR_BUBBLES','bubbles/');
define('URL_BASE',HOST . DIR_BUBBLES );
define('DIR_JS','js/');
define('DIR_INCLUDES','includes/');
define('DIR_CLASES','includes/clases/');
define('DIR_CONTENT','content/');
define('ARCH_PAG_NO_EXISTE', 'no-existe.php');
//define('DIR_FUENTES', 'C:\\WINDOWS\\Fonts\\'); // "/home/sito/public_html/fonts/" para LINUX
define('DIR_FUENTES', '../fuentes/'); // Ruta RELATIVA! (solo sirve para el php que genera el captcha.)
define('DIR_FOTOS_PROFESIONALES', 'contenido/profesionales/fotos/');	//160*160
define('DIR_FOTOS_PROFESIONALES_CHICAS', DIR_FOTOS_PROFESIONALES . 'small/');	//60*60
define('DIR_FOTOS_EMPRESAS', 'contenido/empresas/fotos/');	//160*160
define('DIR_FOTOS_EMPRESAS_CHICAS', DIR_FOTOS_PROFESIONALES . 'small/');	//60*60

define('DIMENSION_FOTO_GRANDE','160');
define('DIMENSION_FOTO_CHICA','60');

// Tiempo de Sesion por usuario en segundos...
define('TIEMPO_SESION', 1000);

// Configuración de opciones listadas...
$OPCIONES_PROFESIONES = array('Dis. web', 'Dis. grafico', 'Dis. multimedial', 'Dis. de indumentaria', 'Dis. de interiores',
							'Dir. de arte', 'Ilustrador', 'Retocador', 'Animador 3d', 'Animador 2d', 'Editor de videos',
							'Dibujante', 'Redactor', 'Organizador de eventos');
$OPCIONES_NIVEL_PROFESION = array('Trainee', 'Ssr', 'Sr');
$OPCIONES_SEXO = array('Masculino', 'Femenino');
$OPCIONES_MODALIDAD_TRABAJO = array('A convenir', 'Horario estricto', 'Free-Lance');
$OPCIONES_PLAZO_ENTREGA = array('A convenir', '1 mes', '3 meses', '6 meses', '1 año');

// Constantes predefinidas...
// define('PARA_USUARIO', 1);
// define('PARA_EMPRESA', 0);
// define('DESDE_USUARIO', 1);
// define('DESDE_EMPRESA', 0);
?>