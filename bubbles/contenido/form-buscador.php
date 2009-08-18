<form action="logeo.php" method="post">
	<div class="borde">
		<input type="text" class="b-texto" />
		<select class="b-select">
		<?php listar_options($OPCIONES_BUSQUEDA) ?>
		</select>
	</div>
	<div class="borde-boton1">
		<input type="submit" value="Buscar" class="boton1" />
	</div>
</form>