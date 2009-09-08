	<div class="borde">
	<form method="get" action="busqueda.php" >
		<input type="text" name="buCriterio" class="b-texto" />
		<select class="b-select" name="buDe" >
		<?php listar_options($OPCIONES_BUSQUEDA,'Ofertas Laborales') ?>
		</select>
	</div>
	<div class="borde-boton1">
		<input type="hidden" name="buClase" value="buSimple" />
		<input type="submit" class="boton1" name="buscar" value="Buscar" />
		</form>
	</div>