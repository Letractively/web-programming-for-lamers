<?
if( isset($id) )
{
	define ( 'CFG_mailError', 'as1@powersite.com.ar' );
	
	define ( 'CFG_SQL_server', 'localhost' );
	define ( 'CFG_SQL_tipo', 'mysql' );
	define ( 'CFG_SQL_db', 'mdtmdtc_mdt' );
	define ( 'CFG_SQL_usuario', 'mdtmdtc_admin' );
	define ( 'CFG_SQL_clave', 'admin' );
	
	include_once( '/home/mdtmdtc/powerlib/0.8.1/dbi.inc.php' );

	$reg = dbi::record( 'tarjetas', "id = $id", 'id,division,nombre,apellido,empresa,tel,fax,direccion,ciudad,provincia,cp,pais,web,email' );
	
	header( "Content-Type: text/x-vcard; name=\"$reg->apellido, $reg->nombre.vcf\"" );
	header( "Content-Disposition: attachment; filename=\"$reg->apellido, $reg->nombre.vcf\"" );
	
	echo "BEGIN:VCARD\r\n";
	echo "VERSION:2.1\r\n";
	echo "N:$reg->apellido;$reg->nombre\r\n";
	echo "FN:$reg->nombre $reg->apellido\r\n";
	echo "ORG:$reg->empresa;$reg->division\r\n";		
	echo "TEL;WORK;VOICE:$reg->tel\r\n";
	echo "TEL;WORK;FAX:$reg->fax\r\n";
	echo "ADR;WORK:;;$reg->direccion;$reg->ciudad;$reg->provincia;$reg->cp;$reg->pais\r\n";
	echo "URL;WORK:$reg->web\r\n";
	echo "EMAIL;PREF;INTERNET:$reg->email\r\n";
	echo "END:VCARD\r\n";
}
