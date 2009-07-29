<div class="form-registrarse-usuarios">
	<div class="superior">
		<div class="solapa-usuarios">
		<a href="<?php echo $_SERVER['PHP_SELF'] . '?solapa_reg=usuario'?>" ><p>Profesionales</p></a>
		</div>
		<div class="solapa-empresas">
		<a href="<?php echo $_SERVER['PHP_SELF'] . '?solapa_reg=empresa'?>" ><p>Empresas</p></a>
		</div>
	</div>
	<div class="medio">
	</div>
	<div class="formulario">
		<form action="registrar-nuevo-usuario.php" method="post">
			<table class="tabla-registrar">
			<tr>
				<th>Usuario:</th><td><input class="tabla-registrar-text" type="text" name="fiAlias" id="name" /></td>
			</tr>
			<tr>
				<th>Contraseña:</th><td><input class="tabla-registrar-text" type="password" name="fiContrasenia" id="password" /></td>
			</tr>
			<tr>
				<th>E-mail:</th><td><input class="tabla-registrar-text" type="text" name="fiEmail" id="name" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" class="boton1" value="Registrate" name="usuario" <?php echo $desabilitar_login;?> /></td>
			</tr>
			</table>
		</form> 
	</div>
	<div class="inferior">
	</div>
</div>