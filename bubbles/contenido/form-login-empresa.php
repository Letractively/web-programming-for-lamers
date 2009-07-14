<div class="login-empresa">
	<div class="form-login-empresa">
		<form action="logeo.php" method="post">
			<table class="tabla-login">
			<tr>
				<th>Usuario:</th><td><input class="tabla-login-text" type="text" name="fAlias" id="name" <?php echo $desabilitar_login;?> /></td>
			</tr>
			<tr>
				<th>Contraseña:</th><td><input class="tabla-login-text" type="password" type="password" name="fContrasenia" id="password" <?php echo $desabilitar_login;?> /></td>
			</tr>
			<tr>
				<td colspan="2"><a href="#"><p class="texto-chico" style="text-align: right;">Olvidaste tu contraseña?<p></a></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" class="boton1" value="Ingresar" name="empresa" <?php echo $desabilitar_login;?> /></td>
			</tr>
			</table>
		</form> 
	</div>
</div>
