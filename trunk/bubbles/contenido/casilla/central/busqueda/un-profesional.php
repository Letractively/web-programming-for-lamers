<?php
$este_usuario = new usuario($esta_busqueda->bu_id_usuario[$i]);
echo $este_usuario->ultimo_error;
?>

<?php
//Preparacion de la variable "indicadora" de los permisos del visitante....
$visitante_es = '';
if(isset($_SESSION['id_usuario'])){
	if($este_usuario->id_usuario == $_SESSION['id_usuario']){
		$visitante_es = 'usuario_administrador';
	}
	else{
		$visitante_es = 'usuario_visitante';
	}
}
if(isset($_SESSION['id_empresa'])){
	$visitante_es = 'empresa_visitante';
}
//echo 'VISITANTE_ES: ' . $visitante_es;
?>
	
	<div class="titulo-oferta-busqueda">
		<p class="parrafo8" style="float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">
			<?php echo $este_usuario->alias; ?> (<?php echo myquery::cambiaTaNormal($este_usuario->nombres); ?> <?php echo myquery::cambiaTaNormal($este_usuario->apellidos); ?>)
		</p>
		<p class="parrafo8" style="float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;">
			Miembro desde: <?php echo myquery::cambiaFaNormal($este_usuario->miembro_desde); ?>
		</p>
	</div>
	<div class="borde-empresa-oferta-completa">
		<div class="foto-oferta-laboral">
			<a href="profesional/<?php echo $este_usuario->alias; ?>">
				<img src="<?php echo DIR_FOTOS_PROFESIONALES_CHICAS . $este_usuario->ruta_foto; ?>">
			</a>
		</div>
		<div class="descripcion-empresa">
		<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;"><?php echo $este_usuario->profesion_1; ?></p>
		<div style="clear: both">
		</div>
		<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;">Nivel: <?php echo $este_usuario->nivel_profesion; ?></p>
		<div style="clear: both">
		</div>
		<p class="parrafo3" style="float: left; margin-left: 5px; margin-top: 0px; margin-bottom: 0px;"><?php echo myquery::cambiaTaNormal($este_usuario->pais_residencia); ?></p>
		<div style="clear: both">
		</div>
		</div>
	</div>
	<div class="pie-oferta-busqueda">
	<?php
	$alias_visitante = usuario::id2alias($_SESSION['id_usuario']);
	?>
	<a href="u-galeria.php?entidad_visitada=<?php echo $alias_visitante; ?>&casilla_central=todos_amigos&contenido_central=todos_amigos&id_amigo_agregar=<?php echo $este_usuario->id_usuario; ?>">
		<p class="parrafo8" style="color: #ff0000; float: left; margin-left: 10px; margin-top: 0px; margin-bottom: 0px;">AGREGAR COMO AMIGO</p>
	</a>
	<a href="profesional/<?php echo $este_usuario->alias; ?>">
		<p class="parrafo8" style="color: #ff0000; float: right; margin-right: 10px; margin-top: 0px; margin-bottom: 0px;">VER PORTFOLIO</p>
	</a>
	</div>