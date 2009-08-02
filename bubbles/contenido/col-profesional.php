<?php
$visitado->CargarDatosPerfil();
?>

<div class="col-profesional" >
	<div class="superior-col">
	</div>
	<div class="profesional-col">
		<p>Miembro desde: <?php echo myquery::cambiaFaNormal($visitado->miembro_desde);?></p>
		<p><img src="<?php echo DIR_FOTOS_PROFESIONALES . $visitado->ruta_foto;?>" /></p>
		<p><?php echo $visitado->nombres;?> <?php echo $visitado->apellidos;?></p>
		<p>Edad: <?php echo $visitado->edad;?> Años</p>
		<p>Puesto: <?php echo $visitado->profesion_1;?></p>
		<p>Nivel:<?php echo $visitado->nivel_profesion;?></p>
		<div class="linea-2">
		</div>
		<p><a href="#">Editar Perfil</a></p>
		<p><a href="u-editar-foto.php">Editar Foto</a></p>
		<p><a href="#">Ver Mis Postulaciones</a></p>
		<div class="linea-2">
		</div>
	</div>
	<div class="medio-col">
	<p>agregar ULTIMO MOMENTO</p>
	</div>
	<div class="inferior-col">
	</div>
</div>