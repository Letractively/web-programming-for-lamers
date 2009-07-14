<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >
<p>Experiencias laborales Anteriores:</p>
<p>Nueva experiencia laboral:</p>
<p>Empresa Contratista:<input type="text" name="fuContratista" id="fuContratista"></p>
<p>Radicacion de la Empresa:<select name="fuRadicacion" id="fuRadicacion">
<option value="Argentina">Argentina</option>
<option value="Alemania">Alemania</option>
<option value="EEUU">EE.UU.</option>
<option value="Brasil">Brasil</option>
</select></p>
<p>Ramo o Actividad:<select name="fuRamo" id="fuRamo">
<option value="Comunicaciones">Comunicaciones</option>
<option value="Medicina">Medicina</option>
<option value="Informatica">Informática</option>
<option value="Electronica">Electrónica</option>
</select></p>
<p>Puesto ejercido:<select name="fuPuesto" id="fuPuesto">
<option value="Trainee">Trainee</option>
<option value="Ssr">Ssr.</option>
<option value="Sr">Sr.</option>
<option value="Gerencia">Gerencia</option>
</select></p>
<p>Especialidád ejercida:<select name="fuEspecialidadEjercida" id="fuEspecialidadEjercida">
<option value="Administracion">Administración</option>
<option value="Contable">Contable</option>
<option value="Mantenimiento">Mantenimiento</option>
<option value="Proyect Mannager">Project Mannager</option>
</select></p>
<p>Nombre del Puesto Ejercido:<input type="text" name="fuNombreJerarquia" id="fuNombreJerarquia"></p>
<p>Fecha de Ingreso al trabajo:<input type="text" name="fuIngreso" id="fuIngreso"></p>
<p>Fecha de Egreso:<input type="text" name="fuEgreso" id="fuEgreso"></p>
<p>Descripción de las tareas ejercidas:<textarea rows="5" cols="50" name="fuTareasEjercidas" id="fuTareasEjercidas"></textarea></p>
<input type="hidden" value="Agregar esta Experiencia Laboral" name="fuGuardarExperiencias"></input>
<input type="submit" value="Agregar esta Experiencia Laboral" name="fuGuardarExperiencias"></input>
<a href="no-se.php"><input type="button" value="Finalizar con mi Curriculum" name="paso3"></input></a>
<!--<input type="button" value="validar" onClick="return validarForm();"></input>-->
</form>