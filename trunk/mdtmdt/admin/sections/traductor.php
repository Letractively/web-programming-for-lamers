<?
define('authenticate', false);
include_once('../inc/conf.inc.php');
$dbt=new DBI;
if($lng_orig==$lng_dest){
	$qry="origen='$lng_orig' and palabra_o='$txt'";
	$rst='palabra_o';
}
else{
	$qry="origen='$lng_orig' and destino='$lng_dest' and palabra_o='$txt'";
	$rst='palabra_d';
}

$dbt->select('traduccion',"$rst","$qry");

if($dbt->num_rows()>0){
	$row=$dbt->fetch_object();
	$txt_=$row->$rst;
	echo $txt_;
}


?>
