<?
       ##########################################
      ##  Archivo de configuración FRAMEWORK. ##
     ##########################################

/*	ini_set( 'session.use_trans_sid' , '1' );
        ini_set( 'session.use_cookies' , '0' );
	ini_set( 'session.cookie_domain' , 'www.powersite.com.ar' );*/
	
# Configuración general del sistema
	define ( 'CFG_site', 'Mdt - Administración' );
	define ( 'CFG_mailError', 'aalonso@textplain.com.ar' );
		
	define ( 'CFG_maintenance',false );
	//Constantes de Base de Datos
	define ( 'CFG_language', 'es_ar' );
	define ( 'CFG_SQL_server', 'localhost' );
	define ( 'CFG_SQL_tipo', 'mysql' );
	define ( 'CFG_SQL_db', 'mdtmdtc_mdt' );
	define ( 'CFG_SQL_usuario', 'mdtmdtc_admin' );
	define ( 'CFG_SQL_clave', 'admin' );
	
	define ( 'CFG_privilegesTable', 'adm_permisos' );
	define ( 'CFG_usersTable', 'adm_usuarios' );
	define ( 'CFG_sectionsTable', 'adm_secciones' );
	define ( 'CFG_groupsTable', 'adm_grupos' );
	define ( 'CFG_actionsTable', 'adm_acciones' );
	define ( 'CFG_sections_actionsTable', 'adm_secciones_acciones' );
	
	//Paths
	//define ( 'CFG_libPath', '/www/mdt/001/powerlib/0.8.1/' );
	define ( 'CFG_libPath', '/home/mdtmdtc/powerlib/0.8.1/' );
	define ( 'CFG_styleDir', 'styles/' );
	define ( 'CFG_styleFile', 'framework.css' );
	define ( 'CFG_framework', true );//?????
	define ( 'CFG_templates', 'templates/' );//?????
	
	if ($SERVER_NAME == 'madero.powersite.com.ar' || $SERVER_NAME == '10.30.40.181') {
		# Nahuelito
		define ( 'CFG_url','' );
		define ( 'CFG_dir','mdt/001/site/admin/' );
		define ( 'CFG_realPath', '/www/'.CFG_url.CFG_dir );
		define ( 'CFG_incPath', CFG_realPath.'inc/' );
		define ( 'CFG_virtualPath', ($SERVER_PORT==80?'http':'https').'://'.$HTTP_HOST.'/'.CFG_dir);
		define ( 'CFG_sessionPath', '/'.CFG_dir );
		
		define ( 'CFG_debug', true );
	} else {
		# ePowerServer
		define ( 'CFG_url','' );
		define ( 'CFG_dir','' );
		define ( 'CFG_realPath', '/home/mdtmdtc/public_html/'.CFG_url.CFG_dir );
		define ( 'CFG_incPath', CFG_realPath.'inc/' );
		define ( 'CFG_virtualPath', ($SERVER_PORT==80?'http':'https').'://'.$HTTP_HOST.'/'.CFG_dir );
		define ( 'CFG_sessionPath', '/'.CFG_dir );
				
		define ( 'CFG_debug', false );
	}
	define ( 'CFG_virtualIncPath',  CFG_virtualPath.'inc/' );
	define ( 'CFG_stylePath', CFG_virtualPath.CFG_styleDir );
	define ( 'CFG_jsPath', CFG_virtualPath.'javascript/' );
	define ( 'CFG_imgPath', CFG_virtualPath.'img/' );

	if( CFG_debug == true )	{
		ini_set( 'display_errors', 1 );
	}
	
	# Constantes para la funcion de autentificación.
	define ( 'CFG_authTable', 'adm_usuarios' );
	define ( 'CFG_authUserField', 'usuario' );
	define ( 'CFG_authPassField', 'clave' );
	define ( 'CFG_passFunction', 'plain' );
	define ( 'CFG_loginFile', 'login.php' );
	define ( 'CFG_loginPage', CFG_virtualPath.CFG_loginFile );
	define ( 'CFG_indexPage', 'index.php' );
	define ( 'CFG_actionVar','action' );
	define ( 'CFG_closeOnLogout',false );//indica si se cerrara o no el navegador al salir del sistema
	define ( 'CFG_kickOffTimeOut',3600 );
	define ( 'CFG_refreshTimeOut',1800 );
	
	# Inclusión de las librerias utilizadas en este sistema.
	include_once(CFG_libPath.'func.inc.php' );
	include_once(CFG_libPath.'dbi.inc.php' );
	include_once(CFG_libPath.'fecha.inc.php' );
	include_once(CFG_libPath.'authentication2.inc.php' );
	include_once(CFG_libPath.'widgets.inc.php' );
	include_once(CFG_libPath.'email.inc.php');
	include_once(CFG_libPath.'form.inc.php' );
	include_once(CFG_libPath.'abm.inc.php' );

	session_start();
	//echo var_dump($_SESSION);
?>