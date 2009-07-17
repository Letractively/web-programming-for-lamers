<?php
$visitado->CargarDatosPerfil();
?>

<div class="col-profesional" >
	<div class="superior-col">
		<p>(poner imagen de cabecera)</p>
	</div>
	<div class="profesional-col">
		<p>Miembro desde: <?php echo myquery::cambiaFaNormal($visitado->miembro_desde);?></p>
		<p><img src="<?php echo $visitado->ruta_foto;?>" /></p>
		<p><?php echo $visitado->nombres;?> <?php echo $visitado->apellidos;?></p>
		<p>Edad: <?php echo $visitado->edad;?> Años</p>
		<p>Puesto: <?php echo $visitado->profesion_1;?></p>
		<p>Nivel:<?php echo $visitado->nivel_profesion;?></p>
	</div>
	<div class="medio-col">
	<p>agregar ULTIMO MOMENTO</p>
	</div>
	<div class="inferior-col">
	<p>(poner imagen de pie)</p>
	</div>
</div>