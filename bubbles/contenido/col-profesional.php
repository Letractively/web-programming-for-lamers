<?php
$visitado->CargarDatosPerfil();
?>

<div class="col-profesional" >
	<div class="superior-col">
	</div>
	<div class="profesional-col">
		<p class="parrafo3">Miembro desde: <?php echo myquery::cambiaFaNormal($visitado->miembro_desde);?></p>
		<div class="foto">
			<img src="<?php echo DIR_FOTOS_PROFESIONALES . $visitado->ruta_foto . '?' . rand();?>"></img>
		</div>
		<p class="parrafo9"><?php echo $visitado->nombres;?> <?php echo $visitado->apellidos;?></p>
		<p class="parrafo3">Edad: <?php echo $visitado->edad;?> Años</p>
		<p class="parrafo3">Puesto: <?php echo $visitado->profesion_1;?></p>
		<p class="parrafo3">Nivel: <?php echo $visitado->nivel_profesion;?></p>
		<div class="linea-2">
		</div>
		<p><a href="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&solapa_superior=ninguna_activa&botonera_superior=editar_perfil&contenido_superior=editar_perfil">
			Editar Perfil
			</a>
		</p>
		<p><a href="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&solapa_superior=ninguna_activa&botonera_superior=editar_mi_foto&contenido_superior=editar_mi_foto">
			Editar Foto
			</a>
		</p>
		<p><a href="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&solapa_superior=ninguna_activa&botonera_superior=sin_botonera&contenido_superior=mis_postulaciones">
			Ver Mis Postulaciones
			</a>
		</p>
		<div class="linea-2">
		</div>
	</div>
	<div class="medio-col">
	<p>agregar ULTIMO MOMENTO</p>
	</div>
	<div class="inferior-col">
	</div>
</div>