<?php require_once('header.php'); ?>

<div class="col-centroizquierda">
	<div class="col-contenido-home">
		<p>col-contenido-home</p>
	</div>
	<div class="col-registrarse">
		<?php 
		if(isset($_GET['solapa_reg'])){
			if($_GET['solapa_reg'] == 'empresa'){
				include('contenido/form-registrarse-empresa.php');
			}
			else{
				include('contenido/form-registrarse-usuario.php');
			}
		}
		else{
				include('contenido/form-registrarse-usuario.php');
			}
		?>
	</div>
	<div class="col-derecha">
		<?php include('contenido/usuarios-destacados-col.php'); ?>
	</div>
	<div class="col-derecha">
		<?php include('contenido/form-login-usuario.php'); ?>
		<?php include('contenido/form-login-empresa.php'); ?>
	</div>
</div>

<div class="col-derecha">
	<?php include('contenido/clasificados-col.php'); ?>
</div>

<!--
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
-->

<div>
	<a href="registrar-nueva-empresa.php"><h2>Regístrese como EMPRESA</h2></a>
</div>

<div>
	<a href="registrar-nuevo-usuario.php"><h2>Regístrese como USUARIO</h2></a>
</div>

<div>
	<a href="avisos.php"><h2>Búsqueda de ofertas Laborales</h2></a>
</div>

<?php include('footer.php'); ?>