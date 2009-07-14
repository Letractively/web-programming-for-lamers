<?php include('header.php'); ?>

<div class="solo-logueados">
	<h1>Panel de control de USUARIO</h1>
	<a href="u-perfil.php" ><p>mi perfil privado</p></a>
	<a href="<?php echo "u-mensajes.php?id_usuario=" . $_SESSION['id_usuario'] ?>" ><p>mis mensajes</p></a>
	<a href="u-postulaciones.php" ><p>mis postulaciones</p></a>
	<a href="<?php echo "u-galeria.php?id_usuario=" . $_SESSION['id_usuario']?>" ><p>mi galeria pública</p></a>
</div>
	
<?php include('footer.php'); ?>