<?php //Botónes para mensaje abierto > ?>
<div class="borde-botones-mensajes">
	<table>
	<tr>
		<td><a href="e-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&solapa_superior=mensajes&botonera_superior=nuevo_mensaje&contenido_superior=nuevo_mensaje">
			<input type="button" class="boton2" value="Nuevo" />
			</a>
		</td>
	</tr>
	<form method="post" action="e-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&solapa_superior=mensajes&botonera_superior=nuevo_mensaje&contenido_superior=nuevo_mensaje">
	<tr>
		<td><input type="submit" class="boton2" name="emResponder" value="Respond." /></td>
	</tr>
	<tr>
		<td><input type="submit" class="boton2" name="emEliminar" value="Eliminar" /></td>
	</tr>
	</table>
</div>