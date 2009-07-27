<div class="form-registrarse-usuarios">
	<div class="superior">
		<div class="solapa-usuarios">
		<p>Usuarios</p>
		</div>
		<div class="solapa-empresas">
		<p>Empresas</p>
		</div>
	</div>
	<div class="medio">
		<p>(insertar arte REGISTRATE)</p>
	</div>
	<div class="formulario">
		<form action="registrar-nuevo-usuario.php" method="post">
			<table class="tabla-registrar">
			<tr>
				<th>Usuario:</th><td><input class="tabla-registrar-text" type="text" name="fAlias" id="name" /></td>
			</tr>
			<tr>
				<th>Contraseña:</th><td><input class="tabla-registrar-text" type="password" name="fContrasenia" id="password" /></td>
			</tr>
			<tr>
				<th>E-mail:</th><td><input class="tabla-registrar-text" type="text" name="fAlias" id="name" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" class="boton1" value="Ingresar" name="usuario" <?php echo $desabilitar_login;?> /></td>
			</tr>
			</table>
		</form> 
	</div>
	<div class="inferior">
	<p>(insertar inferior)</p>
	</div>
</div>