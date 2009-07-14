<?php include('header.php') ?>

<div>
	<h1>INDEX</h1>
	<h2>Empresa</h2>

	<form action="logeo.php" method="post">
		<p>Alias:<input type="text" name="fAlias" id="name"></p>
		<p>Contraseña:<input type="password" name="fContrasenia" id="password"></p>
		<input type="submit" value="Ingresar" name="empresa">
	</form>
</div>

<div>
<h2>Usuario</h2>

	<form action="logeo.php" method="post">
		<p>Alias:<input type="text" name="fAlias" id="name"></p>
		<p>Contraseña:<input type="password" name="fContrasenia" id="password"></p>
		<input type="submit" value="Ingresar" name="usuario">
	</form>
</div>

<?php include('footer.php') ?>