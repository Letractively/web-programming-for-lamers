<?php
// Configuración de DB...
define( 'HOST_SQL', 'internal-db.s70543.gridserver.com');
define( 'USUARIO_SQL', 'db70543_bubbles');
define( 'PASS_SQL', 'bubbles@bubbles');
define( 'SQL_DB', 'db70543_bubbles');
define( 'SQL_NAMES', 'utf8'); //Setea el IDIOMA POR DEFECTO entre el server y el cliente, por mas que este TODO en UTF8 hay que especificar la conexión
define('SQL_COLLATION', 'utf8_general_ci');	//Cotejamiento de la conexión, se setea como información para que el server sepa COMO indexar los resultados

// Configuración de directorios y archivos...
define('HOST','http://www.bubblescomunidad.com/');
define('DIR_BUBBLES','');
define('URL_BASE',HOST . DIR_BUBBLES );
define('DIR_JS','js/');
define('DIR_INCLUDES','includes/');
define('DIR_CLASES','includes/clases/');
define('DIR_CONTENT','content/');
define('ARCH_PAG_NO_EXISTE', 'no-existe.php');
define('SITIOS_PROFESIONAL', URL_BASE . 'profesional/');
define('SITIOS_EMPRESA', URL_BASE . 'empresa/');
//define('DIR_FUENTES', 'C:\\WINDOWS\\Fonts\\'); // "/home/sito/public_html/fonts/" para LINUX
define('DIR_FUENTES', '../fuentes/'); // Ruta RELATIVA! (solo sirve para el php que genera el captcha.)
define('DIR_FOTOS_PROFESIONALES', 'contenido/profesionales/fotos/');	//160*160
define('DIR_FOTOS_PROFESIONALES_CHICAS', DIR_FOTOS_PROFESIONALES . 'small/');	//60*60

define('DIR_FOTOS_EMPRESAS', 'contenido/empresas/fotos/');	//160*160
define('DIR_FOTOS_EMPRESAS_CHICAS', DIR_FOTOS_EMPRESAS . 'small/');	//60*60

define('DIR_PORTFOLIOS_PROFESIONALES', 'contenido/profesionales/portfolios/');
define('DIR_PORTFOLIOS_PROFESIONALES_CHICOS', DIR_PORTFOLIOS_PROFESIONALES . 'small/');

define('PESO_MAXIMO_AVATAR', 200000);	//en bytes
define('DIMENSION_FOTO_GRANDE','160');
define('DIMENSION_FOTO_CHICA','60');

define('PESO_MAXIMO_PORTFOLIO', 500000);
define('DIMENSION_PORTFOLIO_GRANDE','900');
define('DIMENSION_PORTFOLIO_CHICO','98');

define('DIR_CV_PROFESIONALES', 'contenido/profesionales/cv/');
define('PESO_MAXIMO_CV', 500000);

// Tiempo de Sesion por usuario en segundos...
define('TIEMPO_SESION', 1000);

//FILTROS de expresiones regulares: (POR ahora no se permiten niguno de los caracteres antecedidos por '[^' ni espacios en blanco
define('EXPREG_USUARIOS', '^[^ñáéíóú*~. ][a-zA-Z0-9\-\S][^ñáéíóú*~. ]{2,16}$');
define('EXPREG_PASS', '^[^ñáéíóú*~. ][a-zA-Z0-9\-\S][^ñáéíóú*~. ]{2,16}$');

// Configuración de opciones listadas...
$OPCIONES_PROFESIONES = array('Dis. web', 'Dis. grafico', 'Dis. multimedial', 'Dis. de indumentaria', 'Dis. de interiores',
							'Dir. de arte', 'Ilustrador', 'Retocador', 'Animador 3d', 'Animador 2d', 'Editor de videos',
							'Dibujante', 'Redactor', 'Organiz. de eventos', 'Arquitecto', 'Dibujante', 'Ejec. de Ctas. y RRPP.',
							'Planner', 'Medio', 'Ejec. Cuentas', 'Dir. de Cuentas', 'Fotógrafo', 'Prod. Gráfico', 'Maquetador',
							'Programador Gral.', 'Programador Web');
$OPCIONES_NIVEL_PROFESION = array('Trainee', 'Ssr', 'Sr');
$OPCIONES_SEXO = array('Masculino', 'Femenino');
$OPCIONES_MODALIDAD_TRABAJO = array('A convenir', 'Horario estricto', 'Free-Lance');
$OPCIONES_PLAZO_ENTREGA = array('A convenir', '1 mes', '3 meses', '6 meses', '1 año');
$OPCIONES_BUSQUEDA = array('Ofertas Laborales', 'Profesionales', 'Empresas');

// Caracteres permitidos escritos en EXPRESIONES REGULARES... (NO IMPLEMENTADO)
define('CARACTERES_VALIDOS', "^[a-zA-Z0-9\-_]{3,20}$");

// Constantes predefinidas...
// define('PARA_USUARIO', 1);
// define('PARA_EMPRESA', 0);
// define('DESDE_USUARIO', 1);
// define('DESDE_EMPRESA', 0);
?>