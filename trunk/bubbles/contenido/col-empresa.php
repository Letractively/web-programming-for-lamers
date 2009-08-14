<?php
$visitado->CargarBasicosEmpresa();
?>

<div class="col-empresa" >
	<div class="superior-col">
	</div>
	<div class="empresa-col">
		<p>Miembro desde: <?php echo myquery::cambiaFaNormal($visitado->miembro_desde_usuario);?></p>
		<p><img src="<?php echo DIR_FOTOS_EMPRESAS . $visitado->ruta_foto;?>" /></p>
		<p><?php echo $visitado->razon_social;?></p>
		<p>Usuario administrador: <?php echo $visitado->alias_usuario;?></p>
		<p><a href="e-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&solapa_superior=ver_mis_ofertas&botonera_superior=ver_mis_ofertas&contenido_superior=ver_mis_ofertas">Ver Mis Ofertas Laborales</a></p>
	</div>
	<div class="medio-col">
	<p>agregar ULTIMO MOMENTO</p>
	</div>
	<div class="inferior-col">
	</div>
</div>