<?
	define('cachear', true);
	include('../inc/conf.inc.php');
	
	if(!CFG_debug and file_exists(CFG_libPath."javascript/xmenu_c.js")){
		include_once(CFG_libPath."javascript/xmenu_c.js");
	}else{
		include_once(CFG_libPath."javascript/xmenu.js");
	}
?>