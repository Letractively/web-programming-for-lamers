<?php //Botónes para mensaje abierto > ?>
<div class="borde-botones-mensajes">
<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="POST" enctype="multipart/form-data" name="editpage" id="editpage">
	<table>
	<tr>
		<!--<td><input type="submit" name="nueva" class="boton2" value="Nueva" /></td>-->
		<input type="hidden" name="renovar_foto" value="renovar_foto" />
	</tr>
<!--	<tr>
		<td><input type="button" class="boton2" value="Respond." /></td>
	</tr>-->
	<tr>
		<td><input type="submit" class="boton2" name="eliminar" value="Eliminar" /></td>
	</tr>
	</table>
</div>