<?php if($visitante_es != 'empresa_administrador'){rebotar('no_administrador');} ?>
<div class="contenido-laborales">
	<div class="cabecera-oferta">
	<h2>Subir Oferta Laboral</h2>
	</div>
	<form action="e-galeria.php?entidad_visitada=<?php echo $_GET['entidad_visitada'] ?>&solapa_superior=ver_mis_ofertas&botonera_superior=ver_mis_ofertas&contenido_superior=ver_mis_ofertas" method="post" class="registro" id="registrarForm">
	<div class="form-oferta">
	<table class="table1">
		<tr>
			<td><p class="parrafo6">Profesional</p><p class="parrafo6">requerido</p></td>
			<td><select name="oeProfesionRequerida" class="oeProfesionRequerida"><?php listar_options($OPCIONES_PROFESIONES)?></select><p>Necesito ayuda</p></td>
			<td><p class="parrafo6">Nivel de</p><p class="parrafo6">experiencia</p></td>
			<td><select name="oeNivel" class="oeNivel"><?php listar_options($OPCIONES_NIVEL_PROFESION)?></select><p>Ayudarme a determinar</p></td>
		</tr>
	</table>
	<div class="separador1"></div>
	<table class="table2">
		<tr>
			<td><p class="parrafo6">Modalidad de trabajo</p><p>Necesito ayuda</p></td>
			<td><select name="oeModalidad" class="oeModalidad"><?php listar_options($OPCIONES_MODALIDAD_TRABAJO)?></select></td>
			<td><p class="parrafo6">Monto máximo a</p><p class="parrafo6">invertir (pesos arg.)</p></td>
			<td><input type="text" name="oePago" class="oePago" /></td>
		</tr>
	</table>
	<div class="separador1"></div>
	<table class="table3">
		<tr>
			<td><p class="parrafo6">Breve descripción</p><p class="parrafo6">del trabajo solicitado</p><p>Que deberia ir aqui?</p></td>
			<td><textarea name="oeDetalle" class="oeDetalle" ></textarea></td>
		</tr>
	</table>
	<div class="separador1"></div>
	<table class="table3">
		<tr>
			<td><p class="parrafo6">Capacidad y perfil del</p><p class="parrafo6">profesional requerido</p><p>Ayudarme a elegir</p></td>
			<td><textarea name="oeCapacidad" class="oeCapacidad" ></textarea></td>
		</tr>
	</table>
	</div>
	<div class="enviar-oferta">
	<div class="separador1"></div>
	<div class="fondo1">
	<table class="table4">
		<tr>
			<td><p class="parrafo6">Plazo de entrega</p><p>Leer especificaciones</p></td>
			<td>	
				<select name="oeFechaEntrega" class="oeFechaEntrega"><?php listar_options($OPCIONES_PLAZO_ENTREGA)?></select>
			</td>
		</tr>
	</table>
	</div>
	<div class="fondo2">
	<table class="table4">
		<tr>
			<td colspan=2><input type="hidden" name="oePublicar" value="oePublicar"/>
					<input type="submit" class="oePublicar" name="Publicar" value="Publicar"/>
			</td>
		</tr>
	</table>
	</div>
	</div>
	</form>
</div>