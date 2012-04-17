<?
//	define('authenticate',false);
	include_once '../inc/conf.inc.php';

	if( $id != ''){
		$imagen = DBI::record(CFG_sectionsTable,"id = $id");
		header( "Content-Type: $imagen->img_mime" );
		echo $imagen->img_image;
		flush();
	}
?>