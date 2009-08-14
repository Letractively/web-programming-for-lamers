<!-- retirar en caso de "pagina incluida" -->
<?php include('header.php') ?>
<?php include("includes/clases/usuario.class.php"); ?>
<?php include("includes/tratar_imagenes.php"); ?>

<?php 
$visitado = new usuario($_SESSION['id_usuario']);
$id_verif = $visitado->idUsuario();
if($id_verif == -1){							//Si verifica que el usuario no existe lo manda a una pagina expecífica
	echo "<p>La página " . $_SERVER['PHP_SELF'] . " no existe</p>";
//	header("Location: " . ARCH_PAG_NO_EXISTE);
}
$visitado->CargarDatosPerfil();
?>
<!-- hasta aqui -->

<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data" name="editpage" id="editpage">
<input name="img1" type="file" id="img1" size="40">
<input type="submit" name="Submit" value="Subir imagen">
</form>

<?php
if(isset($_POST['Submit'])){
	//si ya se hizo clic en submit 
$fotos=imgResample2("img1", DIR_FOTOS_PROFESIONALES, $_SESSION['id_usuario'], DIMENSION_FOTO_GRANDE, DIMENSION_FOTO_GRANDE, DIMENSION_FOTO_CHICA, DIMENSION_FOTO_CHICA); 
echo '<p>' . $fotos[0] . '</p>';
echo '<p>' . $fotos[1] . '</p>';
echo '<p> Vista preeliminar, foto completa: </p>';
echo '<p>' . $fotos[2] . '</p>';
echo '<p> Vista preeliminar, foto en miniatura:';
echo '<p>' .$fotos[3]. '<br>';
$visitado->cargarRutaFoto($_SESSION['id_usuario'] . '.jpg');
}	//end for


echo '<pre>';
print_r($_FILES);
echo '</pre>';
?>

<?php include('footer.php') ?>