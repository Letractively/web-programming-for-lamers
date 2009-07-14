<?php include('includes/config.inc.php') ?>
<?php include('includes/conectar_db.php') ?>
<?php include('includes/funciones.inc.php') ?>

Usuarios:
<?php listarEntidades(USUARIOS); ?>
	
Empresas:
<?php listarEntidades(EMPRESAS); ?>