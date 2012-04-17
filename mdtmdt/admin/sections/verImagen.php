<?php
	define ('authenticate', false);
	include_once ('../inc/conf.inc.php');

	$id=$_REQUEST['id'];
	
	if($id>0){
		$archivos = new DBI;
		$arch = $archivos->record( 'imagenes', "id=$id");
		
		header("Content-disposition: inline; filename=$arch->archivo_name");
		header("Content-type: $arch->archivo_mime");
	
		if( $arch->archivo ){
			echo $arch->archivo;
		}
		else{
			echo "../img/sinimagen.gif";
		}
	}
	else{
		echo "../img/sinimagen.gif";
	}
?>
