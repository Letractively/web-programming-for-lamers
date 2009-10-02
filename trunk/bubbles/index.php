<?php include('header.php'); ?>
<?php include('includes/clases/e_aviso.class.php'); ?>

<!--<div id="flashcontent">
  This text is replaced by the Flash movie.
</div>-->

<div class="col-centroizquierda">
	<div class="col-contenido-home"  id="flashcontent">
	</div>
	<script type="text/javascript">
		var so = new SWFObject("banner_2.swf", "mymovie", "770", "203", "8");
		so.write("flashcontent");
	</script>
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