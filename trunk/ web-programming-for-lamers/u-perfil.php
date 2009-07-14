<?php include("header.php"); ?>
<?php include("includes/clases/usuario.class.php"); ?>

<?php
$us = new usuario(7);
?>

<h2>Perfil de usuario</h2>

id_usuario: <?php echo $us->id_usuario; ?><br />
alias: <?php echo usuario::id2alias($_SESSION['id_usuario']); ?><br />
contrasenia: <?php echo $us->contrasenia; ?><br />
nombres: <?php echo $us->nombres; ?><br />
apellidos: <?php echo $us->apellidos; ?><br />
email:  <?php echo $us->email; ?><br />
n_documento: <?php echo $us->n_documento; ?><br />
nacimiento:  <?php echo $us->nacimiento; ?><br />
edad: <?php echo $us->edad; ?><br />
status: <?php echo $us->status; ?><br />