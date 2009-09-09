<?php include('header.php'); ?>
<?php include('includes/clases/e_aviso.class.php'); ?>

<div class="col-centroizquierda">
	<div class="col-contenido-home">
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

<?php include('footer.php'); ?>