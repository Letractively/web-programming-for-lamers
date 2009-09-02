<?php //Botónes para mensaje abierto > ?>
<div class="borde-botones-mensajes">
	<table>
	<tr>
		<td><p class="parrafo3 al-medio boton2"><a href="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&solapa_superior=mensajes&botonera_superior=nuevo_mensaje&contenido_superior=nuevo_mensaje">
			Nuevo
			</a></p></td>
	</tr>
		<form method="post" action="u-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&&solapa_superior=mensajes&botonera_superior=nuevo_mensaje&contenido_superior=nuevo_mensaje">
	<tr>
		<td><input type="submit" class="boton2" name="umResponder" value="Respond." /></td>
	</tr>
	<tr>
		<td><input type="submit" class="boton2" name="umEliminar" value="Eliminar" /></td>
	</tr>
	</table>
</div>