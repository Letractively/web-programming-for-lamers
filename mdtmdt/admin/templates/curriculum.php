<?
define('authenticate', false);
include_once('../inc/conf.inc.php');
$db2=new DBI;
$db2->select('contenidos','*',"id=$id_parent");
if($db2->num_rows()>0){
	while($row1=$db2->fetch_object()){
		$cmp=$row1->campo;
		if($row1->lng !=''){
			$cmpo["$row1->lng"]["$row1->campo"]=$row1->contenido;
		}
		else{
			$$cmp=$row1->contenido;
		}
	}
}				

?>
<script>
function selFoto(){
	window.open('imagenes.php?tipo_imagen=1&pick=1')
}
</script>
<table width="100%"  border="0" cellspacing="2" cellpadding="2">
  <tr>
    <td width="29%" rowspan="3">
      <div align="center"><img src="<?='./verImagen.php?id='.$CAMPO_imagen ?>" class="recuadro" width="100" name='imagen' id="imagen"><br><input type="button" class="boton" value="Cambiar" onClick="selFoto()">
		<input type="hidden" name="CAMPO_imagen" id="CAMPO_imagen" value="<?=$CAMPO_imagen?>">
      </div>
    </td>
    <td width="71%" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>
      <div align="right">Nombre: </div>
    </td>
    <td>
      <div align="left">
        <input type="text" name="CAMPO_titulo" size="60" value="<?=$CAMPO_titulo?>">
      </div>
    </td>
  </tr>
  <tr>
  	<td>
  	  <div align="right">Email:</div>
  	</td>
    <td colspan="2">
      <div align="left">
        <input type="text" name="CAMPO_email" size="60" value="<?=$CAMPO_email?>"> 
      </div>
    </td>
  </tr>
<tr><td colspan="3"><hr size="1" noshade></td></tr>
<?
	$db_lng=new DBI;
	$db_lng->select('idiomas','*','1=1');
	if($db_lng->num_rows()>0){
		while($row=$db_lng->fetch_object()){
			$lng=$row->prefijo;
?>

<tr><td colspan="3"><div align="left"><img src="../img/<?=$row->icono?>" align="absmiddle">&nbsp;<?=$row->lengua?></div></td></tr>

  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>
      <div align="center">Areas de Pr&aacute;ctica </div>
    </td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">
      <div align="right"></div>
      
      <div align="center">
          <textarea cols="100" rows="4" name="CAMPO_areas<?='_'.$lng;?>"><?=$cmpo["$lng"]['CAMPO_areas']?></textarea>
      </div>
    </td>
  </tr>
  <tr>
    <td>
      <div align="center">Texto</div>
    </td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">
      <div align="center">
        <textarea name="CAMPO_texto<?='_'.$lng;?>" cols="100" rows="20"><?=$cmpo["$lng"]['CAMPO_texto']?></textarea>
      </div>
    </td>
  </tr>
	<tr><td colspan="3" align="center"><input type="button" onclick='grabarContenido()' class="boton" value="<? $txt='Aceptar'; include('traductor.php');?>">&nbsp;</td>
	</tr>
	<tr><td colspan="3"><hr size="1" noshade></td></tr>
<?
		}
	}
?>
</table>
