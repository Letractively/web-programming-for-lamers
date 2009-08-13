<div class="contenido-laborales">
	<div class="cabecera-oferta">
	<h2>Subir Oferta Laborál</h2>
	</div>
	<div class="form-oferta">
	<table class="table1">
		<tr>
			<td><p class="parrafo6">Profesional</p><p class="parrafo6">requerido</p></td>
			<td><select class="oeProfesionRequerida"><?php listar_options($OPCIONES_PROFESIONES)?></select><p>Necesito ayuda</p></td>
			<td><p class="parrafo6">Nivel de</p><p class="parrafo6">experiencia</p></td>
			<td><select class="oeNivel"><?php listar_options($OPCIONES_NIVEL_PROFESION)?></select><p>Ayudarme a determinar</p></td>
		</tr>
	</table>
	<table class="table2">
		<tr>
			<td><p class="parrafo6">Modalidad de trabajo</p><p>Necesito ayuda</p></td>
			<td><select class="oeModalidad"><?php listar_options($OPCIONES_MODALIDAD_TRABAJO)?></select></td>
			<td><p class="parrafo6">Monto máximo a</p><p class="parrafo6">invertir (pesos arg.)</p></td>
			<td><input type="text" class="oePago" /></td>
		</tr>
	</table>
	<table class="table3">
		<tr>
			<td><p class="parrafo6">Breve descripción</p><p class="parrafo6">del trabajo solicitado</p><p>Que deberia ir aqui?</p></td>
			<td><textarea class="oeDetalle" ></textarea></td>
		</tr>
		<tr>
			<td><p class="parrafo6">Capacidad y perfil del</p><p class="parrafo6">profesional requerido</p><p>Ayudarme a elegir</p></td>
			<td><textarea class="oeCapacidad" ></textarea></td>
		</tr>
	</table>
	</div>
	<div class="enviar-oferta">
	<table class="table4">
		<tr>
			<td><p class="parrafo6">Plazo de entrega</p><p>Leer especificaciones</p></td>
			<td>	
				<select class="oeFechaEntrega"><?php listar_options($OPCIONES_PLAZO_ENTREGA)?></select>
			</td>
			<td colspan=2><input type="hidden" name="oePublicar" value="oePublicar"/>
				<input type="submit" class="oePublicar" name="Publicar" value="Publicar"/>
			</td>
		</tr>
	</table>
	</div>
</div>